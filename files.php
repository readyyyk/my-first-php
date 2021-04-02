<?php
    $con = mysqli_connect("127.0.0.1", "root", "", "my-first-php-sql");
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>files</title>
    <link rel="stylesheet" href="style.index.css">
</head>
<body>

    <div id="my-header"></div>


    <?php
        if(isset($_POST['sbm'])){

            $que = mysqli_query($con, "SELECT `id` FROM `files` ORDER BY `id` DESC");
            $li = mysqli_fetch_assoc($que)['id']+1;

            $name = $_FILES['nf']['name'];
            $tmp_name = $_FILES['nf']['tmp_name'];
            $type = substr($name,strripos($name, "."));

            //echo $type;

            $location = "files/files/" . "$li$type";

            //echo $location;

            move_uploaded_file($tmp_name, $location);

            //echo "insert into `files` values(," .  "'" . "$location" . "'" . ")";

            $que = mysqli_query($con, "insert into `files` (`location`, `file_name`) values(" .  "'" . "$location" . "','" . "$name'" . ")");
            if($que){
                echo "<h2 style='color:green;background-color:lightgreen;display:flex;justify-content:center;width:100%'> File was sent </h2>";
            }
        }
    ?>

    <main>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="nf"/>
            <input type="submit" name="sbm" />
        </form>

        <div class="di">
            <?php
                $que = mysqli_query($con, "SELECT * FROM `files` ORDER BY `id` DESC");
                while($el = mysqli_fetch_assoc($que)){
                    echo "
                        <div class='di__el'>
                            <a href=' ". $el['location'] ." '>" . $el['file_name'] . " </a>
                        </div>
                    ";
                }
            ?>
        </div>

    </main>


    <div id="my-header-drop"></div>

    <script src="header.js"></script>
</body>
</html>
