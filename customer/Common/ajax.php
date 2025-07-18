<?php
require "pdo.php";
if (isset($_POST['key'])) {
  $stmt = $pdo->query(
    "select * from product
    join product_description on product_description.product_id=product.product_id
    inner join category on category.category_id=product.category_id  AND
    product.product_name like '%" . $_POST['key'] . "%' group by product_description.product_id limit 5"
  );
  $rows = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $row;
  }
  echo json_encode($rows);
}
