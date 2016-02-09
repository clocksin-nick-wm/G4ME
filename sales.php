<!DOCTYPE html>
<html>
<head>
    <title>G4Me Games</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        !(function($){
            $(function(){
                $('.product-item').each(function(){
                    var thisEl = $(this),
                        btnPlus = thisEl.find('.btn-plus'),
                        btnMinus = thisEl.find('.btn-minus'),
                        fieldQtt = thisEl.find('input[name="qtt"]'),
                        itemPriceEl = thisEl.find('.item-price'),
                        price = itemPriceEl.data('price');

                    btnPlus.click(function(){
                        qttValue = parseInt(fieldQtt.val());
                        fieldQtt.val( qttValue + 1 );

                        itemPriceEl.html( '$'+(qttValue + 1) * price );
                    })
                    btnMinus.click(function(){
                        qttValue = parseInt(fieldQtt.val()) - 1;
                        var newQTT = (qttValue <= 1)? 1 : qttValue;
                        fieldQtt.val( newQTT );

                        itemPriceEl.html( '$'+newQTT * price );
                    })

                })
            })
        })(jQuery)
    </script>
</head>
<body>
<style>
table>tbody>tr>img{
    height: 200px;
    width: 300px;
}
    #row1 {
        align-content: center;
        margin-left: 50px;
    }
#row2 {
    align-content: center;
    margin-left: 50px;
    text-align: center;
}
</style>
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
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<table>
    <tbody>
    <tr>
        <div id="row1">
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/Skyrim.jpg" alt="E3" width="460" height="215">
                        <p><strong>Skyrim</strong></p>
                        <p><strong style="color: red; "><strike>$20.00</strike></strong></p>
                        <p style="color: red">55% Off</p>
                        <p>$9</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/The%20Division.jpg" alt="Division" width="460" height="287.5">
                        <p><strong>Tom Clancy's The Division</strong></p>
                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>
                        <p style="color: red">75% Off</p>
                        <p>$19.99</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/Assassins%20Creed.jpg" alt="Assassins" width="460" height="287.5">
                        <p><strong>Assassins's Creed Syndicate</strong></p>
                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>
                        <p style="color: red">35% Off</p>
                        <p>$38.99</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
            </div>
            </div>
    </tr>
    <tr>
        <div id="row2">
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/Skyrim.jpg" alt="E3" width="460" height="215">
                        <p><strong>The Witness</strong></p>
                        <p><strong style="color: red; "><strike>$39.99</strike></strong></p>
                        <p style="color: red">45% Off</p>
                        <p>$9</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/The%20Division.jpg" alt="Division" width="460" height="287.5">
                        <p><strong>Rise of the Tomb Raider</strong></p>
                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>
                        <p style="color: red">50% Off</p>
                        <p>$29.99</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="Games/Assassins%20Creed.jpg" alt="Assassins" width="460" height="287.5">
                        <p><strong>Fallout 4</strong></p>
                        <p><strong style="color: red; "><strike>$59.99</strike></strong></p>
                        <p style="color: red">97% Off</p>
                        <p>$1.79</p>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
            </div>
            </div>
    </tr>
    </tbody>
</table>
</body>
</html>