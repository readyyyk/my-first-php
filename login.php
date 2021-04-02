<?php

    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
    session_start();

    $login = $_POST['login'];
    $pswd = $_POST['pswd'];

    $_SESSION['login'] = $login;
    $_SESSION['pswd'] = $pswd;

    $prof = mysqli_query($con,"SELECT * FROM `profiles` WHERE login='$login'");
    $prof = mysqli_fetch_assoc($prof);
    if( $prof['id'] > -1 ){
        if( password_verify($pswd,$prof['password']) ){
              echo "<center> <h1 style='color:green;'> You verified </h1> <h2> Hello, " . $prof['login'] . " </h2> <hr> <h2> <a href='index.php'> Home </a> </h2></center>";
              $_SESSION['logged_user'] = $prof;
        }else{
              echo "<center><h1>You are not verified </h1> <br> <h2>Password is wrong </h2> <hr> <h2> <a href='index.php'>Home </a> </h2></center>";
        }
    } else {
      header('Location:reg.php');
    }
    exit();
