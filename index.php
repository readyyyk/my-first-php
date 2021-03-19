<?php
        $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
      session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>The BEST design in the world</title>

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


      <div class="header-login" style='color:green;background-color:lightgreen;display:flex;justify-content:center;'>
            <?php
                  if( isset($_SESSION['logged_user'])){
                        echo "<h2 style='color:green;background-color:lightgreen;display:flex;justify-content:center;width:100%'> ". $_SESSION['logged_user']['login'] . "</h2>";
                  }?>
      </div>

      <main class="main">

            <?php
                  $messages = mysqli_query($con,"SELECT * FROM `notes` ORDER BY `dt` DESC");
            ?>
            <?php
                  while( ($message = mysqli_fetch_assoc($messages)) ){
                        echo "
            <div class='main--el'>
                  <div class='tnu'>
                        <div class='main--el--title'> " . $message['title'] . " </div>
                        <div class='tools'>
                              <form action='tools.php' method='get'>
                                    <input class='del' type='submit' value='❌' name='del' ";
                              if($message['user'] != $_SESSION['logged_user']['login'] and $_SESSION['logged_user']['login'] != "admin")
                                    echo "disabled";
                              echo ">
                                    <input class='del' type='submit' value='✏️' name='upd' ";
                            if($message['user'] != $_SESSION['logged_user']['login'] and $_SESSION['logged_user']['login'] != "admin")
                                    echo "disabled";
                            echo " >
                                    <input type='text' class='iv' value='" . $message['id'] . "' name='sqlid'>
                              </form>
                        </div>
                        <div class='user'> <b style='text-decoration:underline'>" . $message['user'] . "</b> </div>
                  </div>
                  <div class='datentime'>
                        <div class='date'> " . $message['date'] . " </div>
                        <div class='time'> " . $message['time'] . " </div>
                  </div>
                  <div class='text'>
                        " . $message['text'] . "
                  </div>
            </div>
            ";
                  }
            ?>
            <!--<div class="main--el">
                  <div class="tnu">
                        <div class="main--el--title">  </div>
                        <div class="tools">
                              <form action="del.php" method="get"><input class="del" type="submit" value="❌"></form>
                              <input type="text" class="iv" value="3" name="sqlid">
                        </div>
                        <div class="user"> </div>
                  </div>
                  <div class="datentime">
                        <div class="date">06.03.2021</div>
                        <div class="time">10:00</div>
                  </div>
                  <div class="text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias accusantium excepturi sed laboriosam, autem blanditiis voluptate quo ut expedita. Facilis soluta voluptate, architecto id ullam. Ab, autem non accusamus. Expedita.
                  </div>
            </div>-->


      </main>

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

      <script>
            var nw = document.getElementById('newNote');
            var lg = document.getElementById('login');

            function newNote() {
                  nw.style.top = "0%";
            }

            function newNoteClose() {
                  nw.style.top = "-100%";
            }

            function login() {
                  lg.style.top = "0%";
            }

            function loginClose() {
                  lg.style.top = "-100%";
            }

      </script>
</body>

</html>
