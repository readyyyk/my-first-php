<?php
      session_start();

      $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

      $date = date('Y-m-d');
      $time = date('H:i:s');

      $title = $_POST['title'];
      $text = $_POST['text'];
      $user = $_SESSION['logged_user']['login'];
      $query = mysqli_query($con,"INSERT INTO `notes`(`date`, `time`, `text`, `title`, `user`) VALUES ('$date','$time','$text', '$title', '$user')");
if($query){ header('Location: index.php');
      ?>
<center><h1>Note was sent!</h1></center><br><a href="index.php"><center><h2>Home</h2></center></a><?php
}else{
      ?>
      <center><h1>Something gone wrong.....</h1></center><br><a href="index.php"><center><h2>Home</h2></center></a><?php
}
exit();
?>
