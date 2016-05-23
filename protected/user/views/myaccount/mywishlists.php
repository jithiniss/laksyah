
<div class="clearfix"></div>

<div class="container security">
        <div class="row">

                <?php echo $this->renderPartial('_menu'); ?>

                <div class="col-sm-9 user_content">
                        <h1>My Wishlists</h1>
                        <!--<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  Success </div>-->
                        <div class="cart_table">
                                <div class="header_row cart_row">
                                        <div class="col-11">PRODUCT</div>
                                        <div class="col-33">PRICE</div>
                                        <div class="col-44">ACTION</div>
                                </div>

                                <tr>
                                        <td class="seat"><?= $i; ?> </td>
                                        <td><?= $wishlist->date; ?></td>
                                        <td><?= $prod_name; ?></td>
                                </tr>
                                <?php
                                foreach ($wishlists as $wishlist) {
                                        $prod_name = Products::model()->findByPk($wishlist->prod_id);
                                        ?>
                                        <div class="cart_row">
                                                <div class="col-11">
                                                        <div class="cart_product_detail">
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                                echo Yii::app()->Upload->folderName(0, 1000, $prod_name->id)
                                                                ?>/<?php echo $prod_name->id; ?>/small.<?php echo $prod_name->main_image; ?>" alt=""/>
                                                                <h3><?= $prod_name->product_name; ?></h3>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                </div>
                                                <div class="col-33"><strong><?php echo Yii::app()->Discount->Discount($prod_name); ?></strong></div>
                                                <div class="col-44">
                                                        <div class="cart_action">
                                                                <a href="<?= Yii::app()->request->baseUrl; ?>/index.php/Myaccount/RemoveMywishlists/pid/<?= $wishlist->prod_id; ?>">Remove</a>
                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $prod_name->canonical_name; ?>" class="add_to_cart" id="<?= $prod_name->id; ?>">View Product</a>
                                                                <input type="hidden" name="qty" class="qty" value="1" />
                                                                <input type = "hidden" value = "<?= $prod_name->canonical_name; ?>" id="cano_name_<?= $prod_name->id; ?>" name="cano_name">
                                                        </div>
                                                </div>
                                        </div>
                                        <?php
                                        $i++;
                                }
                                ?>
                                <!-- / Cart Item-->

                                <!-- / Cart Item-->
                        </div>
                </div>
        </div>

        <script>

                $(document).ready(function () {
//                        $(".add_to_cart").click(function (e) {
//
//                             //   e.preventDefault();
//                                var id = $(this).attr('id');
//                                var canname = $("#cano_name_" + id).val();
//                                var qty = $(".qty").val();
//
//                                addtocart(canname, qty);
//                        });
                });
        </script>