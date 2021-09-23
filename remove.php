<?php
    session_start();
    $ID= $_REQUEST['id'];
        if(isset($ID)){
            unset($_SESSION['cart'][$ID]);
        }else{
            unset($_SESSION['cart']);
        }
    header("Location:shopcart.php");
?>