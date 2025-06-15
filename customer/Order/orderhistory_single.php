<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:../Main/hfe.php");
}
if (isset($_GET['nopid'])) {
  $nopid = $_GET['nopid'];
} else {
  header('location:../Main/hfe.php');
}
require "../Main/header.php";
require "../Common/pdo.php";
?>
<!-- breadcrumbs -->
<style type="text/css">
  .order {
    position: relative;
    height: auto;
    overflow: hidden;
    margin-top: 30px;
    margin-bottom: 30px;
    text-overflow: ellipsis;
    box-shadow: -2px -2px 3px 3px #ddd;
    margin-right: 2%;
    margin-left: 2%;
    border-radius: 10px;
  }

  .order-single {
    position: relative;
    height: auto;
    overflow: hidden;
    margin-top: 30px;
    margin-bottom: 30px;
    text-overflow: ellipsis;
    box-shadow: -2px 0px 2px 2px #ddd;
    border: 1px solid #ddd;
    margin-right: 2%;
    margin-left: 2%;
    border-radius: 10px;
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
    right: 0;
    top: 0;
    width: 200px;
    height: 100%;
    border-radius: 5px;
    background-color: #0080bb;
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
    background: #2b3740;
  }

  .orhead {
    position: relative;
    font-size: 34px;
    background-color: #0080ff;
    color: #ffffff;
    height: 70px;
  }

  .tablhde {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 18px;
    background: #2b3740;
    color: #ffffff;
    width: 100%;
    height: 30px;
    padding-top: 6px;
    padding-bottom: 6px;
    margin-bottom: 20px;
    text-align: center;
  }

  table {
    min-height: 45px;
  }

  table,
  tr {
    width: 100%;
    margin: 0;
  }

  tr {
    padding-top: 20px;
  }

  th,
  td {
    padding: 5px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .cust_details {
    display: flex;
    align-items: flex-end;
  }

  .cust_header {
    width: 68px;
  }

  .cust_header2 {
    width: 50%;
  }

  .dw {
    padding: 0;
    display: flex;
    grid-gap: 5px;
  }

  .col-sm-4,
  .col-sm-6 {
    padding: .5px;
  }

  .col-sm-8 {
    padding: 0px;
  }

  #proceed {
    background: none repeat scroll 0 0 #5a88ca;
    border: medium none;
    color: #0080ff;
    padding: 0px 10px;
    text-transform: capitalize;
  }

  @media(min-width: 430px) {
    #proceed {
      width: 160px;
      font-size: 16px;
    }

    .back-lg {
      display: unset !important;
    }

    .back-sm {
      display: none !important;
    }
  }

  @media(max-width: 429px) {
    .back-lg {
      display: none !important;
    }

    .back-sm {
      display: unset !important;
    }

    #proceed {
      font-size: 14px;
      width: 120px;
    }

    .cust_header2 {
      padding-left: 15px;
    }

    .cust_header {
      padding-left: 15px;
    }
  }

  @media(max-width: 370px) {
    .sidebar-title {
      font-size: 22px;
    }

    #proceed {
      font-size: 10px;
      width: 100px;
    }

    .noorder-title {
      font-size: 22px;
    }
  }

  @media(max-width: 767px) {
    .cust_header {
      width: 50%;
    }

    .cust_details {
      width: 50%;
    }
  }

  @media(max-width: 767px) and (min-width: 430px) {
    .cust_header2 {
      padding-left: 15%;
    }

    .cust_header {
      padding-left: 15%;
    }
  }
</style>
<div class="table1">
  <div class="order">
    <div class="orhead">
      <h2 class="sidebar-title"
        style="border-left: 5px solid #fff;border-top-left-radius: 10px;text-align: left;padding-bottom: 29px;
          padding-top: 20px;margin-top: 0px;font-weight:normal;border-bottom:#333;margin-bottom: 0px;border-radius: 10px;color: black;
          text-transform: capitalize;padding-left: 10px;color:white ">
        Purchased Product <i style="color: #fffd00" class="fa fa-product-hunt "></i>
        <span style="float: right;margin-right: 5px;margin-top: -16px;">
          <button type="button"
            style="max-width: 180px;min-width:90px;height: 62px;font-weight: bold;border-top-right-radius: 10px;background-color: #c7c7c7;"
            id="proceed" name="proceed" class="checkout-button button alt wc-forward back-lg"
            onclick="location.href='../Order/orderhistory.php'"><i class='fas fa-angle-left'></i> Back to <i
              class="fa fa-history"></i></button>
          <button type="button"
            style="display:none;max-width: 180px;width:50px;height: 62px;font-weight: bold;border-top-right-radius: 10px;
              color:#c7c7c7;background-color:#0080ff"
            id="proceed" name="proceed" class="checkout-button button alt wc-forward back-sm"
            onclick="location.href='../Order/orderhistory.php'"><i class='fas fa-arrow-left'
              style="background-color:#000;padding:6px;border-radius:50%"></i></button>
        </span>
      </h2>
    </div>
    <br>
    <?php
    $query = "SELECT customer_delivery_details.first_name,customer_delivery_details.last_name,customer_delivery_details.phone,customer_delivery_details.address,customer_delivery_details.pincode,customers.email,new_orders.new_orders_id,new_orders.order_quantity,new_orders.sub_total,new_orders.order_date,size,weight,brand,new_ordered_products.order_type,new_ordered_products.new_ordered_products_id,new_ordered_products.item_quantity,new_ordered_products.delivery_date,new_ordered_products.total_amt,product_details.product_details_id,product_details.price,store.store_name,product.price as mrp,product_description.product_description_id,category.category_id,product.product_name FROM new_orders
							JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
							JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
							JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
							JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
							JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
							JOIN product_description ON product_details.product_description_id=product_description.product_description_id
							JOIN product ON product.product_id=product_description.product_id
							JOIN category ON category.category_id=product.category_id
							JOIN store ON store.store_id=product_details.store_id
							WHERE customers.customer_id=:customer_id and new_ordered_products.new_ordered_products_id=:nopid ";
    $statement = $pdo->prepare($query);
    $statement->execute(array(
      ':customer_id' => $_SESSION['id'],
      ':nopid' => $nopid
    ));
    $flag = 0;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      if ($flag != 0) {
    ?>
        <br>
      <?php
      }
      ?>
      <div class="order-single" style="margin:0;padding:0;">
        <div class="col-sm-4" onclick="location.href='../Product/single.php?id=<?= $row['product_description_id'] ?>'">
          <table>
            <tr>
              <th class="tablhde"> Product </th>
            </tr>
            <tr style="padding-bottom:30px;"></tr>
            <tr>
              <td>
                <div style="height: 150px;width: 100%"> <img
                    style="height:auto;max-width: 100%;width:auto;max-height: 150px;display: block;margin: auto "
                    class="img-responsive"
                    src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                </div>
                <div style="width: 100%;text-align: center;color: #333;font-weight:bold;font-size:17px;">
                  <?= $row['product_name'] ?>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-sm-8">
          <div class="col-sm-6" style="border-left:1px solid #ddd;border-right:1px solid #ddd;min-height:230px;">
            <table>
              <tr>
                <th class="tablhde" colspan="2">Features </th>
              </tr>
              <tr style="padding-bottom:30px;"></tr>
              <?php
              if ($row['size'] != 0) {
                $query1 = "SELECT * FROM size where size_id=" . $row['size'];
                $st1 = $pdo->query($query1);
                $row1 = $st1->fetch(PDO::FETCH_ASSOC);
              ?>
                <tr class="div-wrapper dw">
                  <th class="cust_header2">Size</th>
                  <td class="cust_details"> <?= $row1['size_name'] ?></td>
                </tr>
              <?php
              }
              if ($row['weight'] != 0) {
              ?>
                <tr class="div-wrapper dw">
                  <th class="cust_header2">Weight</th>
                  <td class="cust_details"><?= $row['weight'] ?></td>
                </tr>
              <?php
              }
              if ($row['brand'] != 0) {
                $query1 = "SELECT * FROM brand where brand_id=" . $row['brand'];
                $st1 = $pdo->query($query1);
                $row1 = $st1->fetch(PDO::FETCH_ASSOC);
              ?>
                <tr class="div-wrapper dw">
                  <th class="cust_header2">Brand</th>
                  <td class="cust_details"><?= $row1['brand_name'] ?></td>
                </tr>
              <?php
              }
              ?>
            </table>
            <table>
              <tr>
                <th class="tablhde" colspan="2"> Price details </th>
              </tr>
              <tr style="padding-bottom:30px;"></tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">MRP</th>
                <td class="cust_details"><del><i class='fa fa-rupee-sign'></i> <?= $row['mrp'] ?></del></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Selling Price</th>
                <td class="cust_details"><span><i class='fa fa-rupee-sign'></i> <?= $row['price'] ?></span></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Item Quantity</th>
                <td class="cust_details"><?= $row['item_quantity'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Total</th>
                <td class="cust_details"><b><i class='fa fa-rupee-sign'></i> <?= $row['total_amt'] ?></b></td>
              </tr>
            </table>
          </div>
          <div class="col-sm-6">
            <table>
              <tr>
                <th class="tablhde" colspan="2"> Order details </th>
              </tr>
              <tr style="padding-bottom:30px;"></tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Order ID</th>
                <td class="cust_details">OSID<?= sprintf('%06d', $row['new_orders_id']) ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Seller</th>
                <td class="cust_details"><?= $row['store_name'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2"> Order Type</th>
                <td class="cust_details"><?= $row['order_type'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Order Date</th>
                <td class="cust_details"><?= $row['order_date'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Delivered Date</th>
                <td class="cust_details"><?= $row['delivery_date'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Order Quantity</th>
                <td class="cust_details"><?= $row['order_quantity'] ?></td>
              </tr>
              <tr class="div-wrapper dw">
                <th class="cust_header2">Order status</th>
                <td>
                  <?php
                  if ($row['delivery_status'] == 'completed') {
                  ?>
                    <span
                      style="background-color: green;border-radius: 5px;color:white;font-weight:bold;padding-bottom:3px">&nbsp;
                      <i class="fa fa-check" style="color: orange;text-shadow: 1px 2px 3px grey"></i>
                      <i style="text-transform: capitalize;font-size: 12px;text-shadow: 1px 2px 3px grey;color:white">
                        completed</i>
                    </span>
                  <?php
                  } else if ($row['delivery_status'] == 'pending') {
                  ?>
                    <span
                      style="background-color: rgb(255, 123, 0);border-radius: 5px;color:white;font-weight:bold;padding-bottom:3px">&nbsp;
                      <i class="fa fa-clock-o" style="color: rgb(0, 0, 0);text-shadow: 1px 2px 3px grey"></i>
                      <i style="text-transform:capitalize;font-size: 12px;text-shadow: 1px 2px 3px grey;color:white">
                        pending &nbsp;</i>
                    </span>
                  <?php
                  } else if ($row['delivery_status'] == 'cancelled') {
                  ?>
                    <span
                      style="background-color: rgb(255, 0, 0);border-radius: 5px;cofont-weight:bold;padding-bottom:3px">&nbsp;
                      <i class="fa fa-close" style="color: rgb(255, 255, 255);text-shadow: 1px 2px 3px grey"></i>
                      <i style="text-transform: capitalize;font-size: 12px;text-shadow: 1px 2px 3px grey;color:white">
                        cancelled</i>
                    </span>
                  <?php
                  }
                  ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <hr class="make_div">
        <hr class="make_div">
        <table>
          <tr>
            <th class="tablhde" colspan="2"> Delivery details </th>
          </tr>
          <tr style="padding-bottom:30px;"></tr>
          <tr class="div-wrapper dw" col-span="2">
            <th class="cust_header" style="font-size:18px;width:100%;"><?= $row['first_name'] ?> <?= $row['last_name'] ?>
            </th>
          <tr>
            <td></td>
          </tr>
          <tr class="div-wrapper dw">
            <th class="cust_header">Phone</th>
            <td class="cust_details"><?= $row['phone'] ?></td>
          </tr>
          <tr class="div-wrapper dw">
            <th class="cust_header">Address</th>
            <td class="cust_details"><?= $row['address'] ?></td>
          </tr>
          <tr class="div-wrapper dw">
            <th class="cust_header">Pincode</th>
            <td class="cust_details"><?= $row['pincode'] ?></td>
          </tr>
          <tr class="div-wrapper dw">
            <th class="cust_header">Email</th>
            <td class="cust_details"><?= $row['email'] ?></td>
          </tr>
        </table>
        <br>
      </div>
    <?php
      $flag += 1;
    }
    ?>
  </div>
  <br>
  <hr class="make_divb">
  <br>
</div>
<?php
require "../Main/footer.php";
?>
<script type="text/javascript">
  const homeactive = document.querySelector('#homeactive');
  //const catactive=document.querySelector('#catactive');
  const aboutactive = document.querySelector('#aboutactive');
  const contactactive = document.querySelector('#contactactive');
  homeactive.className = "";
  //catactive.className="";
  aboutactive.className = "";
  contactactive.className = "";
  //catactive.className="active";
</script>
</body>

</html>