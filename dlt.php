<?php
    include "config.php";

    $did = $_GET['id'];

    $rs = "DELETE FROM `sell` WHERE `ID`='$did' ";
    $drslt = mysqli_query($confi, $rs);
    header
    ('Location:http://localhost/php/Ecommerce/index.php');

    ?>