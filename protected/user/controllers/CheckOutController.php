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
                        // $grant = $_POST['grant'];
                        $country = $_POST['country'];
                        if ($country == 99) {
                                $total_shipping_rate = 0;
                        } else {
                                $get_zone = Countries::model()->findByPk($country);
                                $get_total_weight = $this->GetTotalWeight();
                                $value = explode('.', $get_total_weight);
                                if (strlen($value[1]) == 1) {
                                        $value[1] = $value[1] . '0';
                                }
                                if ($value[1] <= 50) {
                                        $total_weight = $value[0] + .5;
                                } else {
                                        $total_weight = $value[0] + 1;
                                }
                                /* 13% Fuel Charge and 15 % Service chARGE is applicable */
                                $shipping_rate = ShippingCharges::model()->findByAttributes(array('zone' => $get_zone->zone, 'weight' => $total_weight));
                                if (!empty($shipping_rate)) {
                                        $fuel_charge = $shipping_rate->shipping_rate * .13;
                                        $service_charge = ($shipping_rate + $fuel_charge) * .15;
                                        $total_shipping_rate = ceil($shipping_rate + $fuel_charge + $service_charge);
                                } else {
                                        $total_shipping_rate = 0;
                                }
                        }
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
                        $grant_total = $subtotal + $total_shipping_rate;
                        $totalpay = $subtotal + $total_shipping_rate;
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

                        if ($country == 99) {
                                $total_shipping_rate = 0;
                        } else {
                                $get_zone = Countries::model()->findByPk($country);
                                $get_total_weight = $this->GetTotalWeight();
                                $value = explode('.', $get_total_weight);
                                if (strlen($value[1]) == 1) {
                                        $value[1] = $value[1] . '0';
                                }
                                if ($value[1] <= 50) {
                                        $total_weight = $value[0] + .5;
                                } else {
                                        $total_weight = $value[0] + 1;
                                }
                                /* 13% Fuel Charge and 15 % Service chARGE is applicable */
                                $shipping_rate = ShippingCharges::model()->findByAttributes(array('zone' => $get_zone->zone, 'weight' => $total_weight));
                                if (!empty($shipping_rate)) {
                                        $fuel_charge = $shipping_rate->shipping_rate * .13;
                                        $service_charge = ($shipping_rate + $fuel_charge) * .15;
                                        $total_shipping_rate = ceil($shipping_rate + $fuel_charge + $service_charge);
                                } else {
                                        $total_shipping_rate = 0;
                                }
                        }




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
                        $grant_total = ceil($subtotal + $total_shipping_rate - $discount->total_amount);
                        $totalpay = $subtotal + $total_shipping_rate;
                        $grant_total = Yii::app()->Currency->convert($grant_total);

                        if (!empty($shipping_rate)) {
                                $ship_amount = Yii::app()->Currency->convert($total_shipping_rate);
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

        public function GetTotalWeight() {
                $carts = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'],));
                if (!empty($carts)) {
                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                if ($cart->options != 0) {
                                        $option_stock = OptionDetails::model()->findByPk($cart->options);
                                        if (!empty($option_stock)) {
                                                if ($option_stock->stock >= $cart->quantity) {
                                                        $quantity = $cart->quantity;
                                                } else {
                                                        $quantity = 0;
                                                }
                                        }
                                } else {
                                        if ($prod_details->quantity >= $cart->quantity) {

                                                $quantity = $cart->quantity;
                                        } else {
                                                $quantity = 0;
                                        }
                                }

                                $tot = $prod_details->weight * $quantity;

                                $total_weight += $tot;
                        }
                        return $total_weight;
                } else {
                        return 0;
                }
        }

        public function actionGetShippingMethod() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];
                        if ($country == 99) {
                                $total_shipping_rate = 0;
                        } else {
                                $get_zone = Countries::model()->findByPk($country);
                                $get_total_weight = $this->GetTotalWeight();
                                $value = explode('.', $get_total_weight);
                                if (strlen($value[1]) == 1) {
                                        $value[1] = $value[1] . '0';
                                }
                                if ($value[1] <= 50) {
                                        $total_weight = $value[0] + .5;
                                } else {
                                        $total_weight = $value[0] + 1;
                                }


                                /* 13% Fuel Charge and 15 % Service chARGE is applicable */
                                $shipping_rate = ShippingCharges::model()->findByAttributes(array('zone' => $get_zone->zone, 'weight' => $total_weight));
                                if (!empty($shipping_rate)) {
                                        $fuel_charge = $shipping_rate->shipping_rate * .13;
                                        $service_charge = ($shipping_rate + $fuel_charge) * .15;
                                        $total_shipping_rate = ceil($shipping_rate + $fuel_charge + $service_charge);
                                } else {
                                        $total_shipping_rate = 0;
                                }
                        }
                        if ($country == 99) {
                                $this->renderPartial('_shipping_indian', array('shipping_charge' => $total_shipping_rate));
                        } else {
                                if (!empty($shipping_rate)) {
                                        $this->renderPartial('_shipping_other', array('shipping_charge' => $total_shipping_rate));
                                } else {
                                        echo 'Sorry, no quotes are available for this order at this time.';
                                }
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
//                              $order = Order::model()->findbypk(Yii::app()->session['orderid']);
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

                                        //$shipp_available = ShippingCharges::model()->findByAttributes(array('country' => $shipp_address->country));
                                        if ($shipp_address->country == 99) {
                                                $total_shipping_rate = 0;
                                        } else {
                                                $get_zone = Countries::model()->findByPk($shipp_address->country);
                                                $get_total_weight = $this->GetTotalWeight();
                                                $value = explode('.', $get_total_weight);
                                                if (strlen($value[1]) == 1) {
                                                        $value[1] = $value[1] . '0';
                                                }
                                                if ($value[1] <= 50) {
                                                        $total_weight = $value[0] + .5;
                                                } else {
                                                        $total_weight = $value[0] + 1;
                                                }


                                                /* 13% Fuel Charge and 15 % Service chARGE is applicable */
                                                $shipping_rate = ShippingCharges::model()->findByAttributes(array('zone' => $get_zone->zone, 'weight' => $total_weight));
                                                if (!empty($shipping_rate)) {
                                                        $fuel_charge = $shipping_rate->shipping_rate * .13;
                                                        $service_charge = ($shipping_rate + $fuel_charge) * .15;
                                                        $total_shipping_rate = ceil($shipping_rate + $fuel_charge + $service_charge);
                                                } else {
                                                        $total_shipping_rate = 0;
                                                }
                                        }
                                        if ($shipp_address->country == 99) {
                                                $postcode_exist = DtdcPostcode::model()->findByAttributes(array('postcode' => $shipp_address->postcode));
                                                if (empty($postcode_exist)) {
                                                        Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address. Please choose some other post code");
                                                        $this->redirect(array('CheckOut/CheckOut'));
                                                }
                                                //$this->renderPartial('_shipping_indian', array('shipping_charge' => $total_shipping_rate));
                                        } else {
                                                if (empty($shipping_rate)) {
                                                        Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
                                                        $this->redirect(array('CheckOut/CheckOut'));
                                                }
                                        }
//                                        if (empty($shipp_available)) {
//                                                Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
//                                                $this->redirect(array('CheckOut/CheckOut'));
//                                        }
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
                                                Yii::app()->user->setFlash('checkout_error', "There an error found on checkout please fill carefully and check out again");
                                                $this->redirect(array('CheckOut/CheckOut'));
                                        }
                                        if ($bill_address_id != '' && $ship_address_id != '') {

                                                $order_id = Yii::app()->session['orderid'];

                                                $this->addOrder($bill_address_id, $ship_address_id, $cart, $order_id);
                                                $order->shipping_method = $_REQUEST['shipping_value'];

                                                if ($wallet > 0) {



                                                        /* wallet entry starts */

                                                        $wallet_amount = new WalletHistory;
                                                        $wallet_amount->user_id = Yii::app()->session['user']['id'];
                                                        $wallet_amount->type_id = 4;
                                                        $wallet_amount->amount = $wallet;
                                                        $wallet_amount->entry_date = date('Y-m-d H:i:s');
                                                        $wallet_amount->credit_debit = 2;
                                                        $wallet_amount->balance_amt = $currentwallet - $wallet;
                                                        $wallet_amount->ids = $order_id;
                                                        $wallet_amount->field2 = 0;
                                                        $wallet_amount->save(FALSE);

                                                        /* wallet entry ends */

                                                        $gift_packing = $this->giftpack($order->id);
                                                        if ($gift_packing > 0) {
                                                                $order->gift_option = 1;
                                                                $order->rate = $gift_packing;
                                                        }
                                                        if ($post_total_pay == 0) {
                                                                $order->payment_mode = 1;
                                                                $order->wallet = $wallet;
                                                        } else {
                                                                if ($post_total_pay != 0 && $_POST['wallet_amount'] != 0) {
                                                                        $order->payment_mode = 4;

                                                                        if ($_POST['payment_method'] == 2) {
                                                                                $order->netbanking = $post_total_pay;
                                                                                $order->wallet = $wallet;
                                                                        } else if ($_POST['payment_method'] == 3) {
                                                                                $order->paypal = $post_total_pay;
                                                                                $order->wallet = $wallet;
                                                                        }
                                                                } else {
                                                                        $order->payment_mode = $_POST['payment_method'];
                                                                        if ($_POST['payment_method'] == 2) {
                                                                                $order->netbanking = $post_total_pay;
                                                                        } else if ($_POST['payment_method'] == 3) {
                                                                                $order->paypal = $post_total_pay;
                                                                        }
                                                                }
                                                        }


//$order->payment_status = 1;
                                                        $order->bill_address_id = $bill_address_id;
                                                        $order->ship_address_id = $ship_address_id;
                                                        $order->order_date = date('Y-m-d H:i:s');
                                                        if ($order->save()) {
                                                                Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                                                $this->updateorderproduct($order->id);
                                                                if ($user->save()) {
                                                                        Yii::app()->session['user'] = $user;
                                                                }
                                                                if ($discount_rate != 0) {
                                                                        $this->updatecoupon($coupen);
                                                                }

                                                                $this->updateorderproduct($order->id);


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
                                                        if ($_POST['payment_method'] == 2) {
                                                                $order->netbanking = $_REQUEST['total_pay'];
                                                                $order->paypal = "";
                                                        } else if ($_POST['payment_method'] == 3) {
                                                                $order->paypal = $_REQUEST['total_pay'];
                                                                $order->netbanking = "";
                                                        }

//  $order->payment_status = 1;
                                                        $order->bill_address_id = $bill_address_id;
                                                        $order->ship_address_id = $ship_address_id;
                                                        $order_billing_details = UserAddress::model()->findBypk($bill_address_id);
                                                        $order_shipping_detils = UserAddress::model()->findBypk($ship_address_id);
//  $order->status = 1;

                                                        if ($order->save()) {

                                                                $this->updateorderproduct($order->id);
//$this->redirect(array('OrderHistory'));
                                                                if ($post_total_pay != 0) {

                                                                        /* payment action goes here */
//                                                                        if (isset(Yii::app()->session['currency'])) {
//                                                                                $order->netbanking = $order->netbanking / Yii::app()->session['currency']->rate;
//                                                                        } else {
//                                                                                $order->netbanking = $order->netbanking;
//                                                                        }

                                                                        if ($order->netbanking != '') {
                                                                                $hdfc_details = array();
                                                                                $hdfc_details['description'] = 'Laksyah Products';
                                                                                $hdfc_details['order'] = $order->id;
                                                                                $hdfc_details['totaltopay'] = $order->netbanking;
                                                                                $hdfc_details['bill_name'] = $order_billing_details->first_name . ' ' . $order_billing_details->last_name;
                                                                                $hdfc_details['bill_address'] = $order_billing_details->address_1 . ' ' . $order_billing_details->address_2;
                                                                                $hdfc_details['bill_city'] = $order_billing_details->city;
                                                                                $hdfc_details['bill_state'] = $order_billing_details->state;
                                                                                $hdfc_details['bill_postal_code'] = $order_billing_details->postcode;
                                                                                $hdfc_details['bill_country'] = Countries::model()->findbypk($order_billing_details->country)->country_name;
                                                                                $hdfc_details['bill_email'] = Yii::app()->session['user']['email'];
                                                                                $hdfc_details['bill_phone_number'] = Yii::app()->session['user']['phone_no_1'];

                                                                                $hdfc_details['ship_name'] = $order_shipping_detils->first_name . ' ' . $order_shipping_detils->last_name;
                                                                                $hdfc_details['ship_address'] = $order_shipping_detils->address_1 . ' ' . $order_shipping_detils->address_2;
                                                                                $hdfc_details['ship_city'] = $order_shipping_detils->city;
                                                                                $hdfc_details['ship_state'] = $order_shipping_detils->state;
                                                                                $hdfc_details['ship_postal_code'] = $order_shipping_detils->postcode;
                                                                                $hdfc_details['ship_country'] = Countries::model()->findbypk($order_shipping_detils->country)->country_name;
                                                                                $hdfc_details['ship_email'] = Yii::app()->session['user']['email'];
                                                                                $hdfc_details['bill_phone_number'] = Yii::app()->session['user']['phone_no_1'];
                                                                                $this->render('hdfcpay', array('hdfc_details' => $hdfc_details, 'aid' => '20951', 'sec' => 'b837f49de88e6be36f077b6928c43bf9'));
                                                                        } else if ($order->paypal != '') {

                                                                                $pid = time();
                                                                                // $totaltopay = round(Currency::model()->findBypk(2)->rate * $order->paypal, 2);
                                                                                $this->render('paypalpay', array('order' => $order->id, 'totaltopay' => $order->paypal, 'pid' => $pid));
                                                                        }

                                                                        // $this->redirect(array('OrderSuccess'));
                                                                        // $this->redirect(array('OrderFailed'));
                                                                } else {
                                                                        $this->redirect(array('OrderSuccess'));
                                                                }
                                                        } else {
                                                                var_dump($order->getErrors());
                                                                exit;
                                                        }
//
                                                }
                                        }
                                }
                                $this->render('checkout', array('carts' => $cart, 'deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'orderid' => $order_id, 'billing' => $billing));
                        } else {
                                $this->redirect(array('Cart/Mycart'));

//todo render a cart empty page here
                        }
                } else {
                        $this->redirect(array('site/login'));
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

        public function addOrder($bill_address_id, $ship_address_id, $cart, $order_id) {


                $model1 = $this->loadModel($order_id);


                $total_amt = $this->total($cart);
                $model1->ship_address_id = $ship_address_id;
                $model1->bill_address_id = $bill_address_id;
                $model1->total_amount = $total_amt;

                if ($model1->save(false)) {
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
                $model1->order_date = date('Y-m-d H:i:s');
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

        public function actionOrderSuccess($payid) {
                if (isset(Yii::app()->session['orderid']) && Yii::app()->session['user']['id'] != '') {
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        $userdetails = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $check_product_option = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id, 'status' => 1));

                        $wallet_history = WalletHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'type_id' => 4, 'ids' => $order->id));
                        if (!empty($order) && !empty($userdetails)) {
                                if ($order->payment_mode == 1 || $order->payment_mode == 4) {
                                        $userdetails->wallet_amt = $userdetails->wallet_amt - $order->wallet;
                                        $wallet_history->field2 = 1;
                                        $userdetails->save();
                                        $wallet_history->save();
                                }
                                if (!empty($check_product_option)) {
                                        foreach ($check_product_option as $product_options) {

                                                if ($product_options->option_id == 0) {
                                                        $product = Products::model()->findByPk($product_options->product_id);
                                                        $product->quantity = $product->quantity - $product_options->quantity;
                                                        $product->save(FALSE);
                                                } else {
                                                        $option_details = OptionDetails::model()->findByPk($product_options->option_id);
                                                        $option_details->stock = $option_details->stock - $product_options->quantity;
                                                        $option_details->save(FALSE);
                                                }
                                        }
                                }
                                $order->payment_status = 1;
                                $order->status = 1;
                                $order->transaction_id = $payid;
                                if ($order->save()) {

                                        $this->SuccessMail();
                                        $this->OrderHistory($order->id, 8, 'Order Placed');

                                        Yii::app()->session['user'] = $userdetails;
                                        unset(Yii::app()->session['orderid']);
                                        $this->render('order_success');
                                }
                        } else {
                                $this->redirect(array('OrderFailed'));
                        }
                } else {
                        $this->render('site/error');
                }
        }

        public function SuccessMail() {
                $order = Order::model()->findByPk(yii::app()->session['orderid']);
                $userdetails = UserDetails::model()->findByPk($order->user_id);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));
                $shiping_charge = ShippingCharges::model()->findByAttributes(array('country' => $user_address->country));
                //$user = $userdetails->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'Order Confirmation - Your Order with laksyah.com [' . $order->id . '] has been successfully placed!';
                $user_message = $this->renderPartial('_user_order_success_mail', array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = 'laksyah.com: New Order to admin # ' . $order->id;
                $admin_message = $this->renderPartial('_admin_order_success_mail', array('userdetails' => $userdetails, 'order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge), true);

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
// echo $user_message;
// echo $admin_message;
//unset(Yii::app()->session['orderid']);
// exit;
                mail($user, $user_subject, $user_message, $headers);
                mail($admin, $admin_subject, $admin_message, $headers);
        }

        /* Order Error Action */

        public function actionOrderFailed() {
                if (isset(Yii::app()->session['orderid']) && Yii::app()->session['user']['id'] != '') {
                        $order = Order::model()->findByPk(yii::app()->session['orderid']);
                        $userdetails = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $wallet_history = WalletHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'type_id' => 4, 'ids' => $order->id));

                        if ($order->payment_mode == 4) {

                                $wallet_history->field2 = 0;
                                $wallet_history->save();
                        }

                        $order->payment_status = 2;
                        $order->status = 3;
                        if ($order->save()) {

                                $this->ErrorMail($userdetails);
                                $this->OrderHistory($order->id, 9, 'Payment Failure');
                                Yii::app()->session['user'] = $userdetails;
                                unset(Yii::app()->session['orderid']);
                                $this->render('order_failed');
                        }
                } else {
                        $this->render('site/error');
                }
        }

        public function OrderHistory($id, $status, $status_comment) {
                $orderHistory = new OrderHistory;
                $orderHistory->order_id = $id;
                $orderHistory->order_status_comment = $status_comment;
                $orderHistory->order_status = $status;
                $orderHistory->shipping_type = 0;
                $orderHistory->tracking_id = 0;
                $orderHistory->date = date('Y-m-d H:i:s');
                $orderHistory->status = 1;
                $orderHistory->save(false);
        }

        /* ckeck out error mail  */

        public function ErrorMail($userdetails) {
                $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));
                $shiping_charge = ShippingCharges::model()->findByAttributes(array('country' => $user_address->country));
// $user = $userdetails->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'laksyah.com: Order No. ' . $order->id . ' :: Transaction Failure';
                $user_message = $this->renderPartial('_user_order_error_mail', array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge), true);


                $admin = 'sibys09@gmail.com';
                $admin_subject = 'laksyah.com: Order No. ' . $order->id . ' :: Transaction Failure';
                $admin_message = $this->renderPartial('_admin_order_error_mail', array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge), true);

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
// echo $user_message;
//  echo $admin_message;
//unset(Yii::app()->session['orderid']);
//  exit;
                mail($user, $user_subject, $user_message, $headers);
                mail($admin, $admin_subject, $admin_message, $headers);
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

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

}
