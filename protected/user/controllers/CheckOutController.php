<?php

class CheckOutController extends Controller {

        public function init() {

//var_dump(Yii::app()->session['post']['admin']);
//die;
                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
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

        public function actionCartItems() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                        if (!empty($cart)) {

                                $this->render('confirmation', array('carts' => $cart));
                        } else {
//todo cart is empty message
                        }
                } else {
//todo invalid user
                }
        }

        public function actionGetCountry() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];

                        $shipping_charge = UserAddress::model()->findByPk($country);

                        if (!empty($shipping_charge)) {
                                echo $shipping_charge->country;
                        } else {
                                echo 0;
                        }
                }
        }

        public function actionGettotalpay() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];
                        $shipping_charge = ShippingCharges::model()->findByAttributes(array('country' => $country));

                        $carts = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $producttotal = $prod_details->price * $cart->quantity;
                                if ($cart->gift_option != 0) {
                                        $gift += $cart->rate;
                                }
                                $product_price += $producttotal;
                        }
                        $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid']))->total_amount;
                        $subtotal = $gift + $product_price - $discount;

                        $grant_total = $subtotal + $shipping_charge->shipping_rate;
                        $totalpay = $subtotal + $shipping_charge->shipping_rate;
                        $grant_total = Yii::app()->Currency->convert($grant_total);

                        if (!empty($shipping_charge)) {
                                $ship_amount = Yii::app()->Currency->convert($shipping_charge->shipping_rate);
                                $array = array('granttotal' => $grant_total, 'totalpay' => $totalpay, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        } else {
                                $ship_amount = 0;
                                $array = array('granttotal' => $grant_total, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        }
                }
        }

        public function actiontotalcalculate() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $wallet = $_POST['wallet'];
                        if ($wallet < 0) {
                                $wallet = 0;
                        }
                        $grant = $_POST['grant'];
                        $country = $_POST['country'];
                        $shipping_charge = ShippingCharges::model()->findByAttributes(array('country' => $country));
                        $carts = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $producttotal = $prod_details->price * $cart->quantity;
                                if ($cart->gift_option != 0) {
                                        $gift += $cart->rate;
                                }
                                $product_price += $producttotal;
                        }
                        $subtotal = $gift + $product_price;
                        $grant_total = $subtotal + $shipping_charge->shipping_rate;
                        $totalpay = $subtotal + $shipping_charge->shipping_rate;
                        if (isset(Yii::app()->session['currency'])) {
                                $currency_rate = Yii::app()->session['currency']['rate'];
                        } else {
                                $currency_rate = 1;
                        }
                        $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid'], 'user_id' => Yii::app()->session['user']['id']));

                        $grant_total = round(($currency_rate * $grant_total ) - ($currency_rate * $discount->total_amount), 2);

                        $cwallet = Yii::app()->session['user']['wallet_amt'];
                        if (isset(Yii::app()->session['currency'])) {
                                $currentwallet = round($cwallet * $currency_rate, 2);
                        } else {
                                $currentwallet = $cwallet;
                        }
                        $wallet_balance = $currentwallet - $wallet;
                        /*
                         * Calculate wallet balance and total balance
                         *                          */
                        if ($grant_total >= $currentwallet) {
                                if ($wallet_balance >= 0) {
                                        $total_balance_to_pay = $grant_total - $wallet;
                                        $wallet = $wallet;
                                } else {
                                        $total_balance_to_pay = $grant_total - $currentwallet;

                                        $wallet = $currentwallet;
                                        $wallet_balance = $currentwallet - $wallet;
                                }
                        } else {
                                if ($wallet_balance >= 0) {
                                        $total_balance_to_pay = $grant_total - $wallet;
                                        $wallet = $wallet;
                                } else {
                                        $total_balance_to_pay = $grant_total - $currentwallet;
                                        $wallet = $grant_total;
                                        $wallet_balance = $currentwallet - $wallet;
                                }
                        }


                        if ($total_balance_to_pay < 0) {
                                $total_balance_to_pay = 0;
                        }

                        $totalamount = $total_balance_to_pay;

                        if (isset(Yii::app()->session['currency'])) {
                                $total_balance_to_pay = '<i class="fa ' . Yii::app()->session['currency']['symbol'] . '"></i>' . round($total_balance_to_pay, 2);
                                $wallet_balance = '<i class="fa ' . Yii::app()->session['currency']['symbol'] . '"></i>' . round($wallet_balance, 2);
                        } else {
                                $total_balance_to_pay = '<i class="fa fa-inr"></i>' . round($total_balance_to_pay, 2);
                                $wallet_balance = '<i class="fa fa-inr"></i>' . round($wallet_balance, 2);
                        }
                        $array = array('totalamounttopay' => $total_balance_to_pay, 'wallet_balance' => $wallet_balance, 'wallet' => $wallet, 'total' => $totalamount);
                        $json = CJSON::encode($array);
                        echo $json;
                }
        }

        public function actionGetshippingcharge() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];
                        $shipping_charge = ShippingCharges::model()->findByAttributes(array('country' => $country));

                        $carts = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $producttotal = $prod_details->price * $cart->quantity;
                                if ($cart->gift_option != 0) {
                                        $gift += $cart->rate;
                                }
                                $product_price += $producttotal;
                        }
                        $subtotal = $gift + $product_price;

                        $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid']));
                        $grant_total = $subtotal + $shipping_charge->shipping_rate - $discount->total_amount;
                        $totalpay = $subtotal + $shipping_charge->shipping_rate;
                        $grant_total = Yii::app()->Currency->convert($grant_total);

                        if (!empty($shipping_charge)) {
                                $ship_amount = Yii::app()->Currency->convert($shipping_charge->shipping_rate);
                                $array = array('granttotal' => $grant_total, 'totalpay' => $totalpay, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        } else {
                                $ship_amount = 0;
                                $array = array('granttotal' => $grant_total, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        }
                }
        }

        public function actionGetShippingMethod() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];

                        $shipping_charge = ShippingCharges::model()->findByAttributes(array('country' => $country));

                        if (!empty($shipping_charge)) {
                                if ($country == 4) {
                                        $this->renderPartial('_shipping_indian', array('shipping_charge' => $shipping_charge));
                                } else {
                                        $this->renderPartial('_shipping_other', array('shipping_charge' => $shipping_charge));
                                }
                        } else {
                                echo 'Sorry, no quotes are available for this order at this time.';
                        }
                } else {
//todo invalid user
                }
        }

        public function actionCheckOut() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart)) {
                                $deafult_shipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->session['user']['id'], 'default_shipping_address' => 1));
                                $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                                $billing = new UserAddress;
                                $shipping = new UserAddress;
//                                $order = Order::model()->findbypk(Yii::app()->session['orderid']);
                                $address_id = '';
                                if ($_POST['yt0']) {
                                        $post_wallet = $_POST['wallet_amount'];
                                        if ($post_wallet != '') {
                                                $post_wallet = $post_wallet;
                                        } else {
                                                $post_wallet = 0;
                                        }
                                        $post_total_pay = $_POST['total_pay'];


                                        if ($_REQUEST['bill_address'] == 0) {
                                                if (isset($_POST['UserAddress']['bill'])) {
                                                        $billing_address = $this->addAddress($billing, $_POST['UserAddress']['bill']);
                                                        $bill_address_id = $billing_address;
                                                }
                                        } else {
                                                $bill_address_id = $_REQUEST['bill_address'];
                                        }
                                        if ($_REQUEST['billing_same'] == NULL) {
                                                if ($_REQUEST['ship_address'] == 0) {
                                                        if (isset($_POST['UserAddress']['ship'])) {
                                                                $shipping_address = $this->addAddress($shipping, $_POST['UserAddress']['ship']);
                                                                $ship_address_id = $shipping_address;
                                                        }
                                                } else {
                                                        $ship_address_id = $_REQUEST['ship_address'];
                                                }
                                        } else {
                                                $ship_address_id = $bill_address_id;
                                        }
                                        $shipp_address = UserAddress::model()->findByPk($ship_address_id);

                                        $shipp_available = ShippingCharges::model()->findByAttributes(array('country' => $shipp_address->country));

                                        if (empty($shipp_available)) {
                                                Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
                                                $this->redirect(array('CheckOut/CheckOut'));
                                        }
                                        if ($_POST['wallet_amount'] != '') {
                                                $wallet = $_POST['wallet_amount'];
                                        } else {
                                                $wallet = 0;
                                        }
                                        if (isset(Yii::app()->session['currency'])) {
                                                $currency_rate = Yii::app()->session['currency']['rate'];
                                        } else {
                                                $currency_rate = 1;
                                        }
                                        $subtotal = $this->subtotal();

                                        $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid'], 'user_id' => Yii::app()->session['user']['id']));
                                        if (!empty($discount)) {
                                                $coupen = Coupons::model()->findbypk($discount->coupon_id);
                                                if ($coupen == 1) {
                                                        $discount_rate = $discount->total_amount;
                                                } else {
                                                        $discount_rate = 0;
                                                }
                                        } else {
                                                $discount_rate = 0;
                                        }

                                        $granttotal = round(($currency_rate * $subtotal) + ($currency_rate * $shipping_charge->shipping_rate) - ($currency_rate * $discount_rate), 2);

                                        $cwallet = Yii::app()->session['user']['wallet_amt'];
                                        if (isset(Yii::app()->session['currency'])) {
                                                $currentwallet = round($cwallet * $currency_rate, 2);
                                        } else {
                                                $currentwallet = $cwallet;
                                        }

                                        if ($granttotal >= $currentwallet) {
                                                if ($wallet_balance >= 0) {
                                                        $total_balance_to_pay = $granttotal - $wallet;
                                                } else {
                                                        $total_balance_to_pay = $granttotal - $currentwallet;
                                                        $wallet = $currentwallet;
                                                        $wallet_balance = $currentwallet - $wallet;
                                                }
                                        } else {
                                                if ($wallet_balance >= 0) {
                                                        $total_balance_to_pay = $granttotal - $wallet;
                                                        $wallet = $wallet;
                                                } else {
                                                        $total_balance_to_pay = $granttotal - $currentwallet;
                                                        $wallet = $granttotal;
                                                        $wallet_balance = $currentwallet - $wallet;
                                                }
                                        }


                                        if ($wallet != $post_wallet || $total_balance_to_pay != $post_total_pay) {
                                                Yii::app()->user->setFlash('checkout_error', "Ther an error found on checkout please fill carefully and check out again");
                                                $this->redirect(array('CheckOut/CheckOut'));
                                        }
                                        if ($bill_address_id != '' && $ship_address_id != '') {

                                                $order_id = Yii::app()->session['orderid'];
                                                $this->addOrder($bill_address_id, $ship_address_id, $cart, $order_id);

                                                if ($wallet > 0) {
                                                        $user->wallet_amt = $currentwallet - $wallet;
                                                        $gift_packing = $this->giftpack($order->id);
                                                        if ($gift_packing > 0) {
                                                                $order->gift_option = 1;
                                                                $order->rate = $gift_packing;
                                                        }
                                                        $order->payment_mode = 1;
                                                        $order->payment_status = 1;
                                                        $order->status = 1;
                                                        if ($order->save()) {
                                                                Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                                                $this->updateorderproduct($order->id);
                                                                if ($user->save()) {
                                                                        Yii::app()->session['user'] = $user;
                                                                }
                                                                if ($discount_rate != 0) {
                                                                        $this->updatecoupon($coupen);
                                                                }
                                                                $this->redirect(array('OrderSuccess'));
                                                        }
                                                } else {
                                                        Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                                                        $gift_packing = $this->giftpack($order->id);
                                                        if ($gift_packing > 0) {
                                                                $order->gift_option = 1;
                                                                $order->rate = $gift_packing;
                                                        }
                                                        if ($discount_rate != 0) {
                                                                $this->updatecoupon($coupen);
                                                        }
                                                        $order->payment_mode = $_POST['payment_method'];
                                                        $order->payment_status = 1;
                                                        $order->status = 1;
                                                        if ($order->save()) {
                                                                $this->updateorderproduct($order->id);
                                                                //$this->redirect(array('OrderHistory'));
                                                                $this->redirect(array('OrderSuccess'));
                                                        }
//
                                                }
                                        }
                                }
                                $this->render('checkout', array('carts' => $cart, 'deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'orderid' => $order_id, 'billing' => $billing));
                        } else {
//todo render a cart empty page here
                        }
                } else {
//todo invalid user message
                }
        }

        public function updateorderproduct($orderid) {
                OrderProducts::model()->updateAll(array('status' => 1), array('condition' => 'order_id = ' . $orderid));
        }

        public function giftpack($orderid) {
                $giftpacks = OrderProducts::model()->findAllByAttributes(array('order_id' => $orderid));
                foreach ($giftpacks as $giftpack) {
                        $tot_price = $giftpack->rate;
                }
                $total += $tot_price;
                return $total;
        }

        public function updatecoupon($coupen) {
                $coupen->status = 2;
                if ($coupen->save()) {
                        $coupen_used = new CouponsUsed;
                        $coupen_used->attributes = $coupen->attributes;
                        $coupen_used->user_id = Yii::app()->session['user']['id'];
                        $coupen_used->DOC = date('Y-m-d');
                        $coupen_used->status = 2;
                        $coupen_used->save();
                }
        }

        public function addOrder($address_id_bill, $address_id_ship, $cart, $order_id) {
                $model1 = $this->loadModel($order_id);
                $total_amt = $this->total($cart);
                $model1->ship_address_id = $address_id_ship;
                $model1->bill_address_id = $address_id_bill;
                $model1->total_amount = $total_amt;
                if ($model1->save()) {
                        return $model1->id;
                }
        }

        public function actionCurrencyconvert() {
                $value = $_POST['total'];
                $result = Yii::app()->Currency->convert($value);
                echo $result;
        }

        public function addAddress($model, $data) {

                $model->attributes = $data;
                $model->address_1 = $data['address_1'];
                $model->address_2 = $data['address_2'];
                $model->contact_number = $data['contact_number'];
                $model->CB = Yii::app()->session['user']['id'];
                $model->DOC = date('Y-m-d');
                $model->userid = Yii::app()->session['user']['id'];
                if ($model->validate()) {
                        if ($model->save()) {
                                return $model->id;
                        } else {

                                return false;
                        }
                } else {
                        return false;
                }
        }

        public function subtotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (!empty($cart)) {

                        }
                        foreach ($cart as $car) {
                                $product_value = Products::model()->findByPk($car->product_id)->price;
                                $subtotal = $subtotal + ($car->quantity * $product_value) + $car->rate;
                        }
                }

                return $subtotal;
        }

        public function granttotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                }
                if (!empty($cart)) {
                        foreach ($cart as $car) {
                                $product_value = Products::model()->findByPk($car->product_id)->price;
                                $subtotal = $subtotal + ($car->quantity * $product_value);
                        }
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

        public function actionOrderHistory() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        if (!empty($cart)) {
                                if (isset($_POST['mycomment'])) {
                                        $comment = $_POST['comment'];
                                        $order->comment = $comment;
                                        $order->status = 1;
                                        $order->payment_status = 1;
                                        $order->currency_id = Yii::app()->session['currency']->id;
                                        $order->update();
                                        $orderprod = OrderProducts::model()->findByAttributes(array('order_id' => $order->id));
                                        $products = Products::model()->findByPk($orderprod->product_id);

                                        if ($order->payment_status = 1 && $products->subtract_stock = 1) {

                                                $products->quantity = $products->quantity - $orderprod->quantity;
                                                $products->update();
                                        } else {

                                        }
                                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'user_id = ' . Yii::app()->session['user']['id']));
                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/index');
                                }
                                $user_details = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $ship_address = UserAddress::model()->findByPk($order->ship_address_id);
                                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

                                $order->save();
                                $this->render('order_history', array('carts' => $cart, 'ship_address' => $ship_address, 'bill_address' => $bill_address, 'user_details' => $user_details, 'order' => $order));
                        } else {
//todo cart is empty message
                        }
                } else {
//todo invalid user
                }
        }

        /*

         * Order Success Action         */

        /* mail send to admin and user */

        public function actionOrderSuccess() {
                $order = Order::model()->findByPk(yii::app()->session['orderid']);


                $user_address = UserAddress::model()->findByPk($order->ship_address_id);

                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                $shiping_charge = ShippingCharges::model()->findByPk($user_address->country);
                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));

                $this->SendMail($order);
                $this->adminmail($order);
                exit;
                unset(yii::app()->session['orderid']);
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                Yii::app()->session['user'] = $user;
                unset(yii::app()->session['orderid']);
                $this->render('order_success');
        }

        public function SendMail($order) {
                $order = Order::model()->findByPk(yii::app()->session['orderid']);
                $mail = UserDetails::model()->findByPk($order->user_id);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));
                $shiping_charge = ShippingCharges::model()->findByAttributes(array('country' => $user_address->country));
                // var_dump($order);
                //var_dump($shiping_charge);
                //exit;
                $newDate = date("d-m-Y", strtotime($order->DOC));
                $to = $mail->email;
                $subject = 'info_lakshya';
                $message = $this->renderPartial(_user_order_mail, array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge, '$gift_rate' => $gift_rate));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                echo $message;
                // exit();
                //  mail($to, $subject, $message, $headers);
        }

        public function Adminmail($order) {
                $order = Order::model()->findByPk(yii::app()->session['orderid']);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);

                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));

                $shiping_charge = ShippingCharges::model()->findByAttributes(array('country' => $user_address->country));

                $newDate = date("d-m-Y", strtotime($order->DOC));
                //$to = 'rejin@intersmart.in';
                $subject = 'info_lakshya';
                $message = $this->renderPartial(_admin_order_mail, array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                echo $message;
                exit();
                //  mail($to, $subject, $message, $headers);
        }

        /* Order Error Action */

        public function actionOrderError() {

                $order = Order::model()->findByPk(yii::app()->session['orderid']);

                $userdetails = UserDetails::model()->findByPk($order->user_id);

                //var_dump($userdetails->email);

                $this->errorMail($userdetails);
                exit;
        }

        /* ckeck out error mail  */

        public function ErrorMail($userdetails) {


                $to = $userdetails->email;
                $subject = 'info_lakshya';
                $message = $this->renderPartial(_error_checkout_mail, array('userdetails' => $userdetails));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                echo $message;
                exit();
                //  mail($to, $subject, $message, $headers);
        }

        public function actionDeletGift($id) {
                $gift_details = UserGifts::model()->findByPk($id);
                if (!empty($gift_details)) {
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        $order->gift_option = 0;
                        $order->rate = 0;
                        $order->save();
                        $model = UserGifts::model()->deleteByPk($id);
                        $this->redirect(Yii::app()->request->urlReferrer);
                } else {
                        echo "test";
                        exit;
                }
        }

        public function actionCoupon() {

                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        if (!empty($cart)) {

                                if (isset($_POST['btn_submit'])) {
// $id = Yii::app()->session['user']['id'];

                                        $coupon_code = Coupons::model()->findByAttributes(array('code' => $_POST['coupon'], 'status' => 1));
                                        $order_product = OrderProducts::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid']));
                                        $user_id = false;
                                        $prod_id = false;
                                        $limit = false;
                                        $expry_dte = false;
                                        $strt_dte = false;
                                        $coupon_hist = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid'], 'coupon_id' => $coupon_code->id));
                                        if ($coupon_hist) {
                                                Yii::app()->user->setFlash('error', "Sorry coupon used");
                                        } else {
                                                if (!empty($coupon_code)) {

                                                        if ($coupon_code->user_id != '') {
                                                                $uid = explode(',', $coupon_code->user_id);
                                                                if (in_array(Yii::app()->session['user']['id'], $uid)) {
                                                                        $user_id = true;
                                                                } else {
                                                                        $user_id = false;
                                                                }
                                                        } else {

                                                                $user_id = true;
                                                        }
                                                        if ($coupon_code->product_id != '') {

                                                                $pid = explode(',', $coupon_code->product_id);
                                                                if (in_array($order_product->product_id, $pid)) {
                                                                        $prod_id = true;
                                                                } else {
                                                                        $prod_id = false;
                                                                }
                                                        } else {
                                                                $prod_id = true;
                                                        }

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
                                                        if ($coupon_code->cash_limit != '') {
                                                                if ($order->total_amount > $coupon_code->cash_limit) {
                                                                        $limit = true;
                                                                }
                                                        } else {
                                                                $limit = true;
                                                        }

                                                        if ($user_id == true && $prod_id == true && $strt_dte == true && $expry_dte == true && $limit == true) {
                                                                $this->discount($order, $coupon_code);
                                                                $this->couponcodes($order, $coupon_code);
                                                                if ($coupon_code->unique == 1) {
                                                                        $coupon_code->status = 0;
                                                                        $coupon_code->save();
                                                                }
                                                                Yii::app()->user->setFlash('success', "Your coupon code is submitted...");
                                                        } else {
                                                                Yii::app()->user->setFlash('error', "Sorry! Invalid coupon code..");
                                                        }
                                                } else {
                                                        Yii::app()->user->setFlash('error', "coupon is invalid");
                                                }
                                        }
                                }
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
//cart empty //
                        }
                } else {
// to do invalid user//
                }
        }

        public function discount($order, $coupon) {
                $model = $this->loadModel($order->id);
                if ($coupon->discount_type == 1) {
                        if ($order->discount_rate == 0)
                                $model->discount_rate = $order->total_amount - $coupon->discount;
                        else
                                $model->discount_rate = $order->discount_rate - $coupon->discount;
                } else {
                        if ($order->discount_rate == 0)
                                $model->discount_rate = (($order->total_amount) - (($coupon->discount / 100) * ($order->total_amount)));
                        else
                                $model->discount_rate = ($order->discount_rate - (($coupon->discount / 100) * ($order->total_amount)));
                }

                $model->coupon_id = $coupon->id;
                $model->update();
        }

        /* coupon histories */

        public function couponcodes($order, $coupon) {
                $model = new CouponHistory;
                $model->order_id = $order->id;
                $model->coupon_id = $coupon->id;
                if ($order->discount_rate == 0)
                        $model->total_amount = $order->total_amount - $coupon->discount;
                else
                        $model->total_amount = $order->discount_rate - $coupon->discount;
                $model->save();
        }

        public function loadModel($id) {
                $model = Order::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

}
