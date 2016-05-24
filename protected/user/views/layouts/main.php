<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Laksyah</title>
        <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.png" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.png" type="image/x-icon" />


        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick-theme.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mystyle.css">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css" rel="stylesheet">

<!--                <script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.countdown.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
        <script>
                var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                var basepath = "<?php print Yii::app()->basePath; ?>";</script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>

    <body>
        <header>
            <div class="top-bar">
                <div class="container">
                    <div class="hidden-sm hidden-md hidden-lg pull-right mobile_search_btn"><i class="fa fa-search"></i></div>
                    <div class="searc_box_mobile">
                        <input class="form-control" type="text" placeholder="Search style number or keyword">
                        <button class="search"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 col-md-6 mobile-inline">
                            <ul>
                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/BookAppointment"><i class="fa fa-calendar"></i> <span class="hidden-xs">Make an </span>Appointment</a></li>
                                <li  class="hidden-mobile"><a href="#"><i class="fa fa-map-marker"></i> Location</a></li>
                            </ul>
                        </div>
                        <!-- / End Top Left-->
                        <div class="col-sm-7 text-right col-md-6 mobile-inline">
                            <ul>
                                <li class="hidden-mobile"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contactUs"><i class="fa fa-envelope"></i><span class="hidden-xs">LEAVE A </span>MESSAGE </a></li>
                                <li><a href="#"><i class="fa fa-mobile-phone"></i> MOBILE APP</a></li>

                                <li class="has_dropdown"><a href="#" class="active_currency">
                                        <?php if (isset(Yii::app()->session['currency'])) { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?php echo Yii::app()->session['currency']['id']; ?>.<?php echo Yii::app()->session['currency']['image']; ?>" width="16" height="11" alt=""/></i> <?php echo Yii::app()->session['currency']['currency_code']; ?>
                                        <?php } else { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/india-home.jpg" width="16" height="11" alt=""/></i> INR
                                        <?php } ?>
                                        <i class="fa fa-angle-down"></i></a>
                                    <div class="laksyah_dropdown currency_drop">
                                        <ul class="drop_menu">
                                            <?php
                                            $currencies = Currency::model()->findAll();

                                            foreach ($currencies as $currency) {
                                                    ?>
                                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php/site/CurrencyChange/id/<?= $currency->id; ?>" class="currency" code="<?= $currency->id; ?>"><i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?= $currency->id; ?>.<?= $currency->image; ?>" width="16" height="11" alt=""/></i><?= $currency->currency_code; ?></a></li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- / End Top Right-->
                    </div>

                </div>
            </div>
            <!-- /End Top Par-->
            <div class="logo-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 hidden-xs">


                            <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/searching/SearchList" method="post">
                                <div class="search_box">
                                    <?php $this->widget("application.user.components.MainSearch"); ?>
                                    <button type="submit" value="search" name="search" class="search" ><i class="fa fa-search"></i></button>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-2 logo_col col-xs-4"><a href="<?php echo yii::app()->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="218" height="103" alt=""/></a></div>
                        <div class="col-sm-5 col-xs-8">
                            <?php
                            if (isset(Yii::app()->session['user']['id'])) {
                                    $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                    $counts = count($cart_items);
                            } else {
                                    $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                    $counts = count($cart_items);
                            }
                            ?>
                            <ul class="user_nav">

                                <?php if (isset(Yii::app()->session['user'])) { ?>

                                        <li class="my_credit">
                                            <div class="wallet_icon"></div>
                                            <div class="wallet_item">
                                                <h6>My Credit</h6>
                                                <h5><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></h5>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li class="my_account has_dropdown"><span class="account_icon"><i class="fa fa-user"></i></span><span class="account_title">My Account</span> <i class="fa fa-angle-down"></i>
                                            <div class="laksyah_dropdown">
                                                <ul class="drop_menu">
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Profile" class="currency" >My Profile</a></li>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Mywishlists" class="currency" >My WishList</a></li>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Myordernew" class="currency" >My Orders</a></li>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/SizeChartType" class="currency" >My Size Chart</a>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Addressbook" class="currency" >Address Book</a></li>
                                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart" class="currency" >My Cart</a></li>
                                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Myaccount/Makepayment" class="currency" >Make A Payment</a></li>
                                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/Logout" class="currency" >Log Out</a></li>

                                                </ul>
                                            </div>
                                        </li>
                                        <li class="shopping_bag has_dropdown">
                                            <div class="cart_icon">
                                                <div class="cart_items"></div>
                                                <i class="fa fa-shopping-bag"></i></div><span class="bag_title">Shopping Bag </span><span class="amount"><?= $counts; ?></span>
                                            <div class="laksyah_dropdown  cart_box" id="cart_box">
                                            </div>
                                        </li>

                                        <li class="hidden-lg hidden-md hidden-sm"><div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                            </div></li>
                                <?php } else { ?>

                                        <li class="my_credit">
                                            <div class="wallet_icon"></div>
                                            <div class="wallet_item">
                                                <h6>My Credit</h6>
                                                <h5><?php echo Yii::app()->Currency->convert(0); ?></h5>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li class="my_account has_dropdown"><span class="account_icon"><i class="fa fa-user"></i></span><span class="account_title">Account</span> <i class="fa fa-angle-down"></i>
                                            <div class="laksyah_dropdown">
                                                <ul class="drop_menu">
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/login" class="currency" >Login</a></li>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/site/register" class="currency" >Register</a></li>
                                                    <li><a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/Mywishlists" class="currency" >My WishList</a></li>
                                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart" class="currency" >My Cart</a></li>

                                                </ul>
                                            </div>
                                        </li>

                                        <li class="shopping_bag has_dropdown cart_btn">
                                            <div class="cart_icon">
                                                <div class="cart_items"><?php echo $counts; ?></div>
                                                <i class="fa fa-shopping-bag"></i></div>
                                            <span class="bag_title">Shopping Bag </span><span class="amount">(<i class="fa fa-rupee"></i>2500)</span>
                                            <div class="laksyah_dropdown  cart_box" id="cart_box">

                                            </div>
                                        </li>

                                        <li class="hidden-lg hidden-md hidden-sm"><div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                            </div></li>
                                <?php } ?>
                            </ul>
                            <!-- / User menu -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Logo Bar-->
            <div class="container">
                <div class="navbar" role="navigation">

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav main-nav">
                            <li class="active"><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/category/name/women">WOMEN</a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/category/name/celeb-style">CELEB STYLE</a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/category/name/new-look">NEW LOOK</a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/category/name/festive">FESTIVE</a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/category/name/daily-wear">DAILY WEAR </a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/products/deal">DEAL of the day</a></li>
                            <li class="seperator"><i class="fa fa-circle"></i></li>
                            <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/site/GiftCard">Laksyah Gift Cards</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </header>
        <!-- /End of Header -->

        <?php echo $content; ?>




        <footer>
            <div class="footer-head">
                <div class="container text-center">
                    <h2>LAKSYAH <em>by</em> kavya madhavan</h2>
                </div>
            </div>
            <div class="footer_content">
                <div class="container">
                    <div class="footer-main">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 ship-new"> <img src="<?php echo yii::app()->request->baseUrl; ?>/images/worldwide-shipping.png" width="130">
                                        <!-- <h4 class="shippind-world"><i class="fa fa-globe"></i> <br />We Ship <br/ > Worldwide</h4>-->
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-6 footer-contact">
                                            <h4>Contact Us<span class="footer-bdr"></span></h4>
                                            <p>Tel: +91 914 220 2222 <br>
                                                support@laksyah.com <br>
                                                Mon to Sat 9.30am to 6.30pm IST</p>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <h4>Visit Us<span class="footer-bdr"></span></h4>
                                            <p>The Design House, <br>
                                                C-3, GCDA House, Mavelipuram,<br>
                                                Kakkanad, kochi <br>
                                                <a class="google-map-tag" target="_blank">Google Map</a> </p>
                                        </div>
                                        <div class="clearfix visible-xs"></div>
                                        <div class="col-md-4 col-sm-4  footer-follow">
                                            <h4>Follow Us<span class="footer-bdr"></span></h4>
                                            <p><a href="#">www.laksyah.com</a> </p>
                                            <ul class="social-icons">
                                                <?php
                                                $inst = SocialMedia::model()->findByPk(4);
                                                $you = SocialMedia::model()->findByPk(2);
                                                $face = SocialMedia::model()->findByPk(1);
                                                $twi = SocialMedia::model()->findByPk(3);
                                                $pin = SocialMedia::model()->findByPk(5);
                                                ?>
                                                <li><a href="<?php echo $inst->link; ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a> </li>
                                                <li><a href="<?php echo $you->link; ?>" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a> </li>
                                                <li><a href="<?php echo $face->link; ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a> </li>
                                                <li><a href="<?php echo $twi->link; ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a> </li>
                                                <li><a href="<?php echo $pin->link; ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest-p"></i></a> </li>
                                                <!--<li><a href="https://plus.google.com/u/0/116336234211963787309/posts" class="google-plus"><i class="fa fa-google-plus"></i></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2  ship-new"> <img src="<?php echo yii::app()->request->baseUrl; ?>/images/india-shipping.png" width="130">
                                        <!-- <h4 class="shippind-world"><i class="fa fa-globe"></i> <br />We Ship <br/ > Worldwide</h4>-->
                                </div>
                            </div>
                            <div id="back-to-top" style="display: block;"> <a href="#top" class="back-to-top" style="display: block;"></a> </div>
                        </div>
                    </div>
                    <div class="footer-menu">
                        <div class="container">
                            <ul>
                                <li><a href="#">About Us</a>|</li>
                                <li><a href="#">Contact Us</a>|</li>
                                <li><a href="#">Blog</a>|</li>
                                <li><a href="#">Policies</a>|</li>
                                <li><a href="#">Product Submission</a>|</li>
                                <li><a href="#">Careers</a>|</li>
                                <li><a href="#">Terms &amp; Condition</a>|</li>
                                <li><a href="#">FAQ</a> </li>
                            </ul>
                            <div id="back-to-top" style="display: block;"> <a class="back-to-top" style="display: block;"></a> </div>
                        </div>
                    </div>
                    <div class="footer_bottom">
                        <div class="container">
                            <div class="col-card"> <span class="text_RR"><img src="<?php echo yii::app()->request->baseUrl; ?>/images/card-icons.png"></span>
                                <p class="powered">© laksyah.com 2016. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="backto_top"><img src="<?php echo yii::app()->request->baseUrl; ?>/images/back-top.png" alt=""/></div>
        </footer>
        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
        <!--<script src="<?php echo yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>-->
        <script src="<?php echo yii::app()->request->baseUrl; ?>/js/slick.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery.fancybox.pack.js"></script>
        <script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery.elevatezoom.js"></script>

        <script src="<?php echo yii::app()->request->baseUrl; ?>/js/laksyah_main.js"></script>
    </body>
</html>

<script>
                $(document).ready(function () {
                    getcartcount();
                    getcarttotal();
                });
                function getcartcount() {

                    $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'cart/Getcartcount',
                        data: {}
                    }).done(function (data) {
                        $(".cart_items").html(data);
                        hideLoader();
                    });
                }
                function getcarttotal() {

                    $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'cart/Getcarttotal',
                        data: {}
                    }).done(function (data) {
                        $(".amount").html(data);
                        hideLoader();
                    });
                }
</script>
</script>
<script>
        $(document).keydown(function (e) {
            // ESCAPE key pressed
            if (e.keyCode == 27) {
                $(".cart_box").fadeOut(500);
            }
        });
        $(document).ready(function () {
            /*                  * cart remove funciton . remove individual item from cart
             */
            $("#cart_box").on("click", ".drop_cart>.cart_item>.remove_item", function () {
                var cartid = $(this).attr('cartid');
                var canname = $(this).attr('canname');
                removecart(cartid, canname);
            });
        });
        function removecart(cartid, canname) {

            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Removecart',
                data: {cartid: cartid, cano_name: canname}
            }).done(function (data) {
                getcartcount();
                getcarttotal();
                $(".cart_box").html(data);
<?php if (Yii::app()->controller->action->id == 'Mycart') { ?>
                        location.reload();
<?php } ?>
                hideLoader();
            });
        }
</script>

<script>
        function getcartdata() {
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Selectcart',
                data: {}
            }).done(function (data) {
                $(".cart_box").html(data);
                //$(".cart_box").show('fast');
                hideLoader();
            });
        }
</script>
<script>
        $(document).ready(function () {
            getcartdata();
            $('[data-toggle="tooltip"]').tooltip();
        });</script>
<script>
        function showLoader() {
            $('.over-lay').show();
        }
        function hideLoader() {
            $('.over-lay').hide();
        }

</script>



</body>
</html>
