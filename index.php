<!DOCTYPE html>
<html lang="en">

<?php
 $link = mysqli_connect("localhost", "root", "");
#    if($link){printf("true");}else{printf("false");}
?>

<head>
    <meta charset="UTF-8">
    <title>The BEST design in the world</title>

    <link rel="stylesheet" href="style.index.css">
</head>
<body>
    <header class="header">
       <div class="header--inner">
            <div class="header--el"><a href="#" class="header--el--link">Log in</a></div>
            <div class="header--el"><a href="nb.php" class="header--el--link">New note</a></div>
            <div class="header--el"><a href="#" class="header--el--link">Send a message</a></div>
            <div class="header--el"><a href="fotoes.php" class="header--el--link">fotoes</a></div>
            <div class="header--el"><a href="files.php" class="header--el--link">Files</a></div>
            <div class="header--el"><a href="#" class="header--el--link">For admin</a></div>
            <div class="header--el"><a href="#" class="header--el--link">Info</a></div>
            <div class="header--el"><a href="#" class="header--el--link">Log out</a></div>
        </div>
    </header>

    <main class="main">
        <div class="main--el">
            <div class="datentime">
                <div class="date">06.03.2021</div>
                <div class="time">10:00</div>
            </div>
            <div class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias accusantium excepturi sed laboriosam, autem blanditiis voluptate quo ut expedita. Facilis soluta voluptate, architecto id ullam. Ab, autem non accusamus. Expedita.
            </div>
        </div>

        <div class="main--el">
            <div class="datentime">
                <div class="date">06.03.2021</div>
                <div class="time">10:00</div>
            </div>
            <div class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias accusantium excepturi sed laboriosam, autem blanditiis voluptate quo ut expedita. Facilis soluta voluptate, architecto id ullam. Ab, autem non accusamus. Expedita.
            </div>
        </div>

        <div class="main--el">
            <div class="datentime">
                <div class="date">06.03.2021</div>
                <div class="time">10:00</div>
            </div>
            <div class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias accusantium excepturi sed laboriosam, autem blanditiis voluptate quo ut expedita. Facilis soluta voluptate, architecto id ullam. Ab, autem non accusamus. Expedita.
            </div>
        </div>
    </main>
</body>
</html>
