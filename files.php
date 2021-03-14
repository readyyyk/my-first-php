<?php
    $con = mysqli_query("127.0.0.1", "root", "", "my-first-php-sql");
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
