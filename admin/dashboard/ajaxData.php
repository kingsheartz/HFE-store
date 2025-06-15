<?php
// Include the database config file
include_once 'pdo.php';

if (!empty($_POST["category_id"])) {
  // Fetch state data based on the specific country
  $query = "SELECT * FROM category where category.category_id=" . $_POST['category_id'];
  $stmt = $pdo->query($query);
  // Generate HTML of state options list
  if ($stmt->rowCount() > 0) {
    echo '<option disabled="" selected="" value=""> Select...</option>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
    }
  } else {
    echo '<option value="">Category not available</option>';
  }
}
