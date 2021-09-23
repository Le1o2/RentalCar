<?php

    session_start();
    $reserve = $_SESSION['cart'];
    $image = $_POST['image'];
    $name = $_POST['car'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $day = 1;//default day
    if(!empty($image) && !empty(availability)){
        //$reserve[$image] = '{"image": $image, "name": $name, "price": $price, "days": $day}';
        $reserve[$image] = array("image" => $image, "name" => $name, "price" => $price, "days" => $day);
        $_SESSION['cart'] = $reserve;
    }
    else if(array_key_exists($image,$reserve)){
        echo 'isAdd = "Already added";';
        exit();
    }
    // if(!empty($image)){
    //     if(empty($reserve)){
    //         $reserve[$image] = array("image" => $image, "name" => $vehicle, "price" => $price, "days" =>$day);
    //         $_SESSION['cart'] = $reserve;
    //     }elseif(!array_key_exists($image, $reserve)){
    //         $reserve[$image] = array("image" => $image, "name" => $vehicle, "price" => $price, "days" => $day);
    //         $_SESSION['cart'] = $reserve;
    //     }else{
    //         $_SESSION['cart'] = $reserve;
    //     }
    // }
?>