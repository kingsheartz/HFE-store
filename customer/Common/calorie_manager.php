<?php
session_start();
require_once __DIR__ . '/pdo.php';
require_once dirname(__DIR__, 2) . '/includes/logger.php';

global $pdo;

if (!isset($_SESSION['id'])) {
  log_message("Unauthorized access attempt to calorie manager.");
  echo json_encode(["status" => "error", "message" => "Unauthorized access"]);
  exit;
}

/**
 * Add the total calories consumed by a customer for today.
 */
if (isset($_POST['customer_id']) && isset($_POST['food_item']) && isset($_POST['calories'])) {
  $customer_id = $_POST['customer_id'];
  $food_item = $_POST['food_item'];
  $calories = isset($_POST['calories']) ? (int) trim($_POST['calories']) : 0;

  if (empty($food_item) || $calories < 0) {
    log_message("Invalid input data: food_item='$food_item', calories='$calories'");
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit;
  }

  // Prepare and execute the SQL statement
  try {
    $sql = "INSERT INTO calories (customer_id, food_item, calories) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $customer_id, PDO::PARAM_STR);
    $stmt->bindParam(2, $food_item, PDO::PARAM_STR);
    $stmt->bindParam(3, $calories, PDO::PARAM_INT);

    if (!$stmt) {
      log_message("Error preparing statement: " . implode(", ", $pdo->errorInfo()));
      echo json_encode(["status" => "error", "message" => "Database error"]);
      exit;
    }

    if ($stmt->execute()) {
      echo json_encode(["status" => "success", "message" => "Calorie added!"]);
    } else {
      echo json_encode(["status" => "error", "message" => "Failed to add data"]);
    }
  } catch (PDOException $e) {
    log_message("Database connection error: " . $e->getMessage());
    echo json_encode(["status" => "error", "message" => "Database connection error"]);
    exit;
  }
  exit;
}

/** 
 * Load the total calories consumed by a customer for a day.
 */

if (isset($_POST['load_calories']) && isset($_POST['customer_id']) && isset($_POST['date'])) {
  $date = $_POST['date'];
  $customer_id = $_POST['customer_id'];

  $stmt = $pdo->prepare("SELECT food_item, calories, date_logged FROM calories WHERE customer_id = ? AND date_logged = ?");
  $stmt->execute([$customer_id, $date]);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($data);
  exit;
}

/**
 * Save the daily calorie goal for a customer.
 */
if (isset($_POST['saveGoal']) && isset($_POST['customer_id']) && isset($_POST['goal'])) {
  $customer_id = $_POST['customer_id'];
  $goal = (int) $_POST['goal'];

  $stmt = $pdo->prepare("REPLACE INTO calorie_goals (customer_id, goal) VALUES (?, ?)");
  if ($stmt->execute([$customer_id, $goal])) {
    echo json_encode(["status" => "success", "message" => "Goal saved!"]);
  } else {
    echo json_encode(["status" => "error", "message" => "Failed to save goal"]);
  }
  exit;
}

/**
 * Check the goal status for a customer.
 */
if (isset($_POST['checkGoalStatus']) && isset($_POST['customer_id'])) {
  $customer_id = $_POST['customer_id'];

  // Get today's total
  $stmt = $pdo->prepare("SELECT SUM(calories) as total FROM calories WHERE customer_id = ? AND date_logged = CURDATE()");
  $stmt->execute([$customer_id]);
  $total = (int) $stmt->fetchColumn();

  // Get goal
  $goalStmt = $pdo->prepare("SELECT goal FROM calorie_goals WHERE customer_id = ?");
  $goalStmt->execute([$customer_id]);
  $goal = (int) $goalStmt->fetchColumn();

  $message = $total > $goal
    ? "⚠️ Over goal!"
    : ($total == $goal ? "🎯 Perfect!" : "✅ Under goal");

  echo json_encode([
    "goal" => $goal,
    "total" => $total,
    "message" => $message
  ]);
  // Do not echo anything else afterward!
  exit;
}

/**
 * Load the weekly calorie chart data.
 */
if (isset($_POST['loadWeekChart']) && isset($_POST['customer_id'])) {
  $customer_id = $_POST['customer_id'];

  // Get the last 7 days of calorie data
  $stmt = $pdo->prepare("SELECT DATE(date_logged) as date, SUM(calories) as total FROM calories WHERE customer_id = ? AND date_logged >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) GROUP BY date");
  $stmt->execute([$customer_id]);

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $labels = [];
  $values = [];
  foreach ($rows as $row) {
    $labels[] = $row['date'];
    $values[] = (int) $row['total'];
  }

  echo json_encode(["labels" => $labels, "values" => $values]);
} else {
  $customer_id = $_POST['customer_id'];
  $stmt = $pdo->prepare("SELECT DATE(date_logged) as date, SUM(calories) as total FROM calories WHERE customer_id = ? AND date_logged >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) GROUP BY date");
  $stmt->execute([$customer_id]);

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $labels = [];
  $values = [];
  foreach ($rows as $row) {
    $labels[] = $row['date'];
    $values[] = (int) $row['total'];
  }

  echo json_encode(["labels" => $labels, "values" => $values]);
  exit;
}
