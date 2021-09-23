<?php
session_strat();
if(isset($_POST["cart_car"])){
    $_SESSION["cart"] = $_POST["cart_car"];
    echo "done";
    return;
}
?>