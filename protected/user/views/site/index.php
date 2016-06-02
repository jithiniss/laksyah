<div class="container">

        <div class="row header_special_row">
                <div class="col-sm-4 col-xs-4">
                        <h4><i class="fa fa-globe"></i> <span>We Ship Worldwide</span></h4>
                </div>
                <div class="col-sm-4 col-xs-4">
                        <h4><i class="fa fa-envelope"></i> <span>Sign up to our newsletter</span></h4>
                </div>
                <div class="col-sm-4 col-xs-4">
                        <h4><i class="fa fa-truck"></i> <span>Free Shipping In India</span></h4>
                </div>
        </div>
        <!--/ End Shipping Area -->
        <div class="slider_section">
                <div class="laksyah_slider">
                        <?php
                        foreach ($slider as $sliders) {
                                ?>
                                <div class="item"> <img src="<?php echo yii::app()->baseUrl; ?>/uploads/sliders/<?php echo $sliders->id; ?>.<?php echo $sliders->image_extension; ?>"> </div>
                                <?php
                        }
                        ?>
                </div>
        </div>
        <!-- / End Slider-->
</div>
<!-- /.container -->

<div class="container container-inner">
        <div class="celeb_row">
                <div class="row">
                        <div class="col-xs-6 padd-right-25">
                                <div class="home_cat_wrapper"> <img src="<?php echo yii::app()->baseUrl; ?>/images/celebraty.jpg" class="borderd" width="506" height="570" alt=""/>
                                        <div class="section_title item_meta">
                                                <h2>Celeb Style</h2>
                                                <h4>Shile like a star</h4>
                                                <?php echo CHtml::link('SHOP NOW', array('/products/category?name=celeb-style'), array('class' => 'btn-simple')); ?></div>
                                </div>
                        </div>
                        <!-- / Celeb Style-->
                        <div class="col-xs-6 padd-left-25">
                                <div class="home_cat_wrapper"> <img src="<?php echo yii::app()->baseUrl; ?>/images/festive.jpg" class="borderd" width="506" height="570" alt=""/>
                                        <div class="section_title item_meta">
                                                <h2>Celeb Style</h2>
                                                <h4>Shile like a star</h4>
                                                <?php echo CHtml::link('SHOP NOW', array('/products/category?name=celeb-style'), array('class' => 'btn-simple')); ?></div>
                                </div>
                        </div>
                        <!-- / Festive-->
                </div>
        </div>
        <!-- / Celeb Row-->
        <div class="design_house">
                <div class="row">
                        <div class="col-xs-6"> <img src="<?php echo yii::app()->baseUrl; ?>/images/design-house.jpg" alt=""/> </div>
                        <div class="col-xs-6">
                                <div class="section_title design_house_title">
                                        <h2>The Design House</h2>
                                        <h4>Bridal couture & consultancy</h4>
                                        <?php echo CHtml::link('BOOK AN APPOINTMENT', array('site/BookAppointment'), array('class' => 'btn-dark')); ?></div>
                        </div>
                </div>
        </div>
        <!-- / Design House-->
        <div class="home_category_row">
                <div class="row">
                        <div class="col-xs-4">
                                <div class="cat_list"> <img src="<?php echo yii::app()->baseUrl; ?>/images/thumb_big.jpg" alt=""/>
                                        <div class="cat_title">
                                                <h3>What’s New</h3>
                                                <h4>Explore our New Collection</h4>
                                                <?php echo CHtml::link('SHOP NOW', array('/products/category?name=new-look'), array('class' => 'btn-simple')); ?></div>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="cat_list"> <img src="<?php echo yii::app()->baseUrl; ?>/images/laksya-cropped-1.jpg" alt=""/>
                                        <div class="cat_title">
                                                <h3>What’s New</h3>
                                                <h4>Explore our New Collection</h4>
                                                <?php echo CHtml::link('SHOP NOW', array('/products/category?name=new-look'), array('class' => 'btn-simple')); ?></div>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="cat_list"> <img src="<?php echo yii::app()->baseUrl; ?>/images/laksya-cropped-2.jpg" alt=""/>
                                        <div class="cat_title">
                                                <h3>What’s New</h3>
                                                <h4>Explore our New Collection</h4>
                                                <?php echo CHtml::link('SHOP NOW', array('/products/category?name=new-look'), array('class' => 'btn-simple')); ?></div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- / Category Section-->
        <div class="design_house laksyah_gift">
                <div class="row">
                        <div class="col-sm-6"> <img src="<?php echo yii::app()->baseUrl; ?>/images/laksyah_gift.jpg" alt=""/> </div>
                        <div class="col-sm-6">
                                <div class="section_title gift_title">
                                        <h2>Gift with Love</h2>
                                        <h4>Free Gift Packing and personalized message card</h4>
                                        <?php echo CHtml::link('ORDER NOW', array('products/order_giftoption'), array('class' => 'btn-dark')); ?></div>
                        </div>
                </div>
        </div>
        <!-- /Laksyah Gift-->
        <div class="blog_section">
                <h2>The Latest From Our Blog</h2>
                <div class="blog_list">
                        <div class="row">
                                <?php
                                foreach ($blog as $blogs) {
                                        ?>
                                        <div class="col-sm-3 col-xs-6">
                                                <div class="blog_list_item"> <img src="<?php echo yii::app()->baseUrl; ?>/uploads/blog/<?php echo $blogs->id; ?>/small.<?php echo $blogs->small_image; ?>" alt=""/>
                                                        <div class="list_title">
                                                                <h4><?php echo $blogs->heading; ?></h4>
                                                        </div>
                                                </div>
                                        </div>
                                        <?php
                                }
                                ?>

                        </div>
                </div>
                <?php echo CHtml::link('READ MORE', array('site/Blog'), array('class' => 'btn btn-skel')); ?></div>
        <!-- / End Blog-->
        <div class="testimonials_section">
                <h2>Testimonials</h2>
                <div class="testimonial_carousel">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                        <?php
                                        $m = 1;
                                        foreach ($model as $models) {
                                                ?>

                                                <div class="item<?php
                                                if ($m == '1') {
                                                        echo " active";
                                                }
                                                ?>">
                                                        <p><?php echo $models->content; ?></p>
                                                        <h3><?php echo $models->name; ?>,<?php echo $models->position; ?></h3>
                                                </div>
                                                <?php
                                                $m = $m + 1;
                                        }
                                        ?>

                                </div>
                                <a class="arrow left" href="#myCarousel" role="button" data-slide="prev"></a> <a class="arrow right" href="#myCarousel" role="button" data-slide="next"></a> </div>
                </div>
        </div>
        <!-- / Testimonials-->
</div>
<?php
//foreach ($model as $mod) {
//       var_dump($mod);
//}
?>
<!-- / End Content-->