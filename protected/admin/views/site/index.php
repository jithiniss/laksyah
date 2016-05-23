<section class="content-header">
        <h1>
                Dashboard
                <small>New Notifications</small>
        </h1>

</section>
<section class="content">
        <div class="row">
                <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                                <div class="inner">

                                        <h3><?php echo $count; ?></h3>

                                        <p>New Orders</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/products/order/admin?new_order=<?php echo date("Y-m-d"); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                        </div>
                </div><!-- ./col -->


                <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                                <div class="inner">
                                        <h3><?php echo $count_stock ?></h3>
                                        <p>Out of Stock Products</p>
                                </div>
                                <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/products/products/admin?out_ofstock=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                </div><!-- ./col -->

        </div><!-- /.row -->

        <!-- Main row -->
        <!--    <div class="row">
                 Left col
                <section class="col-lg-7 connectedSortable">
                     Custom tabs (Charts with tabs)
                    <div class="nav-tabs-custom">
                         Tabs within a box
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                            <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                        </ul>
                        <div class="tab-content no-padding">
                             Morris chart - Sales
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                        </div>
                    </div> /.nav-tabs-custom



                     quick email widget
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-envelope"></i>
                            <h3 class="box-title">Quick Email</h3>
                             tools box
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div> /. tools
                        </div>
                        <div class="box-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                                <div>
                                    <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer clearfix">
                            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>

                </section> /.Left col
                 right col (We are only adding the ID to make the widgets sortable)
                <section class="col-lg-5 connectedSortable">

                     Map box
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header">
                             tools box
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                                <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                            </div> /. tools

                            <i class="fa fa-map-marker"></i>
                            <h3 class="box-title">
                                Visitors
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div> /.box-body
                        <div class="box-footer no-border">
                            <div class="row">
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <div id="sparkline-1"></div>
                                    <div class="knob-label">Visitors</div>
                                </div> ./col
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <div id="sparkline-2"></div>
                                    <div class="knob-label">Online</div>
                                </div> ./col
                                <div class="col-xs-4 text-center">
                                    <div id="sparkline-3"></div>
                                    <div class="knob-label">Exists</div>
                                </div> ./col
                            </div> /.row
                        </div>
                    </div>
                     /.box

                     solid sales graph
                    <div class="box box-solid bg-teal-gradient">
                        <div class="box-header">
                            <i class="fa fa-th"></i>
                            <h3 class="box-title">Sales Graph</h3>
                            <div class="box-tools pull-right">
                                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body border-radius-none">
                            <div class="chart" id="line-chart" style="height: 250px;"></div>
                        </div> /.box-body
                        <div class="box-footer no-border">
                            <div class="row">
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                    <div class="knob-label">Mail-Orders</div>
                                </div> ./col
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                    <div class="knob-label">Online</div>
                                </div> ./col
                                <div class="col-xs-4 text-center">
                                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                    <div class="knob-label">In-Store</div>
                                </div> ./col
                            </div> /.row
                        </div> /.box-footer
                    </div> /.box


                </section> right col
            </div> /.row (main row)
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">90<small>%</small></span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div> /.col
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div> /.col

                 fix for small devices only
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div> /.col
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div> /.col
            </div> /.row
        </section> /.content
        <section class="content">
             Info boxes




             Main row
            <div class="row">
                 Left col
                <div class="col-md-8">
                     MAP & BOX PANE


                     TABLE: LATEST ORDERS
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Orders</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div> /.box-header
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Popularity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Call of Duty IV</td>
                                            <td><span class="label label-success">Shipped</span></td>
                                            <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="label label-warning">Pending</span></td>
                                            <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>iPhone 6 Plus</td>
                                            <td><span class="label label-danger">Delivered</span></td>
                                            <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="label label-info">Processing</span></td>
                                            <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="label label-warning">Pending</span></td>
                                            <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>iPhone 6 Plus</td>
                                            <td><span class="label label-danger">Delivered</span></td>
                                            <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Call of Duty IV</td>
                                            <td><span class="label label-success">Shipped</span></td>
                                            <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> /.table-responsive
                        </div> /.box-body
                        <div class="box-footer clearfix">
                            <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                            <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                        </div> /.box-footer
                    </div> /.box
                </div> /.col

                <div class="col-md-4">
                     Info Boxes Style 2
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inventory</span>
                            <span class="info-box-number">5,200</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <span class="progress-description">
                                50% Increase in 30 Days
                            </span>
                        </div> /.info-box-content
                    </div> /.info-box
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Mentions</span>
                            <span class="info-box-number">92,050</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <span class="progress-description">
                                20% Increase in 30 Days
                            </span>
                        </div> /.info-box-content
                    </div> /.info-box
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Downloads</span>
                            <span class="info-box-number">114,381</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div> /.info-box-content
                    </div> /.info-box
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Direct Messages</span>
                            <span class="info-box-number">163,921</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                            <span class="progress-description">
                                40% Increase in 30 Days
                            </span>
                        </div> /.info-box-content
                    </div> /.info-box
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                     PRODUCT LIST
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Added Products</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div> /.box-header
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                                        <span class="product-description">
                                            Samsung 32" 1080p 60Hz LED Smart HDTV.
                                        </span>
                                    </div>
                                </li> /.item
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript::;" class="product-title">Bicycle <span class="label label-info pull-right">$700</span></a>
                                        <span class="product-description">
                                            26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                        </span>
                                    </div>
                                </li> /.item
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                                        <span class="product-description">
                                            Xbox One Console Bundle with Halo Master Chief Collection.
                                        </span>
                                    </div>
                                </li> /.item
                                <li class="item">
                                    <div class="product-img">
                                        <img src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/img/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript::;" class="product-title">PlayStation 4 <span class="label label-success pull-right">$399</span></a>
                                        <span class="product-description">
                                            PlayStation 4 500GB Console (PS4)
                                        </span>
                                    </div>
                                </li> /.item
                            </ul>
                        </div> /.box-body
                        <div class="box-footer text-center">
                            <a href="javascript::;" class="uppercase">View All Products</a>
                        </div> /.box-footer
                    </div> /.box
                </div> /.col
            </div> /.row -->
</section><!-- /.content -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
        $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/js/demo.js"></script>