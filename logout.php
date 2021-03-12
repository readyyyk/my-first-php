<?php
      $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
      session_start();

      unset($_SESSION['logged_user']);
      header("Location:index.php");
