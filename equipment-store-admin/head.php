<!DOCTYPE html>
<html lang="en">

<head>
  <title>One Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link id="pagestyle" rel="stylesheet" type="text/css" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="images/logo/favicon.png" rel="icon" />
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/style4.css">
  <!-- SweetAlert2 -->
  <script src="../extras/OS/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../extras/OS/plugins/toastr/toastr.min.js"></script>
  <!-- Defining Toastr -->
  <!--JS GRID 1 KRG--><!--
<link type="text/css" rel="stylesheet" href="js/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="js/jsgrid-theme.min.css" />
<script type="text/javascript" srcF="js/jsgrid.min.js"></script>-->
  <!--JS GRID 1 KRG-->
  <!--JS GRID 1 GDAS-->
  <!--JS GRID 1 GDAS-->
  <script type="text/javascript">
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  </script>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsgrid@1.5.3/dist/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsgrid@1.5.3/dist/jsgrid-theme.min.css" />
  <!-- jsGrid JS -->
  <script src="https://cdn.jsdelivr.net/npm/jsgrid@1.5.3/dist/jsgrid.min.js"></script>
</head>
<?php
session_start();
if (isset($_GET['id'])) {
  $_SESSION['id'] = $_GET['id'];

  require "pdo.php";
  $nw = $_SESSION['id'];
  $qu = "SELECT username, store_id from store_admin where id=$nw";
  $st = $pdo->query($qu);
  $r = $st->fetch(PDO::FETCH_ASSOC);
  $_SESSION['id'] = $r['store_id'];
  $_SESSION['username'] = $r['username'];
}
if (!isset($_SESSION['username'])) {
  die("<div style='width: 100%;display: flex;flex-wrap: wrap;margin-right: -0.75rem;margin-left: -0.75rem;
          justify-content:center;padding-top:50px;padding-bottom:50px'>
        <a href='../login.php'><img class='img-responsive' src='images/logo/loginerr.png'></a>
      </div>");
}
?>
<style>
  .main-frame {
    margin-top: 100px;
    margin-right: -35px;
  }

  a.nav-link {
    border-left: none !important;
    color: #999999 !important;
  }

  .nav>li>a:focus,
  .nav>li>a:hover,
  .nav>li>a:active,
  .nav>li.active>a {
    background-color: #152230 !important;
    color: white !important;
  }

  span.uppernum,
  span.uppernum1 {
    position: absolute;
    top: 5px;
    left: 24px;
    background: #ff010199;
    color: #ffffff;
    border-radius: 10px;
    width: 20px;
    height: 20px;
    text-align: center;
    box-sizing: content-box;
  }

  .cart .well {
    background-color: #17212f;
    font-family: serif;
    color: white;
    margin-bottom: 0;
    position: relative;
    border: 0px !important;
    overflow: hidden;
    padding: 5px;
    padding-bottom: 20px;
  }

  .nav>li>a>i.fa {
    font-size: 15px;
    padding-right: 5px;
  }

  #mainPieChart {
    margin-top: 30px !important;
    height: 400px;
    background: #17212f;
    padding: 0;
    margin-left: 15px;
    border-radius: 5px;
  }

  #calendar-div {
    overflow-x: auto;
    overflow-y: hidden;
    padding: 0;
    background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #17212f), color-stop(1, #17212f)) !important;
    border-top: none;
    position: absolute;
    float: right;
    right: -40px;
    border-radius: 5px;
    height: fit-content;
  }

  .table1 {
    height: auto;
    border-radius: 5px;
    overflow: auto;
    background-color: #17212f;
    margin-top: 80px;
    margin-bottom: 20px;
    border-top: 0px;
    box-shadow: 1px 1px 3px rgb(0 0 0 / 10%);
  }

  .jsgrid-header-row>.jsgrid-header-cell {
    background-color: #7979796e !important;
    border-color: #656466 !important;
    color: rgb(255, 255, 255);
    font-size: 12px;
    font-weight: bold;
  }

  .jsgrid-filter-row>.jsgrid-cell {
    background-color: #7979796e !important;
    border-color: #656466 !important;
    color: #afafb0;
    font-size: 12px;
    font-weight: bold;
  }

  .jsgrid-insert-row>.jsgrid-cell,
  .jsgrid-row>.jsgrid-cell,
  .jsgrid-alt-row>.jsgrid-cell,
  .jsgrid-selected-row>.jsgrid-cell {
    background-color: #5252522e !important;
    border-color: #656466 !important;
    color: rgb(255, 255, 255);
    font-size: 12px;
    font-weight: bold;
    border: 1px solid #656466;
  }

  .jsgrid-insert-row:hover,
  .jsgrid-row:hover,
  .jsgrid-alt-row :hover,
  .jsgrid-insert-row:focus,
  .jsgrid-row:focus,
  .jsgrid-alt-row:focus,
  .jsgrid-selected-row>.jsgrid-cell:hover {
    background-color: transparent !important;
    border-color: rgb(255, 255, 255);
  }

  .jsgrid-grid-body {
    border-top: none;
    border: 1px solid #41424c;
    background: transparent;
    padding: 0px;
  }

  .jsgrid-grid-header {
    background: transparent;
    border: 0px;
    padding: 0px;
  }

  .jsgrid-nodata-row .jsgrid-cell {
    padding: .5em 0;
    text-align: center;
    background: #5252522e !important;
    color: white;
  }

  .jsgrid-edit-row>.jsgrid-cell,
  .jsgrid-filter-row>.jsgrid-cell,
  .jsgrid-grid-body,
  .jsgrid-grid-header,
  .jsgrid-header-row>.jsgrid-header-cell,
  .jsgrid-insert-row>.jsgrid-cell,
  .jsgrid-grid-header {
    border: 1px solid #8585851a !important;
  }

  .jsgrid-header-scrollbar {
    display: contents;
  }

  h4,
  h4>i {
    font-size: 14px !important;
    color: #afafaf !important;
    margin: 0px !important;
    border-bottom: 0px !important;
  }

  .jsgrid-cell>input[type="text"],
  .jsgrid-cell>select {
    background: #bebebe6e;
    border-radius: 5px;
    border: 0px;
    color: white;
  }

  .jsgrid-pager-container {
    color: #969696;
  }

  .panel.panel-default {
    border: 0px !important;
    border-radius: 5px;
  }

  li.list-group-item {
    background: #17212f !important;
    box-shadow: 0px -2px 0px #18191e !important;
  }

  .panel-group {
    margin-bottom: 20px;
    margin-left: 15px;
    margin-top: -30px;
  }

  .recently-added {
    padding: 0px;
    margin-left: 80px;
    margin-top: -150px;
    margin-right: -20px;
    position: relative;
    float: right;
    width: 64%;
  }

  #event {
    height: 40px;
    padding: 10px;
    color: white;
    font-size: 12px;
    background-color: #dedede2b;
  }

  h4 {
    padding: 10px;
    box-shadow: 0px 1px 1px #4b4b4b;
    margin-left: 0px;
  }

  .well-text h4 {
    font-weight: bolder;
    box-shadow: none !important;
    padding-left: 0px;
  }

  .new-text {
    padding: 5px;
    text-align: left;
    position: absolute;
    bottom: 0;
    object-fit: cover;
    width: 100%;
    height: 25px;
    left: 0;
    font-size: 12px;
    box-shadow: 0px -1px 0px #313442 !important;
  }

  a.text-under {
    color: #a9a9a9;
    text-decoration: none;
  }

  .text-under>span>i {
    position: relative !important;
    float: right !important;
  }

  .ban-top {
    position: absolute;
    overflow: hidden;
    height: 75px;
    width: 75px;
    right: 0px;
    top: 30px;
    opacity: .3;
    font-size: 50px;
    float: right;
    color: #656566;
  }

  p.num {
    color: #d1d1d1;
    opacity: .7;
    font-size: 30px;
  }

  .recently-added>.panel {
    height: 150px;
    background: #17212f;
  }
</style>