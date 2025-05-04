<?php
include "header.php";
?>
<?php
require_once '../vendor/autoload.php';
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
    <script type="text/javascript">
      $('li').removeClass('active');
      $('#uploadimagesphp').addClass('active');

      function clr() {
        x = confirm("R yu sure ..?.It will clear all the text entered")
        if (x == true) {
          document.getElementById('item').value = "";
          document.getElementById('address').value = "";
          document.cookie = 'item=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
          document.getElementById('item').focus();
          location.href = "uploadimages.php";
        }
      }
    </script>
    <style type="text/css">
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
        border: 2px solid black;
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <form name="form" id="myform" method="post" action="upload.php" enctype="multipart/form-data">
      <div class="hed">
        Add Product
      </div><br>
      <?php
      if (!empty($success)) {
        ?>
        <div class="alert alert-success">Item Added Successfully!</div>
        <?php
      }
      ?>
      <?php
      if (!empty($error)) {
        ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php
      }
      ?>
      <div class="element col-sm-12">
        <label class="addte">Product details</label><br>
        <div class="col-md-12">
          <div class="form-group">
            <?php
            require "..\..\db.php";
            $query = "SELECT max(product_id) FROM product ";
            $stmt = $pdo->query($query);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $itemid = $row['max(product_id)'];
            ?>
            <span class="floating-label">Product Name</span>
            <input type="text" required="" class="form-control" id="item" style="width: 100%" name="item_name">
          </div>
          <div class="form-group">
            <span class="floating-label">Category</span>
            <select required="" class="form-control" Id="cat" name="cat">
              <option value="">Select..</option>
              <?php
              ?>
              <?php
              $query = "SELECT * FROM category ";
              $stmt = $pdo->query($query);
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <span class="floating-label">Price</span>
            <input type="number" required="" class="form-control"
              onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
              style="width: 100%" name="item_price"/>
          </div>
          <div class="form-group">
            <span class="floating-label">Product Description</span>
            <textarea required="" class="form-control" style="white-space: pre-line;width:100%;height:200px;"
              id="address" name="description"></textarea>
          </div>
        </div>
      </div>
      <div class="element col-sm-12">
        <label class="addte">Features</label><br>
        <div class="col-sm-12">
          <button type="button" name="nw" id="addpos"><i style="font-size: 24px;float:left"
              class="fa fa-plus-circle"></i>Add</button><br><br>
          <div id="position_fields">
          </div>
          <br><br>
          </div>
        </div>
        <div class="col-md-12 addte">
          <style type="text/css">
            .image-upload {
              border: 1px dashed #fdfdfd;
              background: url(images/upbck.jpg);
              padding-top: 20px;
              padding-bottom: 20px;
              cursor: pointer;
              border-radius: 20px;
            }
          </style>

          <?php
          require "..\..\db.php";
          ?>
          <!--features-->
          <script type="text/javascript">
            function conca(i) {
              console.log('helo');
              if ($('#w1' + i).val() != 0) {
                var v1 = $('#w1' + i).val() + ' ' + $('#w2' + i).val();
                $('#w3' + i).val(v1);
              }
            }
          </script>
          <!--features-->
          <script>
            function previewFile(inp, i) {
              var file = $('' + inp).get(0).files[0];
              if (file) {
                var reader = new FileReader();
                reader.onload = function () {
                  $("#previewImg" + i).attr("src", reader.result);
                }
                reader.readAsDataURL(file);
              }
            }
          </script>
          <script type="text/javascript">
            countpos = 0;
            $(document).ready(function () {
              console.log('document ready');
              $('#addpos').click(function (event) {
                event.preventDefault();
                if (countpos >= 9) {
                  alert('maximum reached');
                  return;
                }
                countpos++;
                console.log('adding...');
                $('#position_fields').append(
                  '<div id="position' + countpos + '" style="position:relative;padding-top: 20px;">\
                    <button type="button" class="rempos" onclick="$(\'#position'+ countpos + '\').remove();return(false);">\
                      <i style="font-size: 24px;float:left"  class="fa fa-minus-circle"></i>\
                      Remove\
                    </button>\
                    <label style="color:#088DA9">Select the features</label><br><br>\
                    <div class="col-sm-12" style="text-align:center">\
                      <label class="checkbox"><input class="form-control-check" type="checkbox" onclick="$(\'#size'+ countpos + '\').toggle();$(\'#size1' + countpos + '\').toggle()" name="check1' + countpos + '" value="size"><span>Size</span>\
                        <div class="form-group">\
                          <select id="size'+ countpos + '" class="form-control" style="display:none;width: 100%"name="size' + countpos + '" >\
                            <option value="">Select...</option>\
                            <?php
                            $cat = $pdo->query("select * from size");
                            while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value = "<?= $row['size_id'] ?>" > <?= $row['size_name'] ?></option >\
                            <?php
                            }
                            ?>'
                            + '</select>\
                          </div>\
                        </label>\
                        <label class="checkbox"><input type="checkbox" class="form-control-check" onclick="$(\'#brand'+countpos+'\').toggle();$(\'#brand1'+countpos+'\').toggle()" name="check1'+countpos+'" value="brand">\
                          <span>Brand</span>\
                          <div class="form-group">\
                            <select id="brand'+countpos+'" placeholder="brand" class="form-control" style="display:none;width: 100%" name="brand'+countpos+'" >\
                              <option value="">Select...</option>\
                              <?php
                              $cat = $pdo->query("select * from brand");
                              while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                              <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>\
                              <?php
                              }
                              ?>'
                            + '</select>\
                          </div>\
                        </label>\
                        <label class="checkbox"><input type="checkbox" class="form-control-check" onclick="$(\'#w1'+countpos+'\').toggle();$(\'#w2'+countpos+'\').toggle();$(\'#weight1'+countpos+'\').toggle()" name="check1'+countpos+'" value="weight">\
                          <span>Weight</span>\
                          <div class="form-group" >\
                            <input onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" type="number" class="form-control" style="display:none;width:70%;border-right:none; float:left;" id="w1'+countpos+'" onkeyup="conca('+countpos+')"/>\
                            <select class="form-control" style="display:none;width:30%;float:left;color: white;background: #0B7383" id="w2'+countpos+'" onchange="conca('+countpos+')">\
                              <option value="kg">kg</option>\
                              <option value="g">g</option>\
                              <option value="lt">lt</option>\
                              <option value="ml">ml</option>\
                            </select>\
                            <input type="hidden" id="w3'+countpos+'" name="weight'+countpos+'"/>\
                          </div>\
                        </label>\
                      </div>\
                      <label>File Input</label>\
                      <div class="image-upload">  \
                      <label for="file-input'+countpos+'" style="width: 100%; cursor: pointer;">\
                        <center>\
                          <img id="previewImg'+countpos+'" src="images/upload.png" style="max-width: 150px;max-height: 150px;height: auto;width: auto;">\
                        </center>\
                      </label>\
                      <input id="file-input'+countpos+'" type="file" name="my_file'+countpos+'" onchange="previewFile(\'#file-input'+countpos+'\','+countpos+');" style="display: none; cursor: pointer;"/>\
                    </div>\
                  </div>'
                );
              });
            });
          </script>
          <button type="submit" name="add" name="submit">
            <span
              style="color: #F9F9F9;
              font-size: 16px;
              float: left;
              border-right: 1px solid #F9F9F9;
              height: 100%;
              padding-left: 5px;
              padding-right: 5px;" class="glyphicon glyphicon-save-file">
            </span>
            Save
          </button>
          <button type="reset" onclick="clr()" name="reset">
            <i style="color: #FF0000;
              font-size: 16px;
              float: left;
              border-right: 1px solid #FF0000;
              height: 100%;
              padding-left: 5px;
              padding-right: 5px;" class="fa fa-ban">
            </i>
            Cancel
          </button><br/>
        </div>
      </div>
    </form>
  </div>
  <?php
  require "foot.php";
  ?>