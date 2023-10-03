<?php
include "config.php";
session_start();
$_SESSION['sname']= $rss;
$ca = " SELECT `ID`,`USERNAME`,`PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`, `PHOTO` 
FROM `cart` WHERE 1 ";
$cart = mysqli_query($confi, $ca);



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
    <div class="container-fluid row main ">
        <?php while ($dt = mysqli_fetch_assoc($cart)) { ?>
            <div class="card">
              
                <div class="card-body text-white cart">
                    <img src="<?php echo $dt['PHOTO']; ?>" class="card-img-top" alt="..." style="width:100%; height:150px;">
                    <h5 class="card-title"><?php echo $dt['PRODUCT NAME']; ?></h5>
                    <p class="card-text"><?php echo $dt['DESCRIPTION']; ?></p>
                    <p class="card-text"><?php echo $dt['PRICE']; ?></p>
                    <p class="card-text"><?php echo $dt['QUANTITY']; ?></p>
                    <a href="delete.php?id=<?php echo $dt['ID']; ?>"> <button> Delete </button></a>
                </div>
            </div>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>