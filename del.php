<?php

      $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

      $sqlid = $_GET['sqlid'];
      $query = mysqli_query($con,"DELETE FROM `notes` WHERE id=$sqlid");
if($query){ header('Location: index.php');
      ?>
<center><h1>Note was deleted!</h1></center><br><a href="index.php"><center><h2>Home</h2></center></a><?php
}else{
      ?>
      <center><h1>Something went wrong.....</h1></center><br><a href="index.php"><center><h2>Home</h2></center></a><?php
}
exit();
?>
