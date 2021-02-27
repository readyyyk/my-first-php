<?php

    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

    $id = $_SESSION['upd_sql_id'];

    $messages = mysqli_query($con,"SELECT * FROM `notes` WHERE `id`=$id");

    $message = mysqli_fetch_assoc($messages);

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
                        <div class='user'> <b style='text-decoration:underline'>" . $message['user'] . "</b> </div>
                  </div>
                  <div class='datentime'>
                        <div class='date'> " . $message['date'] . " </div>
                        <div class='time'> " . $message['time'] . " </div>
                  </div>
                  <textarea class='text'>
                        " . $message['text'] . "
                  </textarea>
            </div>"

?>
