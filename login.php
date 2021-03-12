<?php

      $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
      session_start();

      $login = $_POST['login'];
      $pswd = $_POST['pswd'];

      $prof = mysqli_query($con,"SELECT * FROM `profiles` WHERE login='$login'");
      $prof = mysqli_fetch_assoc($prof);
      if( $prof['id'] > -1 ){
            if( password_verify($pswd,$prof['password']) ){
                  echo "<center>You verified <br> Hello, " . $prof['login'] . " <hr> <a href='index.php'>Home</center>";
                  $_SESSION['logged_user'] = $prof;
            }else{
                  echo "<center>You are not verified <br> Password is wrong <hr> <a href='index.php'>Home</center>";
            }
      }else{
      $pswd = password_hash($_POST['pswd'],PASSWORD_DEFAULT);
      $query = mysqli_query($con,"INSERT INTO `profiles`(`login`, `password`) VALUES ('$login','$pswd')");
if($query){
      $prof = mysqli_query($con,"SELECT * FROM `profiles` WHERE login='$login'");
      $prof = mysqli_fetch_assoc($prof);
      $_SESSION['logged_user'] = $prof;
      header('Location: index.php');
}else{
      ?>
      <center><h1>Something went wrong.....</h1><br></center><br><a href="index.php"><center><h2>Home</h2></center></a><?php
}
exit();}
