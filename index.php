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

<body id="body">

    <div id="my-header"></div>

    <div class="header-login" style='color:green;background-color:lightgreen;display:flex;justify-content:center;'>
        <?php
                  if( isset($_SESSION['logged_user'])){
                        echo "<h2 style='color:green;background-color:lightgreen;display:flex;justify-content:center;width:100%'> ". $_SESSION['logged_user']['login'] . "</h2>";
                  }?>
    </div>

    <main class="main">

        <?php
                  $messages = mysqli_query($con,"SELECT * FROM `notes` ORDER BY `dt` DESC");
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
    </main>

    <div id="my-header-drop"></div>

    <script src="header.js"></script>
</body>

</html>
