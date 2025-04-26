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
      $('#selledproductsphp').addClass('active');
    </script>
    <style>
      .excelbt {
        padding: 10px;
        text-decoration: none;
        color: white;
        border-radius: 5px;
        margin: 10px;
        background: green;
      }

      .pdfbt {
        padding: 10px;
        text-decoration: none;
        color: white;
        border-radius: 5px;
        margin: 10px;
        background: red;
      }

      @media print {

        table,
        tr {
          width: 100%;
        }

        tr {
          border-bottom: 1px solid;
        }
      }
    </style>
    <?php
    $id = $_SESSION['id'];
    require "pdo.php";
    echo "<scrippt>var id=$id</script>";
    $stmt = $pdo->query("select sum(new_orders.sub_total)  FROM new_orders
JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
JOIN product_description ON product_details.product_description_id=product_description.product_description_id
JOIN product ON product.product_id=product_description.product_id
JOIN category ON category.category_id=product.category_id
JOIN store on store.store_id=product_details.store_id
WHERE new_ordered_products.delivery_status='completed' and store.store_id=$id");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="table1">
      <h4 style="margin-top: 30px;margin-bottom:50px;border-bottom:  1px solid#E3E3E3;padding:10px;"><i
          class="fas fa-clipboard-check" style="font-size: 24px;padding-right: 12px" aria-hidden="true"></i>Selled
        Products </h4>

      <br><br>
      <div id="jsGrid"></div><br><br><br>
      <a class="excelbt" href="javascript:void(0);" onclick="printPageArea('jsGrid')">Print to Excel</a>
      <a class="pdfbt" href="javascript:void(0);" onclick="printPage()">Print to PDF</a>
      <br><br>
    </div>
    <script>
      function tblpr() {
        var data = $("#jsGrid").jsGrid("option", "data");
        //var result = JSON.stringify(data);
        console.log(data[0]);
        var tot = $('#sumid').text();
        var p = "";
        p += "<table><tr>\
<th>OrderId</th>\
<th>Product</th>\
<th>Order Date</th>\
<th>Delivered Date</th>\
<th>UserId</th>\
<th>Status</th>\
<th>Total Amount</th></tr>\
";
        for (var i = 0; i < data.length; i++) {
          p += "<tr>\
  <td align='center' >"+ data[i].new_ordered_products_id + "</td>\
<td align='center'>"+ data[i].item_name + "</td>\
<td align='center'>"+ data[i].order_date + "</td>\
<td align='center'>"+ data[i].delivery_date + "</td>\
<td align='center'>"+ data[i].user_id + "</td>\
<td align='center'>"+ data[i].delivery_status + "</td>\
<td align='center'>"+ data[i].total_amt + "</td></tr>";
        }
        p += "<tr  style='border-top:1px solid;padding:30px'><th align='center' colspan='7'>All Total Rupees " + tot + " only</th align='center'></table>";
        return p;
      }
      //Excel printing
      function printPageArea(areaID) {
        p = tblpr();
        window.open('data:application/vnd.ms-excel;base64,' + base64_encode(p));
      }
      function base64_encode(data) {
        var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
          ac = 0,
          enc = "",
          tmp_arr = [];
        if (!data) {
          return data;
        }
        do { // pack three octets into four hexets
          o1 = data.charCodeAt(i++);
          o2 = data.charCodeAt(i++);
          o3 = data.charCodeAt(i++);
          bits = o1 << 16 | o2 << 8 | o3;
          h1 = bits >> 18 & 0x3f;
          h2 = bits >> 12 & 0x3f;
          h3 = bits >> 6 & 0x3f;
          h4 = bits & 0x3f;
          // use hexets to index into b64, and append result to encoded string
          tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
        } while (i < data.length);
        enc = tmp_arr.join('');
        var r = data.length % 3;
        return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
      }
      //pdf printing
      function printPage() {
        p = tblpr();
        var printWin = window.open('', '', 'left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status  =0');
        printWin.document.write(p);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
      }
      $("#jsGrid").jsGrid({
        height: "auto",
        width: "100%",
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 5,
        controller: {
          loadData: function (filter) {
            console.log(filter);
            return $.ajax({
              type: "GET",
              url: "getselled.php",
              data: filter,
              dataType: "json"
            });
          }
        },
        fields: [
          { name: "product_name", title: "Products", type: "text", width: 200 },
          { name: "customer_id", title: "UserId", type: "text", width: 150 },
          { name: "order_type", title: "Order Type", type: "text", width: 150 },
          { name: "order_date", title: "Order Date", type: "text", width: 150 },
          { name: "delivery_date", title: "Delivered Date", type: "text", width: 150 },
          { name: "total_amt", title: "Total", type: "text", width: 150 },
        ]
      });
    </script>
    <?php
    require "foot.php";
    ?>
  </div>
</body>