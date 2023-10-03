<?php
session_start();
$pr = $_SESSION['sname'];
include "config.php";
// $id= $_POST['ID'];
// $nm = $_POST['name'];
// $id = $_POST['id'];
// $mb = $_POST['mob'];
// $usr = $_POST['username'];
// $ps = $_POST['password'];
// $fl = $_FILES['img'];
// $fltmp = $fl['tmp_name'];
$folder = "files/.fl[name]";

$sel = " SELECT `ID`, `NAME`, `MOBILE`, `USERNAME`, `PASSWORD`, `PHOTO` FROM `seller` Where `USERNAME` = '$pr'";
$rse = mysqli_query($confi, $sel);


?>

<!-- Insert for product detail -->

<?php
if (isset($_POST['submit'])) {
    include "config.php";
    // $id = $_POST['id'];
    $pdnm = $_POST['pdnm'];
    $usrn = $_POST['username'];
    $pre = $_POST['price'];
    $qn = $_POST['qnty'];
    $ds = $_POST['dsctn'];
    $st = $_POST['stats'];
    $fl = $_FILES['img'];
    $fltmp = $fl['tmp_name'];
    $folder = "photo/" . $fl['name'];


    move_uploaded_file($fltmp, $folder);
    $pri = "INSERT INTO `sell`(`ID`,`USERNAME`, `PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`,`PHOTO`)
    VALUES ('','$usrn','$pdnm','$pre','$qn','$ds','$st','$folder')";

    $rpr = mysqli_query($confi, $pri);
    header:("location:http://localhost/php/Ecommerce/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar-1">
        <?php $dt = mysqli_fetch_assoc($rse) ?>
        <div class="table1" style="font-size: 24px;">
            <table>
                <tr>
                    <td>
                        <img src="<?php echo $dt['PHOTO']; ?>" ; alt="img" style="width: 100px; height: 100px; border:2px solid white; border-radius: 50%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        Name : <?php echo $dt['NAME']; ?>
                    </td>
                </tr>

            </table>
        </div>
        <div class="table2">
            <table cellpadding="10px">
                <tr>
                    <td>
                        Id : <?php echo $dt['ID']; ?>
                    </td>


                    <td>
                        Mobile : <?php echo $dt['MOBILE']; ?>
                    </td>
                </tr>
            </table>
            <div class="but">
                <button type="button"  onclick="openpopup()" class="btn btn-info">Add Product</button></a>
                <a href="index.php"> <button type="button" class="btn btn-info">Home</button></a>
                <a href="logout.php"> <button type="button" class="btn btn-info lgout">Logout</button></a>
            </div>
        </div>
    </nav>
    <table border="" cellspacing="20px">
   
        <tr>
            <!-- <th>Id</th> -->
            <th>Username</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Status</th>
            <th>photo</th>
        </tr>
        <tr>
         
        <td><?php echo $usrn; ?></td>
            <td><?php echo $pdnm; ?></td>
            <td><?php echo $pre; ?></td>
            <td><?php echo $qn; ?></td>
            <td><?php echo $ds; ?></td>
            <td><?php echo $st; ?></td>
            <td><?php echo $folder; ?></td>
        </tr>
       
    </table>
    <div id="pop" class="popup">
        <span class="clz" onclick="closepopup()"> &times;</span>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="sell">
                <input type="text" name="username" placeholder="Username"><br><br>
                <input type="text" name="pdnm" placeholder="Product name"><br><br>
                <input type="number" name="price" placeholder="Price"><br><br>
                <input type="number" name="qnty" placeholder="Quantity"><br><br>
                <input type="text" name="dsctn" placeholder="Description"><br><br>
                <input type="date" name="stats" placeholder="Status"><br><br>
                <label>Photo :</label>
                <input type="file" name="img"><br><br>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        var a = document.getElementById('pop');

        function openpopup() {
            a.style.display = "block";
        }

        function closepopup() {
            a.style.display = "none";
        }

        // function openpopup(){
        //     a.classList.add(".open-popup");
        // }

        // function closepopup(){
        //     a.classList.remove(".open-popup");
        // }
        // function openpopup(){
        // document.querySelector(".popup").classList.add("open-popup");
        // }

        // function closepopup(){
        //     document.querySelector(".popup").classList.remove("open-popup");
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>