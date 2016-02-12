<!DOCTYPE html>
<html>
<head>
    <title>g4me signup</title>
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
            <li><a href="about.php">About Us/Contact</a></li>
            <li><a href="products.php">Games</a></li>
            <li><a href="sales.php">Sales</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="view_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="guestCheckout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li class="active"><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div class="logmod">
    <div class="logmod__wrapper">
        <span class="logmod__close">Close</span>
        <div class="logmod__container">
            <ul class="logmod__tabs">
                <li data-tabtar="lgm-2"><a href="#">Login</a></li>
                <li data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
            </ul>
            <div class="logmod__tab-wrapper">
                <div class="logmod__tab lgm-1">
                    <div class="logmod__heading">
                        <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
                    </div>
                    <div class="logmod__form">
                        <form accept-charset="utf-8" action="#" class="simform">
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="user-name">Email*</label>
                                    <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input string optional">
                                    <label class="string optional" for="user-pw">Password *</label>
                                    <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="text" size="50" />
                                </div>
                                <div class="input string optional">
                                    <label class="string optional" for="user-pw-repeat">Repeat password *</label>
                                    <input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat password" type="text" size="50" />
                                </div>
                            </div>
                            <div class="simform__actions">
                                <input class="sumbit" name="commit" type="sumbit" value="Create Account" />
                                <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
                            </div>
                        </form>
                    </div>
                    <div class="logmod__alter">
                        <div class="logmod__alter-container">
                            <a href="#" class="connect facebook">
                                <div class="connect__icon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <div class="connect__context">
                                    <span>Create an account with <strong>Facebook</strong></span>
                                </div>
                            </a>

                            <a href="#" class="connect googleplus">
                                <div class="connect__icon">
                                    <i class="fa fa-google-plus"></i>
                                </div>
                                <div class="connect__context">
                                    <span>Create an account with <strong>Google+</strong></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="logmod__tab lgm-2">
                    <div class="logmod__heading">
                        <span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
                    </div>
                    <div class="logmod__form">
                        <form accept-charset="utf-8" action="#" class="simform">
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="user-name">Email*</label>
                                    <input class="string optional" maxlength="255" id="user-email" placeholder="Email" type="email" size="50" />
                                </div>
                            </div>
                            <div class="sminputs">
                                <div class="input full">
                                    <label class="string optional" for="user-pw">Password *</label>
                                    <input class="string optional" maxlength="255" id="user-pw" placeholder="Password" type="password" size="50" />
                                    <span class="hide-password">Show</span>
                                </div>
                            </div>
                            <div class="simform__actions">
                                <input class="sumbit" name="commit" type="sumbit" value="Log In" />
                                <span class="simform__actions-sidetext"><a class="special" role="link" href="#">Forgot your password?<br>Click here</a></span>
                            </div>
                        </form>
                    </div>
                    <div class="logmod__alter">
                        <div class="logmod__alter-container">
                            <a href="#" class="connect facebook">
                                <div class="connect__icon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <div class="connect__context">
                                    <span>Sign in with <strong>Facebook</strong></span>
                                </div>
                            </a>
                            <a href="#" class="connect googleplus">
                                <div class="connect__icon">
                                    <i class="fa fa-google-plus"></i>
                                </div>
                                <div class="connect__context">
                                    <span>Sign in with <strong>Google+</strong></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>