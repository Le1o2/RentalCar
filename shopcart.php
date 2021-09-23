<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>shopCart</title>
    <link rel="stylesheet" href="reset.css">
    <script type="text/javascript">

        // var cart_car = new Array();
        // cart_car = <?php
        // if(isset($_SESSION["cart"])){
        //     echo json_encode ($_SESSION["cart"]);
        // }
        // ?>;
        //console.log(cart_car);
        function changeDays(id, number) {
            var req = "image=" + id + "$days=" + number;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhr.open("POST", "modification.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(req);
        }
        

//         function load() {
//             var xmlhttp = new XMLHttpRequest();
//             xmlhttp.open("GET", "session.php", true);
//             xmlhttp.send();
//             xmlhttp.onreadystatechange = function() {
//                 if (this.readyState == 4 && this.status == 200) {
//                     console.log(this.responseText);
                    
//                 var cart = <?php echo json_encode($_SESSION['cart']) ?>;
//                 console.log(typeof cart);
//                 var carts = JSON.stringify(cart);
//                 console.log(typeof carts);
//                 console.log(cart);
//                 //var carts = JSON.parse(<?php echo json_encode($_SESSION['cart']) ?>);
//                 var html_code = '<table class="table table-hover"><thead><tr><th>Thumbnail</th><th>Vehicle</th><th>PricePerDay</th><th>RentalDays</th><th>Action</th></tr></thead><tbody>';
//                 console.log(carts);
//             if (carts.length > 0) {
//                 for (var cartsKey in carts) {
//                     html_code += '<tr>';
//                     html_code += '<td><img src="CarPic/' + carts[cartsKey]['image'] + '.jpeg"></td>';
//                     html_code += '<td>' + carts[cartsKey][2] + '</td>';
//                     html_code += '<td>' + carts[cartsKey][1] + '</td>';
//                     html_code += '<td><input type="number" id="' + carts[cartsKey][2] + '" onchange="change_days(\'' + carts[cartsKey][2] + '\')" class="form-control" value="' + carts[cartsKey][3] + '"></td>';
//                     html_code += '<td><button onclick="delete_item(\'' + carts[cartsKey][2] + '\')" class="btn btn-primary">Delete</button></td>';
//                     html_code += '</tr>';
//                 }
//                 html_code += '</tbody></table>';
//                 html_code += '<a href=javascript:; class="btn btn-warning">Clear</a>&nbsp;&nbsp;<button class="btn btn-primary" onclick="checkout()">Checkout</button>';
//             } else {
//                 html_code = '<p>Empty Cart</p>';
//                 html_code += '<a href="index.php" class="back">Back</a>&nbsp;&nbsp;<button class="checkout" onclick="alert_empty()">Checkout</button>';
//             }
//             document.getElementById("shopCart").innerHTML = html_code;
//         }
//     };
// }
        function isEmpty() {
            var rows = "<?php echo $SESSION['cart'].length; ?>";
            console.log(rows);
            if (rows == 0) {
                alert("Sorry, your do not have any reservation");
                window.location.href = "index.html";
                return false;
            }
        }
    </script>
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
        

        #CarPic {
            width: 200px;
            height: 200px;
        }

        th{
            width:200px;
            height:200px;
            font-size:20px;
        }
        td{
            width:200px;
            height:200px;
            font-size:20px;
        }
        img{
            width:200px;
            height:200px;
        }
        
        td a{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
        }
        button{
            background-color:black;
            border: none;
            color: white;
            padding: 15px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
        }
  
    </style>
</head>

<body onload>
    <ul class="nav">
        <li id="logo">Hertz-UTS</li>
        <li id="title"><a>Car Rental Center</a></li>
    </ul>
    <div id="shopCart">
    <form name="qty" method="POST" action="" onsubmit="return isEmpty()">
        <table class="reservelist">
            <th>Preview</th>
            <th>Brand</th>
            <th>Price_Perday</th>
            <th>RentDay</th>
            <th>Delete?</th>
            
            <?php
            session_start();
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $a) {
                    echo "<tr>";
                    echo "<td><img src=\"CarPic/" . $a['image'] . ".jpeg\" class =\"CarPic\"></td>";
                    echo "<td>" . $a['name'] . "</td>";
                    echo "<td>$" . $a['price'] . "</td>";
                    echo "<td><input name=\"" . $a['image'] . "\" value=\"" . $a['days'] . "\"type=\"number\" ,min=\"1\" max=\"99\" onchange=\"changeDays('" . $a['image'] . "',this.form." . $a['image'] . ".value)\"></td>";
                    echo "<td><a href=\"remove.php?id={$a['image']}\">Delete</a></td>";
                    echo "</tr>";
                }
                }else {
                    echo "<p>Empty Cart</p>";
                    echo "<a>Back to Car selection page</a>";
                }
            ?>
            <tr>
            </tr>
        </table>
    </form>
</div>
<div class="check">
    <button>
        <a href="checkout.php">
        confirm
        </a>
    </button>
    <button>
    <a href="index.php">
        Back to main page
        </a>
    </button>
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