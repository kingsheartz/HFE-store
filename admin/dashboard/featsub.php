<?php
require "../../db.php";
if (isset($_POST['size'])) {
  $s = $_POST['size'];
  echo $s;
  $query1 = "INSERT INTO size(size_name) values('$s')";
  $statement1 = $pdo->prepare($query1);
  $statement1->execute();
}
if (isset($_POST['brand'])) {
  $s = $_POST['brand'];
  echo $s;
  $f = $_POST['category'];
  $query1 = "INSERT INTO brand(brand_name,category_id) values('$s',$f)";
  $statement1 = $pdo->prepare($query1);
  $statement1->execute();
}
?>