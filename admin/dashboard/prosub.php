<?php
require_once '../vendor/autoload.php';
function redirectWithError($error)
{
  $_SESSION['hfe_contact_form_error'] = $error;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  echo "Error: " . $error;
  die();
}
function redirectSuccess()
{
  $_SESSION['hfe_contact_form_success'] = true;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  echo "Product added  successfully!";
  die();
}
session_start();
require dirname(__DIR__, 2) . '/db/pdo.php';
if (isset($_POST['desc_id'])) {
  if (isset($_POST['upload_image'])) {
    $it = $_POST['desc_id'];
    $n = $_POST['nj'];
    function makeDir($path)
    {
      return is_dir($path) || mkdir($path, 0777, true);
    }
    $t1 = $_POST['cat'];
    $target_dir = "../../images/" . $t1 . "/";
    makeDir($target_dir);
    for ($i = 1; $i <= $n; $i++) {
      if (!empty($_FILES['my_file' . $i]['name'])) {
        $filename = $it . "_" . $i;
        $temp_name = $_FILES['my_file' . $i]['tmp_name'];
        $path_filename_ext = $target_dir . $filename . ".jpg";
        if (!move_uploaded_file($temp_name, $path_filename_ext)) {
          redirectWithError("Failed to upload image #$i");
        }
      }
    }
    $query = "UPDATE product_description SET img_count=? WHERE product_description_id=?";
    $statement = $pdo->prepare($query);
    $statement->execute([$n, $it]);
    redirectSuccess();
  }
}
