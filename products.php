<!DOCTYPE html>
<html>
<head>
    <title>G4Me Sales</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        #row1 {
            text-align: center;
    </style>
</head>
    <?php
    session_start();
    include_once("config.php");
    ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="Logo/G4me%20logo.png" width="100px" height="50px">
            </div>
            <ul class="nav navbar-nav">
                <li><a href="g4me.php">Home</a></li>
                <li><a href="about.php">About Us/Contact</a></li>
                <li class="active"><a href="products.php" class="active">Games</a></li>
                <li><a href="sales.php">Sales</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="view_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
                <li><a href="guestCheckout.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="products">
        <?php
        $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

        $results = $mysqli->query("SELECT id, src, product_code, product_name, product_img_name, price FROM products ORDER BY id ASC");
        if($results) {
        $products_item = '<ul class="products">';
        //fetch results set as object and output HTML
        while ($obj = $results->fetch_object()) {
        ?>
        <table>
            <tbody>
            <tr>
                <div id="row1">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <a href="<?php echo $obj-> src; ?>" target="_blank"><img
                                    src="<?php echo $obj->product_img_name; ?>" alt="Game Image" width="460" height="215"></a>

                            <p><strong><?php echo $obj->product_name; ?></strong></p>

                            <p><?php echo $currency . $obj->price; ?></p>
                            <form method="post" action="view_cart.php">
                            <label>
                                <span>Quantity</span>
                                <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
                            </label>

                                <input type="hidden" name="product_code" value="<?php echo $obj->product_code; ?>" />
                                <input type="hidden" name="productID" value="<?php echo $obj->id; ?>">
                                <input type="hidden" name="productName" value="<?php echo $obj->product_name; ?>">
                                <input type="hidden" name="productPrice" value="<?php echo $obj->price; ?>">
                                <input type="hidden" name="type" value="add" />
                                <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
    </div>
    </tr>
    </tbody>
    </table>
    </body>
</html>