<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Healthcare & Fitness Equipment</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords"
    content="One Store,HFE-Store,HFE-Store,shoppingcart,One,one,Store,store,shopping,cart,for all your needs" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //for-mobile-apps -->
  <!--favicon-->
  <link href="../../images/logo/favicon.png" rel="icon" />
  <!--//favicon-->
  <link rel="stylesheet" href="../../extras/OS/pages/CSS/single.css">
  <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- font-awesome icons -->
  <link href="../../css/font-awesome.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="../../css/font-awesome.min.css">-->
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../css/owl.carousel.css">
  <link rel="stylesheet" href="../CSS/style.css">
  <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../../extras/lib/slick/slick.css" rel="stylesheet">
  <link href="../../extras/lib/slick/slick-theme.css" rel="stylesheet">
  <link href="../../extras/css/style2.css" rel="stylesheet">
  <link href="../../extras/css/style3.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../extras/OS/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../extras/OS/plugins/toastr/toastr.min.css">
  <!--<link rel="stylesheet" href="../../css/responsive.css">-->
  <link
    href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
    rel='stylesheet' type='text/css'>
  <link
    href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
    rel='stylesheet' type='text/css'>
  <!-- coc -->
  <!-- Template Stylesheet -->
  <link href="../../extras/css/style2.css" rel="stylesheet">
  <link href="../../extras/css/style3.css" rel="stylesheet">
  <!-- js -->
  <script src="../../js/jquery-1.11.1.min.js"></script>
  <!-- //js -->
  <!-- //IMPORTANT-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- //IMPORTANT-->
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />-->
  <!-- Bootstrap Core JavaScript -->
  <!--favicon-->
  <link href="../../images/logo/favicon.png" rel="icon" />
  <!--//favicon-->
  <!-- search bar -->
  <!-- searching the items -->
  <script type="text/javascript" src="../JS/search.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <!-- connecting with another template -->
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <style type="text/css">
    /*PAGE LOADER*/
    #popup2 {
      display: none;
      background-color: black;
      color: white;
    }

    #popup1 {
      display: none;
      background-color: black;
      color: white;
    }

    img.ic {
      max-height: 100px;
      max-width: 100px;
      width: 0;
      position: absolute;
      animation-name: rotate;
      animation-duration: 1s;
      animation-direction: alternate;
      animation-iteration-count: 1;
      /*  animation-delay: 1.5s;*/
    }

    button.location_marker.popup2_open,
    .wishicon,
    .carticon,
    .location_marker {
      height: 40px !important;
      margin: 0px !important;
      width: 40px !important;
      color: white;
      background: transparent !important;
      border: 0px;
      font-size: 16px !important;
      padding: 5px !important;
      padding-top: 15px !important;
    }

    div#lg-cartcnt {
      position: absolute;
      right: 5px;
      top: 8px;
      background: red;
      height: 15px !important;
      width: 15px;
      padding: 0px;
      border-radius: 10px;
      text-align: center;
      color: white;
      font-size: 10px;
    }

    .navbar ul li {
      z-index: 9 !important;
      margin: 0px;
      height: 50px;
      font-weight: 100 !important;
      position: relative;
      top: 0px;
      font-size: 14px !important;
      color: gray !important;
      border: 0px;
      margin-right: 0px !important;
      margin-left: 0px !important;
      margin-top: 0px !important;
      margin-bottom: 0px !important;
    }

    .navbar-inverse {
      border-top: 0px !important;
      border-bottom: 0px !important;
      background-color: #000;
      border-radius: 0px !important;
    }


    .agileits_header {
      background-color: rgb(0 0 0) !important;
      padding: 12px 0 0 0 !important;
    }

    @keyframes rotate {
      0% {
        transform: rotate(0);
        width: 100px;
      }

      80% {
        width: 100px;
      }

      100% {
        transform: rotate(0deg);
        width: 100px;
      }
    }

    img.ic:empty {
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      margin-left: -50px;
      margin-top: -60px;
    }

    .loader2 {
      position: fixed;
      z-index: 999999999999;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgb(000, 000, 000, 0.85);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader2 {
      animation: fadegone 1s;
      animation-fill-mode: forwards;
    }

    @keyframes fadegone {
      100% {
        opacity: 100%;
        visibility: hidden;
      }
    }

    img.ri {
      position: absolute;
      min-width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.9);
    }

    .navbar-inverse .navbar-nav>li>a {
      color: #999999;
      font-size: 12px;
    }


    img.ri:empty {
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .loader1 {
      position: fixed;
      z-index: 999999999990;
      top: 0;
      left: 0;
      height: 100%;
      background-color: rgb(000, 000, 000, 0.85);
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader1>img {
      width: 50px;
    }

    .loader1 {
      animation: fadein 1s;
      animation-fill-mode: forwards;
    }

    @keyframes fadein {
      100% {
        opacity: 100%;
        visibility: hidden;
      }
    }

    .loader {
      position: fixed;
      z-index: 999999999999;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader>img {
      width: 50px;
      margin-top: 140px;
    }

    .loader {
      animation: fadeout 1s;
      animation-fill-mode: forwards;
    }

    @keyframes fadeout {
      100% {
        opacity: 100;
        visibility: hidden;
      }
    }

    @media(max-width: 567px) {
      #popup2 {
        width: 100%;
      }
    }

    @media(max-width: 767px) and (min-width: 568) {
      #popup2 {
        width: 80%;
      }
    }

    @media(min-width: 768px) {
      #popup2 {
        width: 30%;
      }
    }

    /*PAGE LOADER*/
    .tab-content {
      padding: 15px 15px 10px;
      margin-bottom: 20px;
      z-index: 2;
      border: 1px solid #ddd;
      border-top: 0px;
    }

    @media(max-width: 365px) {
      #sm_sign_up {
        display: none;
      }
    }

    @media(min-width: 1200px) and (max-width:1231px) {
      .col-lg-2 {
        width: 20% !important;
      }

      .col-lg-8 {
        width: 60% !important;
      }
    }

    body.modal-open {
      overflow: auto !important;
      padding: 0px !important;
      overflow-y: hidden !important;
    }

    body.modal-close {
      overflow: auto !important;
      padding: 0px !important;
    }

    /*background-image: linear-gradient(390deg, #03A9F4, #29ff92);*/
    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:focus,
    .navbar-inverse .navbar-nav>.active>a:hover {
      color: white !important;
      background-color: #ffffff2b !important;
      border-radius: 5px;
      margin-right: 0px !important;
      margin-left: 0px !important;
      margin-top: 0px !important;

      padding-left: 10px !important;
      padding-right: 10px !important;
    }

    .dropdown-menu li>span:hover {
      color: white;
    }

    .dropdown-menu li>span:nth-child(1) {
      color: #139b3b;
    }

    .dropdown-menu li {
      color: black !important;
    }

    .dropdown-menu li:hover {
      background-color: #02171e !important;
      border-left: 4px solid #337ab7;
      padding: 0;
      color: white !important;
      border-bottom-left-radius: 3px;
      border-top-left-radius: 3px;
    }

    @media(min-width: 767px) and (max-width:1081px) {
      .navbar-center {
        padding-top: 5px !important;
      }

      .navbar {
        margin-bottom: -5px !important;
      }

    }

    @media(max-width: 767px) {
      .navbar-inverse {
        background-color: #2c2c2c;
        border-top: 0px !important;
      }

      .navbar-inverse .navbar-nav>.active>a,
      .navbar-inverse .navbar-nav>.active>a:focus,
      .navbar-inverse .navbar-nav>.active>a:hover {
        color: white !important;
        background-color: rgb(63 63 63 / 41%) !important;
        border-bottom: 0px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
      }

      .navbar-inverse .navbar-nav li:hover {
        background-color: rgb(63 63 63 / 41%) !important;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        color: white !important;
      }

      .navbar-inverse .navbar-nav li {
        color: white !important;
      }
    }

    ul.nav.navbar-nav.navbar-center {
      width: 100%;
      background: transparent !important;
    }

    @media (min-width: 992px) {
      #lg-cartcnt {
        height: 22px !important;
        margin-bottom: -12px !important;
      }
    }

    #category,
    #category li {
      z-index: 999999999 !important;
    }

    .side_nav_content_header {
      font-size: 18px;
    }

    .side_nav_content_head {
      background-color: #151515df;
      border-top: 0px !important;
      font-size: 15px;
    }

    .side_nav_content_head:hover,
    .category_side_head:hover {
      color: white !important;
      background-color: #139b3b !important;
      border-bottom: 0px;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-left: 5px white solid;
      border-right: 5px white solid;
    }

    .side_nav_content_head:hover,
    .category_side_head:hover {
      background-color: #000 !important;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      border-left: 5px #139b3b solid;
      border-right: 5px #139b3b solid;
    }

    .side_nav_content_head,
    .category_side_head {
      color: white !important;
    }

    .side_nav_content_end {
      border-bottom: 2px solid #337ab7;
      border-bottom-right-radius: 5px;
      border-bottom-left-radius: 5px;
      padding-bottom: 10px;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #151515df;
      overflow-x: hidden;
      transition: 0.15s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 30px;
      margin-left: 50px;
    }

    .closebtn a,
    .closebtn img {
      z-index: 99999999;
      top: 0px;
      left: 0px;
      color: white;
      margin-left: 255px;
      margin-top: -20px;
      padding: 5px;
      background-color: darkred;
      border-radius: 15%;
      width: 25px;
      height: 25px;
    }

    #side_nav_bar_lock {
      position: fixed;
      z-index: 99;
      top: 0;
      left: 0;
      height: 100%;
      background-color: rgba(000, 000, 000, 0.85);
      width: 100%;
      display: none;
      justify-content: center;
      align-items: center;
    }

    .category_side_head {
      padding: 0px !important;
      padding-bottom: 0px !important;
    }

    .category_side_head a:active,
    .category_side_head a:focus {
      color: white !important;
      background-color: #000 !important;
      border-bottom: 0px;
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-left: 5px #139b3b solid;
      border-right: 5px #139b3b solid;
    }

    .side_drop_li>span:hover {
      color: white;
    }

    .side_drop_li>span:nth-child(1) {
      color: #139b3b;
    }

    .side_drop_li {
      color: black !important;
      background-color: white !important;
      text-decoration: none !important;
    }

    .side_drop_li {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .side_drop_li:hover {
      background-color: #02171e !important;
      border-left: 4px solid #337ab7;
      padding: 0;
      color: white !important;
      border-bottom-left-radius: 3px;
      border-top-left-radius: 3px;
    }

    .side_drop_li_main {
      background-color: #02171e;
      border-top: 0px !important;
    }

    .side_drop_li_main li:hover {
      background-color: #000 !important;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      border-left: 5px #139b3b solid;
      border-right: 5px #139b3b solid;
    }

    .slide_drop_li_main_first {
      margin-top: 8px !important;
      padding-top: 8px !important;
    }

    .category_side_head {
      background-color: #02171e;
    }

    @media(max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 15px;
      }
    }

    /******************************************************************************************************************************/
    @media(max-width: 767px) {
      #lg_side_active {
        display: none;
      }

      #sm_side_active {
        display: unset;
      }
    }

    @media(min-width: 768px) {
      #lg_side_active {
        display: unset;
      }

      #sm_side_active {
        display: none;
      }
    }

    .dropdown-btn {
      text-decoration: none;
      font-size: 15px;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    .dropdown-container {
      display: none;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
      float: right;
      padding-right: 8px;
    }

    /*HORIZONTAL LISTING*/
    .div-wrapper {
      display: grid;
      grid-auto-flow: column;
      grid-gap: 5px;
      width: 100%;
    }

    .usericon {
      background-color: #0072d357 !important;
      border: 0px;
      color: white;
      position: absolute;
      top: 10px;
      border-radius: 5px;
      padding: 5px;
      font-size: 12px;
      width: max-content;
      padding-left: 5px;
      padding-right: 5px;
      height: 30px !important;
    }

    .usericon>i {
      font-size: 12px !important;
    }

    .std_loader {
      border: 6px solid #f3f3f3;
      border-radius: 50%;
      border-top: 6px solid #3498db;
      width: 35px;
      height: 35px;
      -webkit-animation: spin 2s linear infinite;
      /* Safari */
      animation: spin 2s linear infinite;
      display: flex;
      align-items: center;
      justify-content: center;
      top: 50%;
      position: fixed;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      z-index: 9999999999999999 !important;
    }

    .std_text,
    .std_text1,
    .std_text2,
    .std_text3 {
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      z-index: 1999999999999999999 !important;
      position: fixed;
      display: none;
      top: 10%;
    }

    .userdiv .usericon {
      justify-content: center;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .background_loader {
      margin: 0;
      padding: 0;
      top: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.85);
      position: fixed;
      z-index: 99999999999999 !important;
      display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    li.side-bar-collapsed {
      margin-top: 10px !important;
    }

    li.side-bar-collapsed>a>span {
      border: 1px solid #999999;
      color: #999999;
      padding: 5px;
      font-size: 16px !important;
      font-weight: 200;
      border-radius: 5px;
      margin-top: 30px !important;
    }

    #sm_top_ph_mail>i {
      float: right;
    }

    #sm_top_ph_mail {
      width: 100%;
    }

    .navbar-collapse.in {
      overflow-y: visible;
    }

    div#mobile_menu {
      width: 100% !important;
      padding-right: 0px !important;
      background-color: #050505;
      padding-top: 0px;
    }

    li#lg_side_active>a>span {
      margin-top: 3px;
      border: 1px solid;
      margin-left: -10px;
      margin-right: 0px;
      border-radius: 5px;
      padding: 10px !important;
      text-align: center;
    }

    .username-placeholder {
      text-decoration: none;
      background-color: #00000055;
      color: white;
      overflow-wrap: anywhere;
    }

    .username-placeholder .fa-user-circle {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    @media (min-width:825px) {
      .srch {
        float: left;
        width: 100%;
      }

      div#lg_top_ph_mail {
        width: 25rem !important;
      }

      .col-lg-2.col-md-2.col-sm-2.topli {
        width: 15rem;
      }

      li.profilediv {
        position: absolute !important;
        right: 0px !important;
        font-weight: 100 !important;
        font-size: 14px !important;
        color: gray !important;
      }

      li.locationdiv {
        position: absolute !important;
        right: 100px;
      }

      li.cartdiv {
        position: absolute !important;
        right: 50px;
      }

      li.wishdiv {
        position: absolute !important;
        right: 0px;
      }

      li.logindiv {
        position: absolute !important;
        right: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 5px;
      }

      .usericon {
        right: 150px !important;
      }
    }

    @media (max-width:825px) {
      .srch {
        margin-left: 10px !important;
        margin-right: 10px !important;
      }

      .usericon {
        right: 0px !important;
        top: 20px !important;
      }

      div#lg_top_ph_mail {
        width: 30rem !important;
      }

      .col-lg-2.col-md-2.col-sm-2.topli {
        width: 15rem;
      }

    }

    @media(max-width:767px) {
      div#lg_top_ph_mail {
        width: 80rem !important;
      }
    }

    @media(max-width:404px) {
      div#lg_top_ph_mail {
        width: 70rem !important;
      }
    }

    .header {
      position: sticky;
      width: 100%;
      top: 0px;
      z-index: 500;
    }

    .headimg,
    .navbar-inverse {
      width: 100% !important;
      z-index: 100 !important;
    }

    @media (min-width: 768px) {
      .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
      }
    }

    #sm_category {
      width: 100px !important;
    }

    .navbar.navbar-inverse.shadow_b {
      height: 50px !important;
      border: 0px !important;
    }

    .caticon {
      width: 100px !important;
      color: white;
      padding: 5px;
      margin-top: 13px;
      background: #49494994 !important;
      border-radius: 5px !important;
      margin-left: 10px !important;
    }

    /*****************************************************************************************************************************/
    /*****************************************************************************************************************************/
  </style>
  <style>
    img[alt="www.000webhost.com"] {
      display: none;
    }
  </style>
  <script type="text/javascript">
    var gonenetwork = 0;
    var NavScrollTop;

    function network_gone() {
      if (navigator.onLine == false) {
        $('#show_offline').css('display', 'block');
        $('#show_online').hide();
        gonenetwork = 1;
        return true;
      }
    }

    function check_network() {
      if (network_gone()) {
        return false;
      } else if ((navigator.onLine == true) && (gonenetwork == 1)) {
        $('#show_online').css('display', 'block');
        $('#show_offline').hide();
        setTimeout(function() {
          $('#show_online').hide();
        }, 2000);
        gonenetwork = 0;
      }
    }
    setInterval(check_network, 2000);
  </script>
</head>

<body id="strt" class="scroll_handle_orange hidescroll" style="overflow-x:hidden; width: 100%;padding: 0px;">
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="lJVMx4Fw"></script>
  <div id="show_online" style="padding: 3px;text-align: center;color: white;width: 100%;background-color: #489e07;display: none;font-weight: 400;font-size: 1.4rem ;font-family: Poppins, sans-serif">Online</div>
  <div id="show_offline" style="padding: 3px;text-align: center;color: white;width: 100%;background-color: #c50505;display: none;font-weight: 400;font-size: 1.4rem ;font-family: Poppins, sans-serif">Offline</div>
  <!--SIDE-BAR-DIV-->
  <div id="side_nav_bar_lock" style="padding: 0px;margin: 0px;"></div>
  <!--SIDE-BAR-DIV-->
  <!--RESPONSE AWAITING-->
  <div class="background_loader">
    <div class="std_loader"></div>
  </div>
  <div class="std_text" style="color:white;font-size:17px;width:100%">
    <center>Cancelling...</center>
  </div>
  <div class="std_text1" style="color:white;font-size:17px;width:100%">
    <center>Wait a sec...</center>
  </div>
  <div class="std_text2" style="color:white;font-size:17px;width:100%">
    <center>Please wait...</center>
  </div>
  <div class="std_text3" style="color:white;font-size:17px;width:100%">
    <center>Placing order...</center>
  </div>
  <!--RESPONSE AWAITING-->
  <!--ANIMATION-->
  <div class="loader1">
    <img src="../../images/logo/store.jpg" class="ri" />
  </div>
  <div class="loader2">
    <img src="../../images/logo/logofullfill.png" class="ic">
  </div>
  <div class="loader">
    <img src="..\..\images\load\3.svg" height="70" alt="loading..." />
  </div>
  <!--ANIMATION-->
  <!-- header -->

  <div class="header" id="org-header">
    <div class="headimg" style="padding: 0px;margin: 0px;left: 0px;right: 0px;"><!--#1-->
      <div class="container top"
        style="width:100%;padding-top: 12px;margin: 0px;left: 0px;right: 0px;padding-bottom: 5px;">
        <div style="height: 100% ;width: 100%;display: block;margin: 0px;left: 0px;right: 0px">
          <div style="display: flex;">
            <div class="col-lg-2 col-md-2 col-sm-2 topli " style="float: left;"
              style="padding: 0px;margin: 0px;left: 0px;right: 0px">
              <div class="logo_img" style="padding: 0px;margin: 0px;width: 100px;height: auto;">
                <a href="../Main/hfe.php">
                  <img src="../../images/logo/logo-horizontal.png" style="width: 120px;height: auto;position: absolute;left: 0px;top: 0px;margin: 0px;right: 0px;">
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 search-set">
              <!--krg-->
              <div id="search-div" class="specific-disp-none srch bar-srch device-width-set" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                <div class=" search_bar bar-srch1">
                  <div class="container-fluid bar-srch1" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                    <div class="row bar-srch" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                      <div class=" bar-srch" style="margin-left: 0px;width: 100%;">
                        <div class="input-group bar-srch" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                          <div class="input-group-btn search-panel" style="position: relative;height: 30px;background: #454545;color: white;border: 0px;">
                            <button
                              type="button"
                              id="search-panel"
                              class="btn btn-default dropdown-toggle"
                              onclick="catlistview()"
                              style="position: relative;height: 30px;background: #454545;color: white;border: 0px;">
                              <span id="search_concept">All</span> <span class="caret" id="srch_pan"></span>
                            </button>
                            <ul
                              id="category"
                              class="dropdown-menu"
                              name="cat2"
                              role="menu"
                              style="position: absolute;display: none;background-color: #CACACA !important">
                              <li><a href="#0">All</a></li>
                              <?php
                              require "../../db.php";
                              $sql = $pdo->query("select category_id,category_name from category");
                              while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                                <li value="<?= $row['category_id'] ?>" style="border-color: white;">
                                  <a style='font-family:sans-serif' href="#<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a>
                                </li>
                              <?php
                              }
                              ?>
                            </ul>
                          </div>
                          <input type="hidden" name="search_param" value="0" id="search_param">
                          <input
                            type="text"
                            class="form-control"
                            id="search"
                            onkeyup="searchele()"
                            name="Search"
                            placeholder="Search"
                            style="margin-top: 0px;z-index: 0;padding: 5px;height: 30px;border: 0px !important;background: #76788473;color:darkgray;">
                          <span class="input-group-btn">
                            <button
                              onclick="check()"
                              onmouseover="$(this).css('background-color','#139b3b')"
                              onmouseleave="$(this).css('background-color','#139b3b')"
                              style="color: white;background-color: #139b3b;border: 0px;height: 30px;"
                              class="btn btn-default search_btn" type="button">
                              <span class="fa fa-search"></span>
                            </button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="clear-fix"></div>
                    <div id="display"></div>
                  </div>
                </div>
              </div>
            </div>
            <div
              style="color: white;float: right;text-align: right;padding: 0px;"
              class="col-lg-2 col-md-4 col-sm-4 topli"
              id="lg_top_ph_mail">
              <a href="tel:+918113990368" style="color:darkgrey;font-family:Arial;padding: 0px;">
                <i class="fa fa-phone" aria-hidden="true"></i> Ph: <span><i>+91 8113990368</i></span>
              </a>
              <br>
              <a href="mailto:healthandfitnessequipmentstore@gmail.com" style="color:darkgrey;font-family:Arial;padding:0;">
                <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<i>hfestore@gmail.com</i>
              </a>
            </div>
            <div style="color: darkgrey;float: right;" class="topli" id="sm_top_ph_mail">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <br />
              <i><span><i class="fa fa-envelope"></i></span></i>
            </div>
          </div>
        </div>
      </div>
      <div class=" nav-bar shadow_b"><!--#2-->
        <!-- //SMALL DIV -->
        <div id="small-div"><!--#3-->
          <div class="agileits_header"><!--#4-->
            <div class="container head" style="padding: 0px;margin: 0px;left: 0px;right: 0px"><!--#5-->
              <!--krg-->
              <div id="search-div" class=" srch bar-srch device-width-set" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                <div class=" search_bar bar-srch1" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                  <div class="container-fluid bar-srch1" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                    <div class="row bar-srch" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                      <div class=" bar-srch" style="margin-left: 0px;width: 100%;">
                        <div class="input-group bar-srch" style="padding: 0px;margin: 0px;left: 0px;right: 0px">
                          <div
                            id="v-small-div"
                            class="input-group-btn search-panel"
                            style="position: relative;height: 30px;background: #454545;color: white;border: 0px;">
                            <button
                              type="button"
                              id="search-panel2"
                              class="btn btn-default dropdown-toggle"
                              onclick="catlistview2()"
                              style="position: relative;height: 30px;background: #454545;color: white;border: 0px;">
                              <span id="search_concept2">All</span> <span class="caret" id="srch_pan2"></span>
                            </button>
                            <ul
                              id="category2"
                              class="dropdown-menu"
                              name="cat2"
                              role="menu"
                              style="position: absolute;display: none;background-color: #CACACA !important">
                              <li><a href="#all">All</a></li>
                              <?php
                              require "../../db.php";
                              $sql = $pdo->query("select category_id,category_name from category");
                              while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                                <li value="<?= $row['category_id'] ?>">
                                  <a style='font-family:sans-serif;border:1px white;' href="#<?= $row['category_id'] ?>">
                                    <?= $row['category_name'] ?>
                                  </a>
                                </li>
                              <?php
                              }
                              ?>
                            </ul>
                          </div>
                          <input type="hidden" name="search_param" value="0" id="search_param2">
                          <input
                            type="text"
                            class="form-control"
                            id="search2"
                            autocomplete="off"
                            onkeyup="searchele2()"
                            name="Search"
                            placeholder="Search"
                            style="margin-top: 0px;z-index: 0;padding: 5px;height: 30px;border: 0px !important;background: #76788473;color:darkgray;">
                          <span class="input-group-btn">
                            <button
                              onclick="check2()"
                              onmouseover="$(this).css('background-color','#139b3b')"
                              onmouseleave="$(this).css('background-color','#139b3b')"
                              style="color: white;background-color: #139b3b;border: 0px;height: 30px;"
                              class=" btn btn-default search_btn"
                              type="button"><span class="fa fa-search"></span>
                            </button>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="clear-fix"></div>
                    <div id="display2"></div>
                  </div>
                </div>
              </div>
              <!--krg-->
              <div class="option_segment"><!--#6-->
                <div class="agile-login"><!--#7-->
                  <div>
                    <ul class="phone_email topli"><!--SIDE OPEN NAV BAR-->
                      <li class="side-bar-collapsed" style="	margin-left: 15px;">
                        <a href="#" style="float: left;    margin-top: 10px;" id="sm_side_active">
                          <span style="cursor:pointer" onclick="openNav()">&#9776;</span>
                        </a>
                      </li>
                      <li class="wishdiv">
                        <form action="#" method="post" class="last">
                          <button class="wishicon" type="button" name="submit" value="" onclick="location.href='../Wishlist/wishlist.php';">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </button>
                        </form>
                      </li>
                      <li class="cartdiv">
                        <form action="#" method="post" class="last">
                          <div id="cart" class="btn-group btn-shopping-cart">
                            <a href="..\Cart\cart.php">
                              <div class="shopcart">
                                <div
                                  id="sm-cartcnt"
                                  style="position: absolute;margin-bottom: -10px;background-color: red;border-radius: 50px;width: 20px;height:20px;margin-left: 20px"
                                  class="crt-count">
                                  <?php
                                  if (isset($_SESSION['cart_count'])) {
                                    echo $_SESSION['cart_count'];
                                  } else {
                                    echo "0";
                                  }
                                  ?>
                                </div>
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">
                                <button
                                  class="carticon"
                                  onclick="cartview()"
                                  type="button"
                                  name="submit"
                                  value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </button>
                              </div>
                            </a>
                          </div>
                        </form>
                      </li>
                      <li class="locationdiv">
                        <form action="#" method="post" class="last">
                          <button class="location_marker popup2_open" type="submit" name="submit" value="">
                            <i class="fa  fa-map-marker dropdown" aria-hidden="true"></i>
                          </button>
                          <span id="location">
                            <?php if (isset($_SESSION['location'])) { ?>You<?php } ?>
                          </span>
                        </form>
                      </li>
                      <div id="userdetails" style="float: right;">
                        <?php
                        if (isset($_SESSION['name'])) {
                        ?>
                          <a href="#">
                            <li class="userdiv" style="float: right;">
                              <form action="../Account/registered.php" method="post" class="last" onclick="openNav()">
                                <button class="w3view-cart usericon " type="button" name="submit" value="">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                  <span id="location"><?= $_SESSION['name'] ?></span>
                                </button>
                              </form>
                            </li>
                          </a>
                        <?php
                        }
                        ?>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- //close small div -->
        </div>
      </div>
    </div>
    <!-- //header -->
    <!--DON'T KNOW WHEN IT STARTS
	</div>
	</div>-->
    <!-- navigation -->
    <div class="navbar navbar-inverse shadow_b" style="margin-bottom: 0px;background-color: #050505; border: 0px !important;">
      <div class="container-fluid">
        <div class="row">
          <div style="padding: 0px">
            <div class="navbar-header" style="background-color: #333;">
              <button
                class="navbar-toggle"
                data-target="#mobile_menu"
                data-toggle="collapse"
                onclick="myFun(this)">
                <span class="icon-bar icon-bar1"></span>
                <span class="icon-bar icon-bar2"></span>
                <span class="icon-bar icon-bar3"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse" id="mobile_menu" style="margin-top: 0px">
              <ul class="nav navbar-nav navbar-center">
                <li id="lg_side_active">
                  <a href="#">
                    <span onclick="openNav()">&#9776;</span>
                  </a>
                </li>
                <li id="homeactive" class="active">
                  <a href="../Main/hfe.php" style="display:flex;align-items:center;justify-content:center;">
                    <i class="fa fa-home fa-lg" style="font-size:20px;"></i> &nbsp; Home
                  </a>
                </li>
                <?php
                if (isset($_SESSION['sid'])) {
                ?>
                  <li id="shopactive">
                    <a href="../../equipment-store-admin/index.php?id=<?= $_SESSION['sid'] ?>" style="display:flex;align-items:center;justify-content:center;">
                      <i class="fas fa-lg fa-store" style="font-size:16px;"></i> &nbsp; Store
                    </a>
                  </li>
                <?php
                }
                ?>
                <li id="aboutactive">
                  <a href="../Main/about.php" style="display:flex;align-items:center;justify-content:center;">
                    <i class="fa fa-lg fa-info-circle" style="font-size:18px;"></i> &nbsp; About
                  </a>
                </li>
                <li id="contactactive">
                  <a href="../Main/contact.php" style="display:flex;align-items:center;justify-content:center;">
                    <i class="fa fa-lg fa-users" style="font-size:16px;"></i> &nbsp; Contact Us
                  </a>
                </li>

                <?php
                if (isset($_SESSION['name'])) {
                ?>
                  <li class="profilediv">
                    <form action="../Account/registered.php" method="post" class="last" onclick="openNav()">
                      <button class=" usericon " type="button" name="submit" value="">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span><?= $_SESSION['name'] ?></span>
                      </button>
                    </form>
                  </li>
                <?php
                }
                ?>
                <li class="profile-popup">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display:flex;align-items:center;justify-content:center;">
                    <span class="glyphicon glyphicon-user" style="font-size:16px;"></span> Profile <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" style="border:1px solid rgb(55, 55, 55);padding: 0px; background-color: #000 !important; color:white !important;">
                    <?php
                    if (!isset($_SESSION['id'])) {
                    ?>
                      <a href="../Account/login.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;padding-top: 8px;">&nbsp;
                          <span class="fa fa-sign-in" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> Login </span>
                        </li>
                      </a>
                      <hr style="margin:0;padding: 0">
                      <a href="../Account/registered.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;padding-top: 8px;">&nbsp;
                          <span class="fa fa-user-plus" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> Sign Up </span>
                        </li>
                      </a>
                    <?php
                    } else if (isset($_SESSION['id'])) {
                    ?>
                      <a href="../Order/myorders.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;padding-top: 8px;">&nbsp;
                          <span class="fas fa-shopping-bag" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> My Orders</span>
                        </li>
                      </a>
                      <hr style="margin:0;padding: 0">
                      <a href="../Order/orderhistory.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;;padding-top: 8px;">&nbsp;
                          <span class="fas fa-history" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> Order
                            history</span>
                        </li>
                      </a>
                      <hr style="margin:0;padding: 0">
                      <a href="../Account/edit_user_details.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;padding-top: 8px;">&nbsp;
                          <span class="fas fa-user-cog" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> Change
                            details</span>
                        </li>
                      </a>
                      <hr style="margin:0;padding: 0">
                      <a href="../Account/logout.php">
                        <li
                          onmouseover="$(this).css('color','white')"
                          onmouseleave="$(this).css('background-color','black')"
                          style="padding-bottom: 8px;padding-top: 8px;">&nbsp;
                          <span class="fas fa-power-off" style="color: white;"></span>
                          <span style="font-family: arial;font-weight: 700; "> Log out</span>
                        </li>
                      </a>
                    <?php
                    }
                    ?>
                  </ul>
                </li>
                <li class="locationdiv">
                  <form action="#" method="post" class="last">
                    <button class="location_marker popup2_open" type="submit" name="submit" value="">
                      <i class="fa  fa-map-marker dropdown" aria-hidden="true"></i>
                    </button>
                  </form>
                </li>
                <li class="cartdiv">
                  <form action="#" method="post" class="last">
                    <div id="cart" class="btn-group btn-shopping-cart">
                      <a href="../Cart/cart.php">
                        <div class="shopcart">
                          <div id="lg-cartcnt" class="crt-count">
                            <?php
                            if (isset($_SESSION['cart_count'])) {
                              echo $_SESSION['cart_count'];
                            } else {
                              echo "0";
                            }
                            ?>
                          </div>
                          <input type="hidden" name="cmd" value="_cart">
                          <input type="hidden" name="display" value="1">
                          <button class="carticon" type="button" onclick="cartview()" name="submit" value="">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                  </form>
                </li>
                <li class="wishdiv">
                  <form action="#" method="post" class="last">
                    <button class=" wishicon" type="button" name="submit" value="" onclick="location.href='../Wishlist/wishlist.php';">
                      <i class="fa fa-heart" aria-hidden="true"></i>
                    </button>
                  </form>
                </li>
                <?php
                if (!isset($_SESSION['name'])) {
                ?>
                  <li class="logindiv">
                    <a href="#myModal" data-toggle="modal" data-dismiss="modal">
                      <i class="fa fa-sign-in dropdown" style="color: white;font-size:16px;" aria-hidden="true"></i>
                    </a>
                  </li>
                  <!-- <li>
                    <a href="#myModal" data-toggle="modal" data-dismiss="modal">
                      <span class="fa fa-sign-in" style="color: white;font-size:16px;"></span>
                    </a>
                  </li> -->
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-3" style="margin-top: -20px;padding-left: 0px;">
            <!--krg-->
            <div class="option_segment" style="margin-top: -20px">
              <div class="agile-login">
                <ul class="nav navbar-nav navbar-right navbar-center"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--</nav>-->
  <!--LOCATION ACCESS-->
  <section id="popup2">
    <div class="multi-gd-img">
      <ul class="multi-column-dropdown">
        <h6>Your Location</h6>
        <li>
          <input type="tel" class="locmark" name="pincode" id="pincode" placeholder="PIN" style="background-color: black !important;">
          <button type="button" name="pin" class="locbtn" onclick="locate()">
            <i class="fa fa-search"></i>
          </button>
        </li>
        <li style="display: none;" id="setloc">
          <!--pop up location-->
          <span class="popuptext" id="myPopup">
            <select name="po_list" class="locmark" id="po_list" style="background-color: black !important;">
              <option value="0" selected="" disabled="">location</option>
            </select>
          </span>
          <!--pop up set location-->
          <button class="popuptext locbtn" type="button" name="pin" onclick="setlocation()">
            <i class="fa fa-check"></i>
          </button>
        </li>
      </ul>
    </div>
  </section>
  <!--LOCATION ACCESS-->
  <!--SIDE NAV BAR-->
  <div
    id="mySidenav"
    class="sidenav scroll_handle_blue"
    style="z-index: 99999999;padding-top: 0px;overflow-y: scroll;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="float: left;width: 100%;">
      <img src="../../images/close.png" alt="close">
    </a>
    <a class="username-placeholder">
      <i class="fas fa-user-circle fa-2x">
        <span style="font-family: arial;font-weight: bold;font-size: 22px;">
          Hello,
          <?php
          if (isset($_SESSION['name'])) {
          ?>
            <span><?= $_SESSION['name'] ?></span>
          <?php
          } else {
          ?>
            <span> Log in </span>
          <?php
          }
          ?>
        </span>
      </i>
    </a><br>
    <!-- ||||||||||||||||||||||||||||||||||||||||||||||||#1#|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <a class="side_nav_content_header" href="#" style="color: #139b3b">
      <i class="fa fa-sm fa-shopping-cart" style="color:white "></i> Shop By Category
    </a>
    <?php
    require "../../db.php";
    $query11 = "SELECT * from  category";
    $st11 = $pdo->query($query11);
    while ($row11 = $st11->fetch(PDO::FETCH_ASSOC)) {
      $category_id = $row11['category_id'];
      $category_name = $row11['category_name'];
    ?>
      <button class="dropdown-btn  category_side_head" id="list_enda" style="width: 100%;float: left;padding-left: 0px;">
        <a href="../Product/products_limited.php?category_id=<?= $category_id ?>" style="color: white;"> <?= $category_name ?></a>
      </button>
    <?php
    }
    ?>

    <div id="side_cat_list_end_default" style="margin-top: 370px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_enda" style="display: none;margin-top: 333px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endb" style="display: none;margin-top: 296px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endc" style="display: none;margin-top: 259px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endd" style="display: none;margin-top: 222px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_ende" style="display: none;margin-top: 185px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endf" style="display: none;margin-top: 148px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endg" style="display: none;margin-top: 111px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endh" style="display: none;margin-top: 74px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endi" style="display: none;margin-top: 37px;"></div><!--n+4 breaks 37px difference-->
    <div id="side_cat_list_endj" style="display: none;margin-top: 0px;"></div><!--n+4 breaks 37px difference-->
    <a class="side_nav_content_end" id="side_nav_content_end_line" href="#"></a><br />
    <a class="side_nav_content_header" href="#" style="color: #139b3b">
      <i class="fa fa-sm fa-cog" style="color:white "></i> Help & Settings
    </a>
    <?php
    if (isset($_SESSION['id'])) {
    ?>
      <a class="side_nav_content_head" href="../Account/edit_user_details.php">My Account</a>
      <a class="side_nav_content_head" href="../Order/myorders.php">My orders</a>
    <?php
    }
    ?>
    <a class="side_nav_content_head" href="../Main/about.php">About</a>
    <a class="side_nav_content_head" href="../Main/contact.php">Contact</a>
    <?php
    if (!isset($_SESSION['id'])) {
    ?>
      <a
        class="side_nav_content_head"
        onclick="closeNav()"
        href="#myModal"
        data-toggle="modal"
        data-dismiss="modal">Sign In
      </a>
    <?php
    } else {
    ?>
      <a class="side_nav_content_head" href="../Account/logout.php">Log out</a>
    <?php
    }
    ?>
    <a class="side_nav_content_end" href="#"></a>
  </div>
  <!--SIDE-BAR-DIV #139b3b,#02171e,#337ab7-->
  <!--<div id="main_all" style="padding: 0px;margin: 0px;left: 0px;right: 0px">-->
  <!--SIDE-BAR-DIV-->