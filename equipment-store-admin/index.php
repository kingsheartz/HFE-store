<?php
require "head.php";
?>
<style>
  .list-group-item-text {
    float: left;
    height: 20px;
    text-overflow: ellipsis;
    padding: 0px;
    overflow: hidden;
    color: #7c7c7c;
    padding-right: 30px;
    text-overflow: ellipsis;
  }
</style>

<body>
  <div class="wrapper">
    <?php
    include "head1.php";
    ?>
    <div class="main-frame">
      <div class="row">
        <div class="col-sm-2 cart">
          <div class="well">
            <div class="well-box">
              <div class="well-text ">
                <?php
                require "pdo.php";
                //no of categories
                $cat = $pdo->query("select distinct category_name from category");
                $catn = $cat->rowCount();
                //no of products
                $id = $_SESSION['id'];
                $pro = $pdo->query(
                  "SELECT * FROM product
                  JOIN product_description ON product.product_id=product_description.product_id
                  where product_description.product_description_id
                  IN (SELECT product_description_id FROM product_details where store_id=$id )"
                );
                $product = $pro->rowCount();
                //new item
                $new = $pdo->query("select  * from product where (added_date) in (select max(added_date) as date from product) ");
                $new_it = $new->rowCount();
                //new orders
                $id = $_SESSION['id'];
                $stmt = $pdo->query(
                  "select *  FROM new_orders
                  JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
                  JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
                  JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
                  JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
                  JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
                  JOIN product_description ON product_details.product_description_id=product_description.product_description_id
                  JOIN product ON product.product_id=product_description.product_id
                  JOIN category ON category.category_id=product.category_id
                  JOIN store on store.store_id=product_details.store_id
                  WHERE new_ordered_products.delivery_status='pending' and product_details.store_id=$id"
                );
                $stmtn = $stmt->rowCount();
                ?>
                <p class="num"><?= $catn ?></p>
                <h4>Categories</h4>
              </div>
              <div class="ban-top">
                <i class="fas fa-th"></i>
              </div>
            </div>
            <div class="new-text">
              <a href="categories.php" class="text-under"> <span>Details</span><span><i
                    class="fa fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-sm-2 cart">
          <div class="well">
            <div class="well-box">
              <div class="well-text ">
                <p class="num"><?= $product ?></p>
                <h4>Products</h4>
              </div>
              <div class="ban-top">
                <i class="fas fa-box"></i>
              </div>
            </div>
            <div class="new-text">
              <a href="products.php" class="text-under"> <span>Details</span><span><i
                    class="fa fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-sm-2 cart">
          <div class="well">
            <div class="well-box">
              <div class="well-text ">
                <p class="num"><?= $new_it ?></p>
                <h4>New </h4>
              </div>
              <div class="ban-top">
                <i class="fas fa-plus"></i>
              </div>
            </div>
            <div class="new-text">
              <a href="new_item.php" class="text-under"><span>Details</span><span><i
                    class="fa fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
        <div class="col-sm-2 cart">
          <div class="well">
            <div class="well-box">
              <div class="well-text ">
                <p class="num"><?= $stmtn ?></p>
                <h4>Orders</h4>
              </div>
              <div class="ban-top">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
            <div class="new-text">
              <a href="neworders.php" class="text-under">
                <span>Details</span>
                <span><i class="fa fa-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="calendar-div" class="col-sm-4">
          <h4><i class="fas fa-calendar" style="padding-right: 20px"></i>Calendar</h4>
          <?php
          require "calender.php";
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" id="mainPieChart">
          <h4>
            <i class="fa fa-pie-chart" style="padding-right: 20px"></i>Average Day
          </h4>
          <div id="piechart" style="width: 100%;overflow-x: hidden;justify-content:center;display:flex;"></div>
        </div>
        <br><br><br>
        <div class="row" style="margin-bottom: 70px;">
          <div class="panel-group col-sm-4">
            <div class="panel panel-default">
              <a data-toggle="collapse" href="#collapse1">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    To Do List
                  </h4>
                </div>
              </a>
              <div id="collapse1" class="panel-collapse collapse in">
                <ul class="list-group">
                  <?php
                  include "todolist.php";
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <style>
            #collapse2 table,
            tr {
              width: 100%;
            }

            #collapse2 th,
            td {
              text-align: center;
              width: 32%;
              padding-left: 2%;
              padding-right: 2%;
            }

            #collapse2 ul li.active>a,
            a[aria-expanded="true"] {
              text-decoration: none;
              border-left: none;
            }

            .price {
              position: absolute;
              top: 8px;
              right: 0;
              border-radius: 5px;
              border: none;
              height: 20px;
              color: #ffffff;
              font-size: 10px;
              font-weight: bolder;
              width: 50px;
            }

            .panel-heading {
              padding: 0px;
              color: white;
              background-color: #17212f;
              height: 50px;
            }

            h4.panel-title {
              height: 49px;
              z-index: 20;
            }

            .vwbt {
              position: absolute;
              float: right;
              top: 10px;
              right: 0;
              border-radius: 5px;
              border: none;
              height: 30px;
              background: #606060;
              color: white;
            }

            li.list-group-item:nth-child(odd) {
              background: #f9f9f9;
            }

            li.list-group-item {
              border: none;
            }

            img.smimg {
              height: auto;
              max-width: 20px;
              max-height: 60px;
              width: auto;
            }

            .panel-default>.panel-heading {
              color: #333;
              background-color: #17212f;
              border-color: #ddd;
            }
          </style>
          <?php
          $colors = array("red", "green", "#7d7d7d", "black", "#000c96", "dodgerblue", "#ff9800"); ?>
          <div class="panel-group recently-added">
            <div class="panel panel-default">
              <a data-toggle="collapse" href="#collapse2">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    Recently Added Products
                  </h4>
                  <a href="new_product.php"><button class="vwbt">View All</button></a>
                </div>
              </a>
              <div id="collapse2" class="panel-collapse collapse in">
                <ul class="list-group">
                  <?php
                  $stmt = $pdo->query("select * from product
                    join product_description on product_description.product_id=product.product_id
                    where product.added_date in (select max(added_date) as date from product) LIMIT 2"
                  );
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <li class="list-group-item" style="display: flex;">
                      <div style="width:70px">
                        <img class="smimg" src="../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                      </div>
                      <div class="list-group-item-text">
                        <?= $row['product_name'] ?>
                        <button class="price" style="background:<?= $colors[array_rand($colors)] ?>;">
                          <i class="fas fa-rupee-sign"></i> <?= $row['price'] ?>
                        </button>
                      </div>
                    </li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          var clients;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              clients = JSON.parse(this.responseText);
            }
          };
          xmlhttp.open("GET", "piechart.php", true);
          xmlhttp.send();
          // Load google charts
          google.charts.load('current', {
            'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);
          setInterval(drawChart, 1000);
          // Draw the chart and set the chart values
          function drawChart() {
            var result = [];
            result.push(['customer', parseInt(clients[0].customer)]);
            result.push(['selled', parseInt(clients[1].selled)]);
            result.push(['neworders', parseInt(clients[2].neworders)]);
            result.push(['newproducts', parseInt(clients[3].newproducts)]);
            console.log(result);
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows(result);
            // Optional; add a title and set the width and height of the chart
            var options = {
              backgroundColor: 'transparent',
              'is3D': true,
              'legend': 'left',
              color: 'white',
              position: 'center',
              'width': 450,
              'height': 450,
              pieHole: 0.6,
              pieSliceText: 'label',
              pieSliceTextStyle: {
                color: 'white'
              },
              legend: {
                textStyle: {
                  color: 'white'
                }
              },
              titleTextStyle: {
                color: 'white'
              },
              tooltip: {
                textStyle: {
                  color: 'white'
                }
              },
              slices: {
                0: {
                  offset: 0.1
                },
                1: {
                  offset: 0.1
                },
                2: {
                  offset: 0.1
                },
                3: {
                  offset: 0.1
                }
              }
            };
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }
        </script>
        <?php
        require "foot.php";
        ?>
      </div>
    </div>
  </div>
  </div>