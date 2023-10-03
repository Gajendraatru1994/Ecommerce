<?php
if (isset($_POST['submit'])) {
    include "config.php";
    // $id = $_POST['id'];
    $nm = $_POST['name'];
    $mb = $_POST['mob'];
    $usr = $_POST['usr'];
    $ps = $_POST['pass'];
    $fl = $_FILES['img'];
    $fltmp = $fl['tmp_name'];
    $folder = "files/" . $fl['name'];

    // print_r($folder);
    move_uploaded_file($fltmp, $folder);

    $sgn = "INSERT INTO `seller`(`ID`, `NAME`, `MOBILE`, `USERNAME`, `PASSWORD`,`PHOTO`)
     VALUES ('','$nm','$mb','$usr','$ps','$folder')";

    $rsgn = mysqli_query($confi, $sgn);


    header('Location:http://localhost/php/Ecommerce/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login {
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
}

.login form {
    background: cornsilk;
    border: 2px solid red;
    width: 35%;
    height: auto;
    margin: auto;
    position: relative;
    top: 15%;
}

.login form .signup {
    margin: 40px 10px;
}

input,label {
    padding: 15px 30px;
    margin-left: 100px;
    margin-top: 10px;
}

button {
    padding: 6px 38px;
    background-color: chocolate;
    color: white;
    cursor: pointer;
    margin-left: 164px;
}

    </style>
</head>

<body>
    <div class="login">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="signup">
                <!-- <input type="number" name="id" placeholder="ID :"><br><br> -->
                <input type="text" name="name" placeholder="Name :"><br><br>
                <input type="number" name="mob" placeholder="Mobile :"><br><br>
                <input type="text" name="usr" placeholder="Username :"><br><br>
                <input type="password" name="pass" placeholder="Password :"><br><br>
                <label>Photo :</label><br><br>
                <input type="file" name="img"><br><br>
                <a href="login.php"><button type="submit" name="submit">Sign Up</button></a><br><br>
            </div>
        </form>
    </div>
</body>

</html>