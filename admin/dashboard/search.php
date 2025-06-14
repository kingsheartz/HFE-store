<style type="text/css">
  .row {
    margin: auto;
    display: block
  }
</style>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require "pdo.php";
// Attempt search query execution
try {
  if (isset($_REQUEST["term"])) {
    // create prepared statement
    $sql = "SELECT * FROM product JOIN product_description ON
            product.product_id=product_description.product_id JOIN category ON category.category_id=product.category_id
            JOIN sub_category ON sub_category.sub_category_id=product.sub_category_id
            WHERE product.product_name LIKE :term OR category.category_name LIKE :term
            OR sub_category.sub_category_name LIKE :term GROUP BY product.product_id";
    $stmt = $pdo->prepare($sql);
    $term = $_REQUEST["term"] . '%';
    // bind parameters to statement
    $stmt->bindParam(":term", $term);
?>
    <div class="row">
      <?php
      $i = 0;
      $rt = $stmt->rowCount();
      // execute the prepared statement
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        $cn = 0;
        while ($row = $stmt->fetch()) {
          $cn++;
          $i++;
      ?>
          <div class="products" style="width: 320px">
            <div style="display: flex; justify-content: center;height: 200px;width:100%;background: white;text-align: center;">
              <img class="image" align="middle" src="../images/<?= $row['category_id'] ?>/<?= $row['sub_category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
            </div>
            <div class="middle">
              <form id="s<?= $row['product_description_id'] ?>" method="post" action="change.php" name="<?= $row['product_description_id'] ?>">
                <input type="hidden" name="pr_id" value="<?= $row['product_description_id'] ?>">
                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                <input type="hidden" name="im_url" value="../images/<?= $row['category_id'] ?>/<?= $row['sub_category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                <input type="hidden" name="name" value="<?= $row['product_name'] ?>">
                <input type="hidden" name="description" value="<?= $row['description'] ?>">
                <input type="hidden" name="price" value="<?= $row['price'] ?>">
                <button onclick="showupda(<?= $row['product_description_id'] ?>)" class="updation">
                  <i class="fa fa-pencil-square-o" style="font-size: 24px;padding-right: 12px" aria-hidden="true"></i>Change
                </button>
              </form>
              <form id="1j<?= $row['product_description_id'] ?>" method="post" action="productuplo.php"
                name="1<?= $row['product_description_id'] ?>">
                <input type="hidden" name="uppr_id" value="<?= $row['product_description_id'] ?>">
                <input type="hidden" name="upitem_id" value="<?= $row['product_id'] ?>">
                <input type="hidden" name="upim_url" value="../images/<?= $row['category_id'] ?>/<?= $row['sub_category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                <input type="hidden" name="upname" value="<?= $row['product_name'] ?>">
                <input type="hidden" name="updescription" value="<?= $row['description'] ?>">
                <input type="hidden" name="upprice" value="<?= $row['price'] ?>">
                <button onclick="showupda('1<?= $row['product_description_id'] ?>')" class="updation">
                  <i class="fas fa-upload" style="font-size: 24px;padding-right: 12px" aria-hidden="true"></i>Upload
                </button>
              </form>
            </div>
            <div class="deupd"><?= $row['product_name'] ?><br></div>
          </div>
          <?php
          if ($cn >= 3) {
            $cn = 0;
          ?>
    </div>
    <div class="clearfix"> </div>
    <div class="row">
<?php
          }
          if ($i == $rt) {
            echo "</div>";
          }
        }
      } else {
        echo "<p>No matches found</p>";
      }
    }
  } catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
  }
  // Close statement
  unset($stmt);
  // Close connection
  unset($pdo);
?>