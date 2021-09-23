<?php
session_start();
$reserve = $_SESSION['order'];
$image = $_POST['image'];
$days = $_POST['days'];

if($reserve[$image]['image'] = $image){
    $reserve[$image]['days'] = $days;
    $_SESSION['order'] = $order;
}


?>