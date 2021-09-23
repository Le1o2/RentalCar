<?php
        session_start();
        if (isset($_SESSION['cart'])) {
            echo $_SESSION["cart"];
        }
?>