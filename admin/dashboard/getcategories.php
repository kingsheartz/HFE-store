<?php
require dirname(__DIR__, 2) . '/db/pdo.php';

$cat = $pdo->query("select * from category");
while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
  $rows[] = $row;
}

echo json_encode($rows);
