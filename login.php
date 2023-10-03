<?php
if (isset($_POST['submit'])) {
    include "config.php";
    // $lgnm = $_POST['name'];
    $lusr = $_POST['usr'];
    $lps = $_POST['pass'];

    session_start();
    $_SESSION['sname'] = $lusr;

    $lgn = "SELECT  `USERNAME`, `PASSWORD` FROM `seller` WHERE USERNAME='$lusr' && PASSWORD= '$lps'";

    $rslg = mysqli_query($confi, $lgn);


    $total = mysqli_num_rows($rslg);


    if ($total == 1) {
        header("Location:http://localhost/php/Ecommerce/sell.php");
    } else {
        echo "<script> alert('Wrong User Name And Password') ;</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="login">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input">
                <input type="text" name="usr" placeholder="Username :"><br><br>
                <input type="password" name="pass" placeholder="Password :"><br><br>
                <button type="submit" name="submit">Log In</button><br><br>
                <em> New User ? <a href="http://localhost/php/Ecommerce/signup.php">Sign up here</a></em>
            </div>
        </form>
    </div>
</body>

</html>