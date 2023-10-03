<?php
include "config.php";
// if(isset($_GET['id'])){
//     $id= $_GET['id'];
// $unm = $_POST['Username'];
$rslt = "SELECT `ID`,`USERNAME`, `PRODUCT NAME`, `PRICE`, `QUANTITY`, `DESCRIPTION`, `STATUS`, `PHOTO` FROM `sell` WHERE 1";
$rs = mysqli_query($confi, $rslt);
session_start();
$_SESSION['sname'] = $rs;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .main {
            /* background: teal; */
            height: auto;
            padding: 10px 20px;
            border: 1px solid black;
        }

        .card {
            width: 250px;
            margin: 10px 10px;
             background: url(bg-img2.jpg) no-repeat; 
             
        }


        .card .cart h5 {
            color: black;
        
        }

        .card .cart p {
            line-height: 10px;
            color: black;
        }

        .card .cart a {
            /* line-height: 15px; */
            margin-left: -100px;
        }

        .card .cart a button {
            width: 100px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px 10px;
            font-size: 15px;
            color: black;
        }
    </style>

</head>

<body>
    <!-- <div class="container-fluid user"> -->
    <!-- <?php $st = mysqli_fetch_assoc($rs); ?> -->

    <!-- <h3> Username: <?php echo $st['USERNAME']; ?></h3>
    </div> -->
    <nav class="navbar bg-info">

        <img src="images.png" alt="php" ">

        <ul>
            <li><a href=" #" class="text-dark">Home</a></li>
        <li><a href="#" class="text-dark">Product</a></li>
        <li><a href="#" class="text-dark">About</a></li>
        <li><a href="#" class="text-dark">Contact Us</a></li>
        </ul>
        <div class="btn  ">
            <a href="login.php"> <button type="button" class="btn btn-outline-dark">Log In as Seller</button></a>
            <a href="Signup.php"> <button type="button" class="btn btn-outline-dark">Sign Up</button></a>
            <!-- <a href="Sell.php"> <button type="button" class="btn btn-outline-primary">Sell</button></a> -->
        </div>
    </nav>
    <div class="container-fluid row main mx-3">
        <?php while ($dt = mysqli_fetch_assoc($rs)) { ?>

            <div class="card mx-3 ">

                <div class=" text-white cart">
                    <img src="<?php echo $dt['PHOTO']; ?>" class="card-img-top" alt="..." style="width:100%; height:150px;">
                    <a href="cart.php?id=<?php echo $dt['ID']; ?>"><button type="button" class="btn btn-outline-danger">Add to Cart</button></a>
                    <h5 class="card-title"> Name: <?php echo $dt['PRODUCT NAME']; ?></h5>
                    <p class="card-text">Description: <?php echo $dt['DESCRIPTION']; ?></p>
                    <p class="card-text">Price: <?php echo $dt['PRICE']; ?></p>
                    <p class="card-text">Status: <?php echo $dt['STATUS']; ?></p>


                    <a href="dlt.php?id=<?php echo $dt['ID']; ?>"><button type="button" class="btn btn-outline-danger">Delete</button></a>

                </div>
            </div>


        <?php } ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>