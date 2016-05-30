<?php

class CartController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                $this->render('index');
        }

        public function actionRemovecart() {
                $canonical_name = $_REQUEST['cano_name'];
                $cartid = $_REQUEST['cartid'];
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

                $model = Cart::model()->findByPk($cartid);

                if ($model->delete()) {
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));
                        if (!empty($cart_contents)) {
                                $subtotoal = 0;
                                echo '<div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * $prod_details->price;
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo ' </div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                }
        }

        public function actionGetcartcount() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $counts = count($cart_items);
                } else {
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $counts = count($cart_items);
                }
                echo $counts;
        }

        public function actionGetcarttotal() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart_items)) {
                                foreach ($cart_items as $cart_item) {
                                        $product = Products::model()->findByPk($cart_item->product_id);
                                        $ptotal = $product->price * $cart_item->quantity;
//$subtotoal = $subtotoal + $total;
                                        $carttotal += $ptotal;
                                }
                                echo Yii::app()->Currency->convert($carttotal);
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                } else {
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                        if (!empty($cart_items)) {
                                foreach ($cart_items as $cart_item) {
                                        $product = Products::model()->findByPk($cart_item->product_id);
                                        $ptotal = $product->price * $cart_item->quantity;
                                        $carttotal += $ptotal;
                                }
                                echo Yii::app()->Currency->convert($carttotal);
                        } else {
                                echo Yii::app()->Currency->convert(0);
                        }
                }
        }

        public function actionBuynow() {
                $canonical_name = $_REQUEST['cano_name'];
                $qty = $_REQUEST['qty'];
                $option_size = $_REQUEST['option_size'];
                $option_color = $_REQUEST['option_color'];
                $master_option_id = $_REQUEST['master_option'];
                $id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;
                $check_option = MasterOptions::model()->findByAttributes(['product_id' => $id]);
                if (!empty($check_option)) {
                        $product_option_id = OptionDetails::model()->findByAttributes(['master_option_id' => $master_option_id, 'size_id' => $option_size, 'color_id' => $option_color, 'product_id' => $id]);
                        if (!empty($product_option_id)) {
                                $product_option = $product_option_id->id;
                        } else {
                                echo '9';
                                exit;
                        }
                } else {
                        $product_option = 0;
                }


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
                if ($product_option_id->id != 0) {
                        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and options =' . $product_option_id->id . ' and product_id=' . $id)));
                } else {
                        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)));
                }


                if (!empty($cart)) {
                        $cart->quantity = $cart->quantity + $qty;
                        $cart->save();
                        $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                        if (!empty($cart_contents)) {
                                echo ' <div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $options = OptionDetails::model()->findbypk($cart_content->options);
                                        $option_color = OptionCategory::model()->findByPk($options->color_id);
                                        $option_size = OptionCategory::model()->findByPk($options->color_id);
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                                        $total = $cart_content->quantity * $prod_details->price;

                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'option_color' => $option_color, 'option_size' => $option_size, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo ' </div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {

                        $model = new cart;
                        $model->user_id = $user_id;
                        $model->session_id = $sessonid;
                        $model->product_id = $id;
                        $model->quantity = $qty;
                        $model->options = $product_option;
                        $model->date = date('Y-m-d');
                        if ($model->save()) {

                                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                                if (!empty($cart_contents)) {
                                        echo ' <div class="drop_cart">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);

                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * $prod_details->price;

                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                                                $subtotoal = $subtotoal + $total;
                                        }
                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo ' </div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        }
                }
        }

        public function actionMycart() {

                $model1 = new UserDetails();
                $model = new UserDetails();
                $gift_limit = Extras::model()->findByPk(1);
                if (!empty($gift_limit)) {
                        Yii::app()->session['gift_limit'] = $gift_limit;
                }
                $gift_rate = Extras::model()->findByPk(2);
                if (!empty($gift_rate)) {
                        Yii::app()->session['gift_rate'] = $gift_rate;
                }
                $gift_user = new TempUserGifts;
                $gift_options = Cart::model()->findAllByAttributes(array('gift_option' => 1));
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        //$current_coupon = explodeYii::app()->session['couponid'];
                        $coupen_details = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $coupen_details = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
                        $sessonid = Yii::app()->session['temp_user'];
                }

                if (isset($_POST["TempUserGifts"])) {

                        $gift_user->attributes = $_POST["TempUserGifts"];
                        $gift_user->session_id = $_POST["TempUserGifts"]['session_id'];
                        $gift_user->status = 1;
                        $gift_user->message = $_POST["TempUserGifts"]['message'];
                        $gift_user->date = date('Y-m-d');

                        $condition = TempUserGifts::model()->findByAttributes(array('session_id' => $_POST['TempUserGifts']['session_id'], 'cart_id' => $_POST['TempUserGifts']['cart_id']));

                        $gift_exist = $condition;

                        if (empty($gift_exist)) {


                                $update_cart = Cart::model()->findByPk($_POST['TempUserGifts']['cart_id']);
                                $products = Products::model()->findByPk($update_cart->product_id);
                                $total = $update_cart->quantity * $products->price;
                                if ($total < Yii::app()->session['gift_limit']['value']) {
                                        if ($gift_user->validate()) {
                                                if ($gift_user->save()) {
                                                        $gift_user->unsetAttributes();
                                                        $update_cart->gift_option = 1;
                                                        $update_cart->rate = Yii::app()->session['gift_rate']['value'];
                                                        if ($update_cart->save()) {
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                }
                                        }
                                } else {
                                        if ($gift_user->validate()) {
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
                        } else {

                                $gift_exist->attributes = $_POST[$post];
                                $gift_exist->status = 1;
                                $gift_exist->message = $_POST[$post]['message'];
                                $gift_exist->date = date('Y-m-d');

                                $update_cart = Cart::model()->findByPk($_POST['TempUserGifts']['cart_id']);
                                $products = Products::model()->findByPk($update_cart->product_id);
                                $total = $update_cart->quantity * $products->price;
                                if ($total < Yii::app()->session['gift_limit']['value']) {
                                        if ($gift_user->validate()) {
                                                if ($gift_user->save()) {
                                                        $gift_user->unsetAttributes();
                                                        $update_cart->gift_option = 1;
                                                        $update_cart->rate = Yii::app()->session['gift_rate']['value'];
                                                        if ($update_cart->save()) {
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                }
                                        }
                                } else {
                                        if ($gift_user->validate()) {
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
                }
                /*
                 * Login for checkout
                 */
                if (isset($_REQUEST['UserDetails']['log'])) {

                        $modell = UserDetails::model()->findByAttributes(array('email' => $_REQUEST['UserDetails']['log']['email'], 'password' => $_REQUEST['UserDetails']['log']['password'], 'status' => 1));
                        if ($modell != '' && $modell != NULL) {
                                Yii::app()->session['user'] = $modell;
                                if (isset(Yii::app()->session['temp_user'])) {
                                        $temp_carts = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                        foreach ($temp_carts as $temp_cart) {
                                                $newcart = Cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'product_id' => $temp_cart->product_id));

                                                if (!empty($newcart)) {

                                                        $newcart->quantity = $temp_cart->quantity;
                                                        $newcart->options = $temp_cart->options;
                                                        $newcart->date = $temp_cart->date;
                                                        $newcart->gift_option = $temp_cart->gift_option;
                                                        $newcart->rate = $temp_cart->rate;
                                                        if ($newcart->save()) {

                                                                Cart::model()->deleteAllByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'product_id' => $temp_cart->product_id));
                                                        }
//                                                        Cart::model()->update(array("user_id" => Yii::app()->session['user']['id'], 'session_id' => '', 'produc_id' => $temp_cart->product_id, 'quantity' => $temp_cart->quantity, 'options' => $temp_cart->options, 'date' => $temp_cart->date, 'gift_option' => $temp_cart->gift_option, 'rate' => $temp_cart->rate), 'session_id=' . Yii::app()->session['temp_user'] . '&& product_id = ' . $temp_cart->product_id);
                                                }
                                        }
                                        Cart::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        $coupen_id = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']))->coupon_id;
                                        Yii::app()->session['coupen_id'] = $coupen_id;
                                        UserWishlist::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        CouponHistory::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        ProductViewed::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                        unset(Yii::app()->session['temp_user']);
                                        $this->redirect(array('cart/proceed'));
                                }
                        } else {

                                $model1->addError(confirm, 'invalid username or password');
//                                Yii::app()->user->setFlash('passworderror', "invalid username or password");
                                Yii::app()->user->setFlash('passworderror1', "invalid username or password");
//                                $this->redirect(array('Cart/MyCart'));
                        }
                }
                /*
                 * Refister for checkout
                 */
                if (isset($_POST['UserDetails']['reg'])) {

                        $model = new UserDetails('create');
                        $model->attributes = $_POST['UserDetails']['reg'];
                        $date1 = $_POST['UserDetails']['reg']['dob'];
                        $newDate = date("Y-m-d", strtotime($date1));
                        $model->dob = $newDate;
                        $model->gender = $_POST['UserDetails']['reg']['gender'];
                        $model->phone_no_1 = $_POST['UserDetails']['reg']['phone_no_1'];
                        $model->phone_no_2 = $_POST['UserDetails']['reg']['phone_no_2'];

                        if ($model->validate()) {
                                $model->status = 1;
                                $model->CB = 1;
                                $model->UB = 1;
                                $model->DOC = date('Y-m-d');
                        } else {
                                //$model->addError(confirm, 'Please Fill the required Feild');
                                Yii::app()->user->setFlash('feilderror1', "Please Fill the required Feild");
//                                Yii::app()->user->setFlash('feilderror', "Please Fill the required Feild");
                        }
                        if ($model->password == $model->confirm) {
                                if ($model->save()) {
                                        Yii::app()->session['user'] = $model;
                                        Cart::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        $coupen_id = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']))->coupon_id;
                                        Yii::app()->session['coupen_id'] = $coupen_id;
                                        UserWishlist::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        CouponHistory::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        ProductViewed::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                        unset(Yii::app()->session['temp_user']);
                                        $this->redirect(array('Cart/proceed'));
                                }
                        } else {
                                $model->addError(confirm, 'password mismatch');
                                Yii::app()->user->setFlash('passwordmissmatch', "password mismatch");
//                                $this->redirect(array('Cart/MyCart'));
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
// $this->render('new_buynow');
                        $this->render('buynow', array('carts' => $cart_items, 'regform' => $model, 'loginform' => $model1, 'gift_user' => $gift_user, 'gift_options' => $gift_options, 'coupen_details' => $coupen_details));
                } else {
                        $coupon_ids = explode(',', Yii::app()->session['couponid']);
                        foreach ($coupon_ids as $coupon_id) {
                                CouponHistory::model()->deleteAllByAttributes(array('coupon_id' => $coupon_id));
                        }
                        unset(Yii::app()->session['couponid']);
                        unset(Yii::app()->session['couponamount']);
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
                                                if ($order->total_amount > Yii::app()->session['gift_limit']['value']) {
                                                        $order->rate = 0;
                                                } else {
                                                        $order->rate = Yii::app()->session['gift_rate']['value'];
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
                $cart_id = $_POST['cart_id'];
                $gift_id = $_POST['gift_id'];
                $gift_user = TempUserGifts::model()->findByPk($gift_id);


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
                        $this->renderPartial('_editgiftform', array('cart_id' => $cart_id, 'session_id' => $session_id, 'gift_user' => $gift_user));
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
                        if (isset(Yii::app()->session['user']['id'])) {
                                $coupen_code = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'coupon_id' => Yii::app()->session['couponid']));
                                if (!empty($coupen_code)) {
                                        $coupen_rate = Yii::app()->Currency->convert($coupen_code->total_amount);
                                } else {
                                        $coupen_rate = Yii::app()->Currency->convert(0);
                                }
                        } else if (isset(Yii::app()->session['temp_user'])) {
                                $coupen_code = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                if (!empty($coupen_code)) {
                                        $coupen_rate = Yii::app()->Currency->convert($coupen_code->total_amount);
                                } else {
                                        $coupen_rate = Yii::app()->Currency->convert(0);
                                }
                        }
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
                                if ($total < Yii::app()->session['gift_limit']['value']) {
                                        if ($model->gift_option != 0) {
                                                $model->rate = Yii::app()->session['gift_rate']['value'];
                                                $model->save();
                                                $product_total = Yii::app()->Currency->convert($total + $model->rate);
                                                $gift_rate = Yii::app()->Currency->convert(Yii::app()->session['gift_rate']['value']);
                                                $sub_total = Yii::app()->Currency->convert($this->subtotal() + $gift_rate);
                                                $grant_total = Yii::app()->Currency->convert($this->subtotal() - $coupen_rate);
                                                $array = array('granttotal' => $grant_total, 'producttotal' => $product_total, 'subtotal' => $sub_total, 'discount' => $coupen_rate, 'gift_rate' => $gift_rate);
                                                $json = CJSON::encode($array);
                                                echo $json;
                                        } else {

                                                $product_total = Yii::app()->Currency->convert($total);
                                                $sub_total = Yii::app()->Currency->convert($this->subtotal());
                                                $gift_rate = Yii::app()->Currency->convert(0);
                                                $grant_total = Yii::app()->Currency->convert($this->subtotal() - $coupen_rate);
                                                $array = array('granttotal' => $grant_total, 'producttotal' => $product_total, 'subtotal' => $sub_total, 'discount' => $coupen_rate, 'gift_rate' => $gift_rate);
                                                $json = CJSON::encode($array);
                                                echo $json;
                                        }
                                } else {

                                        $model->rate = 0;
                                        $model->save();
                                        $product_total = Yii::app()->Currency->convert($total + $model->rate);
                                        $sub_total = Yii::app()->Currency->convert($this->subtotal());
                                        $gift_rate = Yii::app()->Currency->convert(0);
                                        $grant_total = Yii::app()->Currency->convert($this->subtotal() - $coupen_rate);
                                        $array = array('granttotal' => $grant_total, 'producttotal' => $product_total, 'subtotal' => $sub_total, 'discount' => $coupen_rate, 'gift_rate' => $gift_rate);
                                        $json = CJSON::encode($array);
                                        echo $json;
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
                                $total = $product_price * $model->quantity;
                                if ($total < Yii::app()->session['gift_limit']['value']) {

                                        $model->rate = Yii::app()->session['gift_rate']['value'];
                                        $model->save();
                                        $product_total = Yii::app()->Currency->convert($total + $model->rate);
                                        $sub_total = Yii::app()->Currency->convert($this->subtotal());
                                        $gift_rate = Yii::app()->Currency->convert(0);
                                        $grant_total = Yii::app()->Currency->convert($this->subtotal() - $coupen_rate);
                                        $array = array('granttotal' => $grant_total, 'producttotal' => $product_total, 'subtotal' => $sub_total, 'discount' => $coupen_rate, 'gift_rate' => $gift_rate);
                                        $json = CJSON::encode($array);
                                        echo $json;
                                } else {

                                        $model->rate = 0;
                                        $model->save();
                                        $product_total = Yii::app()->Currency->convert($total + $model->rate);
                                        $sub_total = Yii::app()->Currency->convert($this->subtotal());
                                        $gift_rate = Yii::app()->Currency->convert(0);
                                        $grant_total = Yii::app()->Currency->convert($this->subtotal() - $coupen_rate);
                                        $array = array('granttotal' => $grant_total, 'producttotal' => $product_total, 'subtotal' => $sub_total, 'discount' => $coupen_rate, 'gift_rate' => $gift_rate);
                                        $json = CJSON::encode($array);
                                        echo $json;
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

                                $product = Products::model()->findByAttributes(array('id' => $items->product_id));
                                if ($product->discount) {
                                        $prod_price1 = $product->price - $product->discount;
                                        $prod_price = round($prod_price1 * Yii::app()->session['currency']->rate, 2);
                                } else {
                                        $prod_price1 = $product->price;
                                        $prod_price = round($prod_price1 * Yii::app()->session['currency']->rate, 2);
                                }
                        } else {

                                $product = Products::model()->findByAttributes(array('id' => $items->product_id));
                                if ($product->discount) {
                                        $prod_price = $product->price - $product->discount;
                                } else {
                                        $prod_price = $product->price;
                                }
                        }

                        $price = ($prod_price) * ($items->quantity);
                        if ($price < Yii::app()->session['gift_rate']['value']) {
                                $price = $price + $items->rate;
                        }
                        $total+= $price;
                }
                if (Yii::app()->request->isAjaxRequest) {
                        echo $total;
                } else {
                        return $total;
                }
        }

        public function actionProceed() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        if (Yii::app()->session['orderid'] == '') {

                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                if (!empty($cart)) {
                                        $order_id = $this->addOrder($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        Yii::app()->session['orderid'] = $order_id;
                                        $this->orderProducts($order_id, $cart);
                                        $this->updatecoupenhistory($order_id);
                                }
                                $this->redirect(array('CheckOut/CheckOut'));
                        } else {
                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                if (!empty($cart)) {
                                        $order_id1 = $this->addOrder1($cart);
//                                $select_coupon = Yii::app()->session['coupen_id'];
//                                $this->addcoupens();
                                        $order_id = Yii::app()->session['orderid'];
                                        $this->updatecoupenhistory($order_id1);
                                        $this->orderProducts($order_id, $cart);
                                }
                                $this->redirect(array('CheckOut/CheckOut'));
                        }
                }
        }

        public function updatecoupenhistory($order_id) {
                $couponids = explode(',', Yii::app()->session['couponid']);
                foreach ($couponids as $couponid) {
                        $model = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'coupon_id' => $couponid));
                        if (!empty($model)) {
                                $model->order_id = $order_id;
                                $model->save();
                        }
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

        public function actionSelectcart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_id = Yii::app()->session['user']['id'];
                        $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
                        if (!empty($cart_contents)) {
                                echo ' <div class="drop_cart">';
                                foreach ($cart_contents as $cart_content) {
                                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                        $total = $cart_content->quantity * $prod_details->price;
                                        $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                        $subtotoal = $subtotoal + $total;
                                }
                                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                echo '</div>';
                        } else {
                                echo 'Cart box is Empty';
                        }
                } else {
                        if (isset(Yii::app()->session['temp_user'])) {

                                $session_id = Yii::app()->session['temp_user'];
                                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                                if (!empty($cart_contents)) {
                                        echo ' <div class="drop_cart">';
                                        foreach ($cart_contents as $cart_content) {
                                                $prod_details = Products::model()->findByPk($cart_content->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                $total = $cart_content->quantity * $prod_details->price;
                                                $this->renderPartial('_cartaontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                                                $subtotoal = $subtotoal + $total;
                                        }
                                        $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                                        echo '</div>';
                                } else {
                                        echo 'Cart box is Empty';
                                }
                        } else {
                                echo 'Cart box is Empty';
                        }
                }
        }

        public function addOrder($cart) {
                $model = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'coupon_id' => Yii::app()->session['couponid']));
                $coupen = Coupons::model()->findByPk(Yii::app()->session['coupen_id']);
                $model1 = new Order;
                $model1->user_id = Yii::app()->session['user']['id'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->status = 0;
                $model1->coupon_id = $model->coupon_id;
                $model1->discount_rate = $model->total_amount;
                $model1->coupon_id = $coupen->id;
                $model1->discount_rate = $coupen->discount;
                $model1->order_date = date('Y-m-d');
                $model1->DOC = date('Y-m-d');

                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function addOrder1($cart) {
                $model = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'coupon_id' => Yii::app()->session['couponid']));
                $coupen = Coupons::model()->findByPk(Yii::app()->session['coupen_id']);
                $model1 = order::model()->findByPk(Yii::app()->session['orderid']);
                $model1->user_id = Yii::app()->session['user']['id'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->coupon_id = $model->coupon_id;
                $model1->discount_rate = $model->total_amount;
                $model1->status = 0;
                $model1->coupon_id = $coupen->id;
                $model1->discount_rate = $coupen->discount;
                $model1->order_date = date('Y-m-d');
                $model1->DOC = date('Y-m-d');

                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function subtotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $car) {
                        $product_value = Products::model()->findByPk($car->product_id)->price;
                        $subtotal = $subtotal + ($car->quantity * $product_value);
                }
                return $subtotal;
        }

        public function granttotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart = cart::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $car) {
                        $product_value = Products::model()->findByPk($car->product_id)->price;
                        $subtotal = $subtotal + ($car->quantity * $product_value);
                }
                return Yii::app()->Currency->convert($subtotal);
        }

        public function addCoupens() {
                $coupen = Coupons::model()->findByPk(Yii::app()->session['coupen_id']);
                $model1 = new Order;
                $model1->user_id = Yii::app()->session['user']['id'];
                $total_amt = $this->total($cart);
                $model1->total_amount = $total_amt;
                $model1->status = 0;
                $model1->coupen_id = $coupen->id;
                $model1->discount_rate = $coupen->discount;
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

                                $this->redirect(array('CheckOut/CheckOut'));
                        } else {
                                $model_prod = new OrderProducts;
                                $model_prod->order_id = $orderid;
                                $model_prod->product_id = $cart->product_id;
                                $model_prod->option_id = $cart->options;
                                $model_prod->quantity = $cart->quantity;
                                $model_prod->gift_option = $cart->gift_option;
                                $model_prod->rate = $cart->rate;
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
                        $user_gift->save();
//                                $temp_user_gift->deleteByPk($temp_user_gift->id);
//                        }
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
                        if ($prod_details->discount) {
                                $price = $prod_details->price - $prod_details->discount;
                        } else {
                                $price = $prod_details->price;
                        }
                        $tot_price = $cart_qty * $price;
                        $total+= $tot_price;
                }
                return $total;
        }

        public function actionCoupon() {
                $cart_total = $this->actionTotal();

                date_default_timezone_set('Asia/Kolkata');
                if (isset($_POST['btn_submit'])) {
                        $coupen_details = Coupons::model()->findByAttributes(array('code' => $_POST['coupon']));
                        if (isset(Yii::app()->session['user']['id'])) {

                                $condition = 'user_id = ' . Yii::app()->session['user']['id'];
                                $cond = 'user_id = ' . Yii::app()->session['user']['id'];
                                $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                $c_history = CouponHistory::model()->findByAttributes(array('coupon_id' => $coupen_details->id), array('condition' => $cond));
                        } else {
                                if (!isset(Yii::app()->session['temp_user'])) {
                                        Yii::app()->session['temp_user'] = microtime(true);
                                }
                                $cond = 'session_id = ' . Yii::app()->session['temp_user'];
                                $condition = 'session_id = ' . Yii::app()->session['temp_user'];
                                $cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                $c_history = CouponHistory::model()->findByAttributes(array('coupon_id' => $coupen_details->id), array('condition' => $cond));
                        }
//$order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        if (!empty($cart)) {

                                $coupon_code = Coupons::model()->findByAttributes(array('code' => $_POST['coupon'], 'status' => 1));
                                $gift_card = Coupons::model()->findByAttributes(array('gift_card_id' => $_POST['coupon'], 'type' => 2), array('condition' => 'amount' > 0));
                                $user_id = false;
                                $prod_id = false;
                                $limit = false;
                                $expry_dte = false;
                                $strt_dte = false;

                                if (!empty($coupon_code)) {
                                        $coupe_type = $coupon_code->type;
                                        if ($coupe_type == 2) {
                                                if ($cart_total <= Yii::app()->session['couponamount']) {
                                                        Yii::app()->user->setFlash('error', "Coupon Limit Reached");
                                                        $this->redirect(array('cart/Mycart'));
                                                } else {

                                                        if (!empty($c_history)) {

                                                                if ($coupon_code->discount > 0) {

                                                                        if ($coupon_code->expiry_date >= date('Y-m-d')) {
                                                                                $expry_dte = true;
                                                                        } else if ($coupon_code->expiry_date == 0000 - 00 - 00) {
                                                                                $expry_dte = true;
                                                                        }

                                                                        if ($coupon_code->starting_date >= date('Y-m-d')) {
                                                                                $strt_dte = false;
                                                                        } else {
                                                                                $strt_dte = true;
                                                                        }
                                                                        if ($coupon_code->starting_date == 0000 - 00 - 00) {
                                                                                $strt_dte = true;
                                                                        }
                                                                        if ($strt_dte == true && $expry_dte == true) {

                                                                                $coupon_history = new CouponHistory;
                                                                                $coupon_history->coupon_id = $coupon_code->id;

                                                                                $remaining_to_pay = $cart_total - Yii::app()->session['couponamount'];
                                                                                if ($remaining_to_pay >= $coupon_code->discount) {
                                                                                        $coupon_history->total_amount = $coupon_code->discount;
                                                                                } else {
                                                                                        $coupon_history->total_amount = $coupon_code->discount - $remaining_to_pay;
                                                                                }

                                                                                $coupon_history->total_amount = $coupon_code->discount;
                                                                                if (isset(Yii::app()->session['user'])) {
                                                                                        $coupon_history->user_id = Yii::app()->session['user']['id'];
                                                                                        $coupon_history->order_id = Yii::app()->session['orderid'];
                                                                                        $coupon_history->session_id = NULL;
                                                                                } else if (isset(Yii::app()->session['temp_user'])) {

                                                                                        $coupon_history->session_id = Yii::app()->session['temp_user'];
                                                                                        $coupon_history->user_id = 0;
                                                                                }

                                                                                if ($coupon_history->save()) {
                                                                                        if (empty(Yii::app()->session['couponid'])) {
                                                                                                Yii::app()->session['couponid'] = $coupon_history->coupon_id;
                                                                                                Yii::app()->session['couponamount'] = $coupon_history->total_amount;
                                                                                        } else {
                                                                                                Yii::app()->session['couponid'] = Yii::app()->session['couponid'] . ',' . $coupon_history->coupon_id;
                                                                                                Yii::app()->session['couponamount'] = Yii::app()->session['couponamount'] + $coupon_history->total_amount;
                                                                                        }
                                                                                        if (Yii::app()->session['couponamount'] >= $cart_total) {
                                                                                                Yii::app()->session['couponamount'] = $cart_total;
                                                                                        }
                                                                                        $coupon_balance = $coupon_code->discount - $coupon_history->total_amount;
                                                                                        $coupon_save = Coupons::model()->findByAttributes(array('code' => $coupon_code->code));
                                                                                        //$coupon_save->discount = $coupon_balance;
                                                                                        $coupon_save->status = 2;
                                                                                        if ($coupon_save->save()) {
                                                                                                Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
                                                                                        }
                                                                                }
                                                                        } else {
                                                                                Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
                                                                        }
                                                                } else {
                                                                        Yii::app()->user->setFlash('error', "coupon is used");
                                                                        $this->redirect(array('cart/Mycart'));
                                                                }
                                                        } else {

                                                                if ($coupon_code->discount > 0) {

                                                                        if ($coupon_code->expiry_date >= date('Y-m-d')) {
                                                                                $expry_dte = true;
                                                                        } else if ($coupon_code->expiry_date == 0000 - 00 - 00) {
                                                                                $expry_dte = true;
                                                                        }

                                                                        if ($coupon_code->starting_date >= date('Y-m-d')) {
                                                                                $strt_dte = false;
                                                                        } else {
                                                                                $strt_dte = true;
                                                                        }
                                                                        if ($coupon_code->starting_date == 0000 - 00 - 00) {
                                                                                $strt_dte = true;
                                                                        }
                                                                        if ($strt_dte == true && $expry_dte == true) {

                                                                                $coupon_history = new CouponHistory;
                                                                                $coupon_history->coupon_id = $coupon_code->id;

                                                                                $remaining_to_pay = $cart_total - Yii::app()->session['couponamount'];

                                                                                if ($remaining_to_pay >= $coupon_code->discount) {

                                                                                        $coupon_history->total_amount = $coupon_code->discount;
                                                                                } else {

                                                                                        $coupon_history->total_amount = $remaining_to_pay;
                                                                                }


                                                                                if (isset(Yii::app()->session['user'])) {
                                                                                        $coupon_history->user_id = Yii::app()->session['user']['id'];
                                                                                        $coupon_history->order_id = Yii::app()->session['orderid'];
                                                                                        $coupon_history->session_id = NULL;
                                                                                } else if (isset(Yii::app()->session['temp_user'])) {

                                                                                        $coupon_history->session_id = Yii::app()->session['temp_user'];
                                                                                        $coupon_history->user_id = 0;
                                                                                }

                                                                                if ($coupon_history->save()) {
                                                                                        if (empty(Yii::app()->session['couponid'])) {
                                                                                                Yii::app()->session['couponid'] = $coupon_history->coupon_id;
                                                                                                Yii::app()->session['couponamount'] = $coupon_history->total_amount;
                                                                                        } else {
                                                                                                Yii::app()->session['couponid'] = Yii::app()->session['couponid'] . ',' . $coupon_history->coupon_id;
                                                                                                Yii::app()->session['couponamount'] = Yii::app()->session['couponamount'] + $coupon_history->total_amount;
                                                                                        }
                                                                                        if (Yii::app()->session['couponamount'] >= $cart_total) {
                                                                                                Yii::app()->session['couponamount'] = $cart_total;
                                                                                        }
                                                                                        $coupon_balance = $coupon_code->discount - $coupon_history->total_amount;

                                                                                        $coupon_save = Coupons::model()->findByAttributes(array('code' => $coupon_code->code));
                                                                                        //$coupon_save->discount = $coupon_balance;
                                                                                        $coupon_save->status = 2;
                                                                                        if ($coupon_save->save()) {
                                                                                                Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
                                                                                        }
                                                                                }
                                                                        } else {
                                                                                Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
                                                                        }
                                                                } else {
                                                                        Yii::app()->user->setFlash('error', "coupon is used");
                                                                        $this->redirect(array('cart/Mycart'));
                                                                }
                                                        }
                                                }
                                        }
//                                        else if ($coupe_type == 0) {
//                                                if (!empty($c_history)) {
//                                                        Yii::app()->user->setFlash('error', "coupon is used");
//                                                        $this->redirect(array('cart/Mycart'));
//                                                } else {
//                                                        if ($coupon_code->expiry_date >= date('Y-m-d')) {
//                                                                $expry_dte = true;
//                                                        } else if ($coupon_code->expiry_date == 0000 - 00 - 00) {
//                                                                $expry_dte = true;
//                                                        }
//
//                                                        if ($coupon_code->starting_date >= date('Y-m-d')) {
//                                                                $strt_dte = false;
//                                                        } else {
//                                                                $strt_dte = true;
//                                                        }
//                                                        if ($coupon_code->starting_date == 0000 - 00 - 00) {
//                                                                $strt_dte = true;
//                                                        }
//                                                        if ($strt_dte == true && $expry_dte == true) {
//
//                                                                $coupon_history = new CouponHistory;
//                                                                $coupon_history->coupon_id = $coupon_code->id;
//                                                                $coupon_history->total_amount = $coupon_code->discount;
//                                                                if (isset(Yii::app()->session['user'])) {
//                                                                        $coupon_history->user_id = Yii::app()->session['user']['id'];
//                                                                        $coupon_history->order_id = Yii::app()->session['orderid'];
//                                                                        $coupon_history->session_id = NULL;
//                                                                } else if (isset(Yii::app()->session['temp_user'])) {
//
//                                                                        $coupon_history->session_id = Yii::app()->session['temp_user'];
//                                                                        $coupon_history->user_id = 0;
//                                                                }
//
//                                                                if ($coupon_history->save()) {
//                                                                        if (empty(Yii::app()->session['couponid'])) {
//                                                                                Yii::app()->session['couponid'] = $coupon_history->coupon_id;
//                                                                        } else {
//                                                                                Yii::app()->session['couponid'] = Yii::app()->session['couponid'] . ',' . $coupon_history->coupon_id;
//                                                                        }
//
//                                                                        Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
//                                                                }
//                                                        } else {
//                                                                Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
//                                                        }
//                                                }
//                                        }
                                } else {
                                        Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
                                }

//                                if (empty($coupon_code)) {
//                                        if (!empty($gift_card)) {
//                                                $this->giftCardCheck($gift_card, $cart);
//                                        } else {
//                                                Yii::app()->user->setFlash('error', "coupon is invalid");
//                                        }
//                                } else {
//                                        if (!empty($c_history)) {
//                                                $from = $c_history->date;
//                                                $to = date('Y-m-d H:i:s');
//                                                $diff_seconds = strtotime($to) - strtotime($from);
//                                                $hours = floor($diff_seconds / 3600);
//                                                $minutes = floor(($diff_seconds % 3600) / 60) + ($hours * 60);
//                                                if ($minutes < 30) {
//                                                        Yii::app()->user->setFlash('error', "Sorry coupon used");
//                                                        $this->redirect(array('cart/Mycart'));
//                                                } else {
//                                                        if ($coupon_code->expiry_date >= date('Y-m-d')) {
//                                                                $expry_dte = true;
//                                                        } else if ($coupon_code->expiry_date == 0000 - 00 - 00) {
//                                                                $expry_dte = true;
//                                                        }
//
//                                                        if ($coupon_code->starting_date >= date('Y-m-d')) {
//                                                                $strt_dte = false;
//                                                        } else {
//                                                                $strt_dte = true;
//                                                        }
//                                                        if ($coupon_code->starting_date == 0000 - 00 - 00) {
//                                                                $strt_dte = true;
//                                                        }
//                                                        if ($strt_dte == true && $expry_dte == true) {
//                                                                CouponHistory::model()->deleteByPk($c_history->id);
//                                                                $coupon_history = new CouponHistory;
//                                                                $coupon_history->coupon_id = $coupon_code->id;
//                                                                $coupon_history->total_amount = $coupon_code->discount;
//                                                                $coupon_history->session_id = Yii::app()->session['temp_user'];
//                                                                if ($coupon_history->save()) {
//                                                                        Yii::app()->session['couponid'] = $coupon_history->coupon_id;
//
//                                                                        Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
//                                                                }
//                                                        } else {
//                                                                Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
//                                                        }
//                                                }
//                                        } else {
//
//                                                if ($coupon_code->expiry_date >= date('Y-m-d')) {
//                                                        $expry_dte = true;
//                                                } else if ($coupon_code->expiry_date == 0000 - 00 - 00) {
//                                                        $expry_dte = true;
//                                                }
//
//                                                if ($coupon_code->starting_date >= date('Y-m-d')) {
//                                                        $strt_dte = false;
//                                                } else {
//                                                        $strt_dte = true;
//                                                }
//                                                if ($coupon_code->starting_date == 0000 - 00 - 00) {
//                                                        $strt_dte = true;
//                                                }
//                                                if ($strt_dte == true && $expry_dte == true) {
//
//                                                        $coupon_history = new CouponHistory;
//                                                        $coupon_history->coupon_id = $coupon_code->id;
//                                                        $coupon_history->total_amount = $coupon_code->discount;
//                                                        if (isset(Yii::app()->session['user'])) {
//                                                                $coupon_history->user_id = Yii::app()->session['user']['id'];
//                                                                $coupon_history->order_id = Yii::app()->session['orderid'];
//                                                                $coupon_history->session_id = NULL;
//                                                        } else if (isset(Yii::app()->session['temp_user'])) {
//
//                                                                $coupon_history->session_id = Yii::app()->session['temp_user'];
//                                                                $coupon_history->user_id = 0;
//                                                        }
//
//                                                        if ($coupon_history->save()) {
//                                                                Yii::app()->session['couponid'][1] = $coupon_history->coupon_id;  /* coupon code session */
//
//                                                                Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
//                                                        }
//                                                } else {
//                                                        Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
//                                                }
//                                        }
//                                }
                                $this->redirect(array('cart/Mycart'));
                        } else {

                                // Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
                                //$this->redirect(array('cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('cart/Mycart'));
                }
        }

        public function giftCardCheck($gift_card, $cart) {
                $amount = $this->amountTotal($cart);

                if ($amount > $gift_card->discount || $amount == $gift_card->discount) {
                        $gift_card->gift_card_amount = 0;
                        $gift_card->save();
                } else {
                        $gift_card->discount = $gift_card->discount - $amount;
                        $gift_card->save();
                }
                $coupon_history = new CouponHistory;
                $coupon_history->coupon_id = $gift_card->gift_card_id;
                $coupon_history->total_amount = $amount;
                if (isset(Yii::app()->session['user'])) {
                        $coupon_history->user_id = Yii::app()->session['user']['id'];
                        $coupon_history->order_id = Yii::app()->session['orderid'];
                        $coupon_history->session_id = NULL;
                } else if (isset(Yii::app()->session['temp_user'])) {

                        $coupon_history->session_id = Yii::app()->session['temp_user'];
                        $coupon_history->user_id = 0;
                }

                if ($coupon_history->save()) {
                        Yii::app()->session['couponid'][2] = $coupon_history->coupon_id; /* gift card session */
                }
                if ($gift_card->discount > 0) {
                        Yii::app()->user->setFlash('success', "Your card balance is $gift_card->discount");
                } else {
                        Yii::app()->user->setFlash('success', "Your card is submitted");
                }
        }

        /* for gift card balance checking */

        public function amountTotal($carts) {
                foreach ($carts as $cart) {
                        $prod_details = Products::model()->findByPk($cart->product_id);
                        $cart_qty = $cart->quantity;
                        if ($prod_details->discount) {
                                $price = $prod_details->price - $prod_details->discount;
                        } else {
                                $price = $prod_details->price;
                        }

                        $tot_price = $cart_qty * $price;
                        if ($cart->gift_option != 0) {
                                $tot_price = $tot_price + $cart->rate;
                        }
                        $total+= $tot_price;
                }
                if (isset(Yii::app()->session['couponid'][1])) {
                        $coupon_amount = CouponHistory::model()->findByPk(Yii::app()->session['couponid'])->total_amount;
                        $price = $total - $coupon_amount;
                        return $price;
                } else {
                        return $total;
                }
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
                        throw
                        new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionDelete($id) {
                $model = $this->loadModel($id);
                $model->delete();
                if (!isset($_GET['ajax']))
                        $this->
                                redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Mycart'));
        }

        public function actionRemoveCoupon() {
                if (isset(Yii::app()->session['couponid'])) {
                        if (isset(Yii::app()->session['user']))
                                $data = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user'], 'coupon_id' => Yii::app()->session['couponid']));
                        elseif (isset(Yii::app()->session['temp_user']))
                                $data = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'coupon_id' => Yii::app()->session['couponid']));
                        if ($data->delete())
                                unset(Yii::app()->session['couponid']);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

}
