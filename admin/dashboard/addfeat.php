<?php
include "header.php";

require_once '../vendor/autoload.php';
require_once __DIR__ . '/config.php';

if (!empty($_SESSION['_contact_form_error'])) {
  $error = $_SESSION['_contact_form_error'];
  unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
  $success = true;
  unset($_SESSION['_contact_form_success']);
}
?>

<body>
  <div class="wrapper">
    <?php
    include "navigationbar.php";
    ?>
    <style>
      .ftcl {

        border-color: #2e6da4;
        width: 100%;
        margin-right: 20px;
        outline: none;
        border-radius: 5px;
      }

      .modal-header1 {
        background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #337ab7), color-stop(1, #003c6f)) !important;
        color: white;
        padding: 15px;
      }

      .modal-title1 {
        margin: 0;
        line-height: 1.42857143;
      }

      .modal-body1 {
        position: relative;
        padding: 15px;
      }

      .modal-content1 {
        position: relative;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        outline: 0;
      }

      @media (min-width: 768px) {
        .modal-dialog1 {
          width: 600px;
          margin: 30px auto;
        }
      }

      .modal-dialog1 {
        position: relative;
        width: auto;
        margin: 10px;
      }

      select#brct {
        border-color: #2e6da4;
        width: 100%;
        margin-right: 20px;
        outline: none;
        border-radius: 5px;
        border-width: 2px;
      }

      form {
        margin-top: 100px;
      }

      #event {
        height: -webkit-fill-available;
        padding: 10px;
        color: white;
        font-size: 12px;
        background-color: #dedede2b;
      }
    </style>

    <script>
      function appjo(x) {
        if (x == 'size') {
          var selected_option_value = $("#size").val();

          y = 'addfeat.php?size=1';
          z = 'size=' + selected_option_value;
        } else if (x == 'brand') {
          var selected_option_value = $("#brand").val();
          t = $("#brct").val();
          y = 'addfeat.php?	brand=1';
          z = {
            brand: selected_option_value,
            category: t
          };
        }
        console.log(selected_option_value);
        $.ajax({
          type: 'POST',
          url: 'featsub.php',
          data: z,

          success: function(html) {
            $('#event').empty();
            $('#event').append('<div style=" width:100%" class="alert alert-success">New row added</div>');
          }
        });

      }
    </script>
    <?php
    if (isset($_GET['size'])) {
    ?>
      <form id="size1">
        <div class="new" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog1" role="document">
            <div class="modal-content1">
              <div class="modal-header1">
                <h5 class="modal-title1">Add Size</h5>
              </div>
              <div class="modal-body1" id="event" style="display: flex;">
                <input type="text" id="size" class="ftcl" name="size">
                <button type="button" onclick="appjo('size')" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php
    }

    //brand
    if (isset($_GET['brand'])) {
    ?>
      <form id="brand1">
        <div class="new" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog1" role="document">
            <div class="modal-content1">
              <div class="modal-header1">
                <h5 class="modal-title1">Add brand</h5>
              </div>
              <div class="modal-body1" id="event" style="display: flex;">
                <input type="text" placeholder="brand" id="brand" class="ftcl" name="brand">
                <select id='brct'>
                  <?php
                  $cat = $pdo->query("select * from category");

                  while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                  <?php
                  }
                  ?>
                </select>
                <button type="button" onclick="appjo('brand')" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php
    }

    ?>
    <?php
    require "foot.php";
    ?>