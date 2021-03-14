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

    <header class="header">
            <div class="header--inner">
                  <div class="header--el"><a href="index.php" class="header--el--link">Home</a></div>
                  <div class="header--el"><a href="#" class="header--el--link" onclick="login()">Log in</a></div>
                  <div class="header--el"><a href="#" class="header--el--link" onclick="newNote()">New note</a></div>
                  <div class="header--el"><a href="https://vk.com/readyk" class="header--el--link">Send a message</a></div>
                  <div class="header--el"><a href="fotoes.php" class="header--el--link">fotoes</a></div>
                  <div class="header--el"><a href="files.php" class="header--el--link">Files</a></div>
                  <div class="header--el"><a href="foradmin.php" class="header--el--link">For admin</a></div>
                  <div class="header--el"><a href="#" class="header--el--link">Info</a></div>
                  <div class="header--el"><a href="logout.php" class="header--el--link">Log out</a></div>
            </div>
      </header>

    <?php
        if(isset($_POST['sbm'])){
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $type = substr($type, strpos($type, '/')+1);
            $tmp_name = $_FILES['myfile']['tmp_name'];

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

     <div class="note--wrapper" id="newNote">
            <div class="note">
                  <h2 class="note--title"></h2>
                  <form action="newNote.php" method="post" class="note--form">
                        <div class="text-input"><input type="text" name="title" placeholder="Note title:" required autocorrect="off"></div>
                        <div class="textarea"><textarea name="text" placeholder="Note text:" required autocorrect="off"></textarea></div>
                        <div class="snr">
                              <input type="submit">
                              <input type="reset" value="Отмена" onclick="newNoteClose()">
                        </div>
                  </form>
            </div>
      </div>
      <div class="note--wrapper" id="login">
            <div class="login" style="padding:2rem;border-radius:30px">
                  <h2 class="note--title">Login</h2>
                  <form action="login.php" method="post" class="note--form">
                        <div class="text-input" style="margin-bottom:.5rem"><input type="text" name="login" placeholder="Login:" required autocorrect="off"></div>
                        <div class="textarea" style="margin-bottom:15rem"><input name="pswd" placeholder="password:" required autocorrect="off" type="password"></div>
                        <div class="snr">
                              <input type="submit">
                              <input type="reset" value="Отмена" onclick="loginClose()">
                        </div>
                  </form>
            </div>
      </div>

    <script src="header.js"></script>
</body>
</html>
