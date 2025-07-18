
<?php

require "pdo.php";

$stmt = $pdo->query("select * from product");
$rows = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $rows[] = $row;
}
echo json_encode($rows);
?>
