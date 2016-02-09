<!DOCTYPE html>
<html>
<head>
    <title>G4ME</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 'Roboto Slab', 'serif';
        }
        #align_nav {
            text-align: right;
            text-decoration: none;
        }
        .carousel-inner img {
            width: 80%; /* Set width to 100% */
            margin: auto;
        }
        .carousel-caption h3 {
            color: #fff !important;
        }
        @media (max-width: 600px) {
            .carousel-caption {
                display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
            }
        }
        @import url(http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100|Open+Sans:400,700,300,600,800|Oswald:400,700,300);
        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        html {
            height: 100%;
        }
        body {
            font-size: 19px;
            font-family: 'Open Sans', 'sans-serif';
            font-weight: 300;
            height: 100%;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 0.8em;
        }
        ul {
            margin-left: 40px;
        }

        .wrap {
            max-width: 1200px;
            padding: 0 0 100px 0;
            overflow: hidden;
            margin: 0 auto;
        }
        @media screen and (max-width: 768px) {
            .wrap {
                padding: 0 3% 10px 3%;
            }
        }
        .column {
            box-shadow: 2px 2px 0 1px rgba(0, 0, 0, 0.25);
            background: #efefef;
            border-radius: 2px;
            padding: 20px;
            width: calc(46.66666667%);
            margin: 0 calc(1.66666667%) 20px;
            display: block;
            float: left;
        }
        .column ::selection {
            background: #f9b7b7;
        }
        @media screen and (max-width: 768px) {
            .column {
                margin: 0 0 20px 0;
                width: 100%;
            }
        }
        .header {
            max-width: 1200px;
            text-align: center;
            margin: 50px auto;
        }
        .header h1 {
            text-shadow: 4px 4px 0 rgba(0, 0, 0, 0.6);
            text-transform: uppercase;
            font-family: 'Oswald', 'sans-serif';
            letter-spacing: 10px;
            margin-bottom: 15px;
            color: #efefef;
            font-weight: 300;
            font-size: 4.1em;
        }
        .header p {
            color: rgba(0, 0, 0, 0.6);
            font-family: 'Roboto Slab', 'serif';
            line-height: 1.3em;
            font-size: 1.4em;
            font-weight: 500;
            max-width: 55%;
            margin: auto;
        }


    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="Logo/G4me%20logo.png" width="125px" height="50px">
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="g4me.php">Home</a></li>
            <li><a href="about.php">About Us/Contact</a></li>
            <li><a href="products.php">Games</a></li>
            <li><a href="sales.php">Sales</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="sales.php">
                <img src="Logo/Weekly%20Sales.png" alt="E3" width="900" height="200">
            </a>
            <div class="carousel-caption">
                <h3>Weekly Deals</h3>
                <p>Want to save some money on new and old games check out this weeks sales</p>
            </div>
        </div>

        <div class="item">
            <img src="Logo/Tomb%20Raider%20Deal.png" alt="Tomb Raider" width="900" height="200">
            <div class="carousel-caption">
                <h3>Tomb Raider</h3>
                <p>Lara Croft is back and better than ever before</p>
            </div>
        </div>

        <div class="item">
            <img src="Logo/The%20Division%20(1).png" alt="The Division" width="900" height="200">
            <div class="carousel-caption">
                <h3>The Division Pre-Sale</h3>
                <p>Tom Clancy's most anticapted game of the year is on sale now</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="wrap">
    <div class="header">
        <h1>G4ME</h1>
        <p>Game purchasing the way its meant to 2B.</p>
    </div>

    <div class="column">
        <h2 style="text-align: center">Weekly Deals</h2>
        <p>G4ME aims to offer outstanding deals, so each week we offer weekly deals to help the consumer save money.</p>
    </div>
    <div class="column">
        <h2 style="text-align: center">Monthly Subscription</h2>
        <p>For only $20 a month you will get 5 games in a pack. All games are top quality.</p>
    </div>
    <div class="column">
        <h2 style="text-align: center">Idea</h2>
        <p>G4ME was designed to sell top games at low prices and to give a percentage of profit earned to charity.</p>
    </div>
    <div class="column">
        <h2 style="text-align: center">Charity</h2>
        <p>G4ME aids to help charities while gaining a profit. For every dollar earned 20% goes to different charity associations.</p>
    </div>

    <div class="footer">
        <p></p>
    </div>
</div>
<footer>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="g4me.php">Home</a></li>
            <li><a href="products.php">Games</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </div>
</nav>
</footer>
<script>
    $('.carousel').carousel();
</script>
</body>
</html>