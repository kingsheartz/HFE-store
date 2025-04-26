<?php
session_start();
require '..\..\db.php';
unset($_SESSION['admin']);
if (isset($_POST['user']) || isset($_POST['pass'])) {
    $query = "SELECT * from admin";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($_POST['user'] != $row['username'] && !(password_verify($_POST['pass'], $row['password']))) {
        $_SESSION['error'] = "<script>$('#psin').show();
      $('#psin2').hide();
      $('#usin').show();
      $('#usin2').hide();
      $('#errorms').text('Incorrect UserName And Password');
      $('#errorms').show();</script>";
        header('Location:login.php');
        return;
    }
    if ($_POST['user'] != $row['username']) {
        $_SESSION['error'] = "<script>$('#usin').show();
    $('#usin2').hide();
    $('#errorms').text('Incorrect User Name');
    $('#errorms').show();</script>";
        header('Location:login.php');
        return;
    }
    if (!(password_verify($_POST['pass'], $row['password']))) {
        $_SESSION['error'] = "<script>$('#psin').show();
    $('#psin2').hide();
    $('#errorms').text('Incorrect Password');
    $('#errorms').show();</script>";
        header('Location:login.php');
        return;
    }
    if ($_POST['user'] == $row['username'] && password_verify($_POST['pass'], $row['password'])) {
        $_SESSION['admin'] = "1";
        header('Location:../dashboard/main.php');
    }
}
?>

<head>
    <title>Health care & Fitness</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login-style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<script>

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    function check() {
        $("#logfrm").submit(function (e) {
            var validationFailed = false;
            var us = $('#user').val();
            var ps = $('#pass').val();
            if (ps == '' && us == '') {
                console.log('All Fields Must Be Filled');
                $('#psin').show();
                $('#psin2').hide();
                $('#usin').show();
                $('#usin2').hide();
                $('#errorms').text("All Fields Must Be Filled");
                $('#errorms').show();
                validationFailed = true;
            }
            if (us == '') {
                $('#usin').show();
                $('#usin2').hide();
                $('#errorms').text("User Name Must Be Filled");
                $('#errorms').show();
                validationFailed = true;
            }
            if (ps == '') {
                $('#psin').show();
                $('#psin2').hide();
                $('#errorms').text("Password Must Be Filled");
                $('#errorms').show();
                validationFailed = true;
            }
            if (validationFailed) {
                e.preventDefault();
                return false;
            }
        });

    }
    function change() {
        $('#psin').hide();
        $('#psin2').show();
        $('#usin').hide();
        $('#usin2').show();
        $('#errorms').hide();
    }
</script>
<div class="bck">
    <div class="back-bd-as col-sm-5 ">
    </div>
</div>
<div class="row justify-content-center">
    <div class="card col-sm-5 ">
        <form method="post" name="logfrm" id="logfrm">
            <div style="height: 60px;">
                <span class="card-head">ADMIN PANEL</span>
            </div>
            <span id="errorms">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </span>
            <div class="card-body">
                <label> USERNAME</label><br>
                <div class="grp">
                    <input onkeyup="change()" type="text" name="user" id="user">
                    <i class="fas fa-info-circle" id="usin" style="display:none;"></i>
                    <i class="fas fa-user-tie" id="usin2"></i>
                </div>
                <label> PASSWORD</label><br>
                <div class="grp">
                    <input name="pass" onkeyup="change()" type="password" id="pass">
                    <i class="fas fa-info-circle" id="psin" style="display:none;"></i>
                    <i class="fas fa-lock" id="psin2"></i>
                </div><br>
            </div>
            <div class="card-footer">
                <button type="submit" onclick="check()" class="Login"> Log In</button>
            </div>
        </form>
    </div>
</div>