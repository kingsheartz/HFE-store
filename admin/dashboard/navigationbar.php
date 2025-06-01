<!-- Sidebar Holder -->
<style>
  #sidebar {
    padding: 15px;
    width: fit-content;
    background: #152230;
    position: relative;
    left: 0;
    top: 0;
    z-index: 20;
  }

  #sidebar ul li {
    padding-top: 20px;
  }

  #sidebar ul li ul {
    display: none;
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #364348), color-stop(1, #353535)) !important;
  }

  #sidebar ul li ul li {

    color: #e8e8e8;
    padding-top: 5px;
  }

  #sidebar ul li ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
    background: black;
    border-left: 4px solid black;
  }

  #sidebar ul li ul li a.active {
    background-color: initial;
    color: #17629e;
    padding-bottom: initial
  }

  #sidebar ul li ul li a:hover {
    color: #fff;
    background-color: #17629e
  }

  .nav_text {
    margin-right: 50px;
  }

  #content {
    position: relative;
    right: 20px;
    left: 20px;
    width: 80%;
  }

  .row {
    margin-right: -10px;
  }

  .navbar {
    position: fixed;
    width: 100%;
    z-index: 20;
    background: #152230;
    margin-left: -20px;
    box-shadow: 0px 1px 0px #3c3c3c;
    border-radius: 0px !important;
  }

  .container-fluid {
    display: inline-flex;
    width: -webkit-fill-available;
    height: 51px;
  }

  button#sidebarCollapse {
    width: 40px;
    height: 40px;
    margin-top: 9px;
    background: #152c3a;
    border-color: #5c5c5c;
  }

  .navbar-nav {
    line-height: 1.42857143;
    color: #333;
    font-family: 'Lucida Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
    z-index: 100;
    float: inline-end;
  }

  li.nav-item {
    padding: 0px;
  }

  #sidebar.active {
    min-width: 80px;
    max-width: 80px;
    text-align: center;
  }

  #sidebar.active .sidebar-header h3,
  #sidebar.active .CTAs {
    display: none;
  }

  #sidebar.active .sidebar-header strong {
    display: block;
  }

  #sidebar ul li a {
    text-align: left;
    color: #ffffff9e;
  }

  #sidebar ul li a:hover {
    text-align: left;
    text-decoration: none;
    color: #ffff;
  }

  #sidebar.active ul li a {
    padding: 20px 10px;
    text-align: center;
    font-size: 0.85em;
  }

  #sidebar.active ul li a i {
    margin-right: 0;
    display: block;
    font-size: 1.8em;
    margin-bottom: 5px;
  }

  #sidebar.active ul ul a {
    padding: 10px !important;
  }

  #sidebar.active .dropdown-toggle::after {
    top: auto;
    bottom: 10px;
    right: 50%;
    -webkit-transform: translateX(50%);
    -ms-transform: translateX(50%);
    transform: translateX(50%);
  }

  #sidebar .sidebar-header h3 {
    display: inline-grid;
    margin-top: -20px;
    width: 100%;
    text-align: center;
  }

  div#navbarSupportedContent {
    width: 83%;
    font-size: 12px;
  }

  .list-unstyled {
    font-size: 12px;
  }

  .text {
    padding-top: 0px;
    display: inline-block;
    color: #fff;
  }

  li.active>a {
    width: 100% !important;
    margin: -30px 0px !important;
    color: white !important;
    font-weight: bold;
  }
</style>

<nav id="sidebar">
  <div class="sidebar-header">
    <h3>
      <div class="text">
        <p style=" height: 62px;vertical-align: -webkit-baseline-middle;margin-left: -15px;margin-right: -15px;display: -webkit-box;text-align: left;padding: 5px;box-shadow: 0px 1px 0px #3c3c3c;">
          <img class="img-responsive" style="height:47px;" src="..\images/logo\logo.png">
        <div style="margin: 0px;position: absolute;top: 15px;left: 70px;">HFE</div>
        </p>
        <p style="text-decoration: none;padding-right: 5px;margin-top: 3px;font-size: 11px;">
          <i class="fa fa-circle" style="color: #3c763d;display: inline-block;font: normal normal normal 14px/1 FontAwesome;font-size: inherit;text-rendering: auto;-webkit-font-smoothing: antialiased"></i> Online
        </p>
      </div>
    </h3>
  </div>
  <ul class="list-unstyled components">
    <li id="indexphp" class="active">
      <a href="main.php">
        <span class="icons"><i class="fa fa-th"></i></span>
        <span class="nav_text">Dashboard</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="shopsphp">
      <a href="shops.php">
        <span class="icons"><i class="fa fa-users"></i></span>
        <span class="nav_text">Shops</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="addcategoriesphp"><a href="addcategories.php"><span class="icons"><i
            class="fa fa-tasks"></i></span><span class="nav_text">Category</span><span
          style="float: right;"><i class="fa fa-angle-right"></i></span></a></li>

    <li id="requestphp"><a href="request.php">
        <span class="icons"><i class="fa fa-bell"></i></span>
        <span class="nav_text">Requests</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="selledproductsphp"><a href="selledproducts.php">
        <span class="icons"><i class="fa fa-check"></i></span>
        <span class="nav_text">Completed Orders</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="uploadimagesphp"><a href="uploadimages.php">
        <span class="icons"><i class="fa fa-plus"></i></span>
        <span class="nav_text"> Add Product</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="viewphp"><a href="view.php">
        <span class="icons"><i class="fa fa-pencil-square-o"></i></span>
        <span class="nav_text">Update Products</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="addstorephp"><a href="addstore.php">
        <span class="icons"><i class="fa fa-plus"></i></span>
        <span class="nav_text"> Add Store</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>
    <li id="addfeatphp">
      <a href="#">
        <span class="icons"><i class="fa fa-plus"></i></span>
        <span class="nav_text"> Add Features</span>
        <span style="float: right;"><i id="featic" class="fa fa-angle-right"></i></span>
      </a>
      <ul class="list-unstyled components">
        <li>
          <a href="addfeat.php?size=1">
            <span class="icons"><i class="fa fa-box"></i></span>
            <span class="nav_text"> Size</span>
          </a>
        </li>
        <li>
          <a href="addfeat.php?brand=1">
            <span class="icons"><i class="fa fa-box"></i></span>
            <span class="nav_text"> Brand</span>
          </a>
        </li>
      </ul>
    </li>
    <li id="updatepassphp"><a href="updatepass.php"><span class="icons"><i
            class="fa fa-pencil-square-o"></i></span><span class="nav_text">Password</span><span
          style="float: right;"><i class="fa fa-angle-right"></i></span></a></li>
    <li id="chatphp">
      <a href="message.php">
        <span class="icons"><i class="fa fa-comments"></i></span>
        <span class="nav_text">Chats</span>
        <span style="float: right;"><i class="fa fa-angle-right"></i></span>
      </a>
    </li>

</nav>
<script>
  // $(document).ready(function () {
  //     $('#top-nav').css('left', $('#sidebar').width() + 20 + 'px');
  // });
  $(document).ready(function() {
    var path = window.location.href; // Returns full URL
    var page = path.split("/").pop(); // Returns only the file name
    $('#sidebar ul li a').each(function() {
      if (this.href === path) {
        $(this).addClass('active');
      }
    });
  });
</script>
<!-- Page Content Holder -->
<div id="content">
  <nav class="navbar navbar-expand-lg navbar-light bg-light " id="top-nav">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-info">
        <i class="fas fa-align-left"></i>
        <span></span>
      </button>
      <button
        class="btn btn-dark d-inline-block d-lg-none ml-auto  visible-xs"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i>
      </button>
      <?php
      require "../../db.php";
      $query = "SELECT COUNT(*) FROM product_details join product_description on product_details.product_description_id=product_description.product_description_id join product on product.product_id=product_description.product_description_id  JOIN store on store.store_id=product_details.store_id WHERE  product_details.permission=0";
      $statement = $pdo->prepare($query);
      $statement->execute();
      $row = $statement->fetch(PDO::FETCH_ASSOC);
      $query1 = "SELECT COUNT(*) FROM chats WHERE rname='admin' AND stat=0";
      $statement1 = $pdo->prepare($query1);
      $statement1->execute();
      $row1 = $statement1->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="main.php"><i class="fa fa-home"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="request.php"><i class="fa fa-bell"></i><span class="uppernum"><?= $row['COUNT(*)'] ?></span>Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="message.php"><i class="fa fa-comments"></i><span class="uppernum1"><?= $row1['COUNT(*)'] ?></span>Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fa fa-power-off"></i>Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    $('#sidebar li').on('click', 'a', function(e) {
      if ($(this).parent().children('ul').length) {
        e.preventDefault();
        $('#featic').attr('class', 'fas fa-angle-down');
        $(this).addClass('active');
        $(this).parent().children('ul').slideDown();
        setTimeout(function() {
          //$.fn.matchHeight._update();
          //  $.fn.matchHeight._maintainScroll = true;
        }, 1000);
      }
    });
    $('#sidebar li').on('click', 'a.active', function(e) {
      e.preventDefault();
      $(this).removeClass('active');
      $('#featic').attr('class', 'fas fa-angle-right');
      $(this).parent().children('ul').slideUp();
      setTimeout(function() {
        // $.fn.matchHeight._update();
        // $.fn.matchHeight._maintainScroll = true;
      }, 1000);
    });
  </script>