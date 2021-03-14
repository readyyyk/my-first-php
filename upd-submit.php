<?php
    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

    session_start();

    $title = $_POST['title'];
    $text = $_POST['text'];
    $id = $_POST['sqlid'];

    $query = mysqli_query($con, "UPDATE `notes` SET `text`=' * $text',`title`='* $title' WHERE `id` = $id ");

    if($query){ header('Location: index.php'); }
