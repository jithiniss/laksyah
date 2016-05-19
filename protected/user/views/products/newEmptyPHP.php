<?php
if ($product->stock_availability == 1) {
        if ($product->discount_rate != 0) {
                if ($product->discount_type == 1) {
                        $discountRate = $product->price - $product->discount_rate;
                } else {
                        $discountRate = $product->price - ( $product->price * ($product->discount_rate / 100));
                }
                ?>
                <span style='color:red;text-decoration:line-through'>
                    <span style='color:black'>
                        <?php echo Yii::app()->Currency->convert($product->price); ?>
                    </span>
                </span>&nbsp;&nbsp;
                <span style='color:black'><?php echo Yii::app()->Currency->convert($discountRate); ?></span>

                <?php
        } else {
                ?>

                <span style='color:black'><?php echo Yii::app()->Currency->convert($product->price); ?></span>
                <?php
        }
        if (isset(Yii::app()->session['user'])) {
                ?>
                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Products/Wishlist/id/<?= $product->id ?>" class="add wish">Add to WishList</a>
                <?php
        }
        if ($product->enquiry_sale == 1) {
                ?>
                <div style="padding-top: 5px;">
                    <form method="post" name="option" action="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Buynow" id="myform">
                        <input type="submit" class="add" href="#" value="Add To Cart">
                        <input type="hidden" id="opt_id"  name="opt">
                        <input type="hidden"   value="<?= $product->canonical_name; ?>" id="cano_name" name="cano_name">
                    </form>
                </div>
                <?php
        }
        ?>


<?php } else {
        ?>

        <span style='color:black'><?php echo Yii::app()->Currency->convert($product->price); ?></span>
        <form action="<?= Yii::app()->baseUrl; ?>/index.php/products/ProductNotify/id/<?= $product->id; ?>" method="post" name="notify">
            <?php
            if (isset(Yii::app()->session['user'])) {
                    ?>
                    <input type="text" id="email"  name="email" value="<?= Yii::app()->session['user']['email'] ?>">
                    <?php
            } else {
                    ?>
                    <input type="text" id="email"  name="email">
                    <?php
            }
            ?>
            <input type="submit" class="add" href="#" value="Notify Me">
        </form>
        <?php
        if ($product->enquiry_sale == 0) {
                ?>
                <a class="stock">Enquiry</a>
        <?php }
        ?>
        <?php
}
?>
<?php
$new_from = $product->new_from;
$new_to = $product->new_to;
$today = date('Y-m-d');
if (strtotime($new_from) <= strtotime($today) && strtotime($new_to) >= strtotime($today)) {
        ?>
        <span class="label label-danger">New</span>
        <?php
}
?>
<?php
$sale_from = $product->sale_from;
$sale_to = $product->sale_to;

if (strtotime($sale_from) <= strtotime($today) && strtotime($sale_to) >= strtotime($today)) {
        ?>
        <span class="label label-warning">Sale</span>
        <?php
}
?>