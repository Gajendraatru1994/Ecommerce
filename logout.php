<?php
include "config.php";
session_start();

$log = session_destroy();

if(isset($log)){
    header("Location:http://localhost/php/Ecommerce/index.php");
}
?>