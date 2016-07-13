
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
        <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>laKsyah | Admin</title>
                <!--<script src="<?php // echo Yii::app()->baseUrl                                                                                                                                                                                                                                                                                                                     ?>/admin-themes/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
                <!-- Tell the browser to be responsive to screen width -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/admin.css">
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                <!-- Bootstrap 3.3.5 -->

                <!-- Font Awesome -->




                <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.ico" type="image/x-icon" />
                <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.ico" type="image/x-icon" />
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/skins/skin-laksyah.min.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/admin.css">

                <!-- Bootstrap 3.3.5 -->
        <!--        <link rel="stylesheet" href="<?php //echo Yii::app()->baseUrl;                                                                                                                          ?>/admin-themes/bootstrap/css/bootstrap.min.css">-->
                <!-- Font Awesome -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/AdminLTE.min.css">
                <!-- AdminLTE Skins. Choose a skin from the css/skins
                     folder instead of downloading all of them to reduce the load. -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/skins/_all-skins.min.css">
                <!-- iCheck -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/iCheck/flat/blue.css">
                <!-- Morris chart -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/morris/morris.css">
                <!-- jvectormap -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
                <!-- Date Picker -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/datepicker/datepicker3.css">
                <!-- Daterange picker -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/daterangepicker/daterangepicker-bs3.css">
                <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

                <!-- Slimscroll -->
                <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/slimScroll/jquery.slimscroll.min.js"></script>
                <!-- FastClick -->
                <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/fastclick/fastclick.min.js"></script>
                <!-- AdminLTE App -->
                <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/js/app.min.js"></script>
                <script>
                        var baseurl = "<?php print Yii::app()->request->baseUrl . "/admin.php/"; ?>";
                        var basepath = "<?php print Yii::app()->basePath; ?>";
                </script>

        </head>



        <body class="hold-transition skin-laksyah sidebar-mini  fixed">
                <div class="wrapper">

                        <!-- Main Header -->
                        <header class="main-header">

                                <!-- Logo -->

                                <a href="#" class="logo">
                                        <!-- mini logo for sidebar mini 50x50 pixels -->
                                        <span class="logo-mini"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo_small.png" /></span>
                                        <!-- logo for regular state and mobile devices -->
                                        <span class="logo-lg"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo_small.png" /></span>

                                </a>

                                <!-- Header Navbar -->
                                <nav class="navbar navbar-static-top" role="navigation">
                                        <!-- Sidebar toggle button-->
                                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                                                <span class="sr-only">Toggle navigation</span>
                                        </a>
                                        <div class="navbar-custom-menu">
                                                <ul class="nav navbar-nav">
                                                        <li class="notifications-menu">

                                                                <a class="header_info"> Logged in as admin</a>

                                                        </li>
                                                        <li class="notifications-menu">

                                                                <a class="header_info"> <?php echo date("l, F j, Y", strtotime(date('Y-m-d'))); ?></a>

                                                        </li>
                                                        <li class=" messages-menu">
                                                                <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/site/logOut" class="header_info"style="color: #F7931E;"><i class="fa fa-sign-out"></i> Logout</a>

                                                        </li>


                                                </ul>
                                        </div>


                                </nav>



                        </header>
                        <!-- Left side column. contains the logo and sidebar -->
                        <aside class="main-sidebar">

                                <!-- sidebar: style can be found in sidebar.less -->
                                <section class="sidebar">

                                        <?php
                                        $actionId = Yii::app()->controller->id;
                                        switch ($actionId) {
                                                case "adminUser":
                                                        $action1 = "active";
                                                        $actionn1 = "active";
                                                        break;
                                                case "adminPost":
                                                        $action2 = "active";
                                                        $actionn1 = "active";
                                                        break;
                                                case "userDetails":
                                                        $action3 = "active";
                                                        break;
                                                case "slider":
                                                        $action4 = "active";
                                                        $actionn2 = "active";
                                                        break;
                                                case "socialMedia":
                                                        $action5 = "active";
                                                        $actionn2 = "active";
                                                        break;
                                                case "staticPage":
                                                        $action6 = "active";
                                                        $actionn2 = "active";
                                                        break;
                                                case "homeCategory":
                                                        $action7 = "active";
                                                        $actionn2 = "active";
                                                        break;
                                                case "homeSubcategory":
                                                        $action8 = "active";
                                                        $actionn2 = "active";
                                                        break;
                                                case "feedback":
                                                        $action9 = "active";
                                                        break;
                                                case "coupons":
                                                        $action10 = "active";
                                                        break;
                                                case "newsletter":
                                                        $action11 = "active";
                                                        break;
                                                case "dimensionClass":
                                                        $action12 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "weightClass":
                                                        $action13 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "userAddress":
                                                        $action14 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "countries":
                                                        $action15 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "districts":
                                                        $action16 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "states":
                                                        $action17 = "active";
                                                        $actionn3 = "active";
                                                        break;
                                                case "productCategory":
                                                        $action19 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "products":
                                                        $action20 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "masterOptions":
                                                        $action21001 = "active";
                                                        $action21 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "optionCategory":
                                                        $action21002 = "active";
                                                        $action21 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "productDescription":
                                                        $action22 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "Order":
                                                        $action23 = "active";
                                                        $actionn5 = "active";
                                                        break;
                                                case "OrderStatus":
                                                        $action24 = "active";
                                                        $actionn5 = "active";
                                                        break;
                                                case "OrderProducts":
                                                        $action25 = "active";
                                                        $actionn5 = "active";
                                                        break;
                                                case "testimonials":
                                                        $action23 = "active";
                                                        $actionn5 = "active";
                                                        break;
                                                case "appointment":
                                                        $action26 = "active";
                                                        $actionn6 = "active";
                                                        break;
                                                case "productMailTemplate":
                                                        $action33 = "active";
                                                        $actionn33 = "active";
                                                        break;
                                                case "productEnquiry":
                                                        $action223 = "active";
                                                        $actionn4 = "active";
                                                        break;
                                                case "makePayment":
                                                        $action224 = "active";
                                                        $actionn51 = "active";
                                                        break;
                                                case "giftCard":
                                                        $action225 = "active";
                                                        $actionn55 = "active";
                                                        break;
                                                case "measurementpdf":
                                                        $action235 = "active";
                                                        $actionn535 = "active";
                                                        break;
                                                case "banner":
                                                        $action245 = "active";
                                                        $actionn545 = "active";
                                                        break;
                                                case "userSizechart":
                                                        $action246 = "active";
                                                        $actionn546 = "active";
                                                        break;

                                                case "site":
                                                        if (Yii::app()->controller->action->id == "home") {
                                                                $action18 = "active";
                                                        }

                                                        break;
                                                default:
                                                        $action18 = "active";
                                                        break;
                                        }
                                        ?>
                                        <ul class="sidebar-menu">

                                                <li class="<?php echo $action18 ?>">
                                                        <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/site/home">
                                                                <i class="fa fa-dashboard"></i><span> Dash Board</span>
                                                        </a>
                                                </li>
                                                <?php if (isset(Yii::app()->session['post']['admin']) && Yii::app()->session['post']['admin'] == 1) { ?>
                                                        <li class="<?php echo $actionn1 ?> treeview">
                                                                <a href="#"><i class="fa fa-user-secret"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                <ul class="treeview-menu">
                                                                        <li class="<?php echo $action1 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/settings/AdminUser/admin"><i class="fa fa-circle-o"></i> Admin User</a></li>
                                                                        <li class="<?php echo $action2 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/settings/AdminPost/admin"><i class="fa fa-circle-o"></i> Admin Post</a></li>
                                                                </ul>
                                                        </li>
                                                <?php } ?>
                                                <?php if (isset(Yii::app()->session['post']['products']) && Yii::app()->session['post']['products'] == 1) { ?>
                                                        <li class="<?php echo $actionn4 ?> treeview">
                                                                <a href="#"><i class="fa fa-bars"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                <ul class="treeview-menu">
                                                                        <li class="<?php echo $action19 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/ProductCategory/admin"><i class="fa fa-circle-o"></i> Product Category</a></li>
                                                                        <li class="<?php echo $action20 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/Products/admin"><i class="fa fa-circle-o"></i> Products</a></li>

                                                                        <li class="<?php echo $action21 ?> treeview">
                                                                                <a href="#"><i class="fa fa-circle-o"></i> <span>Products Option</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                                <ul class="treeview-menu">

                                                                                        <li class="<?php echo $action21001 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/masterOptions/admin"><i class="fa fa-minus"></i> Option</a></li>
                                                                                        <li class="<?php echo $action21002 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/optionCategory/create"><i class="fa fa fa-minus"></i> Option Category </a></li>

                                                                                </ul>
                                                                        </li>

                                                                        <li class="<?php echo $action22 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/ProductDescription/admin"><i class="fa fa-circle-o"></i> Product Description</a></li>
                                                                        <li class="<?php echo $action223 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/productEnquiry/admin"><i class="fa fa-circle-o"></i> Product Enquiry</a></li>
                                                                        <li class="<?php echo $action223 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/dealProducts/admin"><i class="fa fa-circle-o"></i> Deal Products</a></li>

                                                                </ul>
                                                        </li>
                                                <?php } ?>
                                                <?php if (isset(Yii::app()->session['post']['products']) && Yii::app()->session['post']['products'] == 1) { ?>
                                                        <li class="<?php echo $actionn5 ?> treeview">
                                                                <a href="#"><i class="fa fa-bars"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                <ul class="treeview-menu">
                                                                        <li class="<?php echo $action23 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/Order/admin"><i class="fa fa-circle-o"></i>Order</a></li>
                                                                        <li class="<?php echo $action20 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderStatus/admin"><i class="fa fa-circle-o"></i> Order status</a></li>
                                                                        <li class="<?php echo $action21 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderProducts/admin"><i class="fa fa-circle-o"></i> Order Products</a></li>
                                                                        <li class="<?php echo $action21 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderHistory/admin"><i class="fa fa-circle-o"></i> Order History</a></li>


                                                                </ul>
                                                        </li>
                                                <?php } ?>




                                                <?php if (isset(Yii::app()->session['post']['cms']) && Yii::app()->session['post']['cms'] == 1) { ?>
                                                        <li class="<?php echo $actionn2 ?> treeview">
                                                                <a href="#"><i class="fa fa-book"></i> <span>CMS</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                <ul class="treeview-menu">
                                                                        <li class="<?php echo $action4 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/Slider/admin"><i class="fa fa-circle-o"></i> Sliders</a></li>
                                                                        <li class="<?php echo $action5 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/SocialMedia/admin"><i class="fa fa-circle-o"></i> Social Media</a></li>
                                                                        <li class="<?php echo $action6 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/StaticPage/admin"><i class="fa fa-circle-o"></i> Static Pages</a></li>
                                                                        <li class="<?php echo $action7 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/HomeCategory/admin"><i class="fa fa-circle-o"></i> Home Category</a></li>
                                                                        <li class="<?php echo $action8 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/HomeSubcategory/admin"><i class="fa fa-circle-o"></i> Home Sub category</a></li>
                                                                        <li class="<?php echo $action235 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/MeasurementPdfs/admin"><i class="fa fa-circle-o"></i> Measurements Downloads</a></li>
                                                                        <li class="<?php echo $action245 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/cms/Banner/admin"><i class="fa fa-circle-o"></i> Banner Images</a></li>

                                                                </ul>
                                                        </li>
                                                        <li class="<?php echo $actionn5 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/testimonials/Testimonial/admin">
                                                                        <i class="fa fa-adn"></i><span>Testimonials</span>
                                                                </a>
                                                        </li>
                                                        <li class="<?php echo $actionn6 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/appointment/BookAppointment/admin">
                                                                        <i class="fa fa-book"></i><span>Appointment</span>
                                                                </a>
                                                        </li>
                                                        <li class="<?php echo $action3 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/Blog/admin">
                                                                        <i class="glyphicon glyphicon-bold"></i><span>Blogs</span>
                                                                </a>
                                                        </li>
                                                        <li class="<?php echo $action11 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Newsletter/admin"><i class="fa  fa-newspaper-o"></i> <span>News Letter</span></a></li>
                                                        <li class="<?php echo $action33 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/productMailTemplate/admin">
                                                                        <i class="fa fa-at"></i><span>Email Templates</span>
                                                                </a>
                                                        </li>

                                                <?php } ?>

                                                <?php if (isset(Yii::app()->session['post']['coupons']) && Yii::app()->session['post']['coupons'] == 1) { ?>

                                                        <li class="<?php echo $action10 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/coupons/Coupons/admin"><i class="fa fa-ticket"></i> <span>Coupon Details</span></a></li>
                                                        <li class="<?php echo $action3 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/coupons/Coupons/admin">
                                                                        <i class="fa fa-users"></i><span>Coupons</span>
                                                                </a>
                                                        </li>
                                                        <li class="<?php echo $action55 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/giftcard/GiftCard/admin">
                                                                        <i class="glyphicon glyphicon-gift"></i><span>Gift Card</span>
                                                                </a>
                                                        </li>
                                                <?php } ?>
                                                <?php if (isset(Yii::app()->session['post']['masters']) && Yii::app()->session['post']['masters'] == 1) { ?>
                                                        <li class="<?php echo $actionn3 ?> treeview">
                                                                <a href="#"><i class="fa fa-database"></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                                <ul class="treeview-menu">
                                                                        <li class="<?php echo $action23 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Currency/admin"><i class="fa fa-circle-o"></i>Currency</a></li>
                                                                        <li class="<?php echo $action23 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/MasterShippingTypes/admin"><i class="fa fa-circle-o"></i>Shipping Types</a></li>
                                                                        <li class="<?php echo $action23 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/shippingCharges/admin"><i class="fa fa-circle-o"></i>Shipping Rates</a></li>
                                                                        <li class="<?php echo $action12 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/DimensionClass/admin"><i class="fa fa-circle-o"></i> Dimension Class</a></li>
                                                                        <li class="<?php echo $action13 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/WeightClass/admin"><i class="fa fa-circle-o"></i> Weight Class</a></li>
                                                                        <li class="<?php echo $action14 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/user/UserAddress/admin"><i class="fa fa-circle-o"></i> User Address</a></li>
                                                                        <li class="<?php echo $action15 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Countries/admin"><i class="fa fa-circle-o"></i> Countries</a></li>
                                                                        <li class="<?php echo $action16 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Districts/admin"><i class="fa fa-circle-o"></i> Districts</a></li>
                                                                        <li class="<?php echo $action17 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/States/admin"><i class="fa fa-circle-o"></i> States</a></li>
                                                                </ul>
                                                        </li>
                                                        <li class="<?php echo $action3 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/user/UserDetails/admin">
                                                                        <i class="fa fa-users"></i><span> User Details</span>
                                                                </a>
                                                        </li>
                                                        <li class="<?php echo $action3 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/UserNotify/admin">
                                                                        <i class="fa fa-users"></i><span> User Notified Products</span>
                                                                </a>
                                                        </li>


                                                        <li class="<?php echo $action51 ?>">
                                                                <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/makepayment/MakePayment/admin">
                                                                        <i class="glyphicon glyphicon-bookmark"></i><span>Make Payment</span>
                                                                </a>
                                                        </li>

                                                <?php } ?>
                                                <li class="<?php echo $action9 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/enquiry/Feedback/admin"><i class="fa fa-envelope"></i> <span>Feedback</span></a></li>

                                                <?php if (isset(Yii::app()->session['post']['reports']) && Yii::app()->session['post']['reports'] == 1) { ?>

                                                <?php } ?>

                                        </ul><!-- /.sidebar-menu -->
                                </section>
                                <!-- /.sidebar -->
                        </aside>

                        <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                                <!-- Content Header (Page header) -->



                                <?php echo $content; ?>



                        </div><!-- /.content-wrapper -->

                        <!-- Main Footer -->
                        <footer class="main-footer">
                                <!-- To the right -->

                                <!-- Default to the left -->
                                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Intersmart Solutions</a>.</strong> All rights reserved.
                        </footer>



                </div><!-- ./wrapper -->




        </body>
</html>
