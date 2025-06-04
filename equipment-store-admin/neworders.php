<?php
require "head.php";
?>

<body>
  <div class="wrapper">
    <?php
    include "head1.php";
    ?>
    <script type="text/javascript">
      $('li').removeClass('active');
      $('#newordersphp').addClass('active');
    </script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous">
    </script>
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <style type="text/css">
      .order {
        position: relative;
        height: auto;
        background: transparent;
        overflow: hidden;
        margin-top: 30px;
      }

      .order button {
        color: white;
        font-size: 20px;
        border: none;
        width: 100%;
        margin: 0;
      }

      th {
        padding-right: 20px;
      }

      .order .orderbutton {
        position: absolute;
        right: 230px;
        top: 42px;
        width: auto;
        height: 33px;
        border-radius: 5px;
        font-size: 16px;
        background: green;
      }

      .order>button.prbt {
        position: absolute;
        right: 400px;
        top: 40px;
        height: 35px;
      }

      .col-sm-3,
      .col-sm-12,
      .col-sm-9 {
        padding: 0;
      }

      .col-sm-12,
      .col-sm-3 {
        margin-bottom: 13px;
      }

      .col-sm-12 button {
        background: transparent !important;
      }

      table,
      tr {
        width: 100%;
      }

      th,
      td {
        padding: 10px;
      }

      .orhd th {
        text-align: center;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #bbbbbb), color-stop(1, #bdbdbd)) !important;
        border: 1px solid white;
        color: white;
      }

      tr.orow {
        border-bottom: 1px solid #c0c0c0;
      }

      .amount {
        float: right;
        font-size: 16px;
        height: 100%;
        padding: 5px;
        position: relative;
        right: -5px;
        width: 200px;
        background: gray !important;
        border-radius: 5px;
        border: 0px;
      }

      @media print {

        .panel-collapse,
        .collapse {
          display: block;
        }

        .orderbutton {
          display: none;
        }

        .prbt {
          display: none;
        }

        .order button {
          text-align: left;
        }

        .order {
          border: 1px solid #000;
          padding: 5px;
        }
      }

      button.prbt {
        border: none;
        width: auto;
        background: red;
        border-radius: 5px;
        font-size: 16px;
        padding: 5px;
        color: white;
      }
    </style>
    <?php
    if (isset($_POST['neworder'])) {
      $new = $_POST['neworder'];
      $query = "UPDATE new_ordered_products
                JOIN new_orders ON new_ordered_products.new_orders_id=new_orders.new_orders_id
                JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
                JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
                JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
                JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
                JOIN product_description ON product_details.product_description_id=product_description.product_description_id
                JOIN product ON product.product_id=product_description.product_id
                JOIN category ON category.category_id=product.category_id
                JOIN store on store.store_id=product_details.store_id
                SET new_ordered_products.delivery_status='completed',new_ordered_products.delivery_date=NOW()
                WHERE customer_delivery_details.customer_delivery_details_id=$new";
      $statement = $pdo->prepare($query);
      $statement->execute();
    }
    ?>
    <div class="table1">
      <h4 style="margin-top: 30px;margin-bottom:50px;border-bottom:  1px solid#E3E3E3;padding:10px;">
        <i class="fas fa-poll" style="font-size: 24px;padding-right: 12px" aria-hidden="true"></i>New Orders
      </h4>
      <button style="float:right" class="prbt" onclick="$('#printarea').print();">Print All</button>
    </div>
    <div id="printarea">
      <?php
      require "pdo.php";
      $id = $_SESSION['id'];
      $query = "SELECT *  FROM new_orders
                JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
                JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
                JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
                JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
                JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
                JOIN product_description ON product_details.product_description_id=product_description.product_description_id
                JOIN product ON product.product_id=product_description.product_id
                JOIN category ON category.category_id=product.category_id
                JOIN store on store.store_id=product_details.store_id
                WHERE new_ordered_products.delivery_status='pending' AND product_details.store_id=$id";
      $statement = $pdo->prepare($query);
      $statement->execute();
      $product = $statement->rowCount();
      if ($product == 0) {
        echo '<center><img src="images/sad.png" height="400px" width="400px"><h3>No Orders Yet.....</h3></center><br><br>';
      } else {
        $uid = 0;
        $lk = 0;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          if ($row['customer_delivery_details_id'] != $uid) {
            $lk++;
            $uid = $row['customer_delivery_details_id'];
            if ($lk != 1) {
              echo '</table></div> </div>';
            }
      ?>
            <div class="order" id="order<?= $row['new_ordered_products_id'] ?>">
              <button class="prbt" onclick="$('#order<?= $row['new_ordered_products_id'] ?>').print();">Print to Pdf</button>
              <br /><br />
              <div class="col-sm-12">
                <button type="button" data-toggle="collapse" href="#myNavbarc<?= $row['new_ordered_products_id'] ?>">
                  <span style="padding: 5px;font-size:16px"> Customer details</span> <span class="amount"> Total Amount
                    <i class="fas fa-rupee" style="padding-left: 12px;"></i><?= $row['sub_total'] ?>
                  </span>
                </button>
                <div class="panel-collapse collapse " id="myNavbarc<?= $row['new_ordered_products_id'] ?>">
                  <table class="center" style="width: auto;margin-left:20px">
                    <tr>
                      <th>Customer Name</th>
                      <td><?= $row['first_name'] ?><?= $row['last_name'] ?></td>
                    </tr>
                    <tr>
                      <th>Phone</th>
                      <td><?= $row['phone'] ?></td>
                    </tr>
                    <tr>
                      <th>Location</th>
                      <td><?= $row['location'] ?></td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td><?= $row['address'] ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?= $row['email'] ?></td>
                    </tr>
                  </table>
                </div>
              </div><br />
              <div style="overflow-x: auto; width: 100%; background: white; border-radius: 5px; margin-bottom: 30px; border: 0px;">
                <table>
                <?php
              }
                ?>
                <tr class="orow">
                  <td><?= $row['new_ordered_products_id'] ?></td>
                  <td align="center">
                    <img
                      style="height:auto;max-width: 100%;width:auto;max-height: 150px;display: block;margin: auto "
                      class="img-responsive"
                      src="../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                    <?= $row['product_name'] ?>
                  </td>
                  <td>
                    <table cellpadding="10">
                      <?php
                      if ($row['size'] != 0) {
                        $query1 = "SELECT * FROM size where size_id=" . $row['size'];
                        $st1 = $pdo->query($query1);
                        $row1 = $st1->fetch(PDO::FETCH_ASSOC);
                      ?>
                        <tr>
                          <th>Size</th>
                          <td><?= $row1['size_name'] ?></td>
                        </tr>
                      <?php
                      }
                      if ($row['weight'] != 0) {
                      ?>
                        <tr>
                          <th>Weight</th>
                          <td><?= $row['weight'] ?></td>
                        </tr>
                      <?php
                      }
                      if ($row['brand'] != 0) {
                        $query1 = "SELECT * FROM brand where brand_id=" . $row['brand'];
                        $st1 = $pdo->query($query1);
                        $row1 = $st1->fetch(PDO::FETCH_ASSOC);
                      ?>
                        <tr>
                          <th>Brand</th>
                          <td><?= $row1['brand_name'] ?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </table>
                  </td>
                  <td>
                    <table>
                      <tr>
                        <th> Order Type</th>
                        <td><?= $row['order_type'] ?></td>
                      </tr>
                      <tr>
                        <th>Order Date</th>
                        <td><?= $row['order_date'] ?></td>
                      </tr>
                      <tr>
                        <th> product Quantity</th>
                        <td><?= $row['quantity'] ?></td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <td><?= $row['total_amt'] ?></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <script type="text/javascript">
                  function ordchn() {
                    $('orderbutton>i').attr('class', 'fas fa-check-double');
                  }
                </script>
                <form method="post">
                  <input type="hidden" name="neworder" value="<?= $row['customer_delivery_details_id'] ?>">
                  <button name="deliver" class="orderbutton" onclick="ordchn()">Mark As Shipped</button>
                </form>
            <?php
          }
        }
            ?>
              </div>
              <?php
              require "foot.php";
              ?>
              <script type="text/javascript">
                if (window.history.replaceState) {
                  window.history.replaceState(null, null, window.location.href);
                }
              </script>