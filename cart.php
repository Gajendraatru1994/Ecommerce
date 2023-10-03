<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $rss = "SELECT `ID`,`USERNAME`, `PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`, `PHOTO` FROM `sell` WHERE `ID`='$id' ";
    $rslt = mysqli_query($confi, $rss);


    $abc = mysqli_fetch_assoc($rslt);
    session_start();
    $_SESSION['sname'] = $rss;
    $pd = $abc['PRODUCT NAME'];
    $pr = $abc['PRICE'];
    $qn = $abc['QUANTITY'];
    $ds = $abc['DESCRIPTION'];
    $st = $abc['STATUS'];
    $fl =  $abc['PHOTO'];
    $unm = $abc['USERNAME'];
    $cart = "INSERT INTO `cart`(`ID`, `PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`, `PHOTO`,`USERNAME`)
 VALUES ('','$pd','$pr','$qn','$ds','$st','$fl','$unm')";
    $crslt = mysqli_query($confi, $cart);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <style>
         .main {
            /* background: url(wall-1.jpg) no-repeat; */
            height: auto;
            /* border: 1px solid black; */
        }

        .card {
            width: 250px;
            /* background: url(wall-2.jpg) no-repeat; */
            margin: 10px 10px;
        }

        .card .cart {
            /* border: 1px solid black; */
            height: auto ;
            margin-top: -30px;
        }

        .card .cart h5 {
            color: brown;
        }

        .card .cart p {
            line-height: 10px;
            color: brown;
        }
        .card .cart a{
            
            line-height: 15px;
            margin-left: -130px;
        }
        .card .cart a button {
            /* margin: 5px 0px; */
            width: 100px;
            padding: 10px 10px;
            font-size: 15px;
        }

    </style>
    
</head>
<?php

$sl = " SELECT `ID`,`USERNAME`,`PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`, `PHOTO` 
FROM `cart` WHERE 1 ";
$srslt = mysqli_query($confi, $sl);

header:
('Location:http://localhost/php/Ecommerce/cart.php');

?>

<body>
    <div class="container-fluid row main ">
        <?php while ($dt = mysqli_fetch_assoc($srslt)) { ?>
            <div class="card">
                <p class="card-text"><?php echo $dt['USERNAME']; ?></p>
                <div class="card-body text-white cart">
                    <img src="<?php echo $dt['PHOTO']; ?>" class="card-img-top" alt="..." style="width:100%; height:150px;">
                    <h5 class="card-title"><?php echo $dt['PRODUCT NAME']; ?></h5>
                    <p class="card-text"><?php echo $dt['DESCRIPTION']; ?></p>
                    <p class="card-text"><?php echo $dt['PRICE']; ?></p>
                    <p class="card-text"><?php echo $dt['STATUS']; ?></p>
                    <a href="Buy.php?id=<?php echo $dt['ID']; ?>" > <button> Buy </button></a>
                    <a href="delete.php?id=<?php echo $dt['ID']; ?>" > <button> Delete </button></a>
                </div>
            </div>

        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>