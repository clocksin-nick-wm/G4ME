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
            if(isset($_SESSION["cart_products"])) //check session var
            {
                $total = 0; //set initial total value
                $b = 0; //var for zebra stripe table
                foreach ($_SESSION["cart_products"] as $cart_itm)
                {
                    //set variables to use in content below
                    $product_name = $cart_itm["product_name"];
                    $product_qty = $cart_itm["product_qty"];
                    $product_price = $cart_itm["product_price"];
                    $product_code = $cart_itm["product_code"];
                    $subtotal = ($product_price * $product_qty); //calculate Price x Qty

                    $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe
                    echo '<tr class="'.$bg_color.'">';
                    echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                    echo '<td>'.$product_name.'</td>';
                    echo '<td>'.$currency.$product_price.'</td>';
                    echo '<td>'.$currency.$subtotal.'</td>';
                    echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
                    echo '</tr>';
                    $total = ($total + $subtotal); //add subtotal to total var
                }

                $grand_total = $total + $shipping_cost; //grand total including shipping cost
                foreach($taxes as $key => $value){ //list and calculate all taxes in array
                    $tax_amount     = round($total * ($value / 100));
                    $tax_item[$key] = $tax_amount;
                    $grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
                }

                $list_tax       = '';
                foreach($tax_item as $key => $value){ //List all taxes
                    $list_tax .= $key. ' : '. $currency. sprintf("%1.08f", $value).'<br />';
                }
                $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%1.08f", $shipping_cost).'<br />':'';
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