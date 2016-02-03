<!DOCTYPE html>
<html>
<head>
    <title>G4Me About</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="Logo/G4me%20logo.png" width="125px" height="50px">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="g4me.php">Home</a></li>
            <li class="active"><a href="about.php">About Us/Contact</a></li>
            <li><a href="products.php">Games</a></li>
            <li><a href="sales.php">Sales</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li ><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<style>
    .logo-small {
        color: blue;
        font-size: 50px;
    }

    .logo {
        color: blue;
        font-size: 200px;
    }
    .logo {
        font-size: 200px;
    }
    @media screen and (max-width: 768px) {
        .col-sm-4 {
            text-align: center;
            margin: 25px 0;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>About G4ME</h2>
            <h4>Lorem ipsum..</h4>
            <p>Lorem ipsum..</p>
            <button class="btn btn-default btn-lg">Get in Touch</button>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-gift logo"></span>
        </div>
    </div>
</div>

<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-eye-open logo"></span>
        </div>
        <div class="col-sm-8">
            <h2>Our Ideals</h2>
            <h4><strong>MISSION:</strong> Give Games to Those Who Love Games</h4>
            <p><strong>VISION:</strong> Gain a Profit and Give Back to Charity</p>
        </div>
    </div>
</div>
</body>
</html>