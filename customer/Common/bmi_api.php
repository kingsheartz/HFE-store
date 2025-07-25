<?php
session_start();
require_once __DIR__ . '/pdo.php';
require_once dirname(__DIR__, 2) . '/includes/logger.php';

global $pdo;

if (!isset($_SESSION['id'])) {
  log_message('Unauthorized access attempt to BMI calculator.');
  echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
  exit;
}

$customer_id = $_SESSION['id'] ?? null;

if (!$customer_id) {
  echo json_encode(['error' => 'User not logged in']);
  exit;
}

if (isset($_POST['save_bmi']) && isset(($_POST['weight'])) && isset(($_POST['height']))) {
  $customer_id = $_POST['customer_id'];
  $weight = floatval($_POST['weight']);
  $height = floatval($_POST['height']);
  if ($weight <= 0 || $height <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid weight or height']);
    exit;
  }

  $height_m = $height / 100;
  $bmi = round($weight / ($height_m * $height_m), 2);

  $sql = "INSERT INTO bmi_entries (customer_id, weight_kg, height_cm, bmi) VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$customer_id, $weight, $height, $bmi]);

  echo json_encode(['status' => 'success', 'message' => 'BMI saved successfully']);
  exit;
}

if (isset($_POST['load_bmi_history'])) {
  $message = NULL;
  $customer_id = $_POST['customer_id'];
  $date = $_POST['date'] ?? date('Y-m-d');

  $sql = 'SELECT bmi, weight_kg, height_cm, date_logged FROM bmi_entries WHERE customer_id = ? ';

  if (isset($_POST['date']) && !empty($_POST['date'])) {
    $sql = $sql . 'AND date_logged = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id, $date]);
    $message = 'No BMI for this date';
  } else {
    $sql = $sql . 'ORDER BY date_logged DESC LIMIT 10';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer_id]);
    $message = 'No BMI records yet';
  }

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($data ?: ['message' => $message]);
  exit;
}

/**
 * Load the weekly BMI chart data.
 */
if (isset($_POST['load_bmi_chart']) && isset($_POST['customer_id'])) {
  $customer_id = $_POST['customer_id'];

  $query = "SELECT DATE(date_logged) AS date, bmi FROM bmi_entries WHERE customer_id = ? ORDER BY date_logged DESC LIMIT 7";

  $stmt = $pdo->prepare($query);
  $stmt->bindParam(1, $customer_id);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $labels = [];
  $values = [];

  foreach ($rows as $row) {
    $labels[] = date('D', strtotime($row['date'])); // e.g., "Mon", "Tue"
    $values[] = (float) $row['bmi'];
  }

  // Reverse to show oldest -> newest on X-axis
  $labels = array_reverse($labels);
  $values = array_reverse($values);

  echo json_encode([
    'labels' => $labels,
    'values' => $values
  ]);
  exit;
}
