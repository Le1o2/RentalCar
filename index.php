<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hertz-UTS</title>
    <link rel="stylesheet" href="reset.css">
    <style>
        .nav {
            height: 100px;
            width: 100%;
            background-color: black;
            display: flex;
            justify-content: space-between;

        }

        .nav li {
            height: 100px;
            line-height: 100px;
            font-size: 50px;
        }

        #logo {
            height: 80%;
            background-color: white;
            color: yellowgreen;
            font-size: 40px;
            font-style: italic;
        }

        #title {
            color: white;
            font-size: 50px;
            margin: 0px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
        }

        .bot {
            display: flex;
            justify-content: space-between;
            height: 100px;
            background-color: darkgray;
        }

        .bot p {
            font-size: 20px;
        }

        #carPic {
            width: 250px;
            height: 250px;
        }

        #carMarket {
            display: flex;
            object-fit: cover;
            flex-flow: row wrap;
            justify-content: space-between;
            align-content: center;
        }

        .rent {
            background-color: goldenrod;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        
    </style>
</head>
<script>
    function loadCars() {
        var xml = new XMLHttpRequest();
        xml.open("GET", "cars.json", true);
        xml.send(null);
        xml.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status >= 200 && this.status < 300) {
                    if (this.responseText) {
                        var car = JSON.parse(this.responseText).car;
                        var carHtml = "";
                        for (var i = 0; i < car.length; i++) {
                            var image = car[i]['imgAddress'];
                            var model = car[i]['model'];
                            var price = car[i]['price'];
                            var availability = car[i]['availability'];
                            var carHtmlVar =
                                '<div>' +
                                '<img src="CarPic/' + image + '.jpeg" id = "carPic">' +
                                '<ul>' +
                                '<p>' + model + '</p>' +
                                '<li>Mileage:' + car[i]['mileage'] + 'KMs</li>' +
                                '<li>Fuel Type:' + car[i]['fuel_type'] + '</li>' +
                                '<li>Seats:' + car[i]['seats'] + '</li>' +
                                '<li>Type:' + car[i]['type'] + '</li>' +
                                '<li>Description:' + car[i]['description'] + '</li>' +
                                '</ul>';
                            if (availability == "Yes") {
                                carHtmlVar += '<button class="rent" onClick = "add_cart(\'' + image + '\',\'' + model + '\',\'' + price + '\',\'' + availability + '\')">Add to Cart</button>'
                            } else {
                                carHtmlVar += '<button class="rent" onclick="alert_unaviable()">Unavailability</button>';
                            }
                            carHtmlVar += '</div>';
                            carHtml += carHtmlVar;
                            document.getElementById("carMarket").innerHTML = carHtml;
                        }
                    }
                }
            }
        };

    }




    function add_cart(image, model, price, availability) {
        //var order = "image=" + image + "&car=" + model + "&price=" + price + "&availability" + availability;
        if(window.XMLHttpRequest){
            var xml = new XMLHttpRequest();
        }else{
            //IE6
            var xml = new ActiveXobject('Microsoft.XMLHTTP');
        }

        var cart_car ="[]"; 
        <?php echo 'cart_car=\''.json_decode($_SESSION["cart"],true).'\';';
        ?>;
        
        //var carts = json_encode(cart_car);
        //console.log(cart_car);
        //console.log(typeof cart_car);
        //carts = JSON.parse(cart_car);
        //var carts = JSON.stringify(cart_car);
        //var cart = JSON.parse(cart_car);
        //console.log(typeof carts);
        //console.log(typeof cart);
        for (var cartsKey in cart_car) {
            // console.log(cart[i])
            // console.log(image);
            if(cart['model']=model){
                location.reload();
                return;
            }
        }
        
        xml.open("POST", "session.php", true);
        xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xml.send("image=" + image + "&car=" + model + "&price=" + price + "&availability" + availability);
        
        xml.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status >= 200 && this.status < 300) {
                    alert_successfully();
                }
            }
        }
    }


    function alert_successfully() {
        alert("Add Successfully");
    }

    function alert_unaviable() {
        alert("Sorry, the car is not aviable now. Please use try other cars or contact us");
    }
</script>

<body onload="loadCars()">
    <ul class="nav">
        <li id="logo">Hertz-UTS</li>
        <li id="title"><a href="index.php">Car Rental Center</a></li>
        <li id="link"><a class="nav-link" href="shopcart.php">View Reservation</a>
          
        </li>
    </ul>
    <div id="carMarket" name="car">

    </div>

    <div class="bot">

        <p>If you need any help, Please contact us<br>
            <strong><a href="mailto:Hertz-UTS@uts.au.com">Hertz-UTS@uts.au.com</a></strong>
        </p>
        <p>
            <small>
                Copyright &copy; &nbsp; 2021 Siqi.Liu-UTS. All Rights Reserved.
            </small>
        </p>
    </div>


</body>

</html>