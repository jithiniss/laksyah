<?php

class CartController extends Controller {

        public function actionIndex() {
                $this->render('index');
        }

        public function actionRemovecart() {
                $canonical_name = $_REQUEST['cano_name'];
                $cartid = $_REQUEST['cartid'];
//$id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }
                if (isset($user_id)) {
                        echo '1';
                        $condition = "user_id= $user_id";
                } else if (isset($sessonid)) {

                        $condition = "session_id= $sessonid";
                }
//                if ($_REQUEST['opt']) {
//                        $condition2 = "options= $opt_id";
//                } else {
//                        $condition2 = "options= ''";
//                }

                $model = Cart::model()->findByPk($cartid);

                if ($model->delete()) {
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                        if (!empty($cart_contents)) {
                                $subtotoal = 0;
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * $prod_details->price;
                                        ?>

                                        <div class="cart_item">
                                                <a class="cart_close" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><i class="fa fa-times-circle"></i></a>
                                                <div class="cart_image">
                                                        <?php
                                                        if ($cart_content->options != 0) {
                                                                $option = Options::model()->findByPk($cart_content->options)
                                                                ?>
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>" />
                                                                <?php
                                                        } else {
                                                                ?>
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" />
                                                        <?php } ?>


                                                </div>
                                                <table>
                                                        <thead><b><?php echo $prod_details->product_name; ?></b></thead>
                                                        <tr>
                                                                <td>Color :</td>
                                                                <td>Doiskin :</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Size :</td>
                                                                <td>S :</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Qty :</td>
                                                                <td><?php echo $cart_content->quantity; ?> :</td>
                                                        </tr><tr>
                                                                <td>Price :</td>
                                                                <td><?php echo $total; ?> :</td>
                                                        </tr>


                                                </table>

                                        </div>
                                        <?php
                                        $subtotoal = $subtotoal + $total;
                                }
                                ?>
                                <h4>Order Subtotal : Rs.<?php echo $subtotoal; ?></h4>
                                <h4>Free Shipping In india</h4>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart" class="btn btn-default">MY SHIPPING BAG</a>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/" class="btn btn-default">CHECKOUT</a><br>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>" >Continue Shopping</a>
                                <?php
                        } else {
                                echo "Your Cart Box Empty";
                        }
                }
        }

        public function actionBuynow() {
                $canonical_name = $_REQUEST['cano_name'];
                $qty = $_REQUEST['qty'];
                $id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }
                if (isset($user_id)) {
                        $condition = "user_id= $user_id";
                } else if (isset($sessonid)) {
                        $condition = "session_id= $sessonid";
                }
//                if ($_REQUEST['opt']) {
//                        $condition2 = "options= $opt_id";
//                } else {
//                        $condition2 = "options= ''";
//                }

                if (Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)))) {
                        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)));
                        $cart->quantity = $cart->quantity + $qty;
                        $cart->save();
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                        foreach ($cart_contents as $cart_content) {
                                $prod_details = Products::model()->findByPk($cart_content->product_id);
                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                $total = $cart_content->quantity * $prod_details->price;
                                ?>

                                <div class="cart_item">
                                        <a  class="cart_close" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><i class="fa fa-times-circle"></i></a>
                                        <div class="cart_image">
                                                <?php
                                                if ($cart_content->options != 0) {
                                                        $option = Options::model()->findByPk($cart_content->options)
                                                        ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>" />
                                                        <?php
                                                } else {
                                                        ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" />
                                                <?php } ?>


                                        </div>
                                        <table>
                                                <thead><b><?php echo $prod_details->product_name; ?></b></thead>
                                                <tr>
                                                        <td>Color :</td>
                                                        <td>Doiskin :</td>
                                                </tr>
                                                <tr>
                                                        <td>Size :</td>
                                                        <td>S :</td>
                                                </tr>
                                                <tr>
                                                        <td>Qty :</td>
                                                        <td><?php echo $cart_content->quantity; ?> :</td>
                                                </tr><tr>
                                                        <td>Price :</td>
                                                        <td><?php echo $total; ?> :</td>
                                                </tr>


                                        </table>

                                        <hr>

                                </div>
                                <?php
                                $subtotoal = $subtotoal + $total;
                        }
                        ?>
                        <h4>Order Subtotal : Rs.<?php echo $subtotoal; ?></h4>
                        <h4>Free Shipping In india</h4>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart" class="btn btn-default">MY SHIPPING BAG</a>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/" class="btn btn-default">CHECKOUT</a><br>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>" >Continue Shopping</a>
                        <?php
                } else {

                        $model = new cart;
                        $model->user_id = $user_id;
                        $model->session_id = $sessonid;
                        $model->product_id = $id;
                        $model->quantity = $qty;
                        $model->options = $opt_id;
                        $model->date = date('Y-m-d');
                        if ($model->save()) {
                                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * $prod_details->price;
                                        ?>

                                        <div class="cart_item">
                                                <a  class="cart_close" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><i class="fa fa-times-circle"></i></a>

                                                <div class="cart_image">
                                                        <?php
                                                        if ($cart_content->options != 0) {
                                                                $option = Options::model()->findByPk($cart_content->options)
                                                                ?>
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>" />
                                                                <?php
                                                        } else {
                                                                ?>
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" />
                                                        <?php } ?>


                                                </div>
                                                <table>
                                                        <tr>
                                                                <td>Color :</td>
                                                                <td>Doiskin :</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Size :</td>
                                                                <td>S :</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Qty :</td>
                                                                <td><?php echo $cart_content->quantity; ?> :</td>
                                                        </tr><tr>
                                                                <td>Price :</td>
                                                                <td><?php echo $total; ?> :</td>
                                                        </tr>


                                                </table>
                                                <hr>

                                        </div>
                                        <?php
                                        $subtotoal = $subtotoal + $total;
                                }
                                ?>
                                <h4>Order Subtotal : Rs.<?php echo $subtotoal; ?></h4>
                                <h4>Free Shipping In india</h4>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart" class="btn btn-default">MY SHIPPING BAG</a>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/" class="btn btn-default">CHECKOUT</a><br>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>" >Continue Shopping</a>
                                <?php
                        }
                }
        }

        public function actionMycart() {


                $gift_options = Cart::model()->findAllByAttributes(array('gift_option' => 1));

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $gift_user = new UserGifts;
                        $post = 'UserGifts';
                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $post = 'TempUserGifts';
                        $gift_user = new TempUserGifts;
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }

                if (isset($_POST[$post])) {

                        $gift_user->attributes = $_POST[$post];
                        $gift_user->status = 1;
                        $gift_user->message = $_POST[$post]['message'];
                        $gift_user->date = date('Y-m-d');
                        if (isset($user_id)) {
                                $condition = UserGifts::model()->findByAttributes(array('user_id' => $user_id, 'order_id' => $_POST['UserGifts']['order_id'], 'order_product_id' => $_POST['UserGifts']['order_product_id']));
                        } else if (isset($sessonid)) {
                                $condition = TempUserGifts::model()->findByAttributes(array('session_id' => $_POST['TempUserGifts']['session_id'], 'cart_id' => $_POST['TempUserGifts']['cart_id']));
                        }
                        $gift_exist = $condition;

                        if (empty($gift_exist)) {

                                if (isset($user_id)) {
                                        $order_product = OrderProducts::model()->findByPk($_POST['UserGifts']['order_product_id']);
                                        $update_cart = Cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'product_id' => $order_product->product_id, 'options' => $order_product->option_id));
                                } else if (isset($sessonid)) {
                                        $update_cart = Cart::model()->findByPk($_POST['TempUserGifts']['cart_id']);
                                }
                                $products = Products::model()->findByPk($update_cart->product_id);
                                $total = $update_cart->quantity * $products->price;
                                if ($total < 3000) {
                                        if ($gift_user->save()) {
                                                $gift_user->unsetAttributes();
                                                $update_cart->gift_option = 1;
                                                $update_cart->rate = 200;
                                                if ($update_cart->save()) {
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                } else {
                                        if ($gift_user->save()) {
                                                $gift_user->unsetAttributes();
                                                $update_cart->gift_option = 1;
                                                $update_cart->rate = 0;
                                                if ($update_cart->save()) {
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                }
                        } else {
                                $gift_exist->attributes = $_POST[$post];
                                $gift_exist->status = 1;
                                $gift_exist->message = $_POST[$post]['message'];
                                $gift_exist->date = date('Y-m-d');
                                if (isset($user_id)) {
                                        $order_product = OrderProducts::model()->findByPk($_POST['UserGifts']['order_product_id']);
                                        $update_cart = Cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'product_id' => $order_product->product_id, 'options' => $order_product->option_id));
                                } else if (isset($sessonid)) {
                                        $update_cart = Cart::model()->findByPk($_POST['TempUserGifts']['cart_id']);
                                }
                                $products = Products::model()->findByPk($update_cart->product_id);
                                $total = $update_cart->quantity * $products->price;
                                if ($total < 3000) {
                                        if ($gift_user->save()) {
                                                $gift_user->unsetAttributes();
                                                $update_cart->gift_option = 1;
                                                $update_cart->rate = 200;
                                                if ($update_cart->save()) {
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                } else {
                                        if ($gift_user->save()) {
                                                $gift_user->unsetAttributes();
                                                $update_cart->gift_option = 1;
                                                $update_cart->rate = 0;
                                                if ($update_cart->save()) {
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                }
                        }
                }
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_details = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);

                        $id = $user_details->id;

                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
                } else {
                        $temp_id = Yii::app()->session['temp_user'];
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
                }

                if (!empty($cart_items)) {
                        $this->render('buynow', array('carts' => $cart_items, 'gift_user' => $gift_user, 'gift_options' => $gift_options));
                } else {
                        $this->render('empty_cart', array());
                }
        }

        public function actionGiftOption() {
                if (isset($_POST['btn_submit'])) {
                        $model = UserGifts::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'order_id' => Yii::app()->session['orderid']));
                        if (!empty($model)) {
                                Yii::app()->user->setFlash('error', "already applied.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $data = new UserGifts();
                                $data->user_id = Yii::app()->session['user']['id'];
                                $data->order_id = Yii::app()->session['orderid'];
                                $data->from = $_POST['from'];
                                $data->to = $_POST['to'];
                                $data->status = 1;
                                $data->date = date('Y-m-d');
                                $data->message = $_POST['message'];
                                if ($data->validate()) {
                                        if ($data->save()) {
                                                $order = Order::model()->findByPk($data->order_id);
                                                $order->gift_option = 1;
                                                if ($order->total_amount > 5000) {
                                                        $order->rate = 0;
                                                } else {
                                                        $order->rate = 200;
                                                }
                                                $order->save();
                                                Yii::app()->user->setFlash('success', "Dear, added as gift");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        } else {
//data not saved
                                        }
                                } else {
//validation error
                                }
                        }
                } else {
                        echo "sorry";
                        exit;
                }
        }

        public function actionRemovegift() {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $gift_id = $_POST['gift_id'];
                        $cart_id = $_POST['cart_id'];

                        $gift_user = UserGifts::model()->findByPk($gift_id);
                } else {
                        $cart_id = $_POST['cart_id'];
                        $gift_id = $_POST['gift_id'];
                        $gift_user = TempUserGifts::model()->findByPk($gift_id);
                }

                if ($gift_user->delete()) {
                        $cart = Cart::model()->findByPk($cart_id);
                        $cart->gift_option = 0;
                        $cart->rate = 0;
                        if ($cart->save()) {
                                $this->redirect(array('cart/MyCart'));
                        }
                }
        }

        public function actionEditGift() {
                if (Yii::app()->request->isAjaxRequest) {
                        $cart_id = $_REQUEST['cart_id'];
                        $session_id = $_REQUEST['session_id'];
                        $gift_user = TempUserGifts::model()->findByAttributes(array('cart_id' => $cart_id, 'session_id' => $session_id));
                        ?>

                        <div class="form">

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'temp-user-gifts-form',
//                                    'action' => '/laksyah/index.php/Cart/MyCart',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'htmlOptions' => array('enctype' => 'multipart/form-data', 'action' => '/laksyah/index.php/Cart/MyCart'),
                                    'enableAjaxValidation' => false,
                                ));
                                ?>



                                <?php echo $form->errorSummary($gift_user); ?>
                                <br/>
                                <div class="form-group">
                                        <?php echo $form->hiddenField($gift_user, 'session_id', array('class' => 'form-control', 'value' => Yii::app()->session['temp_user'])); ?>
                                        <?php echo $form->error($gift_user, 'user_id'); ?>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->hiddenField($gift_user, 'cart_id', array('class' => 'form-control', 'id' => $cart_id)); ?>
                                        <?php echo $form->error($gift_user, 'order_id'); ?>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($gift_user, 'from'); ?>
                                        <?php echo $form->textField($gift_user, 'from', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($gift_user, 'from'); ?>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($gift_user, 'to'); ?>
                                        <?php echo $form->textField($gift_user, 'to', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($gift_user, 'to'); ?>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($gift_user, 'message'); ?>
                                        <?php echo $form->textArea($gift_user, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                        <?php echo $form->error($gift_user, 'message'); ?>
                                </div>
                                <div class="modal-footer">
                                        <?php echo CHtml::submitButton($gift_user->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-primary')); ?>
                                </div>
                                <?php $this->endWidget(); ?>
                        </div>
                        <?php
                } else {

                        if (isset($_POST['TempUserGifts'])) {
                                $gift_user = TempUserGifts::model()->findByAttributes(array('cart_id' => $_POST['TempUserGifts']['cart_id'], 'session_id' => $_POST['TempUserGifts']['session_id']));
                                $gift_user->from = $_POST['TempUserGifts']['from'];
                                $gift_user->to = $_POST['TempUserGifts']['to'];
                                $gift_user->message = $_POST['TempUserGifts']['message'];
                                if ($gift_user->save()) {
                                        $gift_user->unsetAttributes();
                                        $this->redirect(array('cart/MyCart'));
                                }
                        }
                }
        }

        public function actionCalculate() {
                if (Yii::app()->request->isAjaxRequest) {
                        $cart_id = $_POST['cart_id'];
                        $quantity = $_POST['Qty'];
                        $product_id = $_POST['prod_id'];
                        $model = $this->loadModel($cart_id);
                        $model->quantity = $quantity;
                        $model->save();
                        if (Yii::app()->session['currency'] != "") {
                                if ($model->options != 0) {
                                        $product_price1 = Options::model()->findByPk($model->options)->amount;
                                        $product_price = round($product_price1 * Yii::app()->session['currency']->rate, 2);
                                } else {
                                        $product_details = Products::model()->findByPk($product_id);
                                        if ($product_details->discount) {
                                                $product_price1 = $product_details->price - $product_details->discount;
                                                $product_price = round($product_price1 * Yii::app()->session['currency']->rate, 2);
                                        } else {
                                                $product_price1 = $product_details->price;
                                                $product_price = round($product_price1 * Yii::app()->session['currency']->rate, 2);
                                        }
                                }
                                $total = $product_price * $model->quantity;
                                if ($total < 3000) {
                                        echo $total + $model->rate;
                                } else {
                                        $model->rate = 0;
                                        $model->save();
                                        echo $total;
                                }
                        } else {
                                if ($model->options != 0) {
                                        $product_price = Options::model()->findByPk($model->options)->amount;
                                } else {
                                        $product_details = Products::model()->findByPk($product_id);
                                        if ($product_details->discount) {
                                                $product_price = $product_details->price - $product_details->discount;
                                        } else {
                                                $product_price = $product_details->price;
                                        }
                                }
                                $total1 = $product_price * $model->quantity;
                                if ($total1 < 3000) {
                                        $model->rate = 200;
                                        $model->save();
                                        echo $total1 + $model->rate;
                                } else {
                                        $model->rate = 0;
                                        $model->save();
                                        echo $total1;
                                }
                        }
                } else {
                        echo "";
                }
        }

        public function actionTotal() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $id = Yii::app()->session['user']['id'];
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
                } else {
                        $temp_id = Yii::app()->session['temp_user'];
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
                }
                $total = 0;
                foreach ($cart_items as $items) {
                        if (Yii::app()->session['currency'] != "") {
                                if ($items->options != 0) {
                                        $prod_price1 = Options::model()->findByPk($items->options)->amount;
                                        $prod_price = round($prod_price1 * Yii::app()->session['currency']->rate, 2);
                                } else {
                                        $product = Products::model()->findByAttributes(array('id' => $items->product_id));
                                        if ($product->discount) {
                                                $prod_price1 = $product->price - $product->discount;
                                                $prod_price = round($prod_price1 * Yii::app()->session['currency']->rate, 2);
                                        } else {
                                                $prod_price1 = $product->price;
                                                $prod_price = round($prod_price1 * Yii::app()->session['currency']->rate, 2);
                                        }
                                }
                        } else {
                                if ($items->options != 0) {
                                        $prod_price = Options::model()->findByPk($items->options)->amount;
                                } else {
                                        $product = Products::model()->findByAttributes(array('id' => $items->product_id));
                                        if ($product->discount) {
                                                $prod_price = $product->price - $product->discount;
                                        } else {
                                                $prod_price = $product->price;
                                        }
                                }
                        }

                        $price = ($prod_price) * ($items->quantity);
                        if ($price < 3000) {
                                $price = $price + $items->rate;
                        }
                        $total+= $price;
                }
                echo $total;
        }

        public function actionProceed() {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart)) {
                                $order_id = $this->addOrder($cart);
                                Yii::app()->session['orderid'] = $order_id;
                                $this->orderProducts($order_id, $cart);
                        }
                        $this->redirect(array('CheckOut/CartItems'));

// $this->redirect(array('cart/Checkout'));
                } else {
                        Yii::app()->session['login_flag'] = 1;
                        $this->redirect(array('Site/login'));
                }
        }

        public function actionGetorderproduct() {

                $order_id = $_POST['order_id'];
                $option = $_POST['option'];
                $product_id = $_POST['product_id'];

                echo $product_id;
                $order_product_id = OrderProducts::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id, 'option_id' => $option));
                echo $order_product_id->id;
        }

        public function addOrder($cart) {
                $model1 = new Order;
                $model1->user_id = Yii::app()->session['user']['id'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->status = 0;
                $model1->order_date = date('Y-m-d');
                $model1->DOC = date('Y-m-d');

                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function orderProducts($orderid, $carts) {

                foreach ($carts as $cart) {
                        $prod_details = Products::model()->findByPk($cart->product_id);
                        $check = OrderProducts::model()->findAllByAttributes(array('order_id' => $orderid, 'product_id' => $cart->product_id));
                        if (!empty($check)) {
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $model_prod = new OrderProducts;
                                $model_prod->order_id = $orderid;
                                $model_prod->product_id = $cart->product_id;
                                $model_prod->option_id = $cart->options;
                                $model_prod->quantity = $cart->quantity;
                                if ($prod_details->discount) {
                                        $price = $prod_details->price - $prod_details->discount;
                                } else {
                                        $price = $prod_details->price;
                                }
                                $model_prod->amount = ($cart->quantity) * ($price);
                                $model_prod->DOC = date('Y-m-d');
                                if ($model_prod->save()) {
                                        $user_id = Order::model()->findByPk($model_prod->order_id)->user_id;
                                        $order_product_id = $model_prod->id;
                                        $cart_id = $cart->id;
                                        $this->UserGift($orderid, $user_id, $order_product_id, $cart_id);
                                }
                        }
                }
        }

        public function UserGift($orderid, $user_id, $order_product_id, $cart_id) {
                var_dump($cart_id);
                // exit;
//                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
//                        $gift_id = $_POST['gift_id'];
//                        $cart_id = $_POST['cart_id'];
//
//                        $gift_user = UserGifts::model()->findByPk($gift_id);
//                } else {
//                        $cart_id = $_POST['cart_id'];
//                        $gift_id = $_POST['gift_id'];
//                        $gift_user = TempUserGifts::model()->findByPk($gift_id);
//                }
                $temp_user_gift = TempUserGifts::model()->findByAttributes(array('cart_id' => $cart_id));

                if (!empty($temp_user_gift)) {

                        $user_gift = new UserGifts;
                        $user_gift->user_id = $user_id;
                        $user_gift->order_id = $orderid;
                        $user_gift->order_product_id = $order_product_id;
                        $user_gift->from = $temp_user_gift->from;
                        $user_gift->to = $temp_user_gift->to;
                        $user_gift->message = $temp_user_gift->message;
                        $user_gift->status = 1;
                        $user_gift->date = date('Y-m-d');
                        if ($user_gift->save()) {
                                $temp_user_gift->deleteByPk($temp_user_gift->id);
                        }
                } else {

                        $user_gift = new UserGifts;
                        $user_gift->user_id = $user_id;
                        $user_gift->order_id = $orderid;
                        $user_gift->order_product_id = $order_product_id;
                        $user_gift->from = $temp_user_gift->from;
                        $user_gift->to = $temp_user_gift->to;
                        $user_gift->message = $temp_user_gift->message;
                        $user_gift->status = 1;
                        $user_gift->date = date('Y-m-d');
                        $user_gift->save();
                }
        }

        public function total($cart) {

                foreach ($cart as $carts) {
                        $prod_details = Products::model()->findByPk($carts->product_id);
                        $cart_qty = $carts->quantity;
                        if ($carts->options != 0) {

                                $price = Options::model()->findByPk($carts->options)->amount;
                        } else {
                                if ($prod_details->discount) {
                                        $price = $prod_details->price - $prod_details->discount;
                                } else {
                                        $price = $prod_details->price;
                                }
                        }
                        $tot_price = $cart_qty * $price;
                        $total+= $tot_price;
                }
                return $total;
        }

        public function actionEmptyCart() {
                if (isset(Yii::app()->session['user']['id'])) {
                        Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else if (isset(Yii::app()->session['temp_user'])) {
                        Cart::model()->deleteAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                $this->redirect(Yii::app()->baseUrl . '/index.php/site/index');
        }

        public function loadModel($id) {
                $model = Cart::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionDelete($id) {
                $model = $this->loadModel($id);
                $model->delete();
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Mycart'));
        }

}
