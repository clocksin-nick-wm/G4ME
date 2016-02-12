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
                <li><a href="products.php">Games</a></li>
                <li class="active"><a href="sales.php">Sales</a></li>
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

        $results = $mysqli->query("SELECT src, product_code, product_name, product_desc, product_img_name, price, sales_price, percent_off FROM sales ORDER BY id ASC");
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
                        <a href="<?php echo $obj-> src; ?>"><img
                                src="<?php echo $obj->product_img_name; ?>" alt="Game Image" width="460" height="215"></a>

                        <p><strong><?php echo $obj->product_name; ?></strong></p>

                        <p><strong style="color: red; "><strike><?php echo $currency . $obj->sales_price; ?></strike></strong>
                        </p>

                        <p style="color: red"><?php echo $obj-> percent_off?></p>

                        <p><?php echo $currency . $obj->price; ?></p>
                        <label>
                            <span>Quantity</span>
                            <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
                        </label>
                        <form method="post" action="view_cart.php">
                            <input type="hidden" name="product_code" value="{$obj->product_code}" />
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
<!--//                $products_item .= <<<EOT-->
<!--//    <li class="product">-->
<!--//    <form method="post" action="cart_update.php">-->
<!--//    <div class="product-content"><h3>{$obj->product_name}</h3>-->
<!--//    <div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>-->
<!--//    <div class="product-desc">{$obj->product_desc}</div>-->
<!--//    <div class="product-info">-->
<!--//    Price {$currency}{$obj->price}-->
<!--//-->
<!--//    <fieldset>-->
<!--//-->
<!--//    <label>-->
<!--//        <span>Quantity</span>-->
<!--//        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />-->
<!--//    </label>-->
<!--//-->
<!--//    </fieldset>-->
<!--//    <input type="hidden" name="product_code" value="{$obj->product_code}" />-->
<!--//    <input type="hidden" name="type" value="add" />-->
<!--//    <input type="hidden" name="return_url" value="{$current_url}" />-->
<!--//    <div align="center"><button type="submit" class="add_to_cart">Add</button></div>-->
<!--//    </div></div>-->
<!--//    </form>-->
<!--//    </li>-->
<!--//EOT;-->
<!--//            }-->
<!--//            $products_item .= '</ul>';-->
<!--//            echo $products_item;-->

<!--    </div>-->
<!--    <title>G4Me Sales</title>-->
<!--    <!-- Latest compiled and minified CSS -->
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!---->
<!--    <!-- jQuery library -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<!---->
<!--    <!-- Latest compiled JavaScript -->
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!--    <script>-->
<!--        !(function($){-->
<!--            $(function(){-->
<!--                $('.product-item').each(function(){-->
<!--                    var thisEl = $(this),-->
<!--                        btnPlus = thisEl.find('.btn-plus'),-->
<!--                        btnMinus = thisEl.find('.btn-minus'),-->
<!--                        fieldQtt = thisEl.find('input[name="qtt"]'),-->
<!--                        itemPriceEl = thisEl.find('.item-price'),-->
<!--                        price = itemPriceEl.data('price');-->
<!---->
<!--                    btnPlus.click(function(){-->
<!--                        qttValue = parseInt(fieldQtt.val());-->
<!--                        fieldQtt.val( qttValue + 1 );-->
<!---->
<!--                        itemPriceEl.html( '$'+(qttValue + 1) * price );-->
<!--                    })-->
<!--                    btnMinus.click(function(){-->
<!--                        qttValue = parseInt(fieldQtt.val()) - 1;-->
<!--                        var newQTT = (qttValue <= 1)? 1 : qttValue;-->
<!--                        fieldQtt.val( newQTT );-->
<!---->
<!--                        itemPriceEl.html( '$'+newQTT * price );-->
<!--                    })-->
<!---->
<!--                })-->
<!--            })-->
<!--        })(jQuery)-->
<!--    </script>-->
<!--</head>-->
<!--<body>-->
<!--<style>-->
<!--    table>tbody>tr>img{-->
<!--    height: 200px;-->
<!--    width: 300px;-->
<!--    }-->
<!--    #row1 {-->
<!--        align-content: center;-->
<!--        margin-left: 50px;-->
<!--    }-->
<!--    #row2 {-->
<!--    align-content: center;-->
<!--    margin-left: 50px;-->
<!--    text-align: center;-->
<!--    }-->
<!--    #row3 {-->
<!--        align-content: center;-->
<!--        margin-left: 50px;-->
<!--        text-align: center;-->
<!--    }-->
<!--</style>-->
<!--<nav class="navbar navbar-inverse">-->
<!--    <div class="container-fluid">-->
<!--        <div class="navbar-header">-->
<!--            <img src="Logo/G4me%20logo.png" width="100px" height="50px">-->
<!--        </div>-->
<!--        <ul class="nav navbar-nav">-->
<!--            <li><a href="g4me.php">Home</a></li>-->
<!--            <li><a href="about.php">About Us/Contact</a></li>-->
<!--            <li><a href="products.php">Games</a></li>-->
<!--            <li class="active"><a href="sales.php">Sales</a></li>-->
<!--        </ul>-->
<!--        <ul class="nav navbar-nav navbar-right">-->
<!--            <li><a href="view_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>-->
<!--            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
<!--            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->
<!--<table>-->
<!--    <tbody>-->
<!--    <tr>-->
<!--        <div id="row1">-->
<!--            <div class="row text-center">-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <a href="https://www.youtube.com/watch?v=JQtTD5K52xI"><img src="Games/Skyrim.jpg" alt="E3" width="460" height="215"></a>-->
<!--                        <p><strong>Skyrim</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$20.00</strike></strong></p>-->
<!--                        <p style="color: red">55% Off</p>-->
<!--                        <p>$9</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/The%20Division.jpg" alt="Division" width="460" height="215">-->
<!--                        <p><strong>Tom Clancy's The Division</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>-->
<!--                        <p style="color: red">75% Off</p>-->
<!--                        <p>$19.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/Assassins%20Creed.jpg" alt="Assassins" width="460" height="215">-->
<!--                        <p><strong>Assassins's Creed Syndicate</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>-->
<!--                        <p style="color: red">35% Off</p>-->
<!--                        <p>$38.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <div id="row2">-->
<!--            <div class="row text-center">-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <a href="https://www.youtube.com/watch?v=9ytwNUMdbcE"><img src="Games/Witness.jpg" alt="The Witness" width="460" height="215"></a>-->
<!--                        <p><strong>The Witness</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$39.99</strike></strong></p>-->
<!--                        <p style="color: red">45% Off</p>-->
<!--                        <p>$9</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <a href="https://www.youtube.com/watch?v=Nd6evo2X5fw"><img src="Games/Rise-Of-The-Tomb-Raider.jpg" alt="Rise of the Tomb Raider" width="460" height="215"></a>-->
<!--                        <p><strong>Rise of the Tomb Raider</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>-->
<!--                        <p style="color: red">50% Off</p>-->
<!--                        <p>$29.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/Fallout.jpg" alt="Fallout 4" width="460" height="215">-->
<!--                        <p><strong>Fallout 4</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>-->
<!--                        <p style="color: red">97% Off</p>-->
<!--                        <p>$1.79</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--        <div id="row3">-->
<!--            <div class="row text-center">-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/Firewatch.jpg" alt="Firewatch" width="460" height="215">-->
<!--                        <p><strong>Firewatch</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$19.99</strike></strong></p>-->
<!--                        <p style="color: red">50% Off</p>-->
<!--                        <p>$9.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/Star%20Wars.jpeg" alt="Star Wars" width="460" height="215">-->
<!--                        <p><strong>Star Wars Battlefront</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>-->
<!--                        <p style="color: red">75% Off</p>-->
<!--                        <p>$14.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img src="Games/Elite.jpg" alt="Elite" width="460" height="215">-->
<!--                        <p><strong>Elite Dangerous</strong></p>-->
<!--                        <p><strong style="color: red; "><strike>$39.99</strike></strong></p>-->
<!--                        <p style="color: red">50% Off</p>-->
<!--                        <p>$19.99</p>-->
<!--                        <button class="add_to_cart">Add to Cart</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->
</body>
</html>