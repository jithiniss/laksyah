<?php
$value = rtrim($product->category_id, ',');
$ids = explode(',', $value);
foreach ($ids as $id) {
        $cat_name = ProductCategory::model()->findByPk($id)->category_name;
}
?>



<?php
$folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
?>


<div class="container main_container">
        <div class="breadcrumbs">
                <?php
                //$category_name = Yii::app()->request->getParam('name');
                $url = Yii::app()->request->urlReferrer;
                $catname = explode("/", $url);
                $category_name = $catname[8];
                ?>
                <?php echo $this->renderPartial('_bread_crumb', array('category_name' => $category_name)); ?><span>/</span><?php echo $product->product_name; ?>
        </div>
        <div class="product_details">
                <div class="row">
                        <div>
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success mesage">
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger mesage">
                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-sm-7 col-md-8">
                                <div class="product_thumb">
                                        <ul id="gal1">
                                                <?php
                                                //  $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
                                                $big = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/big';
                                                $bigg = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/big/';
                                                $thu = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/small';
                                                $thumbs = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/small/';
                                                $zoo = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/zoom';
                                                $zoom = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/zoom/';
                                                $file_display = array('jpg', 'jpeg', 'png', 'gif');
                                                if (file_exists($big) == false) {

                                                } else {
                                                        $dir_contents = scandir($big);
                                                        $i = 0;
                                                        foreach ($dir_contents as $file) {
                                                                $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                        ?>

                                                                        <li> <a href="#" data-image="<?php echo $bigg . $file; ?>" data-zoom-image="<?php echo $zoom . $file; ?>"> <img src="<?php echo $thumbs . $file; ?>" alt=""/> </a> </li>
                                                                        <?php
                                                                }
                                                                ?>



                                                                <?php
                                                        }
                                                        $i++;
                                                }
                                                ?>

<!--                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big2.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_lg.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big2.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                                                -->
                                                <?php if (empty($dir_contents)) { ?>
                                                        <li><a href="#" data-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/zoom.<?= $product->main_image ?>"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/small.<?= $product->main_image ?>" alt=""/> </a></li>
                                                <?php } ?>
                                        </ul>
                                </div>
                                <?php
                                $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
                                ?>

                                <?php
                                if (!empty($dir_contents)) {

                                        foreach ($dir_contents as $file1) {

                                        }
                                        ?>
                                        <div class="product_big_image"> <img src="<?php echo $bigg . $file1; ?>" id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file1; ?>" alt=""/>
                                                <div class="product_social_shares"> <span>Share this look with your friends</span>
                                                        <a onclick="popWindow('https://www.facebook.com/sharer/sharer.php?u=http://beta.laksyah.com/Products/Detail/name/<?php echo $product->canonical_name; ?>', 'facebook', 'width=1000,height=200,left=0,top=0,location=no,status=yes,scrollbars=yes,resizable=yes');"><i class="fa fa-facebook" ></i></a>
                                                        <a onclick="popWindow('http://twitter.com/share?ur=https://laksyah.com/new-look/amber.html?t=AMBER', 'twitter', '');"><i class="fa fa-twitter" ></i></a>
                                                        <a onclick="popWindow('https://pinterest.com/pin/create/button/?url=https://laksyah.com/new-look/amber.html?t=AMBER', 'pinterest', '');"><i class="fa fa-pinterest-p" ></i></a>
                                                        <?php // } ?>
                                                        <a href="#" data-toggle="modal" data-target="#enquirymail"><i class="fa fa-envelope-o"></i></a> </div>
                                        </div>
                                <?php } else { ?>

                                        <div class="product_big_image"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" id="laksyah_zoom" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/zoom.<?= $product->main_image ?>" alt=""/>
                                                <div class="product_social_shares"> <span>Share this look with your friends</span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-pinterest-p"></i></a><a href="#" data-toggle="modal" data-target="#enquirymail"><i class="fa fa-envelope-o"></i></a> </div>
                                        </div>
                                <?php } ?>
                                <div class="mobile_slider">
                                        <div class="laksyah_slider">
                                                <?php if (file_exists($big) == false) { ?>
                                                        <div class = "item"> <img src = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" id = "laksyah_zoom" data-zoom-image = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>"></div>
                                                        <?php
                                                } else {
                                                        $dir_contents = scandir($big);
                                                        $i = 0;
                                                        foreach ($dir_contents as $file) {
                                                                $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                        ?>

                                                                        <div class="item"> <img src="<?php echo $bigg . $file; ?>"  id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file; ?>"></div>
                                                                        <?php
                                                                }
                                                                ?>



                                                                <?php
                                                        }
                                                        $i++;
                                                }
                                                ?>
                                        </div>
                                </div>
                                <div class="clearfix"></div>
                                <script type="text/javascript">
                                        function popWindow(url) {
                                                var newWindow = window.open(url, "", "width=300, height=200");
                                        }
                                </script>
                        </div>
                        <div class="col-sm-5 col-md-4 product_details_sidebar">
                                <div class="product_metas">
                                        <?php
                                        if ($product->enquiry_sale == 1) {
                                                $option_exists = OptionDetails::model()->findAllByAttributes(array('product_id' => $product->id));


                                                if (empty($option_exists)) {

                                                        if ($product->quantity == 0) {
                                                                ?>
                                                                <div class="out_of_stock_badge"></div>
                                                        <?php } else if ($product->quantity <= 2 && $product->quantity != 0) { ?>
                                                                <div class="allmost_gone_badge"></div>
                                                                <?php
                                                        }
                                                } else {

                                                        foreach ($option_exists as $option_exist) {
                                                                $total_stock += $option_exist->stock;
                                                                $out_stock +=$option_exist->status;
                                                        }
                                                        if ($total_stock == 0 || $out_stock == 0) {
                                                                $out_stock = 1;
                                                                ?>
                                                                <div class="out_of_stock_badge"></div>
                                                        <?php } else if ($total_stock <= 2 && $total_stock != 0) { ?>
                                                                <div class="allmost_gone_badge"></div>
                                                                <?php
                                                        }
                                                }
                                        }
                                        ?>

                                        <h1><?php echo $product->product_name; ?></h1>
                                        <!--<h5><?php //echo $product->product_code;                                                                                                                      ?></h5>-->
                                        <div class="product_ID">SKU: LKLEE1006</div>
                                        <?php if ($product->enquiry_sale == 1) { ?>


                                                <?php
                                                $today_deal_products = DealProducts::model()->findByAttributes(array('date' => date('Y-m-d')));
                                                if (!empty($today_deal_products)) {



                                                        $HiddenProducts = explode(',', $today_deal_products->deal_products);
                                                        if (in_array($product->id, $HiddenProducts)) {
                                                                if ($product->discount_type == 1) {
                                                                        $discountRate = $product->price - $product->discount_rate;
                                                                } else {
                                                                        $discountRate = $product->price - ( $product->price * ($product->discount_rate / 100));
                                                                }
                                                                ?>
                                                                <script>

                                                                        $(document).ready(function() {

                                                                                if ($('#clock').length) {
                                                                                        $('#clock').countdown('<?= date('Y/m/d'); ?> 23:59:59').on('update.countdown', function(event) {
                                                                                                var $this = $(this).html(event.strftime(''

                                                                                                        + '<div class="digit">%H<span>Hrs</span></div><div class="digit">:</div>'
                                                                                                        + '<div class="digit">%M<span>Min</span></div></div><div class="digit">:</div>'
                                                                                                        + '<div class="last digit">%S<span>Sec</span></div>'));
                                                                                        });
                                                                                }
                                                                        });
                                                                </script>

                                                                <p><span class="old_price"><?php echo Yii::app()->Currency->convert($product->price); ?></span>  <span class="discounted"><?php echo Yii::app()->Discount->Discount($product); ?></span></p>

                                                                <div class="deal_timer">
                                                                        <div class="deal_title">Deal Ends in:</div>
                                                                        <div class="deal_time">
                                                                                <div class="" id="clock"></div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                        <?php } else {
                                                                ?>
                                                                <div class="product_price"><span><?php echo Yii::app()->Discount->Discount($product); ?></span></div>
                                                                <?php
                                                        }
                                                } else {
                                                        ?>
                                                        <div class="product_price"><span><?php echo Yii::app()->Discount->Discount($product); ?></span></div>
                                                        <?php
                                                }
                                        }
                                        ?>
                                        <p class="tax_info"></p>


                                        <?php
                                        if ($product->enquiry_sale == 1) {
                                                //instock//

                                                if ($product->stock_availability == 1) {

                                                        if (empty($option_exists)) {

                                                                if ($product->quantity == 0) {
                                                                        ?>
                                                                        <p class="tax_info"><em>Inclusive of all local taxes</em></p>
                                                                        <form action = "<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $product->id; ?>" method = "post" name = "notify">

                                                                                <div class="sold_out_notify">
                                                                                        <h4>Product Out of Stock Subscription</h4>
                                                                                        <div class="input-group">
                                                                                                <?php if (isset(Yii::app()->session['user'])) { ?>
                                                                                                        <input type="text" class="form-control"  id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                                                                                        <?php
                                                                                                } else {
                                                                                                        ?>
                                                                                                        <input type="text" class="form-control" id="email" name="email"  placeholder="Enter Email Address">
                                                                                                        <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div class="input-group-btn"><button type="submit" class="btn-primary btn">Notify Me</button></div>
                                                                                        </div>
                                                                                        <p>(Notify me when this product is back in stock)</p>
                                                                                </div>
                                                                        </form>
                                                                        <?php
                                                                } else {

                                                                }
                                                        } else {
                                                                if ($total_stock == 0 || $out_stock == 0) {
                                                                        ?>
                                                                        <form action = "<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $product->id; ?>" method = "post" name = "notify">

                                                                                <div class="sold_out_notify">
                                                                                        <h4>Product Out of Stock Subscription</h4>
                                                                                        <div class="input-group">
                                                                                                <?php if (isset(Yii::app()->session['user'])) { ?>
                                                                                                        <input type="text" class="form-control"  id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                                                                                                        <?php
                                                                                                } else {
                                                                                                        ?>
                                                                                                        <input type="text" class="form-control" id="email" name="email"  placeholder="Enter Email Address">
                                                                                                        <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div class="input-group-btn"><button type="submit" class="btn-primary btn">Notify Me</button></div>
                                                                                        </div>
                                                                                        <p>(Notify me when this product is back in stock)</p>
                                                                                </div>
                                                                        </form>
                                                                        <?php
                                                                }
                                                        }
                                                }
                                        }
                                        ?>
                                        <?php if ($product->video != '') { ?>
                                                <div class="project_video">
                                                        <h3>Watch Video</h3>
                                                        <div class="video_thumb">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--<video src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/videos/video.<?= $product->video ?>" >-->
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/video_thumb.jpg" alt=""/>
                                                                <a class="video_link laksyah_video fancybox.iframe" href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/videos/video.<?= $product->video ?>"><i class="fa fa-play-circle-o"></i></a>
                                                        </div>
                                                </div>
                                        <?php }
                                        ?>
                                        <?php
                                        $product_option = MasterOptions::model()->findByAttributes(['product_id' => $product->id]);
                                        if (!empty($product_option)) {
                                                ?>
                                                <div class="option_errors">

                                                </div>
                                                <input type="hidden" value="<?php echo $product_option->id; ?>" name="master_option" id="master_option"/>
                                                <input type="hidden" value="<?php echo $product_option->option_type_id; ?>" name="option_type" id="option_type"/>
                                                <?php
                                                if ($product_option->option_type_id == 1 || $product_option->option_type_id == 3) {
                                                        $colors = OptionDetails::model()->findAllByAttributes(['master_option_id' => $product_option->id], ['group' => 'color_id', 'order' => 'color_id']);
                                                        ?>

                                                        <input type="hidden" value="" name="option_color" id="option_color"/>

                                                        <div class = "color_picker">
                                                                <h3>Select Color</h3>
                                                                <?php
                                                                if (!empty($colors)) {
                                                                        ?>
                                                                        <ul class = "product_colors">
                                                                                <?php
                                                                                foreach ($colors as $color) {

                                                                                        $color_name = OptionCategory::model()->findByPk($color->color_id);
                                                                                        if ($color->stock > 0 && $color->status != 0) {
                                                                                                $disabled1 = '';
                                                                                        } else {
                                                                                                $disabled1 = 'disabled';
                                                                                        }
                                                                                        ?>
                                                                                        <li class = "<?php echo $disabled1; ?>" option_id="<?php echo $product_option->id; ?>" color="<?php echo $color->color_id; ?>"> <a class = "#" style = "background-color:<?php echo $color_name->color_code; ?>;" title="<?php echo $color_name->color_name; ?>"></a> </li>

                                                                                        <?php
                                                                                }
                                                                                ?> </ul>
                                                                <?php }
                                                                ?>
                                                        </div>
                                                <?php } ?>
                                                <!--/ Color_picker-->

                                                <?php
                                                if ($product_option->option_type_id == 2 || $product_option->option_type_id == 3) {
                                                        $sizes = OptionCategory::model()->findAll(['condition' => 'option_type_id=2']);
                                                        ?>
                                                        <input type="hidden" value="" name="option_size" id="option_size"/>
                                                        <div class = "product_size size_filter">
                                                                <h3>Select Size<span><a href = "#" data-toggle = "modal" data-target = "#sizechartModal">SIZE CHART </a> (<?php
                                                                                if ($product->sizechartforwhat != '') {
                                                                                        echo $product->sizechartforwhat;
                                                                                }
                                                                                ?> )</span></h3>
                                                                <?php
                                                                if (!empty($sizes)) {
                                                                        ?>
                                                                        <div class = "size_selector">
                                                                                <?php
                                                                                foreach ($sizes as $size) {

                                                                                        $productoption = OptionDetails::model()->findByAttributes(array('size_id' => $size->id, 'master_option_id' => $product_option->id));

                                                                                        if ($product_option->option_type_id == 3) {

                                                                                                $disabled = 'disabled';
                                                                                        } else {


                                                                                                if ($productoption->stock > 0 && $productoption->status != 0) {

                                                                                                        if ($size->id == $productoption->size_id) {
                                                                                                                $disabled = '';
                                                                                                        } else {
                                                                                                                $disabled = 'disabled';
                                                                                                        }
                                                                                                } else {
                                                                                                        $disabled = 'disabled';
                                                                                                }
                                                                                        }
                                                                                        ?>
                                                                                        <label class="<?php echo $disabled; ?>" id="<?php echo $size->id; ?>"><?php echo $size->size; ?>
                                                                                                <input type = "radio" name = "size_selector_<?php echo $size->id; ?>" value = "<?php echo $size->id; ?>" id = "size_selector_<?php echo $size->id; ?>">
                                                                                        </label>
                                                                                        <?php
                                                                                }
                                                                                ?>

                                                                        </div>
                                                                        <?php
                                                                }
                                                                ?>
                                                        </div>
                                                        <?php
                                                }
                                                ?>

                                                <?php
                                        }
                                        ?>

                                        <!--/ Size Chart-->

                                        <!--/ Shipping_ifo-->



                                        <script>
                                                $(document).ready(function() {
<?php if ($model->hasErrors()) {
        ?>
                                                                $("#myModal").modal('show');
<?php } ?>
                                                });</script>

                                        <script>
                                                $(document).ready(function() {
<?php if (Yii::app()->user->hasFlash('enuirysuccess')) { ?>
                                                                $("#myModal").modal('show');
                                                                $(".modal-body").html('<h4 style="line-height: 25px">We have recieved your enquiry and will respond to you soon on possible. For urgent enquiry please call us directly on +91 9142202222 (Mon to Sat  9.30AM-6.30PM(IST))</h4>');
<?php } ?>
                                                });</script>
                                        <div class="modal fade" id="sizechartModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h2 class="modal-title">Size Chart</h2>
                                                                </div>
                                                                <div class="modal-body text-center">

                                                                        <img src="<?= Yii::app()->request->baseUrl; ?>/images/sample.jpg" alt=""/>      </div>
                                                        </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                        <div class="modal fade"  id="enquirymail" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h2 class="modal-title">Email To a friend</h2>
                                                                </div>
                                                                <br />
                                                                <div class="modal-body text-center">
                                                                        <form method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/mailfn">
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 validating">
                                                                                                <input placeholder="From" required="required" size="60" maxlength="225" class="form-control"  name="from" id="ProductEnquiry_product_id" type="text" >
                                                                                        </div>
                                                                                        <div class="col-sm-4 validating">
                                                                                                <input placeholder="Email" required="required" size="60" maxlength="225" class="form-control"  name="email" id="ProductEnquiry_product_id" type="text" >
                                                                                        </div>
                                                                                        <div class="col-sm-4 validating">
                                                                                                <button type="submit" class="btn btn-primary">SEND MAIL</button>
                                                                                        </div>
                                                                                </div>
                                                                        </form>
                                                                </div>

                                                        </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        <!-- Return Policy Modal starts-->
                                        <div class="modal fade"  id="returns" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                        <div class="modal-content" id="return_policy">

                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Return Policy Modal ends-->
                                        <?php
                                        if (isset(Yii::app()->session['user'])) {
                                                $user_info = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                                $model->name = $user_info->first_name . ' ' . $user_info->last_name;
                                                $model->country = $user_info->country;
                                                $model->email = $user_info->email;
                                                $model->phone = $user_info->phone_no_1;
                                                echo $user_info->first_name;
                                        }
                                        ?>





                                        <div class="modal fade" id="myModal" tabindex="-2" role="dialog">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h2 class="modal-title">Enquiry</h2>
                                                                        <hr style="background-color: " />
                                                                </div>
                                                                <div class="modal-body">


                                                                        <?php if (Yii::app()->user->hasFlash('enuirysuccess')): ?>
                                                                                <div class="alert alert-success">
                                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                        <?php echo Yii::app()->user->getFlash('enuirysuccess'); ?>
                                                                                </div>
                                                                        <?php endif; ?>
                                                                        <div class="form">

                                                                                <?php
                                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                                    'action' => Yii::app()->request->baseUrl . '/index.php/Products/Detail/name/' . $product->canonical_name,
                                                                                    'id' => 'product-enquiry-form',
                                                                                    'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                                                                                        // Please note: When you enable ajax validation, make sure the corresponding
                                                                                        // controller action is handling ajax validation correctly.
                                                                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                                                                        // See class documentation of CActiveForm for details on this.
                                                                                        // 'enableAjaxValidation' => true,
                                                                                ));
                                                                                ?>


                                                                                <div class="row">
                                                                                        <div class="col-sm-6">

                                                                                                <?php echo $form->hiddenField($model, 'product_id', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'value' => $product->id)); ?>
                                                                                                <?php echo $form->labelEx($model, 'name'); ?>
                                                                                                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Name')); ?>
                                                                                                <span style="color:red;"> <?php echo $form->error($model, 'name'); ?></span>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'country'); ?>
                                                                                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control')); ?>

                                                                                                <span style="color:red;"> <?php echo $form->error($model, 'country'); ?></span></div>
                                                                                </div>

                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'email'); ?>
                                                                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control hello_form', 'placeholder' => 'Email')); ?>
                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'email'); ?></span>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'phone'); ?>
                                                                                                <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Phone Number')); ?>

                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'phone'); ?></span>
                                                                                        </div>

                                                                                </div>


                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'size'); ?>
                                                                                                <?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MasterSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select Size--', 'class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'size'); ?>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'Delivery Date'); ?>

                                                                                                <?php
                                                                                                $from = date('Y');
                                                                                                $to = date('Y') + 2;
                                                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                                                    'model' => $model,
                                                                                                    'attribute' => 'delivery_date',
                                                                                                    'value' => 'delivery_date',
                                                                                                    'options' => array(
                                                                                                        'dateFormat' => 'dd-mm-yy',
                                                                                                        'changeYear' => true, // can change year
                                                                                                        'changeMonth' => true, // can change month
                                                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                                                        'showButtonPanel' => true, // show button panel
                                                                                                        'minDate' => '0',
                                                                                                    ),
                                                                                                    'htmlOptions' => array(
                                                                                                        'size' => '10', // textField size
                                                                                                        'maxlength' => '10', // textField maxlength
                                                                                                        'class' => 'form-control',
                                                                                                        'placeholder' => 'Delivery Date',
                                                                                                    ),
                                                                                                ));
                                                                                                ?>


                                                                                        </div>

                                                                                </div
                                                                                <br/>
                                                                                <!--                                                                                <div class="row">

                                                                                                                                                                        <div class="col-sm-12">
                                                                                <?php //echo $form->labelEx($model, 'requirement');   ?>
                                                                                <?php //echo $form->textArea($model, 'requirement', array('maxlength' => 300, 'class' => 'form-control', 'placeholder' => 'Requirement')); ?>
                                                                                <?php //echo $form->error($model, 'requirement');   ?></div>
                                                                                                                                                                </div>-->

                                                                                <?php
                                                                                //echo $this->widget('application.user.extensions.captcha.CaptchaExtendedAction', array(
                                                                                //'model' => $model,
                                                                                // 'attribute' => 'description',
                                                                                // ));
                                                                                ?>
                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'verifyCode'); ?><br />
                                                                                                <?php $this->widget("CCaptcha", array('buttonLabel' => 'change one for me', 'buttonOptions' => array('style' => 'margin-bottom:20px;'))); ?>

                                                                                                <?php echo $form->textField($model, 'verifyCode', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Type the captcha shown above', 'autocomplete' => 'off')); ?>

                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'verifyCode'); ?></span>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-12">
                                                                                                <div class="modal-footer">
                                                                                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'GET A QUOTE' : 'Save', array('class' => 'btn btn-primary')); ?>
                                                                                                        <?php //echo CHtml::resetButton($model->isNewRecord ? 'Reset' : 'Save', array('class' => 'btn btn-default'));       ?>

                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                <?php $this->endWidget(); ?>
                                                                        </div><!-- form -->

                                                                </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                        </div>





                                        <div class="modal fade" id="normalenquiry" tabindex="-2" role="dialog">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h2 class="modal-title">Contact Form</h2>
                                                                        <h5>Provide your information and we will contact you shortly. All information you provide will be treated confidentialy.</h5>
                                                                        <hr style="background-color: " />
                                                                </div>
                                                                <div class="modal-body">


                                                                        <?php if (Yii::app()->user->hasFlash('enuirysuccess')): ?>
                                                                                <div class="alert alert-success">
                                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                        <?php echo Yii::app()->user->getFlash('enuirysuccess'); ?>
                                                                                </div>
                                                                        <?php endif; ?>
                                                                        <div class="form">

                                                                                <?php
                                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                                    'action' => Yii::app()->request->baseUrl . '/index.php/Products/Detail/name/' . $product->canonical_name,
                                                                                    'id' => 'product-enquiry-form',
                                                                                    'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                                                                                        // Please note: When you enable ajax validation, make sure the corresponding
                                                                                        // controller action is handling ajax validation correctly.
                                                                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                                                                        // See class documentation of CActiveForm for details on this.
                                                                                        // 'enableAjaxValidation' => true,
                                                                                ));
                                                                                ?>


                                                                                <div class="row">
                                                                                        <div class="col-sm-6">

                                                                                                <?php echo $form->hiddenField($model, 'product_id', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'value' => $product->id)); ?>
                                                                                                <?php echo $form->labelEx($model, 'name'); ?>
                                                                                                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Name')); ?>
                                                                                                <span style="color:red;"> <?php echo $form->error($model, 'name'); ?></span>
                                                                                        </div>

                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'country'); ?>
                                                                                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control')); ?>

                                                                                                <span style="color:red;"> <?php echo $form->error($model, 'country'); ?></span></div>
                                                                                </div>

                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'email'); ?>
                                                                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control hello_form', 'placeholder' => 'Email')); ?>
                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'email'); ?></span>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'phone'); ?>
                                                                                                <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Phone Number')); ?>

                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'phone'); ?></span>
                                                                                        </div>

                                                                                </div>


                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'size'); ?>
                                                                                                <?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MasterSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select Size--', 'class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'size'); ?>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="row">

                                                                                        <div class="col-sm-12">
                                                                                                <?php echo $form->labelEx($model, 'requirement'); ?>
                                                                                                <?php echo $form->textArea($model, 'requirement', array('maxlength' => 300, 'class' => 'form-control', 'placeholder' => 'Requirement')); ?>
                                                                                                <?php echo $form->error($model, 'requirement'); ?></div>
                                                                                </div>

                                                                                <?php
                                                                                //echo $this->widget('application.user.extensions.captcha.CaptchaExtendedAction', array(
                                                                                //'model' => $model,
                                                                                // 'attribute' => 'description',
                                                                                // ));
                                                                                ?>
                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <?php echo $form->labelEx($model, 'verifyCode'); ?><br />
                                                                                                <?php $this->widget("CCaptcha", array('buttonLabel' => 'change one for me', 'buttonOptions' => array('style' => 'margin-bottom:20px;'))); ?>

                                                                                                <?php echo $form->textField($model, 'verifyCode', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Type the captcha shown above', 'autocomplete' => 'off')); ?>

                                                                                                <span style="color:red;">  <?php echo $form->error($model, 'verifyCode'); ?></span>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-12">
                                                                                                <div class="modal-footer">
                                                                                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'SUBMIT' : 'Save', array('class' => 'btn btn-primary')); ?>
                                                                                                        <?php //echo CHtml::resetButton($model->isNewRecord ? 'Reset' : 'Save', array('class' => 'btn btn-default'));        ?>

                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                <?php $this->endWidget(); ?>
                                                                        </div><!-- form -->

                                                                </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                        </div>
                                        <!-- /.modal-->
                                        <!--            </div>-->




                                        <?php
//check wheather sale or enquiry//

                                        if ($product->enquiry_sale == 1) {
                                                //instock//

                                                if ($product->stock_availability == 1) {
                                                        if (empty($option_exists)) {
                                                                $total_stock = $product->quantity;
                                                                if ($total_stock >= 1) {
                                                                        ?>

                                                                        <?php if ($product->quantity <= 2) { ?>
                                                                                <div class="product_quantity">
                                                                                        <h3>Quantity</h3>
                                                                                        <div class="qunatity">
                                                                                                <select class="qty" >
                                                                                                        <?php
                                                                                                        for ($i = 1; $i <= $product->quantity; $i++) {
                                                                                                                ?>
                                                                                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                                                                        <?php } ?>

                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                        <?php } else { ?>

                                                                                <div class="product_quantity">
                                                                                        <h3>Quantity</h3>
                                                                                        <div class="qunatity">
                                                                                                <select class="qty" >
                                                                                                        <option value="1">1</option>
                                                                                                        <option value="2">2</option>
                                                                                                        <option value="3">3</option>

                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                        <?php } ?>
                                                                        <!-- / Quantity-->
                                                                        <div class="shipping_info">
                                                                                <div class="row">
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a ><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                                        </div>
                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<p><a class="return_policies" style="cursor: pointer;" >View Shipping and Return Policies</a></p>-->


                                                                        </div>
                                                                        <!-- / Shipping_ifo-->
                                                                        <div class="product_button_group">
                                                                                <div class="row">
                                                                                        <div class="col-md-7 col-xs-7">
                                                                                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart-o"></i> ADD TO WISHLIST</a>

                                                                                        </div>
                                                                                        <div class="col-md-5 col-xs-5">
                                                                                                <button type="button" class="btn btn-skel" data-toggle="modal" data-target="#normalenquiry"><i class="fa fa-envelope-o"></i> ENQUIRY NOW</button>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">

                                                                                        <div class="col-xs-12">
                                                                                                <button class="btn-primary  add_to_cart" id="<?= $product->id; ?>"><strong><i class="fa fa-shopping-bag"></i> &nbsp;ADD TO BAG</strong></button>
                                                                                                <input type = "hidden" id = "opt_id" name = "opt">
                                                                                                <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">
                                                                                        </div>
                                                                                        <!--                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                                                                                <button type="button" class="btn-primary buy_now" id="<?= $product->id; ?>" ><i class="fa fa-envelope"></i> BUY NOW</button>
                                                                                                                                                                        </div>-->
                                                                                </div>
                                                                        </div>




                                                                        <?php
                                                                } else {
                                                                        ?>
                                                                        <div class="shipping_info">
                                                                                <div class="row">
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                                        </div>
                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->


                                                                        </div>
                                                                        <!--                                                                        <div class="product_button_group">

                                                                                                                                                        <div class="row">
                                                                                                                                                                <div class="col-md-7 col-xs-7">
                                                                                                                                                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart"></i> ADD TO WISHLIST</a>

                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                                                                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> ENQUIRY NOW</button>
                                                                                                                                                                </div>
                                                                                                                                                        </div>



                                                                                                                                                </div>-->

                                                                        <?php
                                                                }
                                                        } else {

                                                                if ($total_stock >= 1) {
                                                                        ?>

                                                                        <?php if ($total_stock <= 2) { ?>
                                                                                <div class="product_quantity">
                                                                                        <h3>Quantity</h3>
                                                                                        <div class="qunatity">
                                                                                                <select class="qty" >
                                                                                                        <?php
                                                                                                        for ($i = 1; $i <= $total_stock; $i++) {
                                                                                                                ?>
                                                                                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                                                                        <?php } ?>

                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                        <?php } else { ?>

                                                                                <div class="product_quantity">
                                                                                        <h3>Quantity</h3>
                                                                                        <div class="qunatity">
                                                                                                <select class="qty" >
                                                                                                        <option value="1">1</option>
                                                                                                        <option value="2">2</option>
                                                                                                        <option value="3">3</option>

                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                        <?php } ?>
                                                                        <!-- / Quantity-->
                                                                        <div class="shipping_info">
                                                                                <div class="row">
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                                        </div>
                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->


                                                                        </div>
                                                                        <!-- / Shipping_ifo-->
                                                                        <div class="product_button_group">
                                                                                <div class="row">
                                                                                        <div class="col-md-7 col-xs-7">
                                                                                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart-o"></i> ADD TO WISHLIST</a>

                                                                                        </div>
                                                                                        <div class="col-md-5 col-xs-5">
                                                                                                <button type="button" class="btn btn-skel" data-toggle="modal" data-target="#normalenquiry"><i class="fa fa-envelope-o"></i> ENQUIRY NOW</button>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">

                                                                                        <div class="col-xs-12">
                                                                                                <button class="btn-primary  add_to_cart" id="<?= $product->id; ?>"><strong><i class="fa fa-shopping-bag"></i> &nbsp;ADD TO BAG</strong></button>
                                                                                                <input type = "hidden" id = "opt_id" name = "opt">
                                                                                                <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">
                                                                                        </div>
                                                                                        <!--                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                                                                                <button type="button" class="btn-primary buy_now" id="<?= $product->id; ?>" ><i class="fa fa-envelope"></i> BUY NOW</button>
                                                                                                                                                                        </div>-->
                                                                                </div>
                                                                        </div>




                                                                <?php } else {
                                                                        ?>

                                                                        <div class="shipping_info">
                                                                                <div class="row">
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                                <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                                        </div>
                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->


                                                                        </div>

                                                                        <!--                                                                        <div class="product_button_group">

                                                                                                                                                        <div class="row">
                                                                                                                                                                <div class="col-md-7 col-xs-7">
                                                                                                                                                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart"></i> ADD TO WISHLIST</a>

                                                                                                                                                                </div>
                                                                                                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                                                                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> ENQUIRY NOW</button>
                                                                                                                                                                </div>
                                                                                                                                                        </div>



                                                                                                                                                </div>-->

                                                                <?php }
                                                                ?>

                                                                <?php
                                                        }
                                                }
                                                //out of stock//
                                                elseif ($product->stock_availability == 0) {
                                                        ?>
                                                        <div class="shipping_info">
                                                                <div class="row">
                                                                        <div class="col-md-6 col-xs-6">
                                                                                <h4><a><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                        </div>
                                                                        <div class="col-md-6 col-xs-6">
                                                                                <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                        </div>
                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->


                                                        </div>
                                                        <!--                                                        <div class="product_button_group">

                                                                                                                        <div class="row">
                                                                                                                                <div class="col-md-7 col-xs-7">
                                                                                                                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart"></i> ADD TO WISHLIST</a>

                                                                                                                                </div>
                                                                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> ENQUIRY NOW</button>
                                                                                                                                </div>
                                                                                                                        </div>


                                                                                                                </div>-->


                                                        <?php
                                                } else {
                                                        //other checking if availanle//
                                                }
                                        }
//enquiry//
                                        else {
                                                ?>
                                                <div class="shipping_info">
                                                        <div class="row">
                                                                <div class="col-md-6 col-xs-6">
                                                                        <h4><a><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></a></h4>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6">
                                                                        <h4><a ><i class="fa fa-truck"></i> <span>Free Shipping In India</span></a></h4>
                                                                </div>
                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->


                                                </div>
                                                <div class="product_button_group">
                                                        <div class="row">
                                                                <!--                                                                <div class="col-md-7 col-xs-7">
                                                                                                                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add_to_wishlist btn btn-skel "><i class="fa fa-heart"></i> ADD TO WISHLIST</a>

                                                                                                                                </div>-->
                                                                <div class="col-md-12 col-xs-12">
                                                                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i>  REQUEST PRICING</button>
                                                                </div>
                                                        </div>
                                                </div>

                                                <!-- Modal -->

                                                <?php
                                        }
                                        ?>

                                        <!--                                                        <div class="product_button_group">
                                                                                                        <div class="row">
                                                                                                                <div class="col-md-7 col-xs-7">
                                                                                                                        <button class="btn btn-skel"><i class="fa fa-shopping-bag"></i> ADD TO SHOPPING BAG</button>
                                                                                                                </div>
                                                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                        <button class="btn btn-skel" data-toggle="modal" data-target="#enquiryModal"><i class="fa fa-envelope"></i> ENQUIRY</button>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                                <div class="col-md-7 col-xs-7">
                                                                                                                        <button class="btn btn-skel"><i class="fa fa-heart"></i> ADD TO WISHLIST</button>
                                                                                                                </div>
                                                                                                                <div class="col-md-5 col-xs-5">
                                                                                                                        <button class="btn-primary"><i class="fa fa-envelope"></i> BUY NOW</button>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>-->
                                        <!--/Button Group-->
                                        <div class="product_description">
                                                <div>
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs" role="tablist">
                                                                <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                                                <li role="presentation"><a href="#details" aria-controls="profile" role="tab" data-toggle="tab"><?= $product->enquiry_sale == 1 ? 'Details' : 'Order Procedures'; ?></a></li>
                                                                <?php if ($product->enquiry_sale == 1) { ?><li role="presentation"><a href="#sizechart" aria-controls="settings" role="tab" data-toggle="tab">Size Charts</a></li><?php } else { ?>
                                                                        <li role="presentation"><a href="#sizechart1" aria-controls="settings" role="tab" data-toggle="tab">Size Chart</a></li>
                                                                <?php } ?>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                                <div role="tabpanel" class="tab-pane active" id="description"><?= $product->description; ?> </div>
                                                                <div role="tabpanel" class="tab-pane" id="details"> <?php echo CHtml::encode($product->product_details); ?></div>
                                                                <?php if ($product->enquiry_sale == 1) { ?>
                                                                        <div role="tabpanel" class="tab-pane" id="sizechart"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sample.jpg" alt=""/></div> <?php } else { ?>
                                                                        <div role="tabpanel" class="tab-pane" id="sizechart1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HOW-TO-MEASURE.jpg" alt=""/></div>
                                                                <?php } ?>
                                                        </div>
                                                </div>
                                                <!--<p><a class="return_policies"  style="cursor: pointer;">View Shipping and Return Policies</a></p>-->

                                        </div>
                                        <p class="terms_link">View Laksyah.com <?php echo CHtml::link('Terms', array('site/Terms')); ?> &amp; <?php echo CHtml::link('Policies', array('site/PrivacyPolicy')); ?></p>
                                </div>
                        </div>
                </div>
        </div>
        <!-- / End Product Details-->
        <!--/ Start Related Products-->
        <div class="relatd_products">
                <div class="section_title">
                        <h2>You May Also Like</h2>
                </div>
                <div class="related_itel_lists">
                        <div class="product_list ">
                                <div class="row related_list_slider">
                                        <?php
                                        if (!empty($recently) && $recently != '') {
                                                foreach ($recently as $recent) {

                                                        //$product_details = Products::model()->findByPk($recent->product_id);
                                                        $product_details = Products::model()->findByPk($recent->id);
                                                        if (!empty($product_details)) {
                                                                ?>
                                                                <?php
                                                                $folder1 = Yii::app()->Upload->folderName(0, 1000, $product_details->id);
                                                                ?>
                                                                <div class="col-sm-2">
                                                                        <div class="products_item"> <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $product_details->canonical_name; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder1 ?>/<?= $product_details->id ?>/medium.<?= $product_details->main_image ?>" alt=""/></a>
                                                                                <div class="list_title">
                                                                                        <h3><?= $product_details->product_name; ?></h3>
                                                                                        <!--<h4>Saree</h4>-->
                                                                                        <p><?= Yii::app()->Currency->convert($product_details->price); ?></p>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <?php
                                                        }
                                                }
                                        }
                                        ?>
                                </div>
                        </div>
                </div>
                <!--                <div class="section_title">
                        <h2>Related Products</h2>
                </div>
                <div class="related_itel_lists">
                        <div class="product_list ">
                                <div class="row related_list_slider">

                <?php
                if (!empty($related_products) && $related_products != '') {
                        foreach ($related_products as $related_product) {

                                $product_details1 = Products::model()->findByPk($related_product);
                                if (!empty($product_details1)) {
                                        ?>
                                        <?php
                                        $folder2 = Yii::app()->Upload->folderName(0, 1000, $product_details1->id);
                                        ?>
                                                                                        <div class="col-sm-2">
                                                                                                <div class="products_item"> <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $product_details1->canonical_name; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder2 ?>/<?= $product_details1->id ?>/medium.<?= $product_details1->main_image ?>" alt=""/></a>
                                                                                                        <div class="list_title">
                                                                                                                <h3><?= $product_details1->product_name; ?></h3>
                                                                                                                                                                                                        <h4>Saree</h4>
                                                                                                                <p><?= Yii::app()->Currency->convert($product_details1->price); ?></p>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                        <?php
                                }
                        }
                }
                ?>
                                </div>
                        </div>
                                </div>-->
        </div>
</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                        return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
                fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<script>


        //                        $(document).ready(function () {
        //                                alert();
        //                                /*
        //                                 * cart remove funciton . remove individual item from cart
        //                                 */
        //                                $(".cart_box").on("click", ".cart_item>.cart_close", function () {
        //                                        var cartid = $(this).attr('cartid');
        //                                        var canname = $(this).attr('canname');
        //                                        removecart(cartid, canname);
        //                                });
        //                        });

        $(document).ready(function() {

//                if ($('#clock').length) {
//                        $('#clock').countdown('<?= date('Y/m/d'); ?> 23:59:59').on('update.countdown', function (event) {
//                                var $this = $(this).html(event.strftime(''
//
//                                        + '<div class="digit">%H<span>Hrs</span></div><div class="digit">:</div>'
//                                        + '<div class="digit">%M<span>Min</span></div></div><div class="digit">:</div>'
//                                        + '<div class="last digit">%S<span>Sec</span></div>'));
//                        });
//                }


//return ploicy

                $(".return_policies").click(function() {

                        $.ajax({
                                type: "POST",
                                url: baseurl + 'Products/Policies',
                        }).done(function(data) {

                                if (data != "") {
                                        $("#returns").modal($('#return_policy').html(data));
                                }
                        });
                });
                $(".add_to_cart").click(function() {

                        var id = $(this).attr('id');
                        optionValidation(id);
                });
                $(".buy_now").click(function() {

                        var id = $(this).attr('id');
                        optionValidation(id);
                        //  window.location.origin + baseurl + "cart/Mycart";
                        setTimeout(function() {
                                window.location.replace(baseurl + "/cart/Mycart/");
                        }, 1000);
                        //  window.location.origin + baseurl + "cart/Mycart";



                });
                /*
                 * Product option
                 */
                // Size Selector
                $('.size_selector').delegate('label', 'click', function() {

                        $('#option_size').val('');
                        if ($(this).hasClass("disabled")) {

                        } else {
                                $('.size_selector label').removeClass('active');
                                $(this).addClass('active');
                                var size_opt = $('.size_selector .active').attr('id');
                                $('#option_size').val(size_opt);
                        }
                        return false;
                });
                ///
                // color Selector
                $('.color_picker li').click(function() {
                        var option_type = $('#option_type').val();
                        var color = $(this).attr('color');
                        var option = $(this).attr('option_id');
                        if (option_type == 3) {
                                if ($(this).hasClass("disabled")) {

                                } else {
                                        color_size(option, color);
                                }
                        }
                        if ($(this).hasClass("disabled")) {

                        } else {

                                $('.color_picker li').removeClass('active');
                                $(this).addClass('active');
                                $('#option_color').val(color);
                        }
                });
        });
        /*
         * product option validation
         */
        function optionValidation(id) {

                var canname = $("#cano_name_" + id).val();
                var qty = $(".qty").val();
                var option_color = $('#option_color').val();
                var option_size = $('#option_size').val();
                var option_type = $('#option_type').val();
                var master_option = $('#master_option').val();
                if (option_type == 3) {

                        if (option_color.length == 0 && option_size.length == 0) {
                                $('.option_errors').html('<p>Product color required</p><p>Product size required</p>').show();
                                return false;
                        } else if (option_color.length == 0) {
                                $('.option_errors').html('<p>Product color required</p>').show();
                                return false;
                        } else if (option_size.length == 0) {
                                $('.option_errors').html('<p>Product size required</p>').show();
                                return false;
                        } else {
                                $('.option_errors').html("").hide();
                                addtocart(canname, qty, option_color, option_size, master_option);
                        }
                } else if (option_type == 1) {

                        if (option_color.length == 0) {
                                $('.option_errors').html('<p>Product color required</p>').show();
                                return false;
                        } else {
                                $('.option_errors').html("").hide();
                                addtocart(canname, qty, option_color, option_size, master_option);
                        }
                } else if (option_type == 2) {
                        if (option_size.length == 0) {
                                $('.option_errors').html('<p>Product size required</p>').show();
                                return false;
                        } else {
                                $('.option_errors').html("").hide();
                                addtocart(canname, qty, option_color, option_size, master_option);
                        }
                }
                else {
                        $('.option_errors').html("").hide();
                        addtocart(canname, qty, option_color = null, option_size = null, master_option = null);
                }
        }

        function color_size(option, color) {

                //showLoader();
                $.ajax({
                        type: "POST",
                        url: baseurl + 'products/options',
                        data: {option: option, color: color}
                }).done(function(data) {

                        if (data != "") {

                                $('.size_selector').html(data);
                                hideLoader();
                        }
                });
        }

        function addtocart(canname, qty, option_color, option_size, master_option) {
                if (option_color === undefined) {
                        option_color = null;
                }
                if (option_size === undefined) {
                        option_size = null;
                }
                if (master_option === undefined) {
                        master_option = null;
                }
                $.ajax({
                        type: "POST",
                        url: baseurl + 'cart/Buynow',
                        data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
                }).done(function(data) {
                        if (data == 9) {

                                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
                        } else {

                                $('.option_errors').html("").hide();
                                getcartcount();
                                getcarttotal();
                                $(".cart_box").show();
                                $(".cart_box").html(data);
                                $("html, body").animate({scrollTop: 0}, "slow");
                        }
                        hideLoader();
                });
        }



        function showLoader() {
                $('.over-lay').show();
        }
        function hideLoader() {
                $('.over-lay').hide();
        }

</script>
