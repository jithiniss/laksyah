<?php
$cols = 4;
$span = 12 / $cols;
?>
<style>
        .product-list   div.product-block {
                margin-bottom: 15px;
                clear: none;
                display: inline-block;
        }

        .product-block .product-block-inner {
                background-color: #fff;
                padding: 10px;
                border: solid 2px #01a89e;
                border-radius: 10px;
                overflow: hidden;
                margin: 10px;
                min-height: 570px;
        }


        .verified-star {

                width: 50px;

        }
        .product-list .row-fluid  [class*="span"] {
                width:none;
                margin-left:0
        }
</style>
<div class="box box-produce featured highlight">
  <!--<h3 class="box-heading"><span><?php echo $heading_title; ?></span></h3>-->
        <div class="box-content">
                <div class="product-list">
                        <div class="row-fluid" id="yourlist">
                                <?php
                                $zz = 1;
                                foreach ($products as $i => $product) {
                                        ?>
                                        <?php if ($i++ % $cols == 0) { ?>

                                        <?php } ?>
                                        <div class="product-block span4"><div class="product-block-inner">
                                                        <?php if ($product['thumb']) { ?>
                                                                <div class="image">
                                                                        <?php if ($product['special']) { ?>
                                                                                <div class="product-label-special label"><?php echo $this->language->get('text_sale'); ?></div>
                                                                        <?php } ?>
                                                                        <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />

                                                                </div>
                                                        <?php } ?>

                                                        <div class="product-meta">
                                                                <h2 class="name"><?php echo $product['name']; ?></h2>

                                                                <!--<div class="product-action">
                                                                        <span class="wishlist-compare">
                                                                          <a class="wishlist" onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" ><?php echo $this->language->get("button_wishlist"); ?></a>
                                                                          <a class="compare" onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" ><?php echo $this->language->get("button_compare"); ?></a>
                                                                        </span>
                                                                <?php if ($product['rating']) { ?>
                                                                                                                                        <span class="rating pull-right"><img src="catalog/view/theme/<?php echo $this->config->get('config_template'); ?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></span>
                                                                <?php } ?>
                                                                </div>-->
                                                                <div class="price-cart">
                                                                        <?php if ($product['price']) { ?>
                                                                                <div class="price pull-left">
                                                                                        <?php if (!$product['special']) { ?>
                                                                                                <?php echo $product['price']; ?>
                                                                                        <?php } else { ?>
                                                                                                <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
                                                                                        <?php } ?>
                                                                                </div>

                                                                        <?php } ?>

                                                                        <!--<div class="cart">
                                                                              <input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" />
                                                                        </div>-->
                                                                </div>
                                                                <div class="description">
                                                                        <h4>Date : <?php echo $product['date_availeble'] ?></h4>
                                                                        <?php echo $product['description'] ?>

                                                                </div>

                                                                <div class="verified">
                                                                        <?php if ($product['sku']) { ?>
                                                                                <div class="verified-star"><p><?php echo $product['sku']; ?></p></div>
                                                                        <?php } ?>
                                                                </div>

                                                        </div>
                                                </div>
                                                <p>sdfsf</p>
                                        </div>



                                        <?php if ($i % $cols == 0 || $i == count($products)) { ?>

                                                <?php
                                        }
                                        if (++$zz == 6) {
                                                ?>

                                                <div class="product-block span4">
                                                        COde Here
                                                </div>
                                                <?php
                                                $zz = 1;
                                        }
                                        ?>

                                        <?php
                                }
                                ?>
                        </div>

                </div>
        </div>
</div>
