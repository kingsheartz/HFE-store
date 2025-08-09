<?php
require dirname(__DIR__, 2) . '/db/pdo.php';

header("Access-Control-Allow-Origin: GET");
header("Content-Type: application/json");

session_start();

$stmt = $pdo->query("select store_name,opening_hours,longitude,latitude from store");
$rows = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $rows[] = $row;
}

echo json_encode($rows);
