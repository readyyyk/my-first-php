<?php
      $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
      session_start();

      if($_SESSION['logged_user']['login'] == "admin"){
            echo "<center><h1>You are <b style='color:green; background-color:light-green'> admin</h1><br><h2><a href='index.php'>Home</h2></center>";
      } else {
            echo "<center><h1>You are not <b style='color:red; background-color:light-red'> admin</h1><br><h2><a href='index.php'>Home</h2></center>";
      }
