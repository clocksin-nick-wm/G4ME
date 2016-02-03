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
    @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700,700italic);
    @import url(http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css);
    *{
        margin: 0;
        padding: 0;
        font-family: 'Roboto Condensed', sans-serif;
    }
    html{
        background: #2C3A43;
    }
    body{}
    img{
        width: 100%;
    }
    #page{
        width: 70%;
        margin: 30px auto;
    }
    .content{
        text-align: center;
    }
    h2, small{
        color: #4BEFF2;
        text-transform: uppercase;
    }
    small{
        color: #468089;
    }

    a{
        color: #4BEFF2;
        text-decoration: none;
        transition: .3s;
        -webkit-transition: .3s;
    }
    a:hover{
        color: #468089;
    }
    .design{
        position: absolute;
        right: 20px;
        bottom: 20px;
        font-size: 12px;
        opacity: .1;
    }

    /* Style product */
    .product-items{
        width: 100%;
    }
    .product-items .product-item{
        display: inline-block;
        vertical-align: top;
        text-align: center;
        color: #45616C;
        margin-top: 30px;
        margin-right: 50px;
        transition: .5s;
        -webkit-transition: .5s;
    }
    .product-items .product-item:last-child{
        margin-right: 0;
    }
    .product-items .product-item:hover{
        color: #4DC3C7;
    }
    .product-items .product-item  .item-wrap{
        width: 130px;
        padding: 6px;
        border: 2px solid;
        position: relative;
    }
    .product-items .product-item  > .item-wrap,
    .product-items .product-item  > .item-wrap img,
    .product-items .product-item  .item-wrap .wrap-qtt{
        border-radius: 50%;
        line-height: 0;
    }
    .product-items .product-item  > .item-wrap img{
        opacity: .8;
        transition: .5s;
        -webkit-transition: .5s;
    }
    .product-items .product-item:hover img{
        transform: scale(.85) rotate(30deg);
        -webkit-transform: scale(.85) rotate(30deg);
        opacity: 1;
    }
    .product-items .product-item  .item-wrap .wrap-qtt .wrap-qtt-field-qtt,
    .product-items .product-item  .item-wrap .wrap-qtt .wrap-qtt-minus-plus{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
    }
    .product-items .product-item  .item-wrap .wrap-qtt .wrap-qtt-field-qtt{
        transition: .4s;
        -webkit-transition: .4s;
    }
    .product-items .product-item  .item-wrap .wrap-qtt .wrap-qtt-minus-plus{
        transition: .5s;
        -webkit-transition: .5s;
    }
    .btn-cart-qtt{
        width: 20px;
        height: 20px;
        border-radius: 50%;
        text-align: center;
        border: none;
        background: none;
        background: #4DC3C7;
        color: #2C8A8E;
    }
    .btn-cart-qtt.btn-plus,
    .wrap-qtt-field-qtt input,
    .btn-cart-qtt.btn-minus{
        position: absolute;
        right: -10px;
        top: 50%;
        cursor: pointer;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        z-index: 10;
    }
    .wrap-qtt-field-qtt input{
        right: -15px;
    }
    /*-----*/
    .wrap-qtt-field-qtt input{
        background: #2c3a43;
        border: 2px solid #4dc3c7;
        border-radius: 50%;
        color: #fff;
        font-weight: bold;
        height: 30px;
        text-align: center;
        width: 30px;
    }
    .product-items .product-item:hover .wrap-qtt .wrap-qtt-field-qtt{
        opacity: 1;
        transform: rotate(-1deg);
        -webkit-transform: rotate(-1deg);
    }
    /*-----*/
    .btn-cart-qtt.btn-plus{
        right: 13px;
        top: 6px;
        transform: rotate(69deg);
        -webkit-transform: rotate(69deg);
    }
    .btn-cart-qtt.btn-minus{
        transform: rotate(-20deg);
        -webkit-transform: rotate(-20deg);
    }
    .product-items .product-item:hover .wrap-qtt .wrap-qtt-minus-plus{
        opacity: 1;
        transform: rotate(20deg);
        -webkit-transform: rotate(20deg);
    }

    .product-items .product-item .item-info{
        margin-top: 10px;
    }
    .product-items .product-item .item-info .item-title,
    .product-items .product-item .item-info .item-price{
        text-transform: uppercase;
        font-weight: bold;
        color: #4BEFF2;
    }
    .product-items .product-item .item-info .item-price{
        font-size: 15px;
        color: #4DC3C7;
    }
    .link{
        position: absolute;
        bottom: 50px;
        right: 30px;
        font-size: 20px
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
            <li class="active"><a href="products.php">Games</a></li>
            <li><a href="sales.php">Sales</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a> </li>
            <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
<div id="page">
    <div class="content">
        <h2>G4ME Games</h2>
        <div class="product-items">
            <!-- start item -->
            <div class="product-item">
                <div class="item-wrap">
                    <img src="Games/Mass%20Effect.jpeg">
                    <div class="wrap-qtt">
                        <div class="wrap-qtt-field-qtt">
                            <input class="field-qtt" name="qtt" value="1" readonly=""/>
                        </div>
                        <div class="wrap-qtt-minus-plus">
                            <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                            <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div class="item-title">Mass Effect</div>
                    <div class="item-price" data-price="10">$10</div>
                </div>
            </div>
            <!-- end item -->
            <div class="product-item">
                <div class="item-wrap">
                    <img src="Games/xcom2.jpg">
                    <div class="wrap-qtt">
                        <div class="wrap-qtt-field-qtt">
                            <input class="field-qtt" name="qtt" value="1" readonly=""/>
                        </div>
                        <div class="wrap-qtt-minus-plus">
                            <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                            <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div class="item-title">XCOM 2</div>
                    <div class="item-price" data-price="35">$35</div>
                </div>
            </div>
            <div class="product-item">
                <div class="item-wrap">
                    <img src="Games/Bioshock.jpg">
                    <div class="wrap-qtt">
                        <div class="wrap-qtt-field-qtt">
                            <input class="field-qtt" name="qtt" value="1" readonly=""/>
                        </div>
                        <div class="wrap-qtt-minus-plus">
                            <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                            <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div class="item-title">Bioshock Trilogy</div>
                    <div class="item-price" data-price="15">$15</div>
                </div>
            </div>
            <div class="product-items">
                <!-- start item -->
                <div class="product-item">
                    <div class="item-wrap">
                        <img src="Games/borderlands2.jpg">
                        <div class="wrap-qtt">
                            <div class="wrap-qtt-field-qtt">
                                <input class="field-qtt" name="qtt" value="1" readonly=""/>
                            </div>
                            <div class="wrap-qtt-minus-plus">
                                <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                                <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title">Borderlands 2 GOTY</div>
                        <div class="item-price" data-price="5">$5</div>
                    </div>
                </div>
                <!-- end item -->
                <div class="product-item">
                    <div class="item-wrap">
                        <img src="Games/xcom2.jpg">
                        <div class="wrap-qtt">
                            <div class="wrap-qtt-field-qtt">
                                <input class="field-qtt" name="qtt" value="1" readonly=""/>
                            </div>
                            <div class="wrap-qtt-minus-plus">
                                <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                                <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title">XCOM 2</div>
                        <div class="item-price" data-price="35">$35</div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="item-wrap">
                        <img src="Games/Bioshock.jpg">
                        <div class="wrap-qtt">
                            <div class="wrap-qtt-field-qtt">
                                <input class="field-qtt" name="qtt" value="1" readonly=""/>
                            </div>
                            <div class="wrap-qtt-minus-plus">
                                <button class="btn-cart-qtt btn-plus"><i class="ion-plus-round"></i></button>
                                <button class="btn-cart-qtt btn-minus"><i class="ion-minus-round"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="item-title">Bioshock Trilogy</div>
                        <div class="item-price" data-price="15">$15</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>