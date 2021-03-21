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

    <header class="header">
        <div class="header--inner">
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


    <div class="note--wrapper" id="newNote">
            <div class="note">
                  <h2 class="note--title"></h2>
                  <form action="newNote.php" method="FILES" class="note--form">
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
                  <form action="login.php" method="FILES" class="note--form">
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
