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
    </head>
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
            <li  class="active"><a href="view_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<?php
session_start(); //start session
include_once("config.php"); //include config file
print_r($_POST);
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
    foreach($_POST as $key => $value){ //add all post vars to new_product array
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    //remove unecessary vars
    unset($new_product['type']);
    unset($new_product['return_url']);

    //we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT product_name, price FROM products WHERE product_code=? LIMIT 1");
    $statement->bind_param('s', $new_product['product_code']);
    $statement->execute();
    $statement->bind_result($product_name, $price);

    while($statement->fetch()){

        //fetch product name, price from db and add to new_product array
        $new_product["product_name"] = $product_name;
        $new_product["product_price"] = $price;

        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
            }
        }
        $_SESSION["cart_products"][$new_product['product_code']] = $new_product; //update or create product session with new item
    }
}


//update or remove items
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
    //update item quantity in product session
    if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
        foreach($_POST["product_qty"] as $key => $value){
            if(is_numeric($value)){
                $_SESSION["cart_products"][$key]["product_qty"] = $value;
            }
        }
    }
    //remove an item from product session
    if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
        foreach($_POST["remove_code"] as $key){
            unset($_SESSION["cart_products"][$key]);
        }
    }
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);
?>
<div class="cart-view-table-back">
    <form method="post" action="cart_update.php">
        <table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
            <tbody>
            <?php
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
            <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
            <tr><td colspan="5"><a href="products.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
            <tr><td colspan="5"><button class="check_out"><a href="guestCheckout.php" style="float: right">Check Out</a> </button></td></tr>
            </tbody>
        </table>
        <input type="hidden" name="return_url" value="<?php
        $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        echo $current_url; ?>" />
    </form>
</div>
</body>
    </html>