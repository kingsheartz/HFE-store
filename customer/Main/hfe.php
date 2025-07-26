<?php
require "header.php";
require "../Common/cookie.php";
?>

<style type="text/css">
  .cn-slider img {
    height: 150px;
  }

  body {
    background: #000000;
  }

  .block-slider img {
    width: -webkit-fill-available;
    height: -webkit-fill-available;
  }

  /*CATEGORY HORIZONTAL VIEW*/
  .cat-title a {
    width: 100%;
    transition: .3s;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding-top: 0px !important;
  }

  .cat-title a:hover {
    color: #139b3b;
  }

  p.cap_body {
    width: auto;
    text-align: justify;
    color: #ccc;
  }

  .block-slider .caption-group .primary {
    color: #ddd;

  }

  .block-slider .caption-group .primary strong {
    color: #139b3b !important;
  }

  .block-slider .cap_head {
    color: #eee !important;
  }

  .cat-img {
    width: 108px;
    margin-top: -15px;
  }

  .cat-img a {
    padding-bottom: 0px !important;
  }

  .cookiesetting {
    transition: 1s;
  }

  .owl-product {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    height: 100% !important;
  }

  .single-promo:hover p {
    color: #fff !important;
  }

  .deupd {
    height: -webkit-fill-available;
    text-overflow: ellipsis;
    padding-top: 25px;
    border-top: 1px solid #e8e8e8;
  }

  #bxslider-home4 {
    height: -webkit-fill-available;
  }
</style>
<?php
//if(isset($_SESSION['id'])){
?>
<script>
  $(document).ready(function() {
    //DELETE THIS COOKIE//document.cookie = "cookieset=; expires=Thu, 01 Jan 1970 00:00:00 UTC; ";
    if (getCookieset('cookieset') !== "y") {
      <?php
      if (isset($_SESSION['id'])) {
      ?>
        $.ajax({
          url: "../Common/functions.php", //passing page info
          data: {
            "getcookie": 1,
            "userid": <?= $_SESSION['id'] ?>
          }, //form data
          type: "post", //post data
          dataType: "json", //datatype=json format
          timeout: 30000, //waiting time 30 sec
          success: function(data) { //if registration is success
            if (data.status == 'success') {
              return;
            } else if (data.status == 'error') {
              $('.cookiesetting').css('display', 'flex');
              setTimeout(function() {
                $('.cookiesetting').css('bottom', 25);
              }, 500);
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
      } else {
      ?>
        $('.cookiesetting').css('display', 'flex');
        setTimeout(function() {
          $('.cookiesetting').css('bottom', 25);
        }, 500);
      <?php
      }
      ?>
    }
  });
  $(window).unload(function() {
    document.cookie = 'mainscrollTop=' + $(window).scrollTop();
  });
  var scrollTop = 'mainscrollTop';
</script>
<div
  style="display:none;position: fixed;bottom:-500px;width:100%;z-index:999;padding-left:5px;padding-right:5px;justify-content:center"
  class="cookiesetting">
  <center>
    <div style="padding:10px;border-radius:5px;background-color: rgba(0,0,0,0.85);max-width: max-content;text-align: left;">
      <h4 style="color: white;">Your privacy</h4>
      <p style="color:white;text-align: justify;">
        By clicking "Accept all cookies", you agree Stack Exchange can store
        cookies on your device and disclose information in accordance with our
        <a href="https://www.cookiesandyou.com/about-cookies/" target="_blank" style="color: white;">Cookie Policy</a>.
      </p>
      <button
        type="button"
        class="btn btn btn-primary"
        style="font-size:14px"
        onclick="$('.cookiesetting').hide();setcookie(1);"
        data-dismiss="modal">Accept all cookies
      </button>
      <button
        type="button"
        class="btn btn btn-success small-cookie-accept"
        onclick="$('#cookiemodal').modal('show');"
        style="font-size:14px"
        data-dismiss="modal">Customize settings
      </button>
    </div>
  </center>
</div>
<?php
//}
?>
<script>
  $(document).ready(function() {
    $('#customCarousel').carousel({
      interval: 3000 // Auto slide every 3 seconds
    });
    <?php
    if (isset($_SESSION['error_msg'])) {
    ?>
      swal({
        title: "Error",
        text: "<?= $_SESSION['error_msg'] ?>",
        icon: "error",
        closeOnClickOutside: false,
        dangerMode: true,
      }).then(() => {
        location.href = '../Account/logout.php';
      });
    <?php
      unset($_SESSION['error_msg']);
    }
    ?>
  });
</script>
<div class="slider-area" style="background-color: white;margin-top: 0px;">
  <!-- Slider -->
  <div class="block-slider block-slider4">
    <ul class="" id="bxslider-home4" style="background-color: rgba(255, 255, 255, 0.95);">
      <?php
      $slider = array(
        "Power /Precision /Performance //Built for serious runners, this treadmill delivers smooth, quiet operation and advanced tracking features.",
        " Run /With /Confidence //Engineered for stability and comfort, it's your go-to machine for consistent cardio training.",
        " Elevate /Your /Routine. //Achieve new goals with intuitive controls, powerful motor, and a spacious running surface.",
        " Built /For /Speed //From light jogs to intense sprints, this treadmill supports every pace with ease."
      );
      $i = 0;
      while ($i < sizeof($slider)) {
        unset($divider);
        unset($split);
        $divider = explode("//", $slider[$i]);
        $split = explode("/", $divider[0]);
      ?>
        <li>
          <div class="row captions">
            <div class="col-md-12 ">
              <img src="../../images/slider/h4-slide<?= $i + 1 ?>.png" style="max-width: 500px;" alt="Slide">
              <div class="caption-group" style="
								background: linear-gradient(135deg, rgba(0,0,0,0.75), rgba(30,30,30,0.65));
								backdrop-filter: blur(6px);
								padding: 24px;
								border-radius: 12px;
								border: 1px solid rgba(255,255,255,0.1);
								box-shadow: 0 8px 20px rgba(0,0,0,0.3);
								color: #fff;
							">
                <div class="cap_dyn">
                  <p class="cap_head">
                    <?= $split[0] ?> <span class="primary"><?= $split[1] ?> <strong><?= $split[2] ?></strong></span>
                  </p>
                  <p class="cap_body" style="font-family:Arial;"><?= $divider[1] ?></p>
                </div>
                <a class="button-radius" href="#"><span class="icon"></span>Shop now</a>
              </div>
            </div>
          </div>
        </li>
      <?php
        $i++;
      }
      ?>
    </ul>
  </div><br>
</div>
<!-- ./Slider -->
<div style="
  background: linear-gradient(135deg, rgba(20,20,20,0.95), rgba(35,35,35,0.85));
  color: #f1f1f1;
  padding: 24px 28px;
  padding-top: 0px;
  border-radius: 14px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(255,255,255,0.05);
">
  <br>
  <!-- //top-header and slider -->
  <!-- top-brands -->
  <?php
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //Generate Dynamic Loading
  function randomGenerate($min, $max, $quantity)
  {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
  }
  //Generate Dynamic Loading
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /*COLOR PICKER*/
  $color = array('scroll_handle_orange', 'scroll_handle_blue', 'scroll_handle_red', 'scroll_handle_cyan', 'scroll_handle_magenta', 'scroll_handle_green', 'scroll_handle_green1', 'scroll_handle_peach', 'scroll_handle_munsell', 'scroll_handle_carmine', 'scroll_handle_lightbrown', 'scroll_handle_hanblue', 'scroll_handle_kellygreen');
  $bgcolor = array('orange', '#139b3b', 'red', 'cyan', 'magenta', 'green', '#006622', '#FF6666', '#E6BF00', '#AB274F', '#C46210', '#485CBE', '#65BE00');
  do {
    $rancolor1 = array_rand($color, 1);
    $rancolor2 = array_rand($color, 1);
  } while ($rancolor1 == $rancolor2);
  $c1 = $c2 = "white";
  if ($bgcolor[$rancolor1] == "cyan" || $bgcolor[$rancolor1] == "#FF6666" || $bgcolor[$rancolor1] == "#E6BF00") {
    $c1 = "black";
  }
  if ($bgcolor[$rancolor2] == "cyan" || $bgcolor[$rancolor2] == "#FF6666" || $bgcolor[$rancolor2] == "#E6BF00") {
    $c2 = "black";
  }
  /*COLOR PICKER*/
  ?>

  <!-- //top-brands -->
  <style type="text/css">
    .difcat {
      position: relative;
      height: max-content;
      margin: auto;
      margin-top: 10px;
      display: block;
      background: transparent;
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

    .difhed {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: black;
      border-radius: 5px;
      width: 100%;
      margin: 0;
      color: #a8a8a8;
      margin-top: 30px;
      font-size: 18px;
      font-family: sans-serif;
      font-weight: 600;
      text-transform: capitalize;
      padding: 10px;
      box-shadow: 2px 1px 3px #656565;
      margin-bottom: 20px;
    }

    .block-slider .bx-pager-item a {
      width: 100%;
      height: 50%;
      background: #999;
      display: block;
      border-radius: 0;
    }

    .products-all-in-one {
      border-radius: 5px;
      display: inline-block;
      overflow: hidden;
      text-align: center;
      border: 1px solid #a8a8a8;
      padding: 0px;
      padding-bottom: 0px;
      position: relative;
      height: 275px;
      width: 250px;
      background: #000;
      color: #a8a8a8;
      margin-right: 20px;
    }

    .left-arrow-btn-all {
      position: absolute;
      top: 30%;
      left: 0;
      width: 30px;
      z-index: 1;
      height: 100px;
      font-size: 24px;
      border: none;
      border-bottom-right-radius: 4px;
      border-top-right-radius: 4px;
      border-top-left-radius: 6px;
      border-bottom-left-radius: 6px;
    }

    button.right-arrow-btn-all,
    button.left-arrow-btn-all {
      height: 40px;
      border-radius: 25px;
      font-size: 12px;
      width: 40px;
      top: 50%;
      color: white;
      background-color: black !important;
    }

    .right-arrow-btn-all {
      position: absolute;
      top: 30%;
      right: 0;
      width: 30px;
      z-index: 1;
      height: 100px;
      font-size: 24px;
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

    .star-checked {
      color: orange;
    }

    .stars-outer {
      display: inline-block;
      position: relative;
      font-family: FontAwesome;
      font-size: 20px;
      letter-spacing: 5px;
    }

    .stars-outer::before {
      content: "\f006 \f006 \f006 \f006 \f006";
    }

    .stars-inner {
      position: absolute;
      top: 0;
      left: 0;
      white-space: nowrap;
      overflow: hidden;
      width: 0;
    }

    .stars-inner::before {
      content: "\f005 \f005 \f005 \f005 \f005";
      color: orange;
    }

    .difhed button {
      font-weight: 600;
      font-size: 12px;
      margin-top: 0px;
      padding: 10px;
      padding-top: 5px;
      padding-bottom: 5px;
      background: #4a4a4a;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      border: none;
      color: white;
      border-radius: 5px;
    }
  </style>
  <link href="../CSS/hfe.css" rel="stylesheet">
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
  require "../../db.php";
  $query11 = "SELECT * from  category";
  $st11 = $pdo->query($query11);
  while ($row11 = $st11->fetch(PDO::FETCH_ASSOC)) {
    $ct = $row11['category_id'];
  ?>
    <?php
    //$query="SELECT * FROM product JOIN product_description ON product.product_id=product_description.product_id where product.category_id=$ct and (product.added_date) in (select max(added_date) as date from product) GROUP BY product_description.product_id LIMIT 15";
    $query = "SELECT * FROM product JOIN product_description ON product.product_id=product_description.product_id where product.category_id=$ct GROUP BY product_description.product_id LIMIT 15";
    $st = $pdo->query($query);
    $product = $st->rowCount();
    if ($product == 0) {
      continue;
    } else {
    ?>
      <div class="difcat " style="border-radius: 5px;padding-bottom:3px">
        <div class="difhed"><?= $row11['category_name'] ?>
          <button onclick="location.href='../Product/viewsubcat.php?category_id=<?= $ct ?>'">View All</button>
        </div>
        <div class="difrow hidescroll" id="difrow<?= $ct ?>" onscroll="scrolllisten('difrow<?= $ct ?>');">
          <button
            class="left-arrow-btn-all shadow_all_none"
            onclick="moveleft('difrow<?= $ct ?>')"
            style="display: none;">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="right-arrow-btn-all shadow_all_none" onclick="moveright('difrow<?= $ct ?>')">
            <i class="fas fa-chevron-right"></i>
          </button>
          <?php
          while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
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
      <!--banner-bottom-->
      <div class="advertise-container container-fluid px-3">
        <div class="row">
          <h2 class="section-title custom-header-h2">Engineered for Versatility. Built for Strength.</h2>
          <div class="advertise-image col-md-3 col-sm-6 col-3 mb-1">
            <div class="advertise">
              <img src="../../images/p4.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products.php?category_id=6'" />
            </div>
          </div>

          <div class="advertise-image col-md-3 col-sm-6 col-3 mb-1">
            <div class="advertise">
              <img src="../../images/p1.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products.php?category_id=6'" />
            </div>
          </div>

          <div class="advertise-image col-md-3 col-sm-6 col-3 mb-1">
            <div class="advertise">
              <img src="../../images/p2.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products.php?category_id=6'" />
            </div>
          </div>

          <div class="advertise-image col-md-3 col-sm-6 col-3 mb-1">
            <div class="advertise">
              <img src="../../images/p3.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products.php?category_id=6'" />
            </div>
          </div>
        </div>
      </div>
      <!--banner-bottom-->
      <!-- what we promise -->
      <div class="row what-we-promised">
        <h2 class="section-title custom-header-h2">What We Promised</h2>
        <div class="promised-card col-md-3 flex flex-col items-center justify-center p-6 text-center">
          <div class="animated-border-container shadow-lg">
            <div class="animated-border green">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <div class="animated-border black">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <img
              class="z-10 h-[26px] w-[26px] my-3 lg:w-[50px] lg:h-[50px]"
              alt=""
              src="data:image/svg+xml,%3csvg%20width='76'%20height='76'%20viewBox='0%200%2076%2076'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M14.25%2032.5068V19H61.75V32.5068C61.75%2042.5603%2061.75%2047.5871%2058.6584%2050.71C55.5668%2053.8333%2050.5907%2053.8333%2040.6388%2053.8333H35.3612C25.4092%2053.8333%2020.4333%2053.8333%2017.3416%2050.71C14.25%2047.5871%2014.25%2042.5603%2014.25%2032.5068Z'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M14.25%2019L16.5336%2014.1283C18.3048%2010.3499%2019.1903%208.46074%2020.9852%207.39706C22.7802%206.33337%2025.0827%206.33337%2029.6875%206.33337H46.3125C50.9175%206.33337%2053.2196%206.33337%2055.0148%207.39706C56.8097%208.46074%2057.6954%2010.3499%2059.4662%2014.1283L61.75%2019'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'/%3e%3cpath%20d='M33.25%2028.5H42.75'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'/%3e%3cpath%20d='M38.0002%2061.75V69.6667M38.0002%2061.75H22.1668M38.0002%2061.75H53.8335M22.1668%2061.75H14.2502C9.87791%2061.75%206.3335%2065.2944%206.3335%2069.6667M22.1668%2061.75V69.6667M53.8335%2061.75H61.7502C66.1224%2061.75%2069.6668%2065.2944%2069.6668%2069.6667M53.8335%2061.75V69.6667'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e">
            <h3 class="text-head font-[400] z-10">Premium Quality</h3>
            <p class="text-content z-10 text-[13px] mt-2">We bring you top-tier automotive products for you</p>
          </div>
        </div>
        <div class="promised-card col-md-3 flex flex-col items-center justify-center p-6 text-center">
          <div class="animated-border-container shadow-lg">
            <div class="animated-border green">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <div class="animated-border black">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <img
              class="z-10 h-[26px] w-[26px] my-3 lg:w-[50px] lg:h-[50px]"
              alt=""
              src="data:image/svg+xml,%3csvg%20width='76'%20height='76'%20viewBox='0%200%2076%2076'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M53.8335%2037.3809C53.8335%2036.2862%2053.8335%2035.739%2053.9982%2035.2513C54.477%2033.8339%2055.7392%2033.2842%2057.0036%2032.7081C58.4252%2032.0606%2059.1358%2031.7369%2059.84%2031.6799C60.6396%2031.6153%2061.4405%2031.7876%2062.1238%2032.1711C63.0298%2032.6793%2063.6616%2033.6455%2064.3085%2034.4311C67.2959%2038.0595%2068.7893%2039.874%2069.3359%2041.8747C69.777%2043.4891%2069.777%2045.1775%2069.3359%2046.7919C68.5389%2049.71%2066.0204%2052.1562%2064.1562%2054.4204C63.2027%2055.5784%2062.7258%2056.1576%2062.1238%2056.4955C61.4405%2056.879%2060.6396%2057.0513%2059.84%2056.9867C59.1358%2056.9297%2058.4252%2056.606%2057.0036%2055.9584C55.7392%2055.3824%2054.477%2054.8327%2053.9982%2053.4153C53.8335%2052.9276%2053.8335%2052.3804%2053.8335%2051.2857V37.3809Z'%20stroke='%23E8CA2C'%20stroke-width='3'/%3e%3cpath%20d='M22.1668%2037.3812C22.1668%2036.0031%2022.1281%2034.7643%2021.0139%2033.7953C20.6086%2033.4428%2020.0713%2033.1981%2018.9967%2032.7085C17.5752%2032.0612%2016.8644%2031.7376%2016.1602%2031.6806C14.0472%2031.5096%2012.9104%2032.9517%2011.6919%2034.4318C8.70454%2038.0602%207.21085%2039.8743%206.66429%2041.875C6.22323%2043.4897%206.22323%2045.1782%206.66429%2046.7926C7.46146%2049.7106%209.97998%2052.1566%2011.8442%2054.4211C13.0192%2055.8483%2014.1418%2057.1504%2016.1602%2056.9873C16.8644%2056.9303%2017.5752%2056.6064%2018.9967%2055.9591C20.0713%2055.4695%2020.6086%2055.2248%2021.0139%2054.8723C22.1281%2053.9033%2022.1668%2052.6648%2022.1668%2051.2864V37.3812Z'%20stroke='%23E8CA2C'%20stroke-width='3'/%3e%3cpath%20d='M63.3332%2033.25V28.5C63.3332%2016.2577%2051.9911%206.33337%2037.9998%206.33337C24.0086%206.33337%2012.6665%2016.2577%2012.6665%2028.5V33.25'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M63.3333%2055.4166C63.3333%2069.6666%2050.6667%2069.6666%2038%2069.6666'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e">
            <h3 class="text-head font-[400] z-10">24/7 Support</h3>
            <p class="text-content z-10 text-[13px] mt-2">Our team is here to support you 24 hours a day, 7 days a week.</p>
          </div>
        </div>
        <div class="promised-card col-md-3 flex flex-col items-center justify-center p-6 text-center">
          <div class="animated-border-container shadow-lg">
            <div class="animated-border green">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <div class="animated-border black">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <img
              class="z-10 h-[26px] w-[26px] my-3 lg:w-[50px] lg:h-[50px]"
              alt=""
              src="data:image/svg+xml,%3csvg%20width='69'%20height='69'%20viewBox='0%200%2069%2069'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M63.25%2033.0625V17.5777C63.25%2015.3036%2063.25%2014.1666%2062.692%2012.994C62.3737%2012.3253%2061.6486%2011.4156%2061.0679%2010.956C60.0495%2010.1502%2059.1997%209.95558%2057.5%209.56627C54.8559%208.96066%2051.9395%208.625%2048.875%208.625C43.3633%208.625%2038.3309%209.71072%2034.5%2011.5C30.6691%2013.2893%2025.6366%2014.375%2020.125%2014.375C17.0605%2014.375%2014.1441%2014.0393%2011.5%2013.4337C8.74009%2012.8016%205.75%2014.7463%205.75%2017.5777V48.5472C5.75%2050.8214%205.75%2051.9584%206.30809%2053.1309C6.62639%2053.7996%207.35126%2054.7095%207.93207%2055.1689C8.95042%2055.9748%209.8003%2056.1694%2011.5%2056.5587C14.1441%2057.1645%2017.0605%2057.5%2020.125%2057.5C24.3479%2057.5%2028.2895%2056.8626%2031.625%2055.7598'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'/%3e%3cpath%20d='M40.25%2054.625C40.25%2054.625%2043.125%2054.625%2046%2060.375C46%2060.375%2055.1324%2046%2063.25%2043.125'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M41.6875%2033.0625C41.6875%2037.032%2038.4695%2040.25%2034.5%2040.25C30.5305%2040.25%2027.3125%2037.032%2027.3125%2033.0625C27.3125%2029.093%2030.5305%2025.875%2034.5%2025.875C38.4695%2025.875%2041.6875%2029.093%2041.6875%2033.0625Z'%20stroke='%23E8CA2C'%20stroke-width='3'/%3e%3cpath%20d='M15.8125%2035.9375V35.9634'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M53.1875%2030.165V30.1909'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e">
            <h3 class="text-head font-[400] z-10">Secure Payment</h3>
            <p class="text-content z-10 text-[13px] mt-2">Pay seamlessly using UPI, Debit &amp; Credit Cards.</p>
          </div>
        </div>
        <div class="promised-card col-md-3 flex flex-col items-center justify-center p-6 text-center">
          <div class="animated-border-container shadow-lg">
            <div class="animated-border green">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <div class="animated-border black">
              <span class="top"></span>
              <span class="right"></span>
              <span class="bottom"></span>
              <span class="left"></span>
            </div>
            <img
              class="z-10 h-[26px] w-[26px] my-3 lg:w-[50px] lg:h-[50px]"
              alt=""
              src="data:image/svg+xml,%3csvg%20width='70'%20height='70'%20viewBox='0%200%2070%2070'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M35.0001%2064.1667C47.8868%2064.1667%2058.3334%2053.7201%2058.3334%2040.8334C58.3334%2023.3334%2035.0001%205.83337%2035.0001%205.83337C33.8675%2013.0869%2032.7586%2016.9796%2029.1667%2023.3334C25.6641%2021.7143%2024.7917%2020.4167%2023.3334%2016.7709C17.5001%2023.3334%2011.6667%2032.0834%2011.6667%2040.8334C11.6667%2053.7201%2022.1134%2064.1667%2035.0001%2064.1667Z'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linejoin='round'/%3e%3cpath%20d='M29.1667%2049.5833L40.8334%2037.9166'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M29.1667%2037.9166H29.193M40.8072%2049.5833H40.8334'%20stroke='%23E8CA2C'%20stroke-width='3'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e">
            <h3 class="text-head font-[400] z-10">Unbeatable Prices</h3>
            <p class="text-content z-10 text-[13px] mt-2">Get the best deals without compromising on quality.</p>
          </div>
        </div>
      </div>
      <!-- what we promise -->
      <?php
      if (isset($_SESSION['id'])) {
        $presql = "select product_description_id from product_keys WHERE rating=0 AND ordered_cnt>0 AND review= '0' and customer_id=" . $_SESSION['id'];
        $prest = $pdo->query($presql);
        $precnt = $prest->rowCount();
        if ($precnt > 0) {
      ?>
          <!-- new -->
          <div class="newproducts-w3agile" style="padding:0;padding-top:10px;">
            <h3>Previously Purchased</h3>
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
            <h4 class="show_cat_list_main tb-padding sidebar-title cart_empty_show_cat" style="border-left: 5px solid <?= $bgcolor[$rancolor1] ?>;border-top-left-radius: 10px;text-align: left;padding-bottom: 10px;padding-top: 10px;background-color: white;font-weight:normal;border-bottom:#333;margin-bottom: -5px;margin-top: 13px;border-top-right-radius: 10px;color: black;text-transform: capitalize;padding-left: 10px; overflow: hidden;font-size: 18px;">
              Rate this <i style="color: #ff5722;" class="fa fa-arrow-right"></i>
              <span style="float: right;margin-right: 5px;margin-top: -4px;">
                <button
                  type="button"
                  style="max-width: 150px;height: 30px;font-weight: bold;border-top-right-radius: 10px;background-color: <?= $bgcolor[$rancolor1] ?>;padding: 11px auto;font-size: 12px;"
                  name="proceed"
                  class="checkout-button button alt wc-forward">
                  <a href="../Product/diff_views.php?prev=1" style="color:<?= $c2 ?>;">View all</a>
                </button>
              </span>
            </h4>
            <div class="difcat " style="border-radius: 5px;">
              <div class="difrow hidescroll" id="difrow<?= $prerow['product_description_id'] ?>" onscroll="scrolllisten('difrow<?= $prerow['product_description_id'] ?>');">
                <button class="left-arrow-btn-all shadow_all_none" onclick="moveleft('difrow<?= $prerow['product_description_id'] ?>')" style="display: none;">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="right-arrow-btn-all shadow_all_none" onclick="moveright('difrow<?= $prerow['product_description_id'] ?>')">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <?php
                while ($prerow = $prest->fetch(PDO::FETCH_ASSOC)) {
                  $ran = $pdo->query(
                    "select * from product_description
                      inner join product on product.product_id=product_description.product_id
                      inner join category on category.category_id=product.category_id
                      where product.category_id=category.category_id and product_description_id=" . $prerow['product_description_id']
                  );
                  $row = $ran->fetch(PDO::FETCH_ASSOC);
                ?>
                  <div class="products-all-in-one" title="<?= $row['product_name'] ?>"
                    onclick="location.href='../Product/single.php?id=<?= $row['product_description_id'] ?>'">
                    <div
                      style="display: flex;justify-content: center;height: 200px;width:100%;background: white;text-align: center;">
                      <img class="image" align="middle"
                        src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                    </div>
                    <?php
                    if (strlen($row['product_name']) >= 22) {
                      $product = $row['product_name'];
                      $product_name = substr($product, 0, 25) . "...";
                    } else {
                      $product_name = $row['product_name'];
                    }
                    ?>
                    <div class="deupd"><?= $product_name ?><br>
                    </div>
                  </div>
                <?php
                }
                echo '</div></div>';
                ?>
                <div class="clearfix"> </div>
              </div>
              <!-- //new -->
          <?php
        }
      }
          ?>
          <!-- end sweet section -->
          <style>
            .diro {
              padding-left: 5px;
              padding-right: 5px;
              padding-bottom: 30px;
            }

            .indi {
              width: 100%;
              background: white;
              margin-top: 20px;
              position: relative;
              padding: 10px;
              background: #fdfdfdfa;
            }

            @media(min-width:992px) {
              .indi {
                height: 400px;
              }

              .divmain {
                height: 500px;
              }
            }

            @media(max-width:991px) {
              .divmain {
                padding-bottom: 30px;
              }
            }

            .in11,
            .in12,
            .in13,
            .in14,
            .in21,
            .in22,
            .in23,
            .in31,
            .in32,
            .in33 {
              justify-content: center;
              display: flex;
              background: white;
            }

            .in1 {
              padding-bottom: 20px;
            }

            .in img {
              width: 100%;
              height: 100%;
            }

            .in2 {
              padding-bottom: 20px;
            }

            .in3 {
              padding-bottom: 20px;
            }

            .indi h3 {
              font-family: 'Font Awesome 5 Free';
              text-align: center;
              height: 60px;
            }

            .fill_box {
              background-color: #000000;
              color: #ffffff;
              -webkit-transition: all 0.3s;
              transition: all 0.3s;
            }

            .fill a {
              display: inline-block;
              padding: 7px 35px;
              border: 1px solid #ffffff;
              background-color: #000000;
              color: #ffffff;
              font-size: 15px;
            }

            .fill a:hover {
              background-color: #ffffff;
              color: #000000;
            }

            .fill {
              position: absolute;
              left: 0;
              bottom: 0;
              width: 100%;
              height: 100%;
              opacity: 0;
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
              -ms-flex-direction: column;
              flex-direction: column;
              -webkit-box-align: center;
              -ms-flex-align: center;
              align-items: center;
              -webkit-box-pack: center;
              -ms-flex-pack: center;
              justify-content: center;
              -webkit-transition: all 0.3s;
              transition: all 0.3s;
            }

            .in1:hover .fill,
            .in2:hover .fill,
            .in3:hover .fill {
              bottom: 0;
              opacity: 0.9;
            }

            @media(max-width:767px) {
              .divmain {
                padding-bottom: 0;
              }

              .indi {
                margin-top: 0;
                padding-top: 0;
                ;
              }
            }

            @media(max-width:484px) {
              .difhed {
                font-size: 14px;
              }

              .difhed button{
                font-size: 10px;
              }
            }

            .fa-star.active {
              color: orange;
            }
          </style>
          <!-- //new -->

            </div>
            <?php
            require "footer.php";
            ?>
            </body>

            </html>