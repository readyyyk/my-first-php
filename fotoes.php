<?php
    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fotoes</title>
</head>
<body>

   <?php

    if(isset($_POST['sbm'])){
        $type = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES["myfile"]["tmp_name"]);
        #var_dump($_FILES["myfile"]["tmp_name"]);

        $query = mysqli_query($con, "INSERT INTO `images` (`image`, `type`) VALUES ($data,$type)");
        if($query){
            header("Location: index.php");
        }
    }

    ?>


    <?php
        $name = $_FILES['myfile']['name'];
        $tmp_name = $_FILES['myfile']['tmp_name'];
        $location = "images/avatars/$name";

        move_uploaded_file($tmp_name, $location);
        $query = mysqli_query($con, "INSERT INTO `images` (`image`, `type`) VALUES ($location,$type)");
        if($query){
            header("Location: index.php");
        }
    ?>



    <?php/*
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";

*/?>



    <form method="post" enctype="multipart/form-data">
        <input type='file' name='myfile'/>
        <input type="submit" name="sbm" />
    </form>

    <div class="df">
        <!--<div class="df__el"></div>-->
    </div>

</body>
</html>
