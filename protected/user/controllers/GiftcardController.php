<?php

class GiftcardController extends Controller {

        public function actionIndex($card_id) {

                Yii::app()->session['gift_card_detail'] = $card_id;
                $this->redirect('Address');
        }

        public function actionAddress() {
                Yii::app()->session['gift_card_option'] = $_POST['gift_id'];
                Yii::app()->session['user_gift_id'];
                if (isset(Yii::app()->session['user']['id'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $gift_limit = Extras::model()->findByPk(1);
                        if (!empty($gift_limit)) {
                                Yii::app()->session['gift_limit'] = $gift_limit;
                        }
                        $gift_rate = Extras::model()->findByPk(2);
                        if (!empty($gift_rate)) {
                                Yii::app()->session['gift_rate'] = $gift_rate;
                        }
                        $gift_user = new UserGifts;
                        $deafult_shipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->session['user']['id'], 'default_shipping_address' => 1));
                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        $billing = new UserAddress;
                        $shipping = new UserAddress;
//                              $order = Order::model()->findbypk(Yii::app()->session['orderid']);
                        $address_id = '';

                        if (isset($_POST['gift_form'])) {
                                $gift_user->attributes = $_POST['UserGifts'];

                                $gift_user->message = $_POST['UserGifts']['message'];
                                $gift_user->date = date('Y-m-d');
                                if (Yii::app()->session['user_gift_id'] == "") {
                                        if ($gift_user->save()) {
                                                Yii::app()->session['user_gift_id'] = $gift_user->id;
                                        }
                                }
                        }
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
                                        $this->addOrder($bill_address_id, $ship_address_id, $cart);
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
                        $this->render('bill_address', array('deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'gift_user' => $gift_user, 'billing' => $billing, 'gift_id' => Yii::app()->session['gift_card_detail']));

//todo render a cart empty page here
                } else {
                        Yii::app()->session['gift_card_option'] = $_POST['gift_id'];
                        Yii::app()->session['user_gift_id'] = $_POST['gift_id'];
                        $this->redirect(array('site/login'));
                }
        }

        public function addAddress($addresss, $model, $data) {

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
                        $this->render('bill_address', array('addresss' => $addresss, 'billing' => $model));
                        exit;
                }
        }

        public function actionPayment() {
                $model = UserGiftscardHistory::model()->findByPk(Yii::app()->session['user_gift_id']);
                $voucher_coupon = new Coupons;
                if (!empty($model)) {
                        $model->unique_code = substr(str_shuffle(md5(time())), 0, 10);
                        $model->save();
                        $voucher_coupon->gift_card_amount = $model->amount;
                        $voucher_coupon->discount = $model->amount;
                        $voucher_coupon->user_id = Yii::app()->session['user_id'];
                        $voucher_coupon->gift_card_id = $model->unique_code;
                        $voucher_coupon->type = 2;
                        $voucher_coupon->save();
                        $user = Yii::app()->session['user']['email'];
//                                $to = $user->email;
//                                $subject = "Gift Card";
//
//                                $message = "
//                                                <html>
//                                                <head>
//                                                <title>Gift Card</title>
//                                                </head>
//                                                <body>
//                                                <p>Dear, " . $user->first_name . ' ' . $user->last_name . " Your gift card id is".$model->unique_code </p>
//                                                <table>
//
//                                                <tr><td><a href='http://localhost/laksyah/index.php'>Click Here To view </a></td></tr>
//                                                </table>
//                                                </body>
//                                                </html>
//                                                ";
//
//
//
//
//// Always set content-type when sending HTML email
//                                $headers = "MIME-Version: 1.0" . "\r\n";
//                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
//// More headers
//                                $headers .= 'From: <>' . "\r\n";
//                                $headers .= 'Cc: ' . "\r\n";
//
//                                mail($to, $subject, $message, $headers);
                        $this->render('card_purchase', array('model' => $model));
                }
        }

        public function AddCard($bill_address_id) {
                $new_card = new UserGiftscardHistory;
                $new_card->user_id = Yii::app()->session['user']['id'];
                $new_card->bill_address_id = $bill_address_id;
                $new_card->giftcard_id = Yii::app()->session['gift_card_detail'];
                $card_details = GiftCard::model()->findByPk(Yii::app()->session['gift_card_detail']);
                $new_card->amount = $card_details->amount;
                $new_card->status = 1;
                $new_card->date = date('y-m-d');
                if ($new_card->validate()) {
                        $new_card->save();
                        Yii::app()->session['user_gift_id'] = $new_card->id; /* usergiftcard history table data id for unique id saving after paymrnt */
                        return true;
                } else {
                        return false;
                        echo "error";
                        exit;
                        //error
                }
        }

        public function actionCheckOutGiftcard() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $granttotal = $_POST['grant_total_gift'];
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $deafult_shipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->session['user']['id'], 'default_shipping_address' => 1));
                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        $billing = new UserAddress;
                        $shipping = new UserAddress;
                        $gift_user = new UserGifts;
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
                                                $billing_address = $this->addAddressList($billing, $_POST['UserAddress']['bill']);
                                                $bill_address_id = $billing_address;
                                        }
                                } else {
                                        $bill_address_id = $_REQUEST['bill_address'];
                                }
                                if ($_REQUEST['billing_same'] == NULL) {
                                        if ($_REQUEST['ship_address'] == 0) {
                                                if (isset($_POST['UserAddress']['ship'])) {
                                                        $shipping_address = $this->addAddressList($shipping, $_POST['UserAddress']['ship']);
                                                        $ship_address_id = $shipping_address;
                                                }
                                        } else {
                                                $ship_address_id = $_REQUEST['ship_address'];
                                        }
                                } else {
                                        $ship_address_id = $bill_address_id;
                                }
                                $shipp_address = UserAddress::model()->findByPk($ship_address_id);
                                if ($shipp_address->country == 99) {
                                        $total_shipping_rate = 0;
                                } else {
                                        $get_zone = Countries::model()->findByPk($shipp_address->country);

                                        $get_total_weight = $this->GetTotalWeight($_POST['gift_card_id']);
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
                                                $service_charge = ($shipping_rate->shipping_rate + $fuel_charge) * .15;
                                                $total_shipping_rate = ceil($shipping_rate->shipping_rate + $fuel_charge + $service_charge);
                                        } else {
                                                $total_shipping_rate = 0;
                                        }
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
                                $cwallet = Yii::app()->session['user']['wallet_amt'];
                                $granttotal = $_POST['grant_total_gift'];
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
                                if (isset(Yii::app()->session['currency'])) {
                                        if (Yii::app()->session['currency']['rate'] == 1) {
                                                $total_balance_to_pay = $total_balance_to_pay;
                                        } else {
                                                $total_balance_to_pay = ceil($total_balance_to_pay / Yii::app()->session['currency']['rate']);
                                        }
                                }
//                                if ($wallet != $post_wallet || $total_balance_to_pay != $post_total_pay) {
//                                        echo 'hiiii';
//                                        exit;
//                                        Yii::app()->user->setFlash('checkout_error', "There an error found on checkout please fill carefully and check out again");
//                                        $this->redirect(array('GiftCard/CheckOutGiftcard'));
//                                }

                                if ($bill_address_id != '' && $ship_address_id != '') {
                                        $order = new Order;
                                        $order->shipping_method = $_REQUEST['shipping_value'];
                                        if ($shipp_address->country == 99) {
                                                $postcode_exist = DtdcPostcode::model()->findByAttributes(array('postcode' => $shipp_address->postcode));
                                                if (empty($postcode_exist)) {
                                                        Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address. Please choose some other post code");
                                                }
                                        } else {
                                                if (empty($shipping_rate)) {
                                                        Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
                                                }
                                        }

                                        if ($wallet > 0) {
                                                /* wallet entry starts */
                                                $gift_grant_total = $_POST['grant_total_gift'];
//                                                var_dump($_POST['grant_total_gift']);
//                                                exit;
                                                if ($_POST['wallet_amount'] = $gift_grant_total) {
                                                        if ($_POST['gft_check_bx'] != '') {
                                                                $pack = Extras::model()->findByPk(2);
                                                                $order->gift_option = 1;
                                                                $order->rate = $pack->value;
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
                                                        $order->bill_address_id = $bill_address_id;
                                                        $order->ship_address_id = $ship_address_id;
                                                        $order->order_date = date('Y-m-d H:i:s');
                                                        $order->DOC = date('Y-m-d');
                                                        $order->total_amount = $granttotal;
                                                        $order->laksyah_gift = 1;
                                                        $order->laksyah_gift_transportaion = $_POST['radioName'];
                                                        $order->gift_card_id = $_POST['gift_card_id'];
//                                                        if ($order->validate()) {

                                                        if (Yii::app()->user->hasFlash('shipp_availability') != 1) {
                                                                if ($order->save()) {
                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                        $wallet_amount = new WalletHistory;
                                                                        $wallet_amount->user_id = Yii::app()->session['user']['id'];
                                                                        $wallet_amount->type_id = 4;
                                                                        $wallet_amount->amount = $wallet;
                                                                        $wallet_amount->entry_date = date('Y-m-d H:i:s');
                                                                        $wallet_amount->credit_debit = 2;
                                                                        $wallet_amount->balance_amt = $currentwallet - $wallet;
                                                                        $wallet_amount->ids = $order->id;
                                                                        $wallet_amount->field2 = 0;
                                                                        $wallet_amount->save(FALSE);

                                                                        Yii::app()->session['orderid'] = $order->id;

                                                                        $this->redirect(array('OrderSuccess'));
                                                                        /* manual check for insertion */
                                                                } else {
                                                                        $order->save();
                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                        $wallet_amount = new WalletHistory;
                                                                        $wallet_amount->user_id = Yii::app()->session['user']['id'];
                                                                        $wallet_amount->type_id = 4;
                                                                        $wallet_amount->amount = $wallet;
                                                                        $wallet_amount->entry_date = date('Y-m-d H:i:s');
                                                                        $wallet_amount->credit_debit = 2;
                                                                        $wallet_amount->balance_amt = $currentwallet - $wallet;
                                                                        $wallet_amount->ids = $order->id;
                                                                        $wallet_amount->field2 = 0;
                                                                        $wallet_amount->save(FALSE);

                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                        $this->redirect(array('OrderSuccess'));
                                                                }
                                                        } else {
                                                                if ($order->save()) {
                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                        $this->redirect(array('OrderSuccess'));
                                                                }
                                                        }
//                                                        }
                                                } else {
                                                        if ($_POST['gft_check_bx'] != '') {
                                                                $pack = Extras::model()->findByPk(2);
                                                                $order->gift_option = 1;
                                                                $order->rate = $pack->value;
                                                        }
                                                        $order->payment_mode = $_POST['payment_method'];
                                                        if ($_POST['payment_method'] == 2) {
                                                                $order->netbanking = $_REQUEST['total_pay'];
                                                                $order->paypal = "";
                                                        } else if ($_POST['payment_method'] == 3) {
                                                                $order->paypal = $_REQUEST['total_pay'];
                                                                $order->netbanking = "";
                                                        }
                                                        $order->bill_address_id = $bill_address_id;
                                                        $order->ship_address_id = $ship_address_id;
                                                        $order->laksyah_gift = 1;
                                                        $order->laksyah_gift_transportaion = $_POST['radioName'];
                                                        $order->gift_card_id = $_POST['gift_card_id'];
                                                        $order->DOC = date('Y-m-d');
                                                        $order->total_amount = $granttotal;
                                                        $order->order_date = date('Y-m-d H:i:s');
                                                        $order->user_id = Yii::app()->session['user']['id'];
                                                        $order_billing_details = UserAddress::model()->findBypk($bill_address_id);
                                                        $order_shipping_detils = UserAddress::model()->findBypk($ship_address_id);
                                                        if ($order->validate()) {

                                                                if (Yii::app()->user->hasFlash('shipp_availability') != 1) {

                                                                        if ($order->save()) {
                                                                                Yii::app()->session['orderid'] = $order->id;

                                                                                /* payment action goes here */

                                                                                if ($order->netbanking != '') {
                                                                                        $hdfc_details = array();
                                                                                        $hdfc_details['description'] = 'Laksyah Giftcard';
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
                                                                                        if (isset(Yii::app()->session['currency'])) {
                                                                                                if (Yii::app()->session['currency']['currency_code'] == 'USD') {
                                                                                                        $paypaltotalamount = $order->paypal;
                                                                                                } else {
                                                                                                        $usdvalue = Currency::model()->findByPk(2);
                                                                                                        $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                                }
                                                                                        } else {
                                                                                                $usdvalue = Currency::model()->findByPk(2);
                                                                                                $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                        }
                                                                                        $this->render('paypalpay', array('order' => $order->id, 'totaltopay' => $paypaltotalamount, 'pid' => $pid));
                                                                                }
                                                                        } else {
                                                                                Yii::app()->session['orderid'] = $order->id;
                                                                                $this->redirect(array('OrderSuccess'));
                                                                        }
                                                                } else {
                                                                        if ($order->save()) {
                                                                                Yii::app()->session['orderid'] = $order->id;
                                                                                if ($post_total_pay != 0) {
                                                                                        /* payment action goes here */

                                                                                        if ($order->netbanking != '') {
                                                                                                $hdfc_details = array();
                                                                                                $hdfc_details['description'] = 'Laksyah Giftcard';
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
                                                                                                if (isset(Yii::app()->session['currency'])) {
                                                                                                        if (Yii::app()->session['currency']['currency_code'] == 'USD') {
                                                                                                                $paypaltotalamount = $order->paypal;
                                                                                                        } else {
                                                                                                                $usdvalue = Currency::model()->findByPk(2);
                                                                                                                $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                                        }
                                                                                                } else {
                                                                                                        $usdvalue = Currency::model()->findByPk(2);
                                                                                                        $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                                }
                                                                                                $this->render('paypalpay', array('order' => $order->id, 'totaltopay' => $paypaltotalamount, 'pid' => $pid));
                                                                                        }
                                                                                } else {
                                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                                        $this->redirect(array('OrderSuccess'));
                                                                                }
                                                                        }
                                                                }
                                                        } else {

                                                                var_dump($order->getErrors());
                                                                exit;
                                                        }
                                                }
                                        } else {

                                                if ($_POST['gft_check_bx'] != '') {
                                                        $pack = Extras::model()->findByPk(2);
                                                        $order->gift_option = 1;
                                                        $order->rate = $pack->value;
                                                }
                                                $order->payment_mode = $_POST['payment_method'];
                                                if ($_POST['payment_method'] == 2) {
                                                        $order->netbanking = $_REQUEST['total_pay'];
                                                        $order->paypal = "";
                                                } else if ($_POST['payment_method'] == 3) {
                                                        $order->paypal = $_REQUEST['total_pay'];
                                                        $order->netbanking = "";
                                                }
                                                $order->bill_address_id = $bill_address_id;
                                                $order->ship_address_id = $ship_address_id;
                                                $order->laksyah_gift = 1;
                                                $order->laksyah_gift_transportaion = $_POST['radioName'];
                                                $order->gift_card_id = $_POST['gift_card_id'];
                                                $order->DOC = date('Y-m-d');
                                                $order->total_amount = $granttotal;
                                                $order->order_date = date('Y-m-d H:i:s');
                                                $order->user_id = Yii::app()->session['user']['id'];
                                                $order_billing_details = UserAddress::model()->findBypk($bill_address_id);
                                                $order_shipping_detils = UserAddress::model()->findBypk($ship_address_id);
                                                if ($order->validate()) {

                                                        if (Yii::app()->user->hasFlash('shipp_availability') != 1) {

                                                                if ($order->save()) {
                                                                        Yii::app()->session['orderid'] = $order->id;

                                                                        /* payment action goes here */

                                                                        if ($order->netbanking != '') {
                                                                                $hdfc_details = array();
                                                                                $hdfc_details['description'] = 'Laksyah Giftcard';
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
                                                                                if (isset(Yii::app()->session['currency'])) {
                                                                                        if (Yii::app()->session['currency']['currency_code'] == 'USD') {
                                                                                                $paypaltotalamount = $order->paypal;
                                                                                        } else {
                                                                                                $usdvalue = Currency::model()->findByPk(2);
                                                                                                $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                        }
                                                                                } else {
                                                                                        $usdvalue = Currency::model()->findByPk(2);
                                                                                        $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                }
                                                                                $this->render('paypalpay', array('order' => $order->id, 'totaltopay' => $paypaltotalamount, 'pid' => $pid));
                                                                        }
                                                                } else {
                                                                        Yii::app()->session['orderid'] = $order->id;
                                                                        $this->redirect(array('OrderSuccess'));
                                                                }
                                                        } else {
                                                                if ($order->save()) {

                                                                        if ($post_total_pay != 0) {
                                                                                /* payment action goes here */

                                                                                if ($order->netbanking != '') {
                                                                                        $hdfc_details = array();
                                                                                        $hdfc_details['description'] = 'Laksyah Giftcard';
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
                                                                                        if (isset(Yii::app()->session['currency'])) {
                                                                                                if (Yii::app()->session['currency']['currency_code'] == 'USD') {
                                                                                                        $paypaltotalamount = $order->paypal;
                                                                                                } else {
                                                                                                        $usdvalue = Currency::model()->findByPk(2);
                                                                                                        $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                                }
                                                                                        } else {
                                                                                                $usdvalue = Currency::model()->findByPk(2);
                                                                                                $paypaltotalamount = round($order->paypal * $usdvalue->rate, 2);
                                                                                        }
                                                                                        $this->render('paypalpay', array('order' => $order->id, 'totaltopay' => $paypaltotalamount, 'pid' => $pid));
                                                                                }
                                                                        } else {
                                                                                Yii::app()->session['orderid'] = $order->id;
                                                                                $this->redirect(array('OrderSuccess'));
                                                                        }
                                                                }
                                                        }
                                                } else {

                                                        var_dump($order->getErrors());
                                                        exit;
                                                }
                                        }
                                }
                        }
                        $this->render('bill_address', array('deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'billing' => $billing, 'gift_user' => $gift_user));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        /* addresslist for checkout */

        public function actionOrderSuccess($payid, $tid, $amt) {
                if (isset(Yii::app()->session['orderid']) && Yii::app()->session['user']['id'] != '') {
                        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
                        $userdetails = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $check_product_option = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id, 'status' => 1));

                        $wallet_history = WalletHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'type_id' => 4, 'ids' => Yii::app()->session['orderid']));
                        if (!empty($order) && !empty($userdetails)) {
                                if ($order->payment_mode == 1 || $order->payment_mode == 4) {
                                        $userdetails->wallet_amt = $userdetails->wallet_amt - $order->wallet;
                                        $userdetails->save();
                                        $wallet_history->field1 = 1;
                                        $wallet_history->save(FALSE);
                                }

                                $order->payment_status = 1;
                                $order->status = 1;
                                $order->transaction_id = $payid;
                                if ($order->save()) {

                                        $this->SuccessMail();
                                        $this->OrderHistory($order->id, 8, 'Order Placed');

                                        Yii::app()->session['user'] = $userdetails;
                                        $this->render('payment_success', ['payid' => $payid, 'tid' => $tid, 'amt' => $amt]);
                                }
                        } else {
                                $this->redirect(array('OrderFailed'));
                        }
                } else {
                        //echo Yii::app()->session['orderid'] . ' ' . Yii::app()->session['user']['id'];
                        //  exit;
                        $this->redirect(array('site/error'));
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

        public function SuccessMail() {
                $order = Order::model()->findByPk(yii::app()->session['orderid']);
                $userdetails = UserDetails::model()->findByPk($order->user_id);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));
                $shiping_charge = ShippingCharges::model()->findByAttributes(array('country' => $user_address->country));
                $user = $userdetails->email;

                $user_subject = 'Order Confirmation - Your Order with laksyah.com [' . $order->id . '] has been successfully placed!';
                $user_message = $this->renderPartial('_user_order_success_mail', array('order' => $order, 'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'shiping_charge' => $shiping_charge), true);

                $admin = AdminUser::model()->findByPk(4)->email;
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

        public function addAddressList($model, $data) {

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

        public function GetTotalWeight($gift_id) {
                $gifts = GiftCard::model()->findByPk($gift_id);
                if (!empty($gifts)) {
                        $total_weight = $gifts->weight;
                        return $total_weight;
                } else {
                        return 0;
                }
        }

        public function actionGetshippingcharge() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $country = $_POST['country'];
                        $gift_card_id = $_POST['gift_card_id'];
                        $gift_pack_id = $_POST['gift_pack_id'];

                        if ($country == 99) {
                                $total_shipping_rate = 0;
                        } else {
                                $get_zone = Countries::model()->findByPk($country);
                                $get_total_weight = $this->GetTotalWeight();

                                $value = explode('.', $get_total_weight);
                                if (strlen($value[1]) == 1) {
                                        $value [1] = $value[1] . '0';
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

                                        $service_charge = ($shipping_rate->shipping_rate + $fuel_charge) * .15;
                                        $total_shipping_rate = ceil($shipping_rate->shipping_rate + $fuel_charge + $service_charge);
                                } else {
                                        $total_shipping_rate = 0;
                                }
                        }


                        $giftcards = GiftCard::model()->findByPk($gift_card_id);
                        if ($gift_pack_id == '') {
                                $subtotal = $giftcards->amount;
                        } else {
                                $pack = Extras::model()->findByPk(2);
                                $subtotal = $giftcards->amount + $pack->value;
                        }
                        $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid']));
                        $grant_total = ceil($subtotal + $total_shipping_rate);
                        $totalpay = $subtotal + $total_shipping_rate;
                        if (isset(Yii::app()->session['currency'])) {
                                if (Yii::app()->session ['currency']['rate'] == 1) {
                                        $totalpay = $totalpay;
                                } else {
                                        $totalpay = ceil($totalpay / Yii::app()->session['currency']['rate']);
                                }
                        }
                        $grant_total_val = $grant_total;
                        $grant_total = Yii::app()->Currency->convert($grant_total);


                        if (!empty($shipping_rate)) {
                                $ship_amount = Yii::app()->Currency->convert($total_shipping_rate);
                                $array = array('granttotal' => $grant_total, 'grant_total_val' => $grant_total_val, 'totalpay' => $totalpay, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        } else {
                                $ship_amount = 0;
                                $array = array('granttotal' => $grant_total, 'grant_total_val' => $grant_total_val, 'shippingcharge' => $ship_amount, 'subtotal' => $sub_total);
                                $json = CJSON::encode($array);
                                echo $json;
                        }
                }
        }

        public function actionTotalcalculate() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $wallet = $_POST['wallet'];
                        $gift_card_id = $_POST['gift_card_id'];
                        $gift_pack_id = $_POST['gift_pack_id'];
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
                                        $value [1] = $value[1] . '0';
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
                                        $service_charge = ($shipping_rate->shipping_rate + $fuel_charge) * .15;
                                        $total_shipping_rate = ceil($shipping_rate->shipping_rate + $fuel_charge + $service_charge);
                                } else {
                                        $total_shipping_rate = 0;
                                }
                        }

                        $giftcards = GiftCard::model()->findByPk($gift_card_id);
                        if ($gift_pack_id == '') {
                                $subtotal = $giftcards->amount;
                        } else {
                                $pack = Extras::model()->findByPk(2);
                                $subtotal = $giftcards->amount + $pack->value;
                        }
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
                                if (Yii::app()->session ['currency']['rate'] == 1) {
                                        $totalamount = $totalamount;
                                } else {
                                        $totalamount = ceil($totalamount / Yii::app()->session['currency']['rate']);
                                }
                        }
                        if (isset(Yii::app()->session['currency'])) {
                                if (Yii::app()->session['currency']->symbol != "") {
                                        $total_balance_to_pay = '<i class="fa ' . Yii::app()->session['currency']['symbol'] . '"></i>' . round($total_balance_to_pay, 2);
                                        $wallet_balance = '<i class="fa ' . Yii::app()->session['currency']['symbol'] . '"></i>' . round($wallet_balance, 2);
                                } else {
                                        $total_balance_to_pay = round($total_balance_to_pay, 2) . " " . Yii::app()->session['currency']->currency_code;

                                        $wallet_balance = round($wallet_balance, 2) . " " . Yii::app()->session['currency']->currency_code;
                                }
                        } else {
                                $total_balance_to_pay = '<i class="fa fa-inr"></i>' . round($total_balance_to_pay, 2);
                                $wallet_balance = '<i class="fa fa-inr"></i>' . round($wallet_balance, 2);
                        }
                        $array = array('totalamounttopay' => $total_balance_to_pay, 'wallet_balance' => $wallet_balance, 'wallet' => $wallet, 'total' => $totalamount);
                        $json = CJSON::encode($array);
                        echo $json;
                }
        }

}
