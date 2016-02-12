<!DOCTYPE html>
<html lang="en">
<head>
    <title>G4ME Guest Checkout</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    #form {
        align-content: center;
        height: 300px;
        width: 300px;
    }
    body {
        font: 'Roboto Slab', 'serif';
    }
</style>
<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=G4ME', 'root', 'root');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


if(@$_POST['formSubmit'] == "Submit")
{
    $errorMessage = "";

    if(empty($_POST['fName']))
    {
        $errorMessage = "<li>You forgot to enter your first name.</li>";
    }
    if(empty($_POST['lName']))
    {
        $errorMessage = "<li>You forgot to enter your last name.</li>";
    }
    if(empty($_POST['address']))
    {
        $errorMessage = "<li>You forgot to enter your addresss</li>";
    }
    if(empty($_POST['city']))
    {
        $errorMessage = "<li>You forgot to enter your city</li>";
    }
    if(empty($_POST['state']))
    {
        $errorMessage = "<li>You forgot to enter your state</li>";
    }
    if(empty($_POST['paymetType']))
    {
        $errorMessage = "<li>You forgot to enter your payment type</li>";
    }
    if(empty($_POST['payment'])){
        $errorMessage = "<li>You forgot to enter your Debit/Credit Card information.</li>";
    }
//        $varfirstName = $_POST['fName'];
//        $varlastName = $_POST['lName'];
//        $varuserName = $_POST['user'];
//        $varpassword = $_POST['password'];
//        $varaddress = $_POST['address'];
//        $varcity = $_POST['city'];
//        $varstate = $_POST['state'];
//        $varzip = $_POST['zip'];
//        $varapt = $_POST['apt'];


    $stmt = $dbh->prepare("INSERT INTO users (firstName, lastName, email, address, city, state, apt, payType, payment) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $result = $stmt->execute(array($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['apt'], $_POST['paymetType'], $_POST['payment']));

    if(!$result){
        print_r($stmt->errorInfo());
    }

    if(!empty($errorMessage))
    {
        echo("<p>There was an error with your form:</p>");
        echo("<ul>" . $errorMessage . "</ul>\n");
    }

}

?>
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
            <li class="active"><a href="signin.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
<form id="info" action="guestCheckout.php" method="post" role="form">
    <div class="form-group">
        <div class="form-group has-success has-feedback">
        <label>First Name:</label>
    <input type="text"  name="fName" maxlength="45" placeholder="John">
        </div>
    </div>
    <div class="form-group">
        <label>Last Name:</label>
    <input type="text"  name="lName" maxlength="45" placeholder="Smith">
    </div>
    <div class="form-group">
        <label>Email:</label>
    <input type="email" name="email" maxlength="45" placeholder="example@aol.com"><br>
    </div>
    <div class="form-group">
        <label>Address:</label>
    <input type="text" name="address" maxlength="255" placeholder="Address"><br>
    </div>
    <div class="form-group">
        <label>Country:</label>
        <select>
        <option id="US">United States</option>
        <option id="UK">United Kingdom</option>
    </select>
    </div>
   <div class="form-group">
       <label>State: </label><select>
        <option value=""></option>
        <option id="AL">AL</option>
        <option>Ak</option>
        <option>AZ</option>
        <option>AR</option>
        <option>CA</option>
        <option>CO</option>
        <option>CT</option>
        <option>DE</option>
        <option>FL</option>
        <option>GA</option>
        <option>HI</option>
        <option>ID</option>
        <option>IL</option>
        <option>IN</option>
        <option>IA</option>
        <option>KS</option>
        <option>KY</option>
        <option>LA</option>
        <option>ME</option>
        <option>MD</option>
        <option>MA</option>
        <option>MI</option>
        <option>MN</option>
        <option>MS</option>
        <option>MO</option>
        <option>MT</option>
        <option>NE</option>
        <option>NV</option>
        <option>NH</option>
        <option>NJ</option>
        <option>NM</option>
        <option>NY</option>
        <option>NC</option>
        <option>ND</option>
        <option>OH</option>
        <option>OK</option>
        <option>OR</option>
        <option>PA</option>
        <option>RI</option>
        <option>SC</option>
        <option>SD</option>
        <option>TN</option>
        <option>TX</option>
        <option>UT</option>
        <option>VT</option>
        <option>VA</option>
        <option>WA</option>
        <option>WV</option>
        <option>WI</option>
        <option>WY</option>
    </select><br></div>
    <div class="form-group">
        <label>City:</label>
        <input type="text" name="city" maxlength="255" placeholder="Hogwarts"><br>
    </div>
    <div class="form-group">
        <label>Apt:</label>
        <input type="number" name="apt" maxlength="10" placeholder="Apt. #"><br>
    </div>
    <div class="form-group">
        <label>Payment Type:</label>
        <select  id="paymentType" form="info" action="guestCheckout.php">
        <option value="" selected></option>
        <option value="Visa" id="visa">Visa</option>
        <option value="Master Card" id="Master">Master Card</option>
        <option value="American Express" id="American">American Express</option>
        <option value="Discover" id="Discover">Discover</option>
    </select>
    </div>
    <div class="form-group">
    <label>Credit Card</label>
    <input type="number" name="payment" maxlength="16" size="16" placeholder="xxxx-xxxx-xxxx-xxxx"><br>
    </div>
    <div class="form-group">
        <label>Security Code</label><input type="number" size="3" name="code" maxlength="4" placeholder="xxx">
    </div>
        <button type="submit" name="formSubmit" value="Submit">Submit</button>

</form>
</div>
</body>
</html>