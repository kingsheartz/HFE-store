<?php
require "../Main/header.php";
require "../../db.php";

//Generate Dynamic Loading
function randomGen($min, $max, $quantity)
{
  $numbers = range($min, $max);
  shuffle($numbers);
  return array_slice($numbers, 0, $quantity);
}
//Generate Dynamic Loading
?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1">
      <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active">Cart</li>
    </ol>
  </div>
</div>

<!-- //breadcrumbs -->
<style type="text/css">
  input[type="submit"],
  button[type=submit],
  input[type="button"] {
    background: none repeat scroll 0 0 #139b3b;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
    font-size: 12px;
  }

  table.shop_table td.product-remove a {
    display: inline-block;
    padding: 2px 5px 1px;
    text-transform: uppercase;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  table.shop_table {
    border-bottom: 0px none #fff;
    border-right: 0px none #fff;
    margin-bottom: 50px;
    width: 100%;
  }

  table.shop_table th,
  table.shop_table td {
    border-left: 0px none #fff;
    border-top: 0px none #fff;
    padding: 15px;
    text-align: left;
  }

  table.shop_table th {
    background: none repeat scroll 0 0 #139b3b;
    color: #ffffff;
    font-size: 15px;
    text-transform: uppercase;
  }

  .cross-sells {
    float: left;
    margin: 5px;
    width: 100%;
  }

  div.cart-collaterals ul.products {
    list-style: outside none none;
    margin: 0 0 0 -30px;
    padding: 0;
  }

  .cart-collaterals {
    overflow: hidden;
  }

  .cart_totals {
    float: right;
    margin-bottom: 50px;
    width: 40%;
  }

  .cart-collaterals h2 {
    color: #139b3b;
    font-size: 25px;
    margin-bottom: 25px;
    text-transform: uppercase;
  }

  div.cart-collaterals ul.products {
    list-style: outside none none;
    margin: 0 0 0 -30px;
    padding: 0;
  }

  div.cart-collaterals ul.products li.product {
    float: left;
    margin-left: 30px;
    position: relative;
    width: 198px;
  }

  .cart_totals table {
    border-bottom: 1px solid #ddd;
    border-right: 1px solid #ddd;
    width: 100%;
  }

  .product-content-right {
    margin: 0px;
    padding: 0px;
    margin-right: 5px;
    margin-left: 5px;
    background-color: transparent;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    justify-content: center;
  }

  .cart_totals table th,
  .cart_totals table td {
    border-left: 1px solid #ddd;
    border-top: 1px solid #ddd;
    padding: 10px;
  }

  .cart_totals table th {
    background: none repeat scroll 0 0 #f4f4f4;
  }

  div.cart-collaterals ul.products li.product .onsale {
    background: none repeat scroll 0 0 #139b3b;
    color: #fff;
    padding: 5px 10px;
    position: absolute;
    right: 0;
  }

  .checktobuy {
    width: 15px;
    height: 15px;
    margin: 5px !important;
  }

  div.cart-collaterals ul.products li.product h3 {
    color: #333;
    font-size: 20px;
    margin-top: 15px;
  }

  div.cart-collaterals ul.products li.product .price {
    color: #333;
    display: block;
    margin-bottom: 10px;
    overflow: hidden;
  }

  div.cart-collaterals ul.products li.product .price ins {
    color: #139b3b;
    font-weight: 700;
    margin-left: 10px;
    text-decoration: none;
  }

  .large_specs_seen {
    margin-top: 5px !important;
  }

  @media(max-width: 991px) {
    #large_screen {
      display: none;
    }

    #small_screen {
      display: unset;
    }

    .nopadding-margin {
      padding: 0px !important;
      margin-left: 0px !important;
      margin-right: 0px !important;
    }

    .full-size-cart-store-div {
      margin-left: 0px !important;
    }

    .full-size-cart-price-div {
      margin-left: 40px !important;
    }

    .emp_cart {
      margin-left: 20px;
      margin-right: 20px;
    }
  }

  @media(min-width: 992px) {
    #large_screen {
      display: unset;
    }

    #small_screen {
      display: none;
    }

    .full-size-cart-store-div {
      margin-left: 0 !important;
    }

    .full-size-cart-price-div {
      margin-left: 0 !important;
    }
  }

  table {
    border-spacing: 0px;
    margin-left: auto;
    margin-right: auto;
  }

  @media(min-width: 993px) {
    .product-price {
      font-size: 22px !important;
    }
  }

  @media(max-width: 992px) {
    .product-price {
      font-size: 3vw !important;
    }
  }

  @media(max-width: 578px) {
    .large_specs_seen {
      display: none !important;
    }

    .product-price {
      font-size: 5vw !important;
    }
  }

  @media(max-width: 450px) {
    .product_description_td {
      float: left;
    }
  }

  .sidebar-title {
    text-align: center;
    padding-bottom: 30px;
    margin-bottom: 20px;
    padding-top: 20px;
    background-color: white;
    margin-top: 0px;
    font-weight: normal;
    border-bottom: #333;
    border-radius: 10px;
    color: #ffffff;
    background: #111111;
    text-transform: capitalize;
    padding-left: 10px;
    margin-left: 5px;
    margin-right: 5px;
  }

  @media(max-width: 370px) {
    .sidebar-title {
      font-size: 22px;
    }

    #proceed {
      background: none repeat scroll 0 0 #139b3b;
      border: medium none;
      color: #fff;
      padding: 0px 8px;
      text-transform: uppercase;
      font-size: 10px;
    }

    .btn_sub_q,
    .btn_add_q {
      display: none;
    }

    .full-size-cart-store-div {
      margin-left: 0px !important;
    }

    img.shop_thumbnail {
      /* max-height: 120px !important; */
      width: auto !important;
    }
  }

  .shop_table.cart {
    display: table;
  }

  .radio,
  .checkbox {
    padding: 6px 10px
  }

  .options {
    position: relative;
    padding-left: 25px
  }

  .radio label,
  .checkbox label {
    display: block;
    font-size: 14px;
    cursor: pointer;
    margin: 0
  }

  .options input {
    opacity: 0
  }

  .checkmark {
    position: absolute;
    top: 2px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 50%
  }

  @media (min-width:451px) {
    .pd_name {
      font-size: 15px !important;
    }
  }

  @media (max-width:450px) {
    .checkmark {
      top: 5px;
    }

    .pd_name {
      font-size: 14px !important;
    }
  }

  .options input:checked~.checkmark:after {
    display: block
  }

  .options .checkmark:after {
    content: "";
    width: 9px;
    height: 9px;
    display: block;
    background: white;
    position: absolute;
    top: 52%;
    left: 51%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
  }

  .options input[type="radio"]:checked~.checkmark {
    background: #61b15a;
    transition: 300ms ease-in-out 0s
  }

  .options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
  }

  .side-arrow {
    transition: visibility 0s, opacity 0.8s linear;
  }

  .side-arrow {
    transition: 0.5s;
  }

  .side-ext-l {
    transition: visibility 0s, opacity 0.8s linear;
  }

  .side-ext-k {
    transition: visibility 0s, opacity 0.3s linear !important;
  }

  #update_product:hover {
    cursor: pointer;
  }

  .each-product {
    background-color: #fff;
    border-radius: 10px;
    margin-right: 0px;
    overflow: hidden;
    width: 100% !important;
  }

  .amount {
    color: darkgrey;
  }

  .sc-product-variation,
  .product-subtotal {
    color: #aaaaaa;
  }

  .update-cart-button,
  .checkout-button {
    /* background: #139b3b; */
    color: #e3e2e2;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease !important;
  }

  .update-cart-button:hover,
  .checkout-button:hover {
    transform: translateY(-2px) !important;
  }

  .update-cart-button:active,
  .checkout-button:active {
    transform: translateY(0) !important;
  }
</style>

<script>
  $(document).ready(function() {
    $('.shop_thumbnail').css('max-height', $('.product_description_td').innerHeight() - 30 + 'px')
    $('.deselect').attr('checked', false);
  })
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //PRICE AND CART SETTINGS  WISHLIST
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //WISHLIST ENTRY productS
  function wishlist_check_store_select(idid, store_id) {
    var product_description_id = idid;
    var id = store_id;
    $.ajax({
      url: "../Common/functions.php", //passing page info
      data: {
        "addtowishlist": 1,
        "product_description_id": product_description_id,
        "store_id": id
      }, //form data
      type: "post", //post data
      dataType: "json", //datatype=json format
      timeout: 30000, //waiting time 30 sec
      success: function(data) { //if registration is success
        if (data.status == 'success') {
          $(".load_btn").hide();
          $(".real_btn").show();
          return;
        } else {
          return;
        }
      },
      error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
        if (textstatus === "timeout") {
          swal({
            title: "Oops!!!",
            text: "server time out",
            icon: "error",
            closeOnClickOutside: false,
            dangerMode: true,
            timer: 6000,
          });
          return;
        } else {
          return;
        }
      }
    }); //closing ajax
  }
  //WISHLIST ENTRY productS
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function wishlist_check_list_select(wishlist_id) {
    $(".background_loader").show();
    $(".std_loader").show();
    $.ajax({
      url: "../Common/functions.php", //passing page info
      data: {
        "fetchedwishlistid": 1,
        "wishlist_id": wishlist_id
      }, //form data
      type: "post", //post data
      dataType: "json", //datatype=json format
      timeout: 30000, //waiting time 30 sec
      success: function(data) { //if registration is success
        if (data.status == 'success') {
          $(".background_loader").hide();
          $(".std_loader").hide();
          $('#wish_cnt_' + wishlist_id + '').html(data.new_wish_cnt);
          swal({
              title: "Added!!!",
              text: "Check your wishlist",
              icon: "success",
              closeOnClickOutside: false,
              dangerMode: true,
            })
            .then((willSubmit1) => {
              if (willSubmit1) {
                return;
              } else {
                return;
              }
            });
        } else if (data.status == 'success1') {
          $(".background_loader").hide();
          $(".std_loader").hide();
          swal({
              title: "product exists!!!",
              text: "Check your wishlist",
              icon: "warning",
              closeOnClickOutside: false,
              dangerMode: true,
            })
            .then((willSubmit1) => {
              if (willSubmit1) {
                return;
              } else {
                return;
              }
            });
        } else if (data.status == 'error') {
          $(".background_loader").hide();
          $(".std_loader").hide();
          swal({
              title: "Required!!!",
              text: "You need to create an Account",
              icon: "error",
              closeOnClickOutside: false,
              dangerMode: true,
            })
            .then((willSubmit) => {
              if (willSubmit) {
                location.href = "../Account/registered.php";
                return;
              } else {
                return;
              }
            });
        }
      },
      error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
        if (textstatus === "timeout") {
          $(".background_loader").hide();
          $(".std_loader").hide();
          swal({
            title: "Oops!!!",
            text: "server time out",
            icon: "error",
            closeOnClickOutside: false,
            dangerMode: true,
            timer: 6000,
          });
          return;
        } else {
          return;
        }
      }
    }); //closing ajax
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  var filter = [];

  function addorremove(checkbox) {
    if (checkbox.checked) {
      var chks = document.getElementsByClassName("checktobuy");
      var id = 0;
      var flag = 0;
      var subtot = 0;
      for (var i = 0; i < chks.length; i++) {
        if (chks[i].checked == true) {
          id = chks[i].value;
          var sec = id.split("_");
          var sid_sec = sec[0].split("-");
          var idid_sec = sec[1].split("-");
          var sid = sid_sec[1];
          var idid = idid_sec[1];
          subtot += parseInt($('#total_s' + sid + 'i' + idid).html());
          flag++;
        }
      }
      if (flag == 1) {
        $('.side-arrow').show();
        $('.side-ext-l').show();
        $('.side-ext-r').css('display', 'flex');
        $('.side-arrow').css('display', 'flex');
        $('.side-arrow').css('visibility', 'visible');
        $('.side-ext-l').css('visibility', 'visible');
        $('.side-ext-r').css('visibility', 'visible');
        $('.side-ext-l').css('opacity', '1');
        $('.side-ext-r').css('opacity', '1');
        $('.side-arrow').css('opacity', '1');
        $('.side-arrow').css('right', '198px');
        $('.arr-r').show();
        $('.arr-l').hide();
      }
      if (flag != 0) {
        $('#sub_mul').html(subtot);
      }
      $('#sel_itcnt').html(flag);
      var val = checkbox.value;
      filter.push({
        type: val
      });
      console.log('Before removing object from an array -> ' + JSON.stringify(filter));
      // Convert the cart object into JSON string and save it into storage
      localStorage.setItem("cartObject", JSON.stringify(filter));
      // Retrieve the JSON string
      /*var jsonString = localStorage.getItem("cartObject");
      var cartobj=JSON.parse(jsonString);
      console.log(cartobj);*/
    } else {
      var chks = document.getElementsByClassName("checktobuy");
      var id = 0;
      var checkempty = 0;
      var subtot = 0;
      for (var i = 0; i < chks.length; i++) {
        if (chks[i].checked == true) {
          id = chks[i].value;
          var sec = id.split("_");
          var sid_sec = sec[0].split("-");
          var idid_sec = sec[1].split("-");
          var sid = sid_sec[1];
          var idid = idid_sec[1];
          subtot += parseInt($('#total_s' + sid + 'i' + idid).html());
          checkempty++;
        }
      }
      if (checkempty == 0) {
        deselect();
      }
      if (checkempty != 0) {
        $('#sub_mul').html(subtot);
      }
      $('#sel_itcnt').html(checkempty);
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //REMOVING THE TAGS WITH VALUE OF THE KEY
      console.log('Before removing object from an array -> ' + JSON.stringify(filter));
      var removeIndex = filter.map(function(product) {
        return product.type;
      }).indexOf(val)
      console.log(removeIndex)
      filter.splice(removeIndex, 1);
      console.log('After removing object from an array -> ' + JSON.stringify(filter));
      //REMOVING THE TAGS WITH VALUE OF THE KEY
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
  }
  <?php
  if (isset($_SESSION['id'])) {
  ?>

    function check_mul() {
      $.ajax({
        url: "../Common/functions.php", //passing page info
        data: {
          "check_mul": 1,
          "key": filter,
          "user": <?= $_SESSION['id'] ?>
        }, //form data
        type: "post", //post data
        dataType: "json", //datatype=json format
        timeout: 30000, //waiting time 30 sec
        success: function(data) { //if registration is success
          if (data.status == 'success') {
            location.href = "../Checkout/checkout_mul.php";
            return;
          }
        },
        error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
          if (textstatus === "timeout") {
            swal({
              title: "Oops!!!",
              text: "server time out",
              icon: "error",
              closeOnClickOutside: false,
              dangerMode: true,
              timer: 6000,
            });
            return;
          } else {
            return;
          }
        }
      }); //closing ajax
    }
  <?php
  }
  ?>

  function deselect() {
    filter = [];
    $('.deselect').attr('checked', false);
    $('.side-arrow').css('visibility', 'hidden');
    $('.side-arrow').css('opacity', '0');
    $('.side-ext-l').css('visibility', 'hidden');
    $('.side-ext-l').css('opacity', '0');
    $('.side-ext-r').css('visibility', 'hidden');
    $('.side-ext-r').css('opacity', '0');
    $('.checktobuy').attr('checked', false);
    console.log('After removing object from an array -> ' + JSON.stringify(filter));
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>
<div class="side-arrow" style="position: fixed;bottom: 0px;height:148px;right:198px;z-index: 100;color:rgb(255, 255, 255);background-color: rgba(250, 245, 245, 0);padding:10px;border-top-left-radius: 10px;display: none;justify-content: center;align-products: center;">
  <div class="shadow_all_none" style="display: flex;justify-content: center;align-items: center;border-radius: 50%; background-color: rgb(1, 134, 187);width:35px;height:35px">
    <i
      style="display: none;margin-bottom: 0px;margin-left: -2px;"
      class="fa fa-shopping-cart fa-lg arr-l"
      onclick="$('.side-ext-r').css('visibility','visible');$('.side-ext-r').css('opacity','1');$('.side-arrow').css('right','198px');$('.arr-l').hide();$('.arr-r').show();">
    </i>
    <i
      style="font-size: 40px;margin-left: 10px;margin-bottom: 2px;"
      class="fa fa-angle-right fa-3x arr-r"
      onclick="$('.side-ext-r').css('visibility','hidden');$('.side-ext-r').css('opacity','0');$('.side-arrow').css('right','0');$('.arr-r').hide();$('.arr-l').show();">
    </i>
  </div>
</div>
<div class="side-ext shadow_l">
  <div class="div_wrapper side-ext-l side-ext-r shadow_l" style="display:flex;padding:0;display: none;bottom:100px;position: fixed;width: 200px;right:0;z-index: 99;">
    <input type="button"
      style="height: 50px;font-weight: bold;border-top-left-radius: 10px;background-color: #ff5722;bottom:100px;position: fixed;width: 200px;right:0;"
      onclick="check_mul()"
      value="Proceed to buy"
      name="proceed"
      class=" button alt wc-forward side-ext-k shadow_l">
  </div>
  <div class="side-ext-l side-ext-r shadow_l" style="visibility: visible;opacity: 1;display: none;position: fixed;width: 200px;right:0;bottom:0;z-index: 99;">
    <div class="side-ext-l side-ext-r shadow_l" style="position: fixed;bottom: 60px;right:0;z-index: 99;color:white;background-color: rgb(70, 70, 70);padding:10px;width:200px;">
      <label class="options">
        <span class="val-getbrand">Deselect all</span>
        <input onclick="deselect()" class="deselect" value="" id="mobgetbrand" type="radio" name="mob-radio-getbrand">
        <span class="checkmark "></span>
      </label>
    </div>
    <div class="side-ext-l side-ext-r" style="display:flex;width: 100%;padding:0;justify-content: flex-end;padding-right: 0px;position: fixed;right:0;bottom:0;z-index: 99;">
      <div class="shadow_l" style="background-color: rgb(250, 245, 245);padding-left:10px;padding-right:10px;display:flex;justify-content: center;align-items: center;width:200px">
        <i class="fa fa-check fa-2x" style="color: seagreen;float:left;padding-right: 10px;"></i>
        <h5 style="float:left;font-weight: bold;">Selected <span id="sel_itcnt">0</span> product(s)
          <div class="clearfix"></div>
          <span style="float: left;margin-bottom: -5px;margin-top: 5px;">Subtotals <i class="fa fa-inr"></i><span id="sub_mul">0</span></span>
        </h5>
      </div>
    </div>
  </div>
</div>
<!--side-ext-->
<div class="single-product-area" style="padding-top: 0px; background-color: #151515;padding-bottom:0px">
  <div class="zigzag-bottom"></div>
  <h2 class="sidebar-title">
    Shopping Cart <i class="fa fa-shopping-cart"></i>
  </h2>
  <div class="container nopadding-margin" style="margin-left: 0px;width: 100%;padding:0;background-color: #111111;">
    <div class="row" style="margin: 0px;">
      <div class="col-md-12" style="margin:0px;padding: 0px;width: 100%;display: list-item;">
        <script>
          console.log("Session ID:: <?php echo $_SESSION['id']; ?>");
        </script>
        <?php
        if (isset($_SESSION['id'])) {
          $id = $_SESSION['id'];
          $sqlc = "select * from cart where customer_id=:id";
          $stmtc = $pdo->prepare($sqlc);
          $stmtc->execute(array(
            ':id' => $id
          ));
          $rowc = $stmtc->fetch(PDO::FETCH_ASSOC);
          if ($rowc) {
        ?>
            <div class="col-md-12" style="margin:0px;padding: 0px;margin-bottom: 20px;">
              <div class="product-content-right nopadding-margin">
                <hr class=" make_divc" style="margin-bottom: 0px;margin-top: -10px;">
                <div class="woocommerce">
                  <form method="post" action="#" class="hidescroll" style="overflow-x: hidden;">
                    <div class="shop_table cart" style="background-color: #111111;">
                      <?php
                      $id = $_SESSION['id'];
                      $sql1 = "select * from cart where customer_id=:id order by product_description_id";
                      $stmt1 = $pdo->prepare($sql1);
                      $stmt1->execute(array(
                        ':id' => $id
                      ));
                      $dup = array();
                      if (isset($dup)) {
                        unset($dup);
                      }
                      $product_cnt = 0;
                      while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                        $product_description_id = $row1['product_description_id'];
                        $store_id = $row1['store_id'];
                        $n = 0;
                        $sql2 = "select * from product inner join category on category.category_id=product.category_id
                                inner join product_description on product_description.product_id=product.product_id
                                inner join product_details on product_description.product_description_id=product_details.product_description_id
                                inner join store on store.store_id=product_details.store_id
                                where product_description.product_description_id=:product_description_id and product_details.store_id=:store_id order by product_description.product_description_id LIMIT 1";
                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->execute(array(
                          ':product_description_id' => $product_description_id,
                          ':store_id' => $store_id
                        ));
                        $mrpsql = "select product.price from product inner join product_description on product_description.product_id=product.product_id where product_description.product_description_id=$product_description_id";
                        $mrpstmt = $pdo->query($mrpsql);
                        $mrprow = $mrpstmt->fetch(PDO::FETCH_ASSOC);
                        $t_mrp = $mrprow['price'];
                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                          $sql3 = "select COUNT(product_description_id) as mulval from cart where customer_id=:id and product_description_id=:product_description_id";
                          $stmt3 = $pdo->prepare($sql3);
                          $stmt3->execute(array(
                            ':id' => $id,
                            ':product_description_id' => $product_description_id
                          ));
                          $row3 = $stmt3->fetch(PDO::FETCH_ASSOC); //02171e
                          $total = $row2['price'] * $row1['quantity'];
                          $save = ($t_mrp * $row1['quantity']) - $total;
                          $off = round(($save * 100) / $total);
                      ?>
                          <div class="cross-sells">
                            <div class="each-product" style="padding: 0px;padding-top: 10px;width: 100%;background-color: #111111"
                              class="tbl_s<?= $store_id . "i" . $product_description_id ?>">
                              <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0" style="padding: 0px;">
                                <input
                                  id="check_s<?= $store_id . "i" . $product_description_id ?>"
                                  class="checktobuy"
                                  onclick="addorremove(this)"
                                  type="checkbox"
                                  name="select_product"
                                  value="s-<?= $store_id . "_i-" . $product_description_id ?>">
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="product-quantity quantity buttons_added" style="justify-content: center;display: flex;text-align: center;align-items: center;position: relative;margin-right: 0px">
                                  <div class="product_img" style="padding: 0px; margin-top: 7px;margin-left: 15px;">
                                    <p class="product-thumbnail" style="text-align:right;">
                                      <a href="../Product/single.php?id=<?= $row2['product_description_id'] ?>">
                                        <img style="max-width: 100%;max-height: 100%;" alt="<?= $row2['product_name'] ?>" class="shop_thumbnail" src="../../images/<?= $row2['category_id'] ?>/<?= $row2['product_description_id'] ?>.jpg">
                                      </a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 product_description_td">
                                <div class="product-name" colspan="2" style="padding: 0px;margin-top: 5px;margin-bottom: 5px">
                                  <p style="margin:0px;margin-bottom: 0px;font-size:17px;">
                                  <div style="margin-right:10px;background-color: transparent;padding-right:20px;padding-left:0px;width: 100%;border-radius: 2px;margin-bottom: -8px;padding-top:8px;padding-bottom:8px;text-align:justify">
                                    <div style="display: flex;">
                                      <a class="pd_name" href="#" style="color: darkgrey;font-weight: normal;text-align:justify;">
                                        <?= $row2['product_name'] ?>
                                      </a>
                                    </div>
                                  </div>
                                  </p>
                                </div>
                                <div class="cart_product" style="width: 100%; background-color: #fff">
                                  <div class="large_specs_seen" style="width:100%;float: left;text-align: left;margin-left:10px;">
                                    <div>
                                      <!--FEATURES-->
                                      <ul>

                                        <?php
                                        $sqlfeatures = "select * from product_details
                                                        inner join product_description on product_description.product_description_id=product_details.product_description_id
                                                        where product_description.product_description_id=:product_description_id and store_id=:store_id";
                                        $stmtfeatures = $pdo->prepare($sqlfeatures);
                                        $stmtfeatures->execute(array(
                                          ':product_description_id' => $product_description_id,
                                          'store_id' => $row2['store_id']
                                        ));
                                        $rowfeatures = $stmtfeatures->fetch(PDO::FETCH_ASSOC);
                                        $rowfeatures['f0'] = $rowfeatures['size'];
                                        $rowfeatures['f1'] = $rowfeatures['weight'];
                                        $rowfeatures['f2'] = $rowfeatures['brand'];
                                        $features = array('size', 'weight', 'brand', 'price', 'quantity');
                                        $f = 0;

                                        while ($f < 3) {
                                          if (!is_null($rowfeatures['f' . $f]) && $rowfeatures['f' . $f] != 0 && $rowfeatures['f' . $f] != '0') {
                                            if ($features[$f] != 'weight') {
                                              $sqlfeature_name = "select " . $features[$f] . '_name from ' . $features[$f] . ' where ' . $features[$f] . '_id=' . (int) $rowfeatures['f' . $f];
                                              $stmtfeature_name = $pdo->query($sqlfeature_name);
                                              $rowfeature_name = $stmtfeature_name->fetch(PDO::FETCH_ASSOC);
                                            }

                                            if ($features[$f] == "color") {
                                        ?>
                                              <li class="sc-product-variation">
                                                <span class="a-list-product">
                                                  <span class="a-size-small a-text-bold"><b><?= ucwords($features[$f]) ?>: </b></span>
                                                  <span class="a-size-small" style="text-decoration: none;font-weight:normal;width:10px;height:0px !important;padding-right: 7px;padding-left: 7px;border:1px solid #111111;padding-top:0px;padding-bottom:0px;background-color:<?= $rowfeature_name[$features[$f] . '_name'] ?>;font-size:12px;"></span>
                                                </span>
                                              </li>
                                            <?php
                                            } else if ($features[$f] == "weight") {
                                            ?>
                                              <li class="sc-product-variation">
                                                <span class="a-list-product">
                                                  <span class="a-size-small a-text-bold"><b><?= ucwords($features[$f]) ?>: </b></span>
                                                  <span class="a-size-small" style="text-decoration: none;font-weight:normal;padding: 0px;"><?= $rowfeatures['f2'] ?></span>
                                                </span>
                                              </li>
                                            <?php
                                            } else {
                                            ?>
                                              <li class="sc-product-variation">
                                                <span class="a-list-product">
                                                  <span class="a-size-small a-text-bold"><b><?= ucwords($features[$f]) ?>: </b></span>
                                                  <span class="a-size-small"><?= $rowfeature_name[$features[$f] . '_name'] ?></span>
                                                </span>
                                              </li>
                                        <?php
                                            }
                                          }
                                          $f++;
                                        }
                                        if (strlen($row2['description']) >= 50) {
                                          $description = substr($row2['description'], 0, 45);
                                          $description2 = $description . "...";
                                        } else {
                                          $description2 = $row2['description'];
                                        }
                                        ?>
                                        <li class="sc-product-variation">
                                          <span class="a-list-product">
                                            <small>
                                              <span class="a-size-small a-text-bold"><b>Description: </b></span>
                                              <span class="a-size-small"><?= $description2 ?></span>
                                            </small>
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div style="width:100%;float: left;text-align: left;">
                                    <div class="row" style="margin-left: 0px;float: left;margin-right: 0px;">
                                      <div class="col-md-6 full-size-cart-store-div" style="padding: 0px;margin-left: 20px;width: 200px;">
                                        <p style="z-index: 1;text-align:left;margin-top: 5px;">
                                          <span style='font-family: arial;color:#006904;font-weight: bold;text-decoration: none;font-size: 12px'>
                                            You Save &#8377; <span id="save_s<?= $store_id . "i" . $product_description_id ?>" style="text-decoration: none;font-weight: bold;color: #006904;padding-left: 0px"><?= $save ?></span>
                                            (<span style="text-decoration: none;font-weight: bold;color: #006904;padding-left: 0px" id="off_s<?= $store_id . "i" . $product_description_id ?>"><?= $off ?></span>%)
                                          </span>
                                        </p>
                                        <p class="product-price" style="z-index: 1;text-align:left;margin-top: 10px;;font-weight: bold;font-size: 2vw">
                                          <span class="amount">&#8377;<span id="total_s<?= $store_id . "i" . $product_description_id ?>"><?= $total ?></span>
                                            <i style="color: #303030" class="fa fa-tags">&nbsp;<del style="color: #999;font-weight:normal;font-size: 13px;">&#8377;</del></i>
                                            <del
                                              style="color: #999;font-weight:normal;font-size: 13px;"
                                              id="mrp_s<?= $store_id . "i" . $product_description_id ?>"
                                              style="text-decoration:"><?= (int) $t_mrp * (int) $row1['quantity'] ?>
                                            </del>
                                          </span>
                                        </p>
                                        <p style="margin-top:10px;">
                                          <select
                                            style="outline: none;border:none;background-color:#006904;color: white;padding: 5px;border-radius: 3px;padding-top: 1px;padding-bottom: 1px; "
                                            id="order_s<?= $store_id . "i" . $product_description_id ?>">
                                            <option
                                              selected=""
                                              disabled=""
                                              style="background-color: white;font-weight: bold;text-align: center;"
                                              value="<?= $row1['order_type'] ?>"><?= ucwords($row1['order_type']) ?>
                                            </option>
                                            <?php
                                            $preordsql = $pdo->query("select order_preference from product_details where store_id=" . $store_id . " and product_description_id=" . $product_description_id);
                                            $preord = $preordsql->fetch(PDO::FETCH_ASSOC);
                                            if ($preord['order_preference'] == 1) {
                                            ?>
                                              <option
                                                style="background-color: white;color:#006904;font-weight: bold;text-align: center; "
                                                value="1">Booking
                                              </option>
                                            <?php
                                            } else if ($preord['order_preference'] == 2) {
                                              $ord_typ = "Delivery";
                                            ?>
                                              <option
                                                style="background-color: white;color:#006904;font-weight: bold;text-align: center;"
                                                value="2">Delivery
                                              </option>
                                            <?php
                                            } else if ($preord['order_preference'] == 3) {
                                              $ord_typ = "Delivery";
                                            ?>
                                              <option
                                                style="background-color: white;color:#006904;font-weight: bold;text-align: center; "
                                                value="1">Booking
                                              </option>
                                              <option
                                                style="background-color: white;color:#006904;font-weight: bold;text-align: center;"
                                                value="2">Delivery
                                              </option>
                                            <?php
                                            }
                                            ?>
                                          </select>
                                        </p>
                                      </div>
                                      <div class="col-md-5 full-size-cart-price-div" style="padding-right: 0px;">
                                      </div>
                                    </div>
                                  </div>
                                  <div style="padding: 0px;position: absolute;top: 180px;right: 30px;width: fit-content;">
                                    <div class="div-wrapper" style="text-align: left;padding: 0px;margin:0px;height: 40px;grid-gap: 0px;">
                                      <div class="btn_sub_q" style="padding: 0px;margin: 0px;margin-left: 2px;">
                                        <button
                                          style="background-color: #02171e;-webkit-box-shadow: inset 0px 0px 15px 3px #02171e;box-shadow: inset 0px 0px 15px 3px #02171e;width: 100%;min-width: 30px;height: 40px;font-weight: bold;border-color: #02171e;color: white;font-size: 18px;border-radius: 5px;border-top-right-radius: 0px;border-bottom-right-radius: 0px;"
                                          type="button" id="sub_s<?= $store_id . "i" . $product_description_id ?>"
                                          onclick="sub_product_all('<?= $store_id ?>','<?= $product_description_id ?>','<?= $t_mrp ?>')">-
                                        </button>
                                      </div>
                                      <div style="padding: 0px;margin: 0px;">
                                        <button
                                          id="btn_s<?= $store_id . "i" . $product_description_id ?>"="button"
                                          style="width: 100%;min-width: 50px;height: 40px;font-weight: bold;font-size: 14px;background-color: white;outline: none;border-color:#02171e;padding: 0"
                                          onclick="$(this).hide();if($(this).html()<10){$('#sel_s<?= $store_id . "i" . $product_description_id ?>').show();}else{$('#qnty_s<?= $store_id . "i" . $product_description_id ?>').show();}">
                                          <?= $row1['quantity'] ?>
                                        </button>
                                        <select
                                          id="sel_s<?= $store_id . "i" . $product_description_id ?>"
                                          onchange="select_product_option('<?= $store_id ?>','<?= $product_description_id ?>','<?= $t_mrp ?>');"
                                          name="quantity"
                                          autocomplete="off"
                                          style="width: 100%;min-width: 50px;bottom: 0;box-shadow: none;outline: none;border-color:#aaa;height:40px;display: none;background-color: white">
                                          <option
                                            value="<?= $row1['quantity'] ?>"
                                            id="sel_opt_s<?= $store_id . "i" . $product_description_id ?>"
                                            selected
                                            disabled><?= $row1['quantity'] ?>
                                          </option>
                                          <option
                                            value="0"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="0 (Delete)">0 (Delete)
                                          </option>
                                          <option
                                            value="1"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="1">1
                                          </option>
                                          <option
                                            value="2"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="2">2
                                          </option>
                                          <option
                                            value="3"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="3">3
                                          </option>
                                          <option
                                            value="4"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="4">4
                                          </option>
                                          <option
                                            value="5"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="5">5
                                          </option>
                                          <option
                                            value="6"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="6">6
                                          </option>
                                          <option
                                            value="7"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="7">7
                                          </option>
                                          <option
                                            value="8"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="8">8
                                          </option>
                                          <option
                                            value="9"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option"
                                            data-a-html-content="9">9
                                          </option>
                                          <option
                                            value="10"
                                            class="sc-update-quantity-option"
                                            data-a-css-class="quantity-option quantity-option-10"
                                            data-a-html-content="10+">10+
                                          </option>
                                        </select>
                                        <input
                                          type="number"
                                          id="qnty_s<?= $store_id . "i" . $product_description_id ?>"
                                          size="4"
                                          onchange="total('<?= $store_id ?>','<?= $product_description_id ?>','<?= $t_mrp ?>')"
                                          onblur="$(this).hide();$('#sel_s<?= $store_id . 'i' . $product_description_id ?>').hide();$('#btn_s<?= $store_id . 'i' . $product_description_id ?>').show()"
                                          style="text-align: center;display: none;height: 40px;width: 100%;min-width: 50px;outline: none;font-weight: bold"
                                          class="input-text qty text"
                                          title="Quantity"
                                          value="<?= $row1['quantity'] ?>"
                                          min="1"
                                          step="1"
                                          onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                                      </div>
                                      <div class="btn_add_q" style="padding: 0px;margin: 0px;">
                                        <button
                                          style="background-color: #02171e;-webkit-box-shadow: inset 0px 0px 15px 3px #02171e;box-shadow: inset 0px 0px 15px 3px #02171e;width: 100%;min-width: 30px;height: 40px;font-weight: bold;border-color: #02171e;color: white;font-size: 18px;border-radius: 5px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;"
                                          id="add_s<?= $store_id . "i" . $product_description_id ?>"
                                          onclick="add_product_all('<?= $store_id ?>','<?= $product_description_id ?>','<?= $t_mrp ?>')"
                                          type="button">+
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div style="width: 100%">
                                  <div>
                                    <p class="product-subtotal" style="margin-left: 0px;float: left;font-weight: bold;width:100%;">Price
                                      <span class="amount">&#8377;
                                        <span id="price_s<?= $store_id . "i" . $product_description_id ?>"><?= $row2['price'] ?></span>
                                        <span>/-</span> (1 Qty)
                                      </span>
                                    </p>
                                  </div>
                                </div>
                                <div style="width: 100%;">
                                  <div>
                                    <button
                                      type="button"
                                      title="Add to wish list"
                                      style="width: 47%;
                                        height: 40px;
                                        border-radius: 5px;
                                        background-color: #243539;
                                        -webkit-box-shadow: inset 0px 0px 15px 3px #4c7279ff;
                                        box-shadow: inset 0px 0px 15px 3px #4c7279ff;
                                        border: 1px solid #413f3f;
                                        outline: none;
                                        font-weight: bold;
                                        color: white;
                                        float: left;"
                                      data-toggle="modal"
                                      data-target="#avail_wishlist"
                                      onclick="wishlist_check_store_select(<?= $product_description_id ?>,<?= $store_id ?>)">Wishlist <i style="color: red" class="fa fa-heart"></i>
                                    </button>
                                    <button
                                      type="button"
                                      title="Remove this product"
                                      style="width: 47%;
                                        height: 40px;
                                        float: right;
                                        border: none;
                                        border-color: #fff;
                                        color: #fff;
                                        background-color: #530000;
                                        -webkit-box-shadow: inset 0px 0px 5px 3px #6f0202ff;
                                        box-shadow: inset 0px 0px 5px 3px #6f0202ff;
                                        outline: none;
                                        border-radius: 5px;"
                                      class="remove"
                                      onclick="remove_product('<?= $store_id ?>','<?= $product_description_id ?>')"
                                      href="#"><b>Remove</b> <i class="fas fa-trash-alt"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr class="make_divc" style="margin-top: 40px;border-color: darkgrey !important;">
                          </div>
                      <?php
                          $product_cnt++;
                        }
                      }
                      ?>
                    </div>
                    <?php
                    $id = $_SESSION['id'];
                    $sql = "select sum(product_details.price*cart.quantity) as subtotal from cart
                            inner join product_description on product_description.product_description_id=cart.product_description_id
                            inner join product_details on product_details.product_description_id=cart.product_description_id
                            WHERE product_description.product_description_id=cart.product_description_id AND cart.store_id=product_details.store_id AND cart.customer_id=:id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                      ':id' => $id
                    ));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="cart-collaterals" style="margin: 0px;padding: 0px;background: #0a0a0a;border-radius: 10px;">
                      <div class="cart_totals shadow_all_none" style="width: 100%;margin:0px;padding: 0px;padding-top: 0px;">
                        <div class="row">
                          <div class="col-md-12" style="float:right;">
                            <h4 style="padding-right: 10px;text-transform: capitalize;color:white;float: right;">
                              Subtotals (<span id="total_rm_cnt"><?= $product_cnt ?></span> product)
                              <small style="font-weight: bolder;color:white;">&#8377;</small>
                              <b id="tot_val2"><?= $row['subtotal'] ?></b>
                            </h4>
                          </div>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="div-wrapper"
                                style="padding-left: 15px;color:white;padding-right: 15px;grid-gap: 0px;padding-top: 20px;display: grid !important;grid-auto-flow: column !important; max-width:800px;">
                                <div style="padding: 10px;">
                                  <button
                                    type="button"
                                    style="width: 100%;padding-top: 8px;padding-bottom: 8px;border-radius: 5px;font-weight: bold;float: left;border: 1px solid #413f3f;background: #061d22;"
                                    onclick="updatecart()"
                                    name="update_cart"
                                    class="update-cart-button btn-primary btn button">
                                    <i class="fas fa-upload fa-lg"></i> UPDATE CART
                                  </button>
                                </div>
                                <div style="padding: 10px;">
                                  <button
                                    type="button"
                                    style="width: 100%;padding-top: 8px;padding-bottom: 8px;border-radius: 5px;font-weight: bold;border: 1px solid #413f3f;float: right;background: #862e00;"
                                    onclick="go()"
                                    name="proceed"
                                    class="checkout-button btn-primary btn button alt wc-forward">
                                    <i class="fa fa-check-square-o fa-lg"></i> CHECKOUT
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <br>
                </div>
              </div>
            </div>
            <!--LARGE-->
      </div>
      <!--SMALL-->
      <div class="row" style="margin:0px;padding: 0px">
        <div class="col-md-9" style="margin:0px;padding: 0px"></div>
        <div class="col-md-3"></div>
      </div>
      <div class="col-md-4 small" id="small_screen" style="margin:0px;padding: 0px"></div>
    <?php
          } else {
            /*COLOR PICKER*/
            $color = array('scroll_handle_orange', 'scroll_handle_blue', 'scroll_handle_red', 'scroll_handle_cyan', 'scroll_handle_magenta', 'scroll_handle_green', 'scroll_handle_green1', 'scroll_handle_peach', 'scroll_handle_munsell', 'scroll_handle_carmine', 'scroll_handle_lightbrown', 'scroll_handle_hanblue', 'scroll_handle_kellygreen');
            $bgcolor = array('orange', '#139b3b', 'red', 'cyan', 'magenta', 'green', '#006622', '#FF6666', '#E6BF00', '#AB274F', '#C46210', '#485CBE', '#65BE00');
            $c1 = $c2 = 'white';
            do {
              $rancolor1 = array_rand($color, 1);
              $rancolor2 = array_rand($color, 1);
            } while ($rancolor1 == $rancolor2);
            if ($bgcolor[$rancolor1] == "cyan" || $bgcolor[$rancolor1] == "#FF6666" || $bgcolor[$rancolor1] == "#E6BF00") {
              $c1 = "black";
            }
            if ($bgcolor[$rancolor2] == "cyan" || $bgcolor[$rancolor2] == "#FF6666" || $bgcolor[$rancolor2] == "#E6BF00") {
              $c2 = "black";
            }
            /*COLOR PICKER*/
    ?>
      <div class="row emp_cart">
        <div class="product-content-right">
          <center><img style="justify-content: center;padding-bottom: 20px;margin-bottom: 0px" height="400" class="sidebar-title" src="../../images/logo/cart-empty.png">
            <h2 class="sidebar-title" style="text-align: center;display: inline-flex;font-weight: 600;color: #56c57d">
              Your Cart is Empty
            </h2>
          </center>
        </div>
      </div><br><br>
      <div class="element_grid">
        <div class="shadow_b">
          <hr style="padding: 0;margin:0;">
          <div class="scrollmenu bl_product_scroll  <?= $color[$rancolor1] ?>" style="background-color: #fff">
            <?php
            $row = $pdo->query(
              "select product_description.product_description_id,product.product_id,product.product_name,category.category_name,category.category_id from product
              inner join product_description on product_description.product_id=product.product_id
              inner join category on category.category_id=product.category_id"
            );
            while ($row1 = $row->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <a href="../Product/single.php?id=<?= $row1['product_description_id'] ?>">
                <img
                  title="<?= $row1['product_name'] ?> "
                  alt=" <?= $row1['product_name'] ?>"
                  class="new_size"
                  src="../../images/<?= $row1['category_id'] ?>/<?= $row1['product_description_id'] ?>.jpg">
              </a>
            <?php
            }
            ?>
          </div>
        </div>
        <br>
        <div class="shadow_b">

          <hr style="padding: 0;margin:0;">
          <div class="scrollmenu mui_product_scroll <?= $color[$rancolor2] ?> " style="background-color: #fff">
            <?php
            $row = $pdo->query(
              "select product_description.product_description_id,product.product_id,product.product_name,category.category_name,category.category_id from product
              inner join product_description on product_description.product_id=product.product_id
              inner join category on category.category_id=product.category_id"
            );
            while ($row1 = $row->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <a href="../Product/single.php?id=<?= $row1['product_description_id'] ?>">
                <img
                  title="<?= $row1['product_name'] ?> "
                  alt=" <?= $row1['product_name'] ?>"
                  class="new_size"
                  src="../../images/<?= $row1['category_id'] ?>/<?= $row1['product_description_id'] ?>.jpg">
              </a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-4 small" id="small_screen"></div>
      <?php
            /*COLOR PICKER*/
            $color = array('scroll_handle_orange', 'scroll_handle_blue', 'scroll_handle_red', 'scroll_handle_cyan', 'scroll_handle_magenta', 'scroll_handle_green', 'scroll_handle_green1', 'scroll_handle_peach', 'scroll_handle_munsell', 'scroll_handle_carmine', 'scroll_handle_lightbrown', 'scroll_handle_hanblue', 'scroll_handle_kellygreen');
            $bgcolor = array('orange', '#139b3b', 'red', 'cyan', 'magenta', 'green', '#006622', '#FF6666', '#E6BF00', '#AB274F', '#C46210', '#485CBE', '#65BE00');
            $c1 = $c2 = 'white';
            do {
              $rancolor1 = array_rand($color, 1);
              $rancolor2 = array_rand($color, 1);
            } while ($rancolor1 == $rancolor2);
            if ($bgcolor[$rancolor1] == "cyan" || $bgcolor[$rancolor1] == "#FF6666" || $bgcolor[$rancolor1] == "#E6BF00") {
              $c1 = "black";
            }
            if ($bgcolor[$rancolor2] == "cyan" || $bgcolor[$rancolor2] == "#FF6666" || $bgcolor[$rancolor2] == "#E6BF00") {
              $c2 = "black";
            }
            /*COLOR PICKER*/
      ?>
      <style type="text/css">
        .difcat {
          position: relative;
          height: max-content;
          margin: auto;
          margin-top: 10px;
          display: block;
          background: #FFFFFF;
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
          height: 250px;
          width: 200px;
          background: white;
          color: black;
        }

        .products-all-in-one img {
          margin: auto;
          display: block;
          background: white;
          image-rendering: auto;
          image-rendering: crisp-edges;
          width: auto;
          max-width: 170px;
          height: auto;
          max-height: 180px;
        }

        .product_img {
          width: -webkit-fill-available;
        }

        .difhed {
          border-bottom: 3px solid #dadada;
          width: 100%;
          margin: 0;
          font-size: 20px;
          font-family: serif;
          font-weight: bold;
          text-transform: capitalize;
          padding-bottom: 0px;
          padding-top: 20px;
          margin-left: 20px;
        }

        .left-arrow-btn-all {
          position: absolute;
          top: 30%;
          left: 0;
          width: 30px;
          z-index: 1;
          height: 100px;
          font-size: 24px;
          background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #f1f1f1), color-stop(1, #fff)) !important;
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
          background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #f1f1f1), color-stop(1, #fff)) !important;
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
          box-shadow: inset 0 0 6px transparent;
        }

        .table1 {
          margin-bottom: 0px;
          max-height: max-content;
          height: 60px;
        }

        .difhed button {
          float: right;
          font-weight: bold;
          font-size: 16px;
          margin-right: 5px;
          margin-top: 5px;
          padding: 2px;
          width: 100px;
          background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #3197ff), color-stop(1, #2196f3)) !important;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          border: none;
          color: white;
          border-radius: 5px;
        }
      </style>
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
            $viewstmt = $pdo->query(
              "select views ,product_keys.product_description_id from product_keys
              JOIN product_description ON product_keys.product_description_id=product_description.product_description_id
              join product on product.product_id=product_description.product_id
              join product_details on product_description.product_description_id=product_details.product_description_id
              where customer_id=" . $_SESSION['id'] . " GROUP BY product_description_id ORDER BY CAST(product_keys.views as UNSIGNED) DESC"
            );
            $isready = $viewstmt->rowCount();

            if ($isready != 0 && is_null($isready) == false) {
      ?>
        <!-- new -->
        <div class="container" style="width: 100%;background-color: #fff;margin-top: 15px;">
          <div class="row">
            <div class="col-md-12" style="padding:0;">
              <div class="cart-collaterals">
                <div class="cart_totals " style="width: 100%">
                  <h2 style="padding-left:15px;padding-right:15px;">You may be interested in...</h2>
                  <h4
                    class="show_cat_list_main tb-padding sidebar-title cart_empty_show_cat"
                    style="border-left: 5px solid <?= $bgcolor[$rancolor1] ?>;border-top-left-radius: 10px;text-align: left;padding-bottom: 10px;padding-top: 10px;background-color: white;font-weight:normal;border-bottom:#333;margin-bottom: -5px;margin-top: 13px;border-top-right-radius: 10px;color: black;text-transform: capitalize;padding-left: 10px; overflow: hidden;font-size: 18px;">
                    Explore <i style="color: #ff5722;" class="fa fa-arrow-right"></i>
                    <span style="float: right;margin-right: 5px;margin-top: -4px;">
                      <button
                        type="button"
                        style="max-width: 150px;height: 30px;font-weight: bold;border-top-right-radius: 10px;background-color: <?= $bgcolor[$rancolor1] ?>;padding: 11px auto;font-size: 12px;"
                        name="proceed"
                        class="checkout-button button alt wc-forward">
                        <a href="../Product/products_viewall.php?category_id=<?= $cat_id1 ?>" style="color:<?= $c2 ?>;">View all</a>
                      </button>
                    </span>
                  </h4>
                  <div class="difcat " style="border-radius: 5px;">
                    <span class="difhed"></span>
                    <div class="difrow hidescroll" id="difrow" onscroll="scrolllisten('difrow');">
                      <button class="left-arrow-btn-all shadow_all_none" onclick="moveleft('difrow')" style="display: none;">
                        <i class="fas fa-chevron-left"></i>
                      </button>
                      <button class="right-arrow-btn-all shadow_all_none" onclick="moveright('difrow')">
                        <i class="fas fa-chevron-right"></i>
                      </button>
                      <?php
                      while ($view = $viewstmt->fetch(PDO::FETCH_ASSOC)) {
                        $product_desc_id = $view['product_description_id'];
                        $ran = $pdo->query(
                          'select * from product_description
                          inner join product on product.product_id=product_description.product_id
                          INNER JOIN product_details ON product_details.product_description_id=product_description.product_description_id
                          where product_description.product_description_id=' . $product_desc_id . ' GROUP BY product_description.product_description_id'
                        );
                        $row = $ran->fetch(PDO::FETCH_ASSOC);
                      ?>
                        <div
                          class="products-all-in-one"
                          title="<?= $row['product_name'] ?>"
                          onclick="location.href='../Product/single.php?id=<?= $row['product_description_id'] ?>'">
                          <div style="display: flex;justify-content: center;height: 200px;width:100%;background: white;text-align: center;">
                            <img class="image" align="middle" src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                          </div>
                          <?php
                          if (strlen($row['product_name']) >= 22) {
                            $product = $row['product_name'];
                            $product_name = substr($product, 0, 25) . "...";
                          } else {
                            $product_name = $row['product_name'];
                          }
                          ?>
                          <div class="deupd"><?= $product_name ?><br></div>
                        </div>
                      <?php
                      }
                      echo '</div></div>';
                      ?>
                      <div class="clearfix"> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- //new -->
          <?php
            }
          ?>
          <!-- new -->
          <div class="newproducts-w3agile" style="padding:0;padding-top:10px;">
            <h3>Recently Viewed</h3>
            <?php
            $ran = $pdo->query(
              "SELECT views ,product_keys.product_description_id from product_keys
              JOIN product_description ON product_keys.product_description_id=product_description.product_description_id
              JOIN product ON product.product_id=product_description.product_id
              WHERE customer_id=" . $_SESSION['id'] . " GROUP BY product_description_id ORDER BY CAST(product_keys.date_of_preview as UNSIGNED) DESC"
            );
            $isready = $ran->rowCount();
            if ($isready != 0 && is_null($isready) == false) {
            ?>
              <h4
                class="show_cat_list_main tb-padding sidebar-title cart_empty_show_cat"
                style="border-left: 5px solid <?= $bgcolor[$rancolor2] ?>;border-top-left-radius: 10px;text-align: left;padding-bottom: 10px;padding-top: 10px;background-color: white;font-weight:normal;border-bottom:#333;margin-bottom: -5px;margin-top: 13px;border-top-right-radius: 10px;color: black;text-transform: capitalize;padding-left: 10px; overflow: hidden;font-size: 18px;">
                Explore <i style="color: #ff5722;" class="fa fa-arrow-right"></i>
                <span style="float: right;margin-right: 5px;margin-top: -4px;">
                  <button
                    type="button"
                    style="max-width: 150px;height: 30px;font-weight: bold;border-top-right-radius: 10px;background-color: <?= $bgcolor[$rancolor2] ?>;padding: 11px auto;font-size: 12px;"
                    name="proceed"
                    class="checkout-button button alt wc-forward">
                    <a href="../Product/products_viewall.php?category_id=<?= $cat_id2 ?>" style="color:<?= $c2 ?>;">View all</a>
                  </button>
                </span>
              </h4>
              <div class="difcat " style="border-radius: 5px;">
                <span class="difhed"></span>
                <div
                  class="difrow hidescroll"
                  id="difrow<?= $row['product_description_id'] ?>"
                  onscroll="scrolllisten('difrow<?= $row['product_description_id'] ?>');">
                  <button
                    class="left-arrow-btn-all shadow_all_none"
                    onclick="moveleft('difrow<?= $row['product_description_id'] ?>')"
                    style="display: none;">
                    <i class="fas fa-chevron-left"></i>
                  </button>
                  <button class="right-arrow-btn-all shadow_all_none" onclick="moveright('difrow<?= $row['product_description_id'] ?>')">
                    <i class="fas fa-chevron-right"></i>
                  </button>
                  <?php
                  while ($view = $ran->fetch(PDO::FETCH_ASSOC)) {
                    $product_desc_id = $view['product_description_id'];
                    $preview = $pdo->query(
                      'SELECT * FROM product_description
                      INNER JOIN product ON product.product_id=product_description.product_id
                      WHERE product_description.product_description_id=' . $product_desc_id . ' GROUP BY product_description.product_description_id'
                    );
                    $row = $preview->fetch(PDO::FETCH_ASSOC);
                  ?>
                    <div
                      class="products-all-in-one"
                      title="<?= $row['product_name'] ?>"
                      onclick="location.href='../Product/single.php?id=<?= $row['product_description_id'] ?>'">
                      <div style="display: flex;justify-content: center;height: 200px;width:100%;background: white;text-align: center;">
                        <img class="image" align="middle" src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                      </div>
                      <?php
                      if (strlen($row['product_name']) >= 22) {
                        $product = $row['product_name'];
                        $product_name = substr($product, 0, 25) . "...";
                      } else {
                        $product_name = $row['product_name'];
                      }
                      ?>
                      <div class="deupd"><?= $product_name ?><br></div>
                    </div>
                <?php
                  }
                  echo '</div></div>';
                }
                ?>
                <div class="clearfix"> </div>
                </div>
            <?php
          }
        }
            ?>
              </div>
          </div>
          </div>
          <?php
          require "../Main/footer.php";
          ?>
          <script type="text/javascript">
            function go() {
              console.log("in function");
              location.href = "../Checkout/checkout.php";
            }
          </script>
          <script type="text/javascript">
            //UPDATE product
            function updateproduct(idid, sid) {
              var id = sessionStorage.getproduct("id");
              var product_description_id = idid;
              var store_id = sid;
              var order_type = document.getElementById('order_s' + store_id + 'i' + idid).value;
              var total_amt = document.getElementById('total_s' + store_id + 'i' + idid).innerHTML;
              if ($('#qnty_s' + store_id + 'i' + idid).css('display') != 'none') {
                var quantity = document.getElementById('qnty_s' + store_id + 'i' + idid).value;
              } else if ($('#sel_s' + store_id + 'i' + idid).css('display') != 'none') {
                var quantity = document.getElementById('sel_s' + store_id + 'i' + idid).value;
                document.getElementById('sel_opt_s' + store_id + 'i' + idid).innerHTML = quantity;
                document.getElementById('sel_opt_s' + store_id + 'i' + idid).value = quantity;
              } else if ($('#btn_s' + store_id + 'i' + idid).css('display') != 'none') {
                var quantity = document.getElementById('btn_s' + store_id + 'i' + idid).innerHTML;
              }
              //alert(order_type+","+store_id+","+id+","+idid+","+quantity+","+total_amt)
              $.ajax({
                url: "../Common/functions.php", //passing page info
                data: {
                  "update_cart_product": 1,
                  "product_description_id": product_description_id,
                  "store_id": store_id,
                  "quantity": quantity,
                  "total_amt": total_amt,
                  "order_type": order_type
                }, //form data
                type: "post", //post data
                dataType: "json", //datatype=json format
                timeout: 30000, //waiting time 30 sec
                success: function(data) { //if registration is success
                  if (data.status == 'success') {
                    swal({
                        title: "Updated!!!",
                        text: "product is updated",
                        icon: "success",
                        closeOnClickOutside: false,
                        dangerMode: true,
                      })
                      .then((willSubmit1) => {
                        if (willSubmit1) {
                          //document.getElementById('tot_val1').innerHTML="";
                          //document.getElementById('tot_val1').innerHTML=""+data.total;
                          document.getElementById('tot_val2').innerHTML = "";
                          document.getElementById('tot_val2').innerHTML = "" + data.total;
                          document.getElementById("sm-cartcnt").innerHTML = "";
                          document.getElementById("lg-cartcnt").innerHTML = "";
                          document.getElementById("sm-cartcnt").innerHTML = data.cartcnt;
                          document.getElementById("lg-cartcnt").innerHTML = data.cartcnt;
                          return;
                        } else {
                          return;
                        }
                      });
                  }
                },
                error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
                  if (textstatus === "timeout") {
                    swal({
                      title: "Oops!!!",
                      text: "server time out",
                      icon: "error",
                      closeOnClickOutside: false,
                      dangerMode: true,
                      timer: 6000,
                    });
                    return;
                  } else {
                    return;
                  }
                }
              }); //closing ajax
            }
            //UPDATE product
            //UPDATE CART
            function updatecart() {
              <?php
              if (isset($id)) {
                $sql1 = "select * from cart where customer_id=:id order by product_description_id";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute(array(
                  ':id' => $id
                ));
                $dup = array();
                if (isset($dup)) {
                  unset($dup);
                }
              }
              while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $product_description_id = $row1['product_description_id'];
                $store_id = $row1['store_id'];
                $n = 0;
                $sql2 = "select * from product
                        inner join category on category.category_id=product.category_id
                        inner join product_description on product_description.product_id=product.product_id
                        inner join product_details on product_description.product_description_id=product_details.product_description_id
                        inner join store on store.store_id=product_details.store_id
                        where product_description.product_description_id=:product_description_id and product_details.store_id=:store_id order by product_description.product_description_id";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(array(
                  ':product_description_id' => $product_description_id,
                  ':store_id' => $store_id
                ));
                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
              ?>
                  var total_amt = document.getElementById('total_s' + '<?= $store_id . "i" . $product_description_id ?>')
                    .innerHTML;
                  if ($('#qnty_s<?= $store_id . "i" . $product_description_id ?>').css('display') != 'none') {
                    var quantity = document.getElementById('qnty_s<?= $store_id . "i" . $product_description_id ?>').value;
                  } else if ($('#sel_s<?= $store_id . "i" . $product_description_id ?>').css('display') != 'none') {
                    var quantity = document.getElementById('sel_s<?= $store_id . "i" . $product_description_id ?>').value;
                    document.getElementById('sel_opt_s<?= $store_id . "i" . $product_description_id ?>').innerHTML = quantity;
                    document.getElementById('sel_opt_s<?= $store_id . "i" . $product_description_id ?>').value = quantity;
                  } else if ($('#btn_s<?= $store_id . "i" . $product_description_id ?>').css('display') != 'none') {
                    var quantity = document.getElementById('btn_s<?= $store_id . "i" . $product_description_id ?>').innerHTML;
                  }
                  //1=booking;2=cash_on_delivery
                  var order_type = document.getElementById('order_s' + '<?= $store_id . "i" . $product_description_id ?>')
                    .value;
                  var id = <?= $id ?>;
                  var product_description_id = <?= $product_description_id ?>;
                  var store_id = <?= $store_id ?>;
                  $.ajax({
                    url: "../Common/functions.php", //passing page info
                    data: {
                      "update_user_cart": 1,
                      "product_description_id": product_description_id,
                      "store_id": store_id,
                      "quantity": quantity,
                      "total_amt": total_amt,
                      "order_type": order_type
                    }, //form data
                    type: "post", //post data
                    dataType: "json", //datatype=json format
                    timeout: 30000, //waiting time 30 sec
                    success: function(data) { //if registration is success
                      if (data.status == 'success') {
                        swal({
                            title: "Updated!!!",
                            text: "Cart is updated",
                            icon: "success",
                            closeOnClickOutside: false,
                            dangerMode: true,
                          })
                          .then((willSubmit1) => {
                            if (willSubmit1) {
                              //document.getElementById('tot_val1').innerHTML="";
                              //document.getElementById('tot_val1').innerHTML=""+data.total;
                              document.getElementById('tot_val2').innerHTML = "";
                              document.getElementById('tot_val2').innerHTML = "" + data.total;
                              document.getElementById("sm-cartcnt").innerHTML = "";
                              document.getElementById("lg-cartcnt").innerHTML = "";
                              document.getElementById("sm-cartcnt").innerHTML = data.cartcnt;
                              document.getElementById("lg-cartcnt").innerHTML = data.cartcnt;
                              return;
                            } else {
                              return;
                            }
                          });
                      }
                    },
                    error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
                      if (textstatus === "timeout") {
                        swal({
                          title: "Oops!!!",
                          text: "server time out",
                          icon: "error",
                          closeOnClickOutside: false,
                          dangerMode: true,
                          timer: 6000,
                        });
                        return;
                      } else {
                        return;
                      }
                    }
                  }); //closing ajax
              <?php
                }
              }
              ?>
            }
            //DELETE FROM CART
            function remove_product(store_id, product_description_id) {
              var store_id = store_id;
              var product_description_id = product_description_id;
              swal({
                  title: "Remove !!!",
                  text: "Are you sure!!! ",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                  closeOnClickOutside: false,
                  closeOnEsc: false,
                  buttons: true,
                  buttons: ["Cancel", "Remove"],
                })
                .then((willSubmit) => {
                  if (willSubmit) {
                    $.ajax({
                      url: "../Common/functions.php", //passing page info
                      data: {
                        "remove_product": 1,
                        "product_description_id": product_description_id,
                        "store_id": store_id
                      }, //form data
                      type: "post", //post data
                      dataType: "json", //datatype=json format
                      timeout: 30000, //waiting time 30 sec
                      success: function(data) { //if registration is success
                        if (data.status == 'success') {
                          //document.getElementById('tot_val1').innerHTML="";
                          // document.getElementById('tot_val1').innerHTML=""+data.total;
                          document.getElementById('tot_val2').innerHTML = "";
                          document.getElementById('tot_val2').innerHTML = data.total;
                          document.getElementById("sm-cartcnt").innerHTML = "";
                          document.getElementById("lg-cartcnt").innerHTML = "";
                          document.getElementById("sm-cartcnt").innerHTML = data.cartcnt;
                          document.getElementById("lg-cartcnt").innerHTML = data.cartcnt;
                          $('#total_rm_cnt').html(data.cartcnt);
                          if (data.cart == 0) {
                            swal({
                                title: "Empty!!!",
                                text: "Your cart is empty",
                                icon: "warning",
                                closeOnClickOutside: false,
                                dangerMode: true,
                              })
                              .then((willSubmit1) => {
                                if (willSubmit1) {
                                  location.href = "../Cart/cart.php";
                                  return;
                                } else {
                                  return;
                                }
                              });
                          }
                          /*
                          if(data.mulrow=="sin"){
                              $("#"+data.divhide).hide();
                              location.href="../Cart/cart.php";
                              return;
                          }*/
                          else {
                            $("." + data.divhide).fadeOut('slow', function(c) {
                              $("." + data.divhide).hide();
                              return;
                            });
                          }
                        } else {
                          swal({
                            title: "Try again!!!",
                            icon: "error",
                            dangerMode: true,
                            timer: 6000,
                          });
                          return;
                        }
                      },
                      error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
                        if (textstatus === "timeout") {
                          swal({
                            title: "Oops!!!",
                            text: "server time out",
                            icon: "error",
                            closeOnClickOutside: false,
                            dangerMode: true,
                            timer: 6000,
                          });
                          return;
                        } else {
                          return;
                        }
                      }
                    }); //closing ajax
                  } else {
                    return;
                  }
                });
            }
            //SELECT BOX OPERATION
            function select_product_option(store_id, product_description_id, tmrp) {
              var store_id = store_id;
              var product_description_id = product_description_id;
              var mrp = tmrp;
              old_value = $('#sel_s' + store_id + 'i' + product_description_id + ' :selected').val();
              if (old_value == '0') { //your specific condition
                remove_product(store_id, product_description_id);
                document.getElementById('sel_s' + store_id + 'i' + product_description_id).value = document.getElementById(
                  'sel_opt_s' + store_id + 'i' + product_description_id).value;
                return;
              } else if (old_value == '10') {
                $('#sel_s' + store_id + 'i' + product_description_id + '').hide();
                $('#qnty_s' + store_id + 'i' + product_description_id + '').show();
                $('#btn_s' + store_id + 'i' + product_description_id + '').hide();
              } else {
                total(store_id, product_description_id, mrp);
              }
            }
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            function sub_product_all(store_id, product_description_id, tmrp) {
              var store_id = store_id;
              var product_description_id = product_description_id;
              var mrp = tmrp;
              if (parseInt($('#btn_s' + store_id + 'i' + product_description_id).html()) != 1) {
                var sub = 0;
                sub = parseInt(document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML);
                document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = sub - 1;
                document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value = sub - 1;
                if ($('#btn_s' + store_id + 'i' + product_description_id).val() != 10) {
                  document.getElementById('btn_s' + store_id + 'i' + product_description_id).value = sub - 1;
                }
                if ($('#btn_s' + store_id + 'i' + product_description_id).val() > 10) {
                  select_product_option(store_id, product_description_id, mrp);
                }
              } else if (parseInt($('#btn_s' + store_id + 'i' + product_description_id).html()) == 1) {
                remove_product(store_id, product_description_id);
              }
              total(store_id, product_description_id, mrp);
            }

            function add_product_all(store_id, product_description_id, tmrp) {
              var store_id = store_id;
              var product_description_id = product_description_id;
              var mrp = tmrp;
              if (parseInt($('#btn_s' + store_id + 'i' + product_description_id).html()) != 0) {
                add = parseInt(document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML);
                document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = add + 1;
                document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value = add + 1;
                if ($('#btn_s' + store_id + 'i' + product_description_id).val() != 10) {
                  document.getElementById('sel_s' + store_id + 'i' + product_description_id).value = add + 1;
                }
                if ($('#btn_s' + store_id + 'i' + product_description_id).val() > 10) {
                  select_product_option(store_id, product_description_id, mrp);
                }
              } else if (parseInt($('#btn_s' + store_id + 'i' + product_description_id).html()) > 9) {
                select_product_option(store_id, product_description_id, tmrp)
              }
              total(store_id, product_description_id, mrp);
            }
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //PRICE AND CART SETTINGS
            $(document).ready(function() {});

            function total(store_id, product_description_id, tmrp) {
              var store_id = store_id;
              var product_description_id = product_description_id;
              var t_mrp = tmrp;
              var mrp = tmrp;
              if ($('#qnty_s' + store_id + 'i' + product_description_id).css('display') != 'none') {
                var qnty = parseInt(document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value);
                document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = qnty;
                document.getElementById('qnty_s' + store_id + 'i' + product_description_id).innerHTML = qnty;
              } else if ($('#sel_s' + store_id + 'i' + product_description_id).css('display') != 'none') {
                var qnty = document.getElementById('sel_s' + store_id + 'i' + product_description_id).value;
                document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = qnty;
              } else if ($('#btn_s' + store_id + 'i' + product_description_id).css('display') != 'none') {
                var qnty = document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML;
                if (qnty == 0) {
                  remove_product(store_id, product_description_id);
                }
              }
              if (qnty < 10) {
                $('#sel_s' + store_id + 'i' + product_description_id + '').hide();
                $('#qnty_s' + store_id + 'i' + product_description_id + '').hide();
                $('#btn_s' + store_id + 'i' + product_description_id + '').show();
                document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = qnty;
                $('#sel_s' + store_id + 'i' + product_description_id + ' option').filter(function() {
                  return ($(this).text() == qnty);
                }).prop('selected', true);
              }
              if (qnty >= 10) {
                $('#sel_s' + store_id + 'i' + product_description_id + '').hide();
                $('#btn_s' + store_id + 'i' + product_description_id + '').hide();
                $('#qnty_s' + store_id + 'i' + product_description_id + '').show();
              }
              if (qnty < 0) {
                qnty = qnty * -1;
              } else {
                qnty = qnty;
              }
              var price = document.getElementById('price_s' + store_id + 'i' + product_description_id).innerHTML;
              $.ajax({
                url: "../Common/functions.php", //passing page info
                data: {
                  "check_quantity": 1,
                  "product_description_id": product_description_id,
                  "store_id": store_id,
                  "quantity": qnty
                }, //form data
                type: "post", //post data
                dataType: "json", //datatype=json format
                timeout: 30000, //waiting time 30 sec
                success: function(data) { //if registration is success
                  if (data.status == 'avail') {
                    return;
                  } else if (data.status == 'notavail') {
                    document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value = data.max_qnty;
                    document.getElementById('sel_s' + store_id + 'i' + product_description_id).value = data.max_qnty;
                    document.getElementById('btn_s' + store_id + 'i' + product_description_id).innerHTML = data
                      .max_qnty;
                    if (data.max_qnty >= 10) {
                      document.getElementById('sel_s' + store_id + 'i' + product_description_id).value = 9;
                    } else if (data.max_qnty < 10) {
                      document.getElementById('sel_s' + store_id + 'i' + product_description_id).value = data
                        .max_qnty;
                      $('#sel_s' + store_id + 'i' + product_description_id + '').hide();
                      $('#qnty_s' + store_id + 'i' + product_description_id + '').hide();
                      $('#btn_s' + store_id + 'i' + product_description_id + '').show();
                    }
                    var t_amnt = price * data.max_qnty;
                    t_mrp = mrp * data.max_qnty;
                    document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = "";
                    document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = t_amnt;
                    document.getElementById('mrp_s' + store_id + 'i' + product_description_id).innerHTML = "";
                    document.getElementById('mrp_s' + store_id + 'i' + product_description_id).innerHTML = t_mrp;
                    var save = t_mrp - t_amnt;
                    var off = Math.round((save * 100) / t_amnt);
                    document.getElementById('save_s' + store_id + 'i' + product_description_id).innerHTML = save;
                    document.getElementById('off_s' + store_id + 'i' + product_description_id).innerHTML = off;
                    swal({
                        title: "Out of Stock!!!",
                        text: "Choose another store !!!",
                        icon: "warning",
                        closeOnClickOutside: false,
                        dangerMode: true,
                        timer: 6000,
                      })
                      .then((willSubmit1) => {
                        if (willSubmit1) {
                          return;
                        } else {
                          return;
                        }
                      });
                  }
                },
                error: function(xmlhttprequest, textstatus, message) { //if it exceeds timeout period
                  if (textstatus === "timeout") {
                    swal({
                      title: "Oops!!!",
                      text: "server time out",
                      icon: "error",
                      closeOnClickOutside: false,
                      dangerMode: true,
                      timer: 6000,
                    });
                    return;
                  } else {
                    return;
                  }
                }
              }); //closing ajax
              if (qnty > 0) {
                var total = price * qnty;
                var t_mrp = t_mrp * qnty;
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = "";
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = total;
                document.getElementById('mrp_s' + store_id + 'i' + product_description_id).innerHTML = t_mrp;
                var save = t_mrp - total;
                var off = Math.round((save * 100) / total);
                document.getElementById('save_s' + store_id + 'i' + product_description_id).innerHTML = save;
                document.getElementById('off_s' + store_id + 'i' + product_description_id).innerHTML = off;
              } else if (qnty == 0) {
                var total = price * 1;
                document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value = 1;
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = "";
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = total;
                document.getElementById('mrp_s' + store_id + 'i' + product_description_id).innerHTML = t_mrp;
                var save = t_mrp - total;
                var off = Math.round((save * 100) / total);
                document.getElementById('save_s' + store_id + 'i' + product_description_id).innerHTML = save;
                document.getElementById('off_s' + store_id + 'i' + product_description_id).innerHTML = off;
              } else if (qnty < 0) {
                document.getElementById('qnty_s' + store_id + 'i' + product_description_id).value = qnty * -1;
                var total = price * qnty * -1;
                var t_mrp = t_mrp * qnty * -1;
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = "";
                document.getElementById('total_s' + store_id + 'i' + product_description_id).innerHTML = total;
                document.getElementById('mrp_s' + store_id + 'i' + product_description_id).innerHTML = t_mrp;
                var save = t_mrp - total;
                var off = Math.round((save * 100) / total);
                document.getElementById('save_s' + store_id + 'i' + product_description_id).innerHTML = save;
                document.getElementById('off_s' + store_id + 'i' + product_description_id).innerHTML = off;
              }
            }
            //PRICE AND CART SETTINGS
          </script>
          </body>

          </html>