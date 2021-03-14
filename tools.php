<?php
    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");
<<<<<<< HEAD
=======
    session_start();
>>>>>>> 2679e898fce15554b629dfec65ce8941cf75f9ba

    if( isset($_GET['del']) ){
    $con = mysqli_connect("localhost", "root", "","my-first-php-sql");

    $sqlid = $_GET['sqlid'];
    $query = mysqli_query($con,"DELETE FROM `notes` WHERE id=" . "$sqlid");

    if($query){ header('Location: index.php');
?>
<center>
    <h1>Note was deleted!</h1>
</center><br><a href="index.php">
    <center>
        <h2>Home</h2>
    </center>
</a>
<?php
    } else {
?>
<center>
    <h1>Something went wrong.....</h1>
</center>
<br>
<a href="index.php">
    <center>
        <h2>Home</h2>
    </center>
</a>
<?php
        }
exit();
    } else {

        $_SESSION['upd_sql_id'] = $_GET['sqlid'];
        header("Location: upd.php");

    }
