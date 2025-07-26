<?php
require "../Common/pdo.php";
require "../Main/header.php";
?>
<style type="text/css">
  body {
    background: #1b1b1b;
  }

  .difcat {
    position: relative;
    height: max-content;
    margin: auto;
    margin-top: 20px;
    display: block;
    background: #151515;
    box-shadow: 1px 1px 3px rgb(0 0 0 / 10%);
  }

  .difrow {
    height: max-content;
    overflow: auto;
    width: 76vw;
    margin: auto;
    display: block;
    white-space: nowrap;
    bottom: 0;
    width: 100%;
  }

  .products-all-in-one {
    display: inline-block;
    text-align: center;
    padding: 14px;
    padding-bottom: 0px;
    position: relative;
    height: 280px;
    width: 200px;
    background: #151515;
    color: darkgrey;
    font-size: 13px;
  }

  .products-all-in-one img {
    margin: auto;
    display: block;
    background: #151515;
    image-rendering: auto;
    image-rendering: crisp-edges;
    width: auto;
    max-width: 170px;
    height: auto;
    max-height: 180px;
  }

  .difhed {
    color: #676767;
    border-bottom: 3px solid #676767ff;
    width: 100%;
    margin: 0;
    font-size: 24px;
    font-weight: bold;
    text-transform: capitalize;
    padding-bottom: 0px;
    padding-top: 20px;
    margin-left: 20px;
    font-family: 'Segoe UI', sans-serif;
  }

  .left-arrow-btn-all {
    position: absolute;
    top: 30%;
    left: 0;
    width: 30px;
    z-index: 1;
    height: 100px;
    font-size: 24px;
    background: --webkit-gradient(linear, left bottom, left top, color-stop(0, #f1f1f1), color-stop(1, #fff)) !important;
    color: rgb(114, 114, 114);
    border: none;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
  }

  .right-arrow-btn-all {
    position: absolute;
    top: 30%;
    right: 0;
    width: 30px;
    z-index: 1;
    height: 100px;
    font-size: 24px;
    background: --webkit-gradient(linear, left bottom, left top, color-stop(0, #f1f1f1), color-stop(1, #fff)) !important;
    color: rgb(114, 114, 114);
    border: none;
    border-bottom-right-radius: 6px;
    border-top-right-radius: 6px;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
  }

  .difrow::-webkit-scrollbar {
    width: 100%;
    height: 4px;
  }

  .difrow::-webkit-scrollbar-thumb {
    border-radius: 0px;
    -webkit-box-shadow: inset 0 0 6px transparent;
  }

  .table1 {
    margin-bottom: 0px;
    max-height: max-content;
    height: 60px;
    background-color: #151515;
  }

  .difhed button {
    float: right;
    font-weight: bold;
    font-size: 16px;
    margin-right: 5px;
    padding: 2px;
    width: 100px;
    background: --webkit-gradient(linear, left bottom, left top, color-stop(0, #3197ff), color-stop(1, #2196f3)) !important;
    font-family: 'Segoe UI', sans-serif;
    border: none;
    color: #ffffff;
    background-color: #139b3b;
    border-radius: 5px;
  }
</style>

<body>
  <div class="table1">
    <h4 style="margin-top: 10px;border-bottom: 1px solid darkgrey;color: darkgrey;padding: 10px;">
      <i
        class="fas fa-boxes"
        style="font-size: 24px;padding-right: 12px"
        aria-hidden="true">
      </i>Latest Products
    </h4>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <br><br>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script type="text/javascript">
    function scrolllisten(x) {
      var y = Math.round($('#' + x).scrollLeft());
      var width = $('#' + x).outerWidth();
      var scrollWidth = $('#' + x)[0].scrollWidth;
      var sub = Math.round(parseInt(scrollWidth) - parseInt(width));
      console.log(width + " scrollwidth= " + scrollWidth + " scrollwidth - width = " + sub + " y= " + y);
      if (sub == y) {
        $('#' + x + '>.right-arrow-btn-all').hide();
        return;
      }
      $('#' + x + '>.left-arrow-btn-all').show();
      if (y === 0) {
        $('#' + x + '>.left-arrow-btn-all').hide();
      }
      $('#' + x + '>.right-arrow-btn-all').show();
    }

    function moveright(x) {
      var y = $('#' + x).scrollLeft();
      var width = $('#' + x).outerWidth();
      var scrollWidth = $('#' + x)[0].scrollWidth;
      $('#' + x).scrollLeft(y + 250);
    }

    function moveleft(x) {
      var y = $('#' + x).scrollLeft();
      $('#' + x).scrollLeft(y - 250);
    }
  </script>
  <?php
  if (isset($_GET['topnew'])) {
  ?>
    <h3 style="text-transform:capitalize;font-weight:bold;text-align:center">Top New</h3>
  <?php
  }
  require "../Common/pdo.php";
  $query11 = "SELECT * from  category";
  $st11 = $pdo->query($query11);
  while ($row11 = $st11->fetch(PDO::FETCH_ASSOC)) {
    $ct = $row11['category_id'];
  ?>
    <?php
    $query = "SELECT * FROM product
							JOIN product_description ON product.product_id=product_description.product_id
							where product.category_id=$ct AND (product.added_date) IN (
								SELECT max(added_date) AS date FROM product
							) GROUP BY product_description.product_id
							ORDER BY CAST(product.product_id AS UNSIGNED) DESC";
    $st = $pdo->query($query);
    $product = $st->rowCount();
    if ($product == 0) {
      continue;
    } else {
    ?>
      <div class="difcat">
        <span class="difhed"><?= $row11['category_name'] ?>
          <button onclick="location.href='../Product/viewsubcat.php?category_id=<?= $ct ?>'">
            View All
          </button>
        </span>
        <div class="difrow" id="difrow<?= $ct ?>" onscroll="scrolllisten('difrow<?= $ct ?>');">
          <button class="left-arrow-btn-all shadow_all_none" onclick="moveleft('difrow<?= $ct ?>')" style="display: none;">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="right-arrow-btn-all shadow_all_none" onclick="moveright('difrow<?= $ct ?>')">
            <i class="fas fa-chevron-right"></i>
          </button>
          <?php
          while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <div class="products-all-in-one">
              <div style="display: flex;justify-content: center;height: 200px;width:100%;background: #151515;text-align: center;">
                <img
                  class="image"
                  align="middle"
                  src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg"
                  onclick="location.href='../Product/single.php?id=<?= $row['product_description_id'] ?>'">
              </div>
              <?php
              if (strlen($row['product_name']) >= 25) {
                $product = $row['product_name'];
                $product_name = substr($product, 0, 20) . "... <small class='div_wrapper' title='" . $product . "' style='color: #109502'>view</small>";
              } else {
                $product_name = $row['product_name'];
              }
              ?>
              <div class="deupd"><?= $product_name ?><br /></div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
  <?php
    }
  }
  ?>
  <script type="text/javascript">
    function showupda(x) {
      document.forms[x].submit();
    }
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

    function conca() {
      console.log('helo');
      if ($('#w1').val() != 0) {
        var v1 = $('#w1').val() + ' ' + $('#w2').val();
        $('#w3').val(v1);
      }
    }
  </script>
  </div>
  <?php
  require "../Main/footer.php";
  ?>