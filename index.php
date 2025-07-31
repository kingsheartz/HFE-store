<?php
session_start();
$_COOKIE['animate'] = 0;
?>
<!DOCTYPE html>
<html>

<head>
  <title>Healthcare & Fitness Equipment</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="images/logo/favicon.png" rel="icon" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="js/jquery-1.11.1.min.js"></script>
  <style type="text/css">
    /* loader 0: loader svg */
    .loader {
      position: fixed;
      z-index: 99;
      top: 0;
      left: 0;
      height: 100%;
      background-color: rgb(000, 000, 000, 0.85);
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader img.main-svg {
      position: absolute;
      margin-top: 0px;
      z-index: 99;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader img.bg-svg {
      position: absolute;
      margin-top: 180px;
      z-index: 99;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader.hidden {
      animation: fadeout 2s;
      animation-fill-mode: forwards;
    }

    @keyframes fadeout {
      100% {
        opacity: 100%;
        visibility: hidden;
      }
    }

    /* loader 0: loader svg */

    /* loader 1: background image */

    .loader1 {
      position: fixed;
      z-index: 98;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader1 {
      animation: fadeimg 3s infinite;
      animation-fill-mode: forwards;
    }

    @keyframes fadeimg {
      100% {
        opacity: 100%;
        visibility: hidden;
      }
    }

    img.ri {
      overflow-x: hidden;
      position: fixed;
      min-width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.9);
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

    /* loader 1: background image */

    /* loader 2: main icon */
    .loader2 {
      position: fixed;
      z-index: 99;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader2 {
      animation: fadeloga 4s;
      animation-fill-mode: forwards;
    }

    @keyframes fadeloga {
      100% {
        opacity: 100%;
        visibility: hidden;
      }
    }

    img.ic {
      max-height: 100px;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 999;
    }

    img.ic:empty {
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    /* loader 2: main icon */
  </style>
</head>

<body onload="userlogged_in()">
  <!-- loader svg -->
  <div class="loader">
    <img class="main-svg" src="images/load/rotating-circle.svg" height="125" alt="loading..." />
    <img class="bg-svg" src="images/load/dot-bouncer.svg" height="20" alt="loading..." />
  </div>
  <!-- background image -->
  <div class="loader1">
    <img src="images/logo/store1.png" class="ri" />
  </div>
  <!-- main icon -->
  <div class="loader2">
    <img src="images/logo/favicon.png" class="ic">
  </div>
  <script src="js/sweetalert.min.js"></script>
  <script type="text/javascript">
    function getCookie(name) {
      // Split cookie string and get all individual name=value pairs in an array
      var cookieArr = document.cookie.split(";");

      // Loop through the array elements
      for (var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");

        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if (name == cookiePair[0].trim()) {
          // Decode the cookie value and return
          return decodeURIComponent(cookiePair[1]);
        }
      }

      // Return null if not found
      return " ";
    }

    function userlogged_in() {
      setTimeout(() => {
        const loader = document.querySelector(".loader1");
        console.log(loader);
        loader.className += " hidden";


        var email = getCookie("HFE_email");
        var pass = getCookie("HFE_password");
        if (email != " " && pass != " ") {
          //$("#strt").hide();
          $.ajax({
            url: "customer/Common/functions.php", //passing page info
            data: {
              "login": 1,
              "email": email,
              "password": pass
            }, //form data
            type: "post", //post data
            dataType: "json", //datatype=json format
            timeout: 18000, //waiting time 3 sec

            success: function(data) { //if logging in is success
              if (data.admin == 'true' && data.user == 'true') {
                location.href = "customer/Main/hfe.php";
              } else if (data.status == 'success') {
                location.href = "customer/Main/hfe.php";
                return
              } else if (data.admin == 'true') {

                location.href = "equipment-store-admin/index.php?id=" + data.id + "";
              } else if (data.status == 'error') {
                location.href = "customer/Main/hfe.php";
                return;
              } else {
                if (status === "error1") {
                  swal({
                    title: "Oops!!!",
                    text: "Verify your email",
                    icon: "error",
                    closeOnClickOutside: false,
                    dangerMode: true,
                    timer: 6000,
                  });
                  location.href = "customer/Main/hfe.php";
                }
                location.href = "customer/Main/hfe.php";
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
                location.href = "customer/Main/hfe.php";
                return;
              } else {
                return;
              }
            }
          }); //closing ajax
        } else {
          console.log('loading main page')
          location.href = "customer/Main/hfe.php";
        }
      }, 2000);
    }
  </script>
</body>

</html>