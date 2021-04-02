<?php
        $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
        session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.index.css">
</head>
<body>
    <div id="my-header"></div>
        <div class="login" style="padding:2rem;border-radius:30px">
            <h2 class="note--title">Registration</h2>
            <form action="reg.php" method="post" class="note--form">
                <div class="text-input" style="margin-bottom:.5rem"><input type="text" name="login" placeholder="Login:" required autocorrect="off"></div>
                <div class="inputs" style="margin: 3rem 0px 3rem">
                    <div class="pswd"><input name="pswd" placeholder="Password:" required autocorrect="off" type="password"></div>
                    <div class="pswd"><input name="pswd1" placeholder="Repeat your password:" required autocorrect="off" type="password"></div>
                </div>
                <div class="errors" style="height: 12rem;width:100%">
<?
        if(isset($_POST['login'])){
        $login = $_POST['login'];
        $pswd = $_POST['pswd'];
        $pswd1 = $_POST['pswd1'];

        $que = mysqli_query($con, "select * from `profiles` where login = " . "'" . $login . "'");

        if(mysqli_fetch_assoc($que)){
            echo "<h3 style='color:red;'>Аккаунт с таким логином уже существует</h3>";
        } else if(strlen($login) < 4){
            echo "<h3 style='color:red;'>Логин слишком короткий</h3>";
        }else if(strlen($pswd) < 4){
            echo "<h3 style='color:red;'>Пароль слишком короткий</h3>";
        } else if($pswd != $pswd1){
            echo "<h3 style='color:red;'>Пароли не совпадают</h3>";
        } else {

        $pswd = password_hash($pswd,PASSWORD_DEFAULT);
        $query = mysqli_query($con,"INSERT INTO `profiles`(`login`, `password`) VALUES ('$login','$pswd')");
        if($query){
              $prof = mysqli_query($con,"SELECT * FROM `profiles` WHERE login='$login'");
              $prof = mysqli_fetch_assoc($prof);
              $_SESSION['logged_user'] = $prof;
              echo "<script>document.location.replace('index.php')</script>";
        }}}
?>
                </div>
                <div class="snr-reg">
                    <input type="submit">
                    <input type="reset" value="Отмена" onclick="location.replace('index.php')">
                </div>
            </form>
        </div>
    <div id="my-header-drop"></div>
    <script src="header.js"></script>
</body>
</html>
