<?php
// error_reporting(0);
include "config.php";

if (isset($_POST['submit'])) {

    // $lgnm = $_POST['name'];
    $lusr = $_POST['usr'];
    $lps = $_POST['pass'];

    session_start();
    $_SESSION['username'] = $lusr; 

    $lgn = "SELECT  `USERNAME`, `PASSWORD` FROM `seller` WHERE USERNAME ='$lusr' && PASSWORD = '$lps' ";

    $rslg = mysqli_query($confi, $lgn);

    $total = mysqli_num_rows($rslg);

    header("Location:http://localhost/php/Ecommerce/main.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <input type="number" name="id" placeholder="ID :"><br><br> -->
            <!-- <input type="text" name="name" placeholder="Name :"><br><br> -->
            <!-- <input type="number" name="mob" placeholder="Mobile :"><br><br> -->
            <input type="text" name="usr" placeholder="Username :"><br><br>
            <input type="password" name="pass" placeholder="Password :"><br><br>
            <a href="main.php"> <button type="submit" name="submit">Log In</button></a><br><br>
        </form>
        <p>SIGN UP </p>
    </div>
</body>

</html>