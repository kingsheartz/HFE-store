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
    width: auto;
    height: auto;
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
    width: 400px;
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
</style>
<?php
//if(isset($_SESSION['id'])){
?>
<script>
  function getCookieset(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
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
<div class="slider-area" style="background-color: white;margin-top: 10px;">
  <!-- Slider -->
  <div class="block-slider block-slider4">
    <ul class="" id="bxslider-home4" style="height: 400px;background-color: rgba(255, 255, 255, 0.95);">
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
              <img src="../../images/slider/h4-slide<?= $i + 1 ?>.png" alt="Slide">
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
      background: black;
      border-radius: 5px;
      width: 100%;
      margin: 0;
      color: #a8a8a8;
      margin-top: 50px;
      font-size: 18px;
      font-family: sans-serif;
      font-weight: 600;
      text-transform: capitalize;
      padding: 20px;
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
      float: right;
      font-weight: 600;
      font-size: 12px;
      margin-right: 5px;
      margin-top: 0px;
      padding: 5px;
      width: 100px;
      background: #4a4a4a;
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
      <div class="ban-bottom-w3l">
        <div class="container">
          <div class="col-md-6 ban-bottom3">
            <div class="ban-top">
              <img src="../../images/p2.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products_limited.php?category_id=6'" />
            </div>
            <div class="ban-img">
              <div class=" ban-bottom1">
                <div class="ban-top">
                  <img src="../../images/p1.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products_limited.php?category_id=4'" />
                </div>
              </div>
              <div class="ban-bottom2">
                <div class="ban-top">
                  <img src="../../images/p3.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products_limited.php?category_id=6'" />
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-6 ban-bottom">
            <div class="ban-top">
              <img src="../../images/p4.jpg" class="img-responsive" alt="" onclick="location.href='../Product/products_limited.php?category_id=6'" />
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <!--banner-bottom-->
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