<!DOCTYPE html>
<html>
<head>
    <title>checkOut</title>
    <meta charset="utf-8">
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

        .mid-lane div{
            width:80px;
            height:40px;
        }
         .bot {
            margin-top:600px;
            height: 100px;
            background-color: darkgray;
        }

        .bot p {
            font-size: 20px;
        }
        .submit{
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


<body>
<ul class="nav">
        <li id="logo">Hertz-UTS</li>
        <li id="title"><a href="index.php">Car Rental Center</a></li>
        <li id="link"><a class="nav-link" href="shopcart.php">View Reservation</a>
        </li>
    </ul>
<div class="mid-lane" style="margin-top: 20px">
    <h3>Customer Details and Payment</h3>
    <p>Please fill in your details</p>
    <form>
        <div class="mid-lane">
            <div >First Name</div>
            <div><input class="form-control" name="first_name" required></div>
            <div>Last Name </div>
            <div><input class="form-control" name="last_name" required></div>
            <div>Email Address <span style="color:gold">*</span></div>
            <div><input class="form-control" name="email" required></div>
            <div>Address Line</div>
            <div><input class="form-control" name="address" required></div>
            <div>City </div>
            <div><input class="form-control" name="city" required></div>
            <div>State </div>
            <div><input class="form-control" name="state" required></div>
            <div>Payment Type </div>
            <div><input class="form-control" name="payment" required></div>
            <div><a href=" alert("Submitted successfully, thank you for your cooperation");
            window.location.href = "index.php";" class="submit">Submit</a></div>
        </div>
        
    </form>
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
</html>