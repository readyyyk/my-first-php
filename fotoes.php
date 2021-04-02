<?php
    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
    session_start();

    $query = mysqli_query($con, "SELECT `id` FROM `images` ORDER BY `id` DESC");
    $_SESSION['img_i'] = mysqli_fetch_assoc($query)["id"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fotoes</title>
    <link rel="stylesheet" href="style.index.css">
</head>
<body>

    <div id="my-header"></div>

    <?php
        if(isset($_POST['sbm'])){
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $type = substr($type, strpos($type, '/')+1);
            $tmp_name = $_FILES['myfile']['tmp_name'];
//echo $name;
            $_SESSION['img_i'] += 1;
            $img_i = $_SESSION['img_i'];

            $location = "files/images/$img_i" . '.' . "$type";
            move_uploaded_file($tmp_name, "$location");

            $query = mysqli_query($con, "INSERT INTO `images` (`location`) VALUES (" . "'" . $location . "'" . ")");

            if($query){
                echo "<h2 style='color:green;background-color:lightgreen;display:flex;justify-content:center;width:100%'> Image was sent </h2>";
            }
        }
    ?>

    <form method="post" enctype="multipart/form-data">
        <input type='file' name='myfile'/>
        <input type="submit" name="sbm" />
    </form>

    <div class="df">

        <?php
            $query = mysqli_query($con, "SELECT * FROM `images` ORDER BY `id` DESC");
            while($img = mysqli_fetch_assoc($query)){
                echo "
                    <div class='df__el'>
                        <img src = " . $img['location'] . ">
                    </div>
                ";
            }
        ?>

    </div>

     <div id="my-header-drop"></div>

    <script src="header.js"></script>
</body>
</html>
