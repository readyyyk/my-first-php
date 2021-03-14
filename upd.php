<?php

    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

<<<<<<< HEAD
=======
    session_start();

>>>>>>> 2679e898fce15554b629dfec65ce8941cf75f9ba
    $id = $_SESSION['upd_sql_id'];

    $messages = mysqli_query($con,"SELECT * FROM `notes` WHERE `id`=$id");

    $message = mysqli_fetch_assoc($messages);
<<<<<<< HEAD

    echo "<div class='main--el'>
                  <div class='tnu'>
                        <div class='main--el--title'> " . $message['title'] . " </div>
                        <div class='tools'>
                              <form action='tools.php' method='get'>
                                    <input class='del' type='submit' value='❌' name='del'>
                                    <input class='del' type='submit' value='✏️' name='upd'>
                                    <input type='text' class='iv' value='" . $message['id'] . "' name='sqlid'>
                              </form>
                        </div>
=======
?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>upd</title>
       <link rel="stylesheet" href="style.index.css">
   </head>
   <body style="display:flex;justify-content:center;align-items:center;padding:10rem">
       <?php
    echo "
        <form action='upd-submit.php' method='post' style='min-width:400px'>
            <div class='main--el' style='width:100%'>
                  <div class='tnu'>
                        <input type='text' name='title' class='main--el--title' value=' " . $message['title'] . " '>
>>>>>>> 2679e898fce15554b629dfec65ce8941cf75f9ba
                        <div class='user'> <b style='text-decoration:underline'>" . $message['user'] . "</b> </div>
                  </div>
                  <div class='datentime'>
                        <div class='date'> " . $message['date'] . " </div>
                        <div class='time'> " . $message['time'] . " </div>
                  </div>
<<<<<<< HEAD
                  <textarea class='text'>
                        " . $message['text'] . "
                  </textarea>
            </div>"

?>
=======
                  <textarea class='text' name='text'>
                        " . $message['text'] . "
                  </textarea>
            </div>
            <div class='snr'>
                <input type='submit'>
                <input type='reset' value='Отмена' onclick='document.location.replace(" . '"index.php"' .")'>
            </div>
            <input type='text' class='iv' value='" . $message['id'] . "' name='sqlid'>
        </form>
            "

?>
   </body>
   </html>
>>>>>>> 2679e898fce15554b629dfec65ce8941cf75f9ba
