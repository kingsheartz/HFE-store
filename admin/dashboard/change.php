<?php
include "header.php";
?>

<body>
  <div class="wrapper">
    <?php
    include "navigationbar.php";
    ?>
    <style type="text/css">
      #close {
        position: relative;
        float: right;
        margin-right: 0px;
        margin-top: 0px;
        background: #FF0000;
        color: white;
        padding: 2px;
        border-radius: 1px;
        font-size: 24px;
        cursor: pointer;
      }

      .imgdis img {
        height: auto;
        width: auto;
        max-height: 190px;
        max-width: auto;
        display: block;
        margin: auto;
        image-rendering: auto;
        padding-top: 5px;
        transition: transform .2s;
        /* Animation */
      }

      .imgdis img:hover {
        transform: scale(1.5);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }

      .imgdis {
        position: relative;
        height: auto;
        min-height: 300px;
        overflow: auto;
        background: white;
        color: #000;
        overflow-x: hidden;
        box-shadow: 1px 1px 3px 3px rgb(0 0 0 / 10%);
      }

      .prim {
        position: relative;
        justify-content: center;
        height: auto;
        background: white;
        text-align: center;
        float: left;
        padding-top: 100px;
      }

      .imdeta {
        position: relative;
        float: left;
        margin: auto;
        display: block;
        padding: 0;
        text-align: center;
      }

      table,
      tr {
        width: 100%;
        text-align: center;
        vertical-align: middle;
      }

      th,
      td {
        width: 50%;
        text-align: center;
      }

      .float-value {
        position: relative;
      }

      .float-value input.form-control {
        height: 40px;
      }

      .float-value select.form-control {
        height: 40px;
        padding: 8px;
      }

      .float-value .form-control {
        height: 40px;
        padding: 12px;
        border: 2px solid black;
      }

      .float-value label {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #ff0000;
        padding-left: 12px;
        padding-right: 12px;
      }

      .float-value span {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #ff0000;
        padding-left: 12px;
        padding-right: 12px;
      }

      .form-group {
        position: relative;
        margin-top: 50px;
      }

      .newupdation {
        border-radius: 5px;
        width: 100%;
        height: auto;
        overflow: hidden;
        padding-top: 20px;
      }

      #message {
        padding: 20px;
        margin: auto;
        display: block;
      }

      .subb button {
        width: 200px;
        border-radius: 5px;
        height: 40px;
        border: none;
        color: #fff;
        margin-bottom: 12px;
      }

      @media (max-width: 768px) {

        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9 {
          width: 100%;
        }
      }

      .form-group {
        position: relative;
        width: 100%;
        float: left;
        margin: auto;
        display: block;
        margin-top: 30px;
      }

      .form-group .floating-label {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #390094;
        padding-left: 12px;
        padding-right: 12px;
        font-size: 12px;
      }

      .form-control {
        border: 2px solid black;
      }

      .checkbox {
        display: inline-flex;
        cursor: pointer;
        position: relative;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 5px;
        width: 100%;
      }

      .checkbox>span {
        color: #34495E;
        padding: 0.5rem 0.25rem;
        margin-left: 20px;
        width: 200px;
        text-align: left;
        font-size: 12px;
      }

      .checkbox>input {
        height: 25px;
        width: 25px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        appearance: none;
        border: 1px solid #34495E;
        border-radius: 20px;
        outline: none;
        transition-duration: 0.3s;
        background-color: #41B883;
        cursor: pointer;
      }

      .checkbox input[type=checkbox] {
        margin-left: 0;
        position: relative;
        width: 36px;
      }

      .checkbox>input:checked {
        border: 1px solid #41B883;
        background-color: #34495E;
      }

      .difrow {
        height: 350px;
        overflow: auto;
        width: 76vw;
        margin: auto;
        display: block;
        white-space: nowrap;
        bottom: 0;
      }

      .product {
        display: inline-block;
        text-align: center;
        padding: 5px;
        position: relative;
        height: 80px;
        width: 100px;
        border: 1px solid #dadada;
      }

      .left-arrow {
        position: absolute;
        bottom: 17%;
        right: 0;
        z-index: 1;
        height: 40px;
        background: transparent;
        border: none;
        font-size: 24px;
      }

      .right-arrow {
        position: absolute;
        bottom: 17%;
        left: 0;
        z-index: 1;
        height: 40px;
        background: transparent;
        border: none;
        font-size: 24px;
      }

      .imscr {
        height: 150px;
        overflow: auto;
        width: 300px;
        margin: auto;
        display: block;
        white-space: nowrap;
        bottom: 0;
        margin-top: 50px;
      }

      .checkbox>input:checked+span::before {
        content: '\2713';
        display: block;
        text-align: center;
        color: #41B883;
        position: absolute;
        left: 0.7rem;
        top: 0.2rem;
      }

      .checkbox>input:active {
        border: 2px solid #34495E;
      }

      .imscr::-webkit-scrollbar {
        display: none;
      }

      .thd {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        color: white;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #656463), color-stop(1, #171717)) !important;
        padding: 5px;
        border: 1px solid white;
        font-weight: bold;
        padding: 10px;
      }

      .col-sm-12 textarea {
        height: 200px;
        border: 1px solid #b1b1b1;
        border-radius: 5px;
        padding: 10px;
        white-space: pre-line;
      }

      .col-sm-12 {
        padding: 20px;
      }

      .imdeta .col-sm-12 {
        padding-top: 70px;
        min-height: 150px;
      }

      #close {
        position: relative;
        float: right;
        margin-right: 0px;
        margin-top: 0px;
        background: #FF0000;
        color: white;
        padding: 2px;
        border-radius: 1px;
        font-size: 24px;
        cursor: pointer;
      }

      .imgdis img {
        height: auto;
        width: auto;
        max-height: 190px;
        max-width: auto;
        display: block;
        margin: auto;
        image-rendering: auto;
        padding-top: 5px;
        transition: transform .2s;
        /* Animation */
      }

      .imgdis img:hover {
        transform: scale(1.5);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }

      .imgdis {
        color: white !important;
        position: relative;
        height: auto;
        min-height: 300px;
        overflow: auto;
        background: white;
        color: #000;
        overflow-x: hidden;
        box-shadow: 1px 1px 3px 3px rgb(0 0 0 / 10%);
      }

      .imgdis,
      .subb {
        background: #ffffff5e;
      }

      .prim {
        position: relative;
        justify-content: center;
        height: auto;
        background: white;
        text-align: center;
        float: left;
        padding-top: 100px;
      }

      .imdeta {
        position: relative;
        float: left;
        margin: auto;
        display: block;
        padding: 0;
        text-align: center;
      }

      table,
      tr {
        width: 100%;
        text-align: center;
        vertical-align: middle;
      }

      th,
      td {
        width: 50%;
        text-align: center;
      }

      .float-value {
        position: relative;
      }

      .float-value input.form-control {
        height: 40px;
      }

      .float-value select.form-control {
        height: 40px;
        padding: 8px;
      }

      .float-value .form-control {
        height: 40px;
        padding: 12px;
        border: 2px solid black;
      }

      .float-value label {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #ff0000;
        padding-left: 12px;
        padding-right: 12px;
      }

      .float-value span {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #ff0000;
        padding-left: 12px;
        padding-right: 12px;
      }

      .form-group {
        position: relative;
        margin-top: 50px;
      }

      .newupdation {
        border-radius: 5px;
        width: 100%;
        height: auto;
        overflow: hidden;
        padding-top: 20px;
      }

      #message {
        padding: 20px;
        margin: auto;
        display: block;
      }

      .subb button {
        width: 200px;
        border-radius: 5px;
        height: 40px;
        border: none;
        color: #fff;
        margin-bottom: 12px;
        margin-top: 15px;
      }

      @media (max-width: 768px) {

        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9 {
          width: 100%;
        }
      }

      .form-group {
        position: relative;
        width: 100%;
        float: left;
        margin: auto;
        display: block;
        margin-top: 30px;
      }

      .form-group .floating-label {
        position: absolute;
        top: -10px;
        background: white;
        left: 10px;
        font-weight: 700;
        color: #390094;
        padding-left: 12px;
        padding-right: 12px;
        font-size: 12px;
      }

      .form-control {
        border: 2px solid black;
      }

      .checkbox {
        display: inline-flex;
        cursor: pointer;
        position: relative;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 5px;
        width: 100%;
      }

      .checkbox>span {
        color: #34495E;
        padding: 0.5rem 0.25rem;
        margin-left: 20px;
        width: 200px;
        text-align: left;
        font-size: 12px;
      }

      .checkbox>input {
        height: 25px;
        width: 25px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        appearance: none;
        border: 1px solid #34495E;
        border-radius: 20px;
        outline: none;
        transition-duration: 0.3s;
        background-color: #41B883;
        cursor: pointer;
      }

      .checkbox input[type=checkbox] {
        margin-left: 0;
        position: relative;
        width: 36px;
      }

      .checkbox>input:checked {
        border: 1px solid #41B883;
        background-color: #34495E;
      }

      .difrow {
        height: 350px;
        overflow: auto;
        width: 76vw;
        margin: auto;
        display: block;
        white-space: nowrap;
        bottom: 0;
      }

      .product {
        display: inline-block;
        text-align: center;
        padding: 5px;
        position: relative;
        height: 80px;
        width: 100px;
        border: 1px solid #dadada;
      }

      .left-arrow {
        position: absolute;
        bottom: 17%;
        right: 0;
        z-index: 1;
        height: 40px;
        background: transparent;
        border: none;
        font-size: 24px;
      }

      .right-arrow {
        position: absolute;
        bottom: 17%;
        left: 0;
        z-index: 1;
        height: 40px;
        background: transparent;
        border: none;
        font-size: 24px;
      }

      .imscr {
        height: 150px;
        overflow: auto;
        width: 300px;
        margin: auto;
        display: block;
        white-space: nowrap;
        bottom: 0;
        margin-top: 50px;
      }

      .checkbox>input:checked+span::before {
        content: '\2713';
        display: block;
        text-align: center;
        color: #41B883;
        position: absolute;
        left: 0.7rem;
        top: 0.2rem;
      }

      .checkbox>input:active {
        border: 2px solid #34495E;
      }

      .imscr::-webkit-scrollbar {
        display: none;
      }

      .thd {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        color: white;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #656463), color-stop(1, #171717)) !important;
        padding: 5px;
        border: 1px solid white;
        font-weight: bold;
        padding: 10px;
      }

      .col-sm-12 textarea {
        height: 200px;
        border: 1px solid #b1b1b1;
        border-radius: 5px;
        padding: 10px;
        white-space: pre-line;
      }

      .col-sm-12 {
        padding: 20px;
      }

      .imdeta .col-sm-12 {
        padding-top: 10px;
        min-height: fit-content;
      }

      select {
        width: 100%;
        color: black;
        background: transparent;
      }

      .form-group input,
      .form-group select {
        height: 40px;
        padding-top: 10px;
        background-color: #00000080;
        color: white;
      }

      textarea.form-control {
        padding-top: 10px;
        background-color: #00000080;
        color: white;
      }

      .checkbox {
        display: inline-flex;
        cursor: pointer;
        position: relative;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 5px;
        width: 100%;
      }

      .checkbox>span {
        color: #34495E;
        padding: 0.5rem 0.25rem;
        margin-left: 20px;
        width: 200px;
        text-align: left;
        font-size: 12px;
      }

      .checkbox>input {
        height: 25px;
        width: 25px;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        appearance: none;
        border: 1px solid #34495E;
        border-radius: 20px;
        outline: none;
        transition-duration: 0.3s;
        background-color: #41B883;
        cursor: pointer;
      }

      .checkbox input[type=checkbox] {
        margin-left: 0;
        position: relative;
        width: 36px;
      }

      .checkbox>input:checked {
        border: 1px solid #41B883;
        background-color: #34495E;
      }

      .checkbox>input:checked+span::before {
        content: '\2713';
        display: block;
        text-align: center;
        color: #41B883;
        position: absolute;
        left: 0.7rem;
        top: 0.2rem;
      }

      .checkbox>input:active {
        border: 2px solid #34495E;
      }

      button[type="submit"] {
        width: 45%;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #2196f3), color-stop(1, #1497ff)) !important;
        color: white;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        float: left;
        height: 30px;
        font-size: 14px;
      }

      button[type="reset"] {
        width: 45%;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #000000), color-stop(1, #5c6e79)) !important;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        float: right;
        height: 30px;
        font-size: 14px;
      }

      button[type="reset"] {
        width: 45%;
        background: black;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        float: right;
        height: 30px;
        font-size: 14px;
      }

      button[type="submit"] {
        width: 45%;
        background: #337ab7;
        color: white;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 5px;
        float: left;
        height: 30px;
        font-size: 14px;
      }

      .element {
        padding: 0;
        background-color: #17212f;
        font-family: 'Lucida Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        box-shadow: 1px 1px 3px rgb(0 0 0 / 10%);
      }

      h4 {
        font-family: 'Lucida Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: normal;
        margin-bottom: 30px;
        background: #f9f9f924;
      }

      .hed {
        padding: 15px;
        border-bottom: 1px solid #505369;
        background: #17212f !important;
        color: white;
        width: 100%;
        font-size: 20px;
        font-family: 'Times New Roman';
      }

      #addpos {
        background: #196500;
        outline: none;
        color: white;
        border: none;
        width: 100px;
        height: 30px;
        font-size: 16px;
        border-radius: 5px;
        float: right;
      }

      .rempos {
        position: absolute;
        right: 0;
        background: #f00;
        outline: none;
        color: white;
        border: none;
        width: 100px;
        height: 30px;
        font-size: 16px;
        border-radius: 5px;
      }

      @media (max-width: 768px) {

        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9 {
          width: 100%;
        }
      }

      .form-group {
        position: relative;
        margin-top: 50px;
      }

      #position_fields .form-group {
        position: relative;
        width: 100%;
        float: left;
        margin: auto;
        display: block;
      }

      .form-group .floating-label {
        position: absolute;
        top: -20px;
        background: transparent;
        left: -5px;
        font-weight: 700;
        color: white;
        padding-left: 12px;
        padding-right: 12px;
        font-size: 12px;
        border: 0px;
      }

      .form-control {
        border: 0px solid black;
      }

      #position_fields .floating-label {
        display: none;
      }

      .element.col-sm-4 {
        float: right;
      }

      .addte {
        padding: 15px;
        border-bottom: 1px solid #383838;
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #17212f), color-stop(1, #17212f)) !important;
        color: white;
        width: 100%;
      }

      #myform {
        margin-top: 80px;
      }
    </style>
    <?php
    require "../../db.php";

    if (isset($_POST['cid'])) {
      echo "cid SET";
      $gt1 = $_POST['cid'];
      $rt1 = $_POST['price'];
      $des1 = $_POST['description'];
      $data8 = array(
        ':product_id' => $gt1,
        ':description' => $des1,
        ':price' => $rt1
      );
      $query6 = "UPDATE product SET description=:description, price=:price WHERE product_id=:product_id";
      $statement6 = $pdo->prepare($query6);
      print_r($statement6);
      $statement6->execute($data8);
    }

    if (isset($_POST['it_id'])) {
      if (isset($_POST['update_data'])) {
        $it_id = $_POST['it_id'];
        $size = isset($_POST['size' . $i]) ? $_POST['size' . $i] : 0;
        $weight = isset($_POST['weight' . $i]) ? $_POST['weight' . $i] : 0;
        if ($weight == '') {
          $weight = 0;
        }
        if ($size == '') {
          $size = 0;
        }
        $brand = isset($_POST['brand' . $i]) ? $_POST['brand' . $i] : 0;
        if ($brand == '') {
          $brand = 0;
        }

        $gt = $_POST['product_id'];
        $data = array(
          ':product_description_id' => $it_id,
          ':product_id' => $gt,
          ':size' => $size,
          ':weight' => $weight,
          ':brand' => $brand
        );
        $query1 = "UPDATE product_description SET
                    product_id=:product_id,
                    size=:size,
                    weight=:weight,
                    brand=:brand
                    WHERE product_description_id=:product_description_id ";
        $statement = $pdo->prepare($query1);
        $statement->execute($data);
      }

      if (isset($_POST['remove_data'])) {
        $it_id = $_POST['it_id'];
        $gt = $_POST['product_id'];
        $cat = $_POST['catid'];
        $query = "DELETE FROM product_description WHERE product_description_id=$it_id";
        $st = $pdo->query($query);
        $query1 = "SELECT * from product_description where product_id=$gt";
        $st1 = $pdo->query($query1);
        $gn = $st1->rowCount();

        if ($gn == 0) {
          $query2 = "DELETE FROM product WHERE product_id=$gt";
          $st2 = $pdo->query($query2);
        }
        $filename = $_POST['imfinm'];

        if (file_exists($filename)) {
          unlink($filename);
        }

        $count = $_POST['count'];

        if ($count != 0) {
          for ($i = 1; $i <= $count; $i++) {
            $filename = "../../images/" . $cat . "/" . $it_id . "_" . $i . ".jpg";
            if (file_exists($filename)) {
              unlink($filename);
            }
          }
        }
      }
    }
    ?>
    <script type="text/javascript">
      function conca(i) {
        console.log('helo');
        if ($('#' + i + 'w1').val() != 0) {
          var v1 = $('#' + i + 'w1').val() + ' ' + $('#' + i + 'w2').val();
          $('#' + i + 'w3').val(v1);
        }
      }

      function showupda(x, y) {
        $('#' + x).on("submit", function(e) {
          var dataString = new FormData(document.forms[0]);
          if (y == 1) {
            dataString.append('update_data', '1');
          } else if (y == 0) {
            dataString.append('remove_data', '1');
          }
          console.log(dataString);
          $.ajax({
            type: "POST",
            url: "change.php",
            data: dataString,
            contentType: false,
            cache: false,
            processData: true,
            success: function() {
              console.log('success');
              $("#" + x).html("<div id='message'></div>");
              $("#message")
                .hide()
                .fadeIn(1500, function() {
                  $("#message").append(
                    "<div class='alert alert-success'>Product Updated \
                        <button onclick='location.reload()' style='background: green;padding: 5px;border: none;color: white;border-radius: 5px;height: 30px;display: block;margin: auto;'>Refresh</button></div>"
                  );
                });
            },
            error: function() {
              console.log('error');
              $("#" + x).html("<div id='message'></div>");
              $("#message")
                .hide()
                .fadeIn(1500, function() {
                  $("#message").append(
                    "<div class='alert alert-danger'>Product Not Updated</div>"
                  );
                });
            },
          });
          e.preventDefault();
        });
        return false;
      }
    </script>
    <script type="text/javascript">
      function moveleft(x) {
        var y = $('#' + x).scrollLeft();
        var width = $('#' + x).outerWidth()
        var scrollWidth = $('#' + x)[0].scrollWidth;
        if (scrollWidth - width === y) {
          $('#' + x + '>.left-arrow').hide();
          return;
        }
        $('#' + x).scrollLeft(y + 100);
        $('#' + x + '>.right-arrow').show();
      }

      function moveright(x) {
        var y = $('#' + x).scrollLeft();
        $('#' + x + '>.left-arrow').show();
        if (y === 0) {
          $('#' + x + '>.right-arrow').hide();
        }
        $('#' + x).scrollLeft(y - 100);
      }

      function movefr(x) {
        var y = $('#' + x).scrollLeft();
        var width = $('#' + x).outerWidth()
        var scrollWidth = $('#' + x)[0].scrollWidth;
        if (scrollWidth - width === y) {
          $('#' + x + '>.left-arrow').hide();
        } else if (y === 0) {
          $('#' + x + '>.right-arrow').hide();
        } else {
          $('#' + x + '>.left-arrow').show();
          $('#' + x + '>.right-arrow').show();
        }
      }
    </script>
    <?php
    if (
      isset($_POST['pr_id']) || isset($_POST['im_url']) || isset($_POST['name']) ||
      isset($_POST['price']) || isset($_POST['description'])
    ) {
      require '../../db.php';
      $pr = $_POST['pr_id'];
      $img = $_POST['im_url'];
      $itna = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $it = $_POST['product_id'];
    ?>
      <div class="pr1" style="margin-top: 80px;">
        <div class="proupda ">
          <div class="newupdation">
            <span>
              <h4><?= $itna ?></h4>
            </span><br>
            <form id="productdesc" method="post">
              <div class="col-sm-12 imgdis" style="padding-top: 100px;position: relative;">
                <?php
                $query = "SELECT * FROM product  where product_id=$it";
                $st = $pdo->query($query);
                while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
                ?>
                  <div class="form-group" style="margin-bottom: 30px;">
                    <span class="floating-label">Price</span>
                    <input
                      name="price"
                      onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                      style="width: 100%;height: 40px;border-radius: 5px;outline: none;" value="<?= $row['price'] ?>">
                  </div>
                  <div class="form-group">
                    <span class="floating-label">Description</span>
                    <textarea name="description"><?= $row['description'] ?></textarea>
                  </div>
                  <input type="hidden" name="cid" value="<?= $it ?>">
                <?php
                }
                ?>
                <button name="update_data" style="font-weight: bold;float: right;background: #1336ff;margin-right: 12px;color: white;padding: 10px;border: none;border-radius: 5px;position: absolute;right: 0;top: 10px;" onclick="showupda('productdesc',1)">
                  <i class="fa fa-pencil" style="margin-right: 20px;float: left;font-size: 24px"></i>Update
                </button>
              </div>
            </form>
            <div class="row">
              <?php
              $query = "SELECT * FROM product JOIN product_description ON product.product_id=product_description.product_id where product_description.product_id=$it";
              $st = $pdo->query($query);
              while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <div class="col-sm-12">
                  <div class="imgdis">
                    <form id="<?= $row['product_description_id'] ?>" method="post" name="<?= $row['product_description_id'] ?>">
                      <div class="prim col-sm-5">
                        <div class="product" style="position: absolute;left: 10px;top: 55px;width: 100px;height: 100px;">
                          <img
                            style=" display: inline-block;text-align: center;padding: 14px;position: relative;height: 100px;max-width: 100px;"
                            onclick="$('#imr<?= $row['product_description_id'] ?>').attr('src', '../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg');"
                            src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                        </div>
                        <div style="width: 100%;height: 280px;margin-top: 80px;">
                          <img id="imr<?= $row['product_description_id'] ?>" src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                        </div>
                        <input type="hidden" name="imfinm" value="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>.jpg">
                        <input type="hidden" name="count" value="<?= $row['img_count'] ?>">
                        <input type="hidden" name="catid" value="<?= $row['category_id'] ?>">
                        <div class="imscr" id="imsrc<?= $row['product_description_id'] ?>" onscroll="movefr('imsrc<?= $row['product_description_id'] ?>')">
                          <button type="button" name="lfarr" class="left-arrow" onclick="moveleft('imsrc<?= $row['product_description_id'] ?>')">
                            <i class="fas fa-chevron-right"></i>
                          </button>
                          <button
                            type="button"
                            name="rfarr"
                            class="right-arrow"
                            onclick="moveright('imsrc<?= $row['product_description_id'] ?>')"
                            style="display: none;">
                            <i class="fas fa-chevron-left"></i>
                          </button>
                          <?php
                          $t = $row['img_count'];
                          for ($i = 1; $i <= $t; $i++) {
                          ?>
                            <div class="product">
                              <img
                                style="display: inline-block;text-align: center;padding: 14px;position: relative;height: 80px;max-width: 100px;"
                                onclick="$('#imr<?= $row['product_description_id'] ?>').attr('src', '../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>_<?= $i ?>.jpg');"
                                src="../../images/<?= $row['category_id'] ?>/<?= $row['product_description_id'] ?>_<?= $i ?>.jpg">
                            </div>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                      <div class="imdeta col-sm-7">
                        <label class="checkbox">
                          <input
                            class="form-control-check"
                            type="checkbox"
                            onclick="$('#<?= $row['product_description_id'] ?>size').toggle();$('#<?= $row['product_description_id'] ?>size1').toggle()"
                            name="check1"
                            id="<?= $row['product_description_id'] ?>check1"
                            value="size">
                          <span>Size</span>
                          <?php
                          if ($row['size'] != 0) {
                            $query1 = "SELECT * FROM size where size_id=" . $row['size'];
                            $st1 = $pdo->query($query1);
                            $row1 = $st1->fetch(PDO::FETCH_ASSOC);
                          ?>
                            <script type="text/javascript">
                              $('#<?= $row['product_description_id'] ?>check1').prop('checked', true);
                              $('#<?= $row['product_description_id'] ?>check1').attr('disabled', true);
                            </script>
                            <div class="form-group">
                              <select id="<?= $row['product_description_id'] ?>size" class="form-control" name="size">
                                <option value="<?= $row1['size_id'] ?>"><?= $row1['size_name'] ?></option>
                                <?php
                                $cat = $pdo->query("select * from size");
                                while ($row2 = $cat->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                  <option value="<?= $row2['size_id'] ?>"><?= $row2['size_name'] ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          <?php
                          } else {
                          ?>
                            <div class="form-group">
                              <select id="<?= $row['product_description_id'] ?>size" class="form-control" style="display:none;width: 100%" name="size">
                                <option value="">Select...</option>
                                <?php
                                $cat = $pdo->query("select * from size");
                                while ($row2 = $cat->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                  <option value="<?= $row2['size_id'] ?>"><?= $row2['size_name'] ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          <?php
                          } ?>

                          <label class="checkbox">
                            <input
                              type="checkbox"
                              class="form-control-check"
                              onclick="$('#<?= $row['product_description_id'] ?>w1').toggle();$('#<?= $row['product_description_id'] ?>w2').toggle();$('#<?= $row['product_description_id'] ?>weight1').toggle()"
                              name="check1"
                              id="<?= $row['product_description_id'] ?>check3"
                              value="weight">
                            <span>Weight</span>
                            <?php
                            if ($row['weight'] != 0) {
                              $we = $row['weight'];
                              $we3 = explode(' ', $we);
                            ?>
                              <script type="text/javascript">
                                $('#<?= $row['product_description_id'] ?>check3').prop('checked', true);
                                $('#<?= $row['product_description_id'] ?>check3').attr('disabled', true);
                              </script>
                              <div class="form-group">
                                <input
                                  type="number"
                                  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                  class="form-control"
                                  style="width:70%;border-right:none; float:left;"
                                  id="<?= $row['product_description_id'] ?>w1"
                                  onkeyup="conca(<?= $row['product_description_id'] ?>)"
                                  value="<?= $we3[0] ?>">
                                <select
                                  class="form-control"
                                  style="width:30%;float:left;color: white;background: #0B7383"
                                  id="<?= $row['product_description_id'] ?>w2"
                                  onchange="conca(<?= $row['product_description_id'] ?>)">
                                  <option value="<?= $we3[1] ?>" selected><?= $we3[1] ?></option>
                                  <option value="kg">kg</option>
                                  <option value="g">g</option>
                                  <option value="lt">lt</option>
                                  <option value="ml">ml</option>
                                </select>
                                <input type="hidden" id="<?= $row['product_description_id'] ?>w3" name="weight">
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class="form-group">
                                <input
                                  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                  type="number"
                                  class="form-control"
                                  style="display:none;width:70%;border-right:none;float:left;"
                                  id="<?= $row['product_description_id'] ?>w1"
                                  onkeyup="conca(<?= $row['product_description_id'] ?>)">
                                <select
                                  class="form-control"
                                  style="display:none;width:30%;float:left;color: white;background: #0B7383"
                                  id="<?= $row['product_description_id'] ?>w2"
                                  onchange="conca(<?= $row['product_description_id'] ?>)">
                                  <option value="kg">kg</option>
                                  <option value="g">g</option>
                                  <option value="lt">lt</option>
                                  <option value="ml">ml</option>
                                </select>
                                <input type="hidden" id="<?= $row['product_description_id'] ?>w3" name="weight">
                              </div>
                            <?php
                            }
                            ?>
                          </label>
                          <label class="checkbox">
                            <input
                              type="checkbox"
                              class="form-control-check"
                              onclick="$('#<?= $row['product_description_id'] ?>brand').toggle();$('#<?= $row['product_description_id'] ?>brand1').toggle()"
                              name="check1" id="<?= $row['product_description_id'] ?>check9"
                              value="brand">
                            <span>Brand</span>
                            <?php
                            if ($row['brand'] != 0) {
                              $query1 = "SELECT * FROM brand where brand_id=" . $row['brand'];
                              $st1 = $pdo->query($query1);
                              $row1 = $st1->fetch(PDO::FETCH_ASSOC);
                            ?>
                              <script type="text/javascript">
                                $('#<?= $row['product_description_id'] ?>check9').prop('checked', true);
                                $('#<?= $row['product_description_id'] ?>check9').attr('disabled', true);
                              </script>
                              <div class="form-group">
                                <span id="<?= $row['product_description_id'] ?>brand" class="floating-label" id="<?= $row['product_description_id'] ?>brand1">Brand</span>
                                <select class="form-control" name="brand">
                                  <option value="<?= $row1['brand_id'] ?>"><?= $row1['brand_name'] ?></option>
                                  <?php
                                  $cat = $pdo->query("select * from brand where category_id=" . $row['category_id']);
                                  while ($row2 = $cat->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                    <option value="<?= $row2['brand_id'] ?>"><?= $row2['brand_name'] ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class="form-group">
                                <select id="<?= $row['product_description_id'] ?>brand" placeholder="brand" class="form-control" style="display:none;width: 100%" name="brand">
                                  <option value="">Select...</option>
                                  <?php
                                  $cat = $pdo->query("select * from brand where category_id=" . $row['category_id']);
                                  while ($row2 = $cat->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                    <option value="<?= $row2['brand_id'] ?>"><?= $row2['brand_name'] ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            <?php
                            }
                            ?>
                          </label>
                          <input type="hidden" name="it_id" value="<?= $row['product_description_id'] ?>">
                          <input type="hidden" name="product_id" value="<?= $it ?>">
                      </div>
                      <div class="col-sm-12 subb" style="left: 0; padding: 0;">
                        <input type="hidden" name="check_id" value="<?= $row['product_description_id'] ?>">
                        <button name="update_data" style="font-weight: bold;float: right;background: green;margin-right: 12px;" onclick="showupda(<?= $row['product_description_id'] ?>,1)">
                          <i class="fas fa-pen-alt" style="margin-right: 20px;float: left;font-size: 24px"></i>Update
                        </button>
                        <button name="remove_data" style="font-weight: bold;float: right;background: red;margin-right: 5px;" onclick="showupda(<?= $row['product_description_id'] ?>,0)">
                          <i class="fas fa-trash" style="margin-right: 20px;float: left;font-size: 24px"></i>Remove
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <?php
    require "foot.php";
    ?>