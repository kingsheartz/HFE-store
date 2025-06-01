<?php
require_once '../vendor/autoload.php';
function redirectWithError($error)
{
  $_SESSION['_contact_form_error'] = $error;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  echo "Error: " . $error;
  die();
}
function redirectSuccess()
{
  $_SESSION['_contact_form_success'] = true;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  echo "Product added  successfully!";
  die();
}
session_start();
if (isset($_POST['add'])) {
  require "..\..\db.php";
  if (empty($_POST['item_name'])) {
    redirectWithError("Please enter product name in the form.");
  }
  if (empty($_POST['cat'])) {
    redirectWithError("Please enter category in the form.");
  }
  if (empty($_POST['description'])) {
    redirectWithError("Please enter description in the form.");
  }
  if (empty($_POST['item_price'])) {
    redirectWithError("Please enter Price in the form.");
  }
  $flag = 0;
  for ($i = 1; $i <= 9; $i++) {
    if (($_FILES['my_file' . $i]['name'] != "")) {
      $flag = 1;
    }
  }
  if ($flag == 0) {
    redirectWithError("Please Select atleast One Image.");
  }
  $query = "SELECT max(product_id) FROM product  ";
  $statement = $pdo->prepare($query);
  $statement->execute();
  $result = $statement->fetch(PDO::FETCH_ASSOC);
  $max = $result['max(product_id)'];
  if (isset($_POST['item_name']) && isset($_POST['description']) && isset($_POST['cat']) && isset($_POST['item_price'])) {
    $max = $max + 1;
    $data = array(
      ':product_id' => $max,
      ':product_name' => $_POST['item_name'],
      ':description' => $_POST['description'],
      ':category' => $_POST['cat'],
      ':price' => $_POST['item_price']
    );
    $query = "INSERT INTO product (product_id,product_name,description,category_id, added_date,permission,price) VALUES (:product_id,:product_name,:description,:category,NOW(),1,:price)";
    $statement = $pdo->prepare($query);
    $statement->execute($data);
    //for loop ending
    function makeDir($path)
    {
      return is_dir($path) || mkdir($path);
    }
    for ($i = 1; $i <= 9; $i++) {
      if (!isset($_POST['size' . $i]) || !isset($_POST['weight' . $i]) || !isset($_POST['brand' . $i]))
        continue;
      $size = isset($_POST['size' . $i]) ? $_POST['size' . $i] : 0;
      $weight = isset($_POST['weight' . $i]) ? $_POST['weight' . $i] : 0;
      if ($weight == '') {
        $weight = 0;
      }
      if ($size == '') {
        $size = 0;
      }
      $brand = isset($_POST['brand' . $i]) ? $_POST['brand' . $i] : 0;
      if ($brand == '') {
        $brand = 0;
      }
      if (($_FILES['my_file' . $i]['name'] != "")) {
        $file = $_FILES['my_file' . $i]['name'];
        $path = pathinfo($file);
        $ext = $path['extension'];
        if ($ext != "jpg" && $ext != "JPG") {
          redirectWithError("Please Select a jpg file");
        }
      }
      $data1 = array(
        ':product_id' => $max,
        ':size' => $size,
        ':weight' => $weight,
        ':brand' => $brand,
      );
      $query1 = "INSERT INTO product_description (product_id, size, weight, brand) VALUES (:product_id, :size, :weight, :brand)";
      $statement1 = $pdo->prepare($query1);
      $statement1->execute($data1);
      if (($_FILES['my_file' . $i]['name'] != "")) {
        // Where the file is going to be stored
        $t1 = $_POST['cat'];
        $query = "SELECT max(product_description_id) FROM product_description  ";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $max1 = $result['max(product_description_id)'];
        makeDir("../../images/" . $t1);
        $target_dir = "../../images/" . $t1 . "/";
        $file = $_FILES['my_file' . $i]['name'];
        $path = pathinfo($file);
        $filename = $max1;
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file' . $i]['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;
        // Check if file already exists
        if (file_exists($path_filename_ext)) {
          redirectWithError("Sorry, file already exists.");
        } else {
          move_uploaded_file($temp_name, $path_filename_ext);
        }
      }
    }
    redirectSuccess();
  } else {
    redirectWithError("Wrong Input ");
  }
}
