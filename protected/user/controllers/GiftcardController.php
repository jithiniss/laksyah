<?php

class GiftcardController extends Controller {

        public function actionIndex($card_id) {

                Yii::app()->session['gift_card_detail'] = $card_id;
                $this->redirect('Address');
        }

        public function actionAddress() {
                unset(Yii::app()->session['gift_card_option']);
                unset(Yii::app()->session['user_gift_id']);
//                if (isset(Yii::app()->session['user'])) {
//                        $billing = new UserAddress;
//                        $shipping = new UserAddress;
//                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
//                        if (isset($_POST['giftsubmit'])) {
//                                echo "dfghjdfg";
//                                exit;
//                                if ($_REQUEST['bill_address'] == 0) {
//                                        if (isset($_POST['UserAddress']['bill'])) {
//                                                $billing_address = $this->addAddress($addresss, $billing, $_POST['UserAddress']['bill']);
//                                                $bill_address_id = $billing_address;
//                                                $this->AddCard($bill_address_id);
//                                                $this->redirect('Payment');
//                                        }
//                                } else {
//                                        $bill_address_id = $_REQUEST['bill_address'];
//                                        $this->AddCard($bill_address_id);
//                                        $this->redirect('Payment');
//                                }
//                        } else {
//                                $this->render('bill_address', array('addresss' => $addresss, 'billing' => $billing, 'shipping' => $shipping));
//                        }
//                } else {
//                        $this->redirect('Login');
//                }
                if(isset(Yii::app()->session['user']['id'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $gift_limit = Extras::model()->findByPk(1);
                        if(!empty($gift_limit)) {
                                Yii::app()->session['gift_limit'] = $gift_limit;
                        }
                        $gift_rate = Extras::model()->findByPk(2);
                        if(!empty($gift_rate)) {
                                Yii::app()->session['gift_rate'] = $gift_rate;
                        }
                        $gift_user = new UserGifts;
                        $deafult_shipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->session['user']['id'], 'default_shipping_address' => 1));
                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        $billing = new UserAddress;
                        $shipping = new UserAddress;
//                              $order = Order::model()->findbypk(Yii::app()->session['orderid']);
                        $address_id = '';

                        if(isset($_POST['gift_form'])) {
                                $gift_user->attributes = $_POST['UserGifts'];
                                $gift_user->message = $_POST['UserGifts']['message'];
                                $gift_user->date = date('Y-m-d');
                                if(Yii::app()->session['user_gift_id'] == "") {
                                        if($gift_user->save()) {
                                                Yii::app()->session['user_gift_id'] = $gift_user->id;
                                        }
                                }
                        }
                        if($_POST['yt0']) {
                                $post_wallet = $_POST['wallet_amount'];
                                if($post_wallet != '') {
                                        $post_wallet = $post_wallet;
                                } else {
                                        $post_wallet = 0;
                                }
                                $post_total_pay = $_POST['total_pay'];


                                if($_REQUEST['bill_address'] == 0) {
                                        if(isset($_POST['UserAddress']['bill'])) {
                                                $billing_address = $this->addAddress($billing, $_POST['UserAddress']['bill']);
                                                $bill_address_id = $billing_address;
                                        }
                                } else {
                                        $bill_address_id = $_REQUEST['bill_address'];
                                }
                                if($_REQUEST['billing_same'] == NULL) {
                                        if($_REQUEST['ship_address'] == 0) {
                                                if(isset($_POST['UserAddress']['ship'])) {
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
                                if($shipp_address->country == 99) {
                                        $total_shipping_rate = 0;
                                } else {
                                        $get_zone = Countries::model()->findByPk($shipp_address->country);
                                        $get_total_weight = $this->GetTotalWeight();
                                        $value = explode('.', $get_total_weight);
                                        if(strlen($value[1]) == 1) {
                                                $value[1] = $value[1] . '0';
                                        }
                                        if($value[1] <= 50) {
                                                $total_weight = $value[0] + .5;
                                        } else {
                                                $total_weight = $value[0] + 1;
                                        }


                                        /* 13% Fuel Charge and 15 % Service chARGE is applicable */
                                        $shipping_rate = ShippingCharges::model()->findByAttributes(array('zone' => $get_zone->zone, 'weight' => $total_weight));
                                        if(!empty($shipping_rate)) {
                                                $fuel_charge = $shipping_rate->shipping_rate * .13;
                                                $service_charge = ($shipping_rate + $fuel_charge) * .15;
                                                $total_shipping_rate = ceil($shipping_rate + $fuel_charge + $service_charge);
                                        } else {
                                                $total_shipping_rate = 0;
                                        }
                                }
                                if($shipp_address->country == 99) {
                                        $postcode_exist = DtdcPostcode::model()->findByAttributes(array('postcode' => $shipp_address->postcode));
                                        if(empty($postcode_exist)) {
                                                Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address. Please choose some other post code");
                                                $this->redirect(array('CheckOut/CheckOut'));
                                        }
                                        //$this->renderPartial('_shipping_indian', array('shipping_charge' => $total_shipping_rate));
                                } else {
                                        if(empty($shipping_rate)) {
                                                Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
                                                $this->redirect(array('CheckOut/CheckOut'));
                                        }
                                }
//                                        if (empty($shipp_available)) {
//                                                Yii::app()->user->setFlash('shipp_availability', "Thre is no Shipping Option Available in your current shipping Address");
//                                                $this->redirect(array('CheckOut/CheckOut'));
//                                        }
                                if($_POST['wallet_amount'] != '') {
                                        $wallet = $_POST['wallet_amount'];
                                } else {
                                        $wallet = 0;
                                }
                                if(isset(Yii::app()->session['currency'])) {
                                        $currency_rate = Yii::app()->session['currency']['rate'];
                                } else {
                                        $currency_rate = 1;
                                }
                                $subtotal = $this->subtotal();

                                $discount = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid'], 'user_id' => Yii::app()->session['user']['id']));
                                if(!empty($discount)) {
                                        $coupen = Coupons::model()->findbypk($discount->coupon_id);
                                        if($coupen == 1) {
                                                $discount_rate = $discount->total_amount;
                                        } else {
                                                $discount_rate = 0;
                                        }
                                } else {
                                        $discount_rate = 0;
                                }

                                $granttotal = round(($currency_rate * $subtotal) + ($currency_rate * $shipping_charge->shipping_rate) - ($currency_rate * $discount_rate), 2);

                                $cwallet = Yii::app()->session['user']['wallet_amt'];
                                if(isset(Yii::app()->session['currency'])) {
                                        $currentwallet = round($cwallet * $currency_rate, 2);
                                } else {
                                        $currentwallet = $cwallet;
                                }

                                if($granttotal >= $currentwallet) {
                                        if($wallet_balance >= 0) {
                                                $total_balance_to_pay = $granttotal - $wallet;
                                        } else {
                                                $total_balance_to_pay = $granttotal - $currentwallet;
                                                $wallet = $currentwallet;
                                                $wallet_balance = $currentwallet - $wallet;
                                        }
                                } else {
                                        if($wallet_balance >= 0) {
                                                $total_balance_to_pay = $granttotal - $wallet;
                                                $wallet = $wallet;
                                        } else {
                                                $total_balance_to_pay = $granttotal - $currentwallet;
                                                $wallet = $granttotal;
                                                $wallet_balance = $currentwallet - $wallet;
                                        }
                                }


                                if($wallet != $post_wallet || $total_balance_to_pay != $post_total_pay) {
                                        Yii::app()->user->setFlash('checkout_error', "There an error found on checkout please fill carefully and check out again");
                                        $this->redirect(array('CheckOut/CheckOut'));
                                }
                                if($bill_address_id != '' && $ship_address_id != '') {
                                        $this->addOrder($bill_address_id, $ship_address_id, $cart);
                                        $order->shipping_method = $_REQUEST['shipping_value'];

                                        if($wallet > 0) {



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
                                                if($gift_packing > 0) {
                                                        $order->gift_option = 1;
                                                        $order->rate = $gift_packing;
                                                }
                                                if($post_total_pay == 0) {
                                                        $order->payment_mode = 1;
                                                        $order->wallet = $wallet;
                                                } else {
                                                        if($post_total_pay != 0 && $_POST['wallet_amount'] != 0) {
                                                                $order->payment_mode = 4;

                                                                if($_POST['payment_method'] == 2) {
                                                                        $order->netbanking = $post_total_pay;
                                                                        $order->wallet = $wallet;
                                                                } else if($_POST['payment_method'] == 3) {
                                                                        $order->paypal = $post_total_pay;
                                                                        $order->wallet = $wallet;
                                                                }
                                                        } else {
                                                                $order->payment_mode = $_POST['payment_method'];
                                                                if($_POST['payment_method'] == 2) {
                                                                        $order->netbanking = $post_total_pay;
                                                                } else if($_POST['payment_method'] == 3) {
                                                                        $order->paypal = $post_total_pay;
                                                                }
                                                        }
                                                }


//$order->payment_status = 1;
                                                $order->bill_address_id = $bill_address_id;
                                                $order->ship_address_id = $ship_address_id;
                                                $order->order_date = date('Y-m-d H:i:s');
                                                if($order->save()) {
                                                        Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                                        $this->updateorderproduct($order->id);
                                                        if($user->save()) {
                                                                Yii::app()->session['user'] = $user;
                                                        }
                                                        if($discount_rate != 0) {
                                                                $this->updatecoupon($coupen);
                                                        }

                                                        $this->updateorderproduct($order->id);


                                                        $this->redirect(array('OrderSuccess'));
                                                }
                                        } else {

                                                Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                                                $gift_packing = $this->giftpack($order->id);
                                                if($gift_packing > 0) {
                                                        $order->gift_option = 1;
                                                        $order->rate = $gift_packing;
                                                }
                                                if($discount_rate != 0) {
                                                        $this->updatecoupon($coupen);
                                                }

                                                $order->payment_mode = $_POST['payment_method'];
                                                if($_POST['payment_method'] == 2) {
                                                        $order->netbanking = $_REQUEST['total_pay'];
                                                        $order->paypal = "";
                                                } else if($_POST['payment_method'] == 3) {
                                                        $order->paypal = $_REQUEST['total_pay'];
                                                        $order->netbanking = "";
                                                }

//  $order->payment_status = 1;
                                                $order->bill_address_id = $bill_address_id;
                                                $order->ship_address_id = $ship_address_id;
                                                $order_billing_details = UserAddress::model()->findBypk($bill_address_id);
                                                $order_shipping_detils = UserAddress::model()->findBypk($ship_address_id);
//  $order->status = 1;

                                                if($order->save()) {

                                                        $this->updateorderproduct($order->id);
//$this->redirect(array('OrderHistory'));
                                                        if($post_total_pay != 0) {

                                                                /* payment action goes here */
//                                                                        if (isset(Yii::app()->session['currency'])) {
//                                                                                $order->netbanking = $order->netbanking / Yii::app()->session['currency']->rate;
//                                                                        } else {
//                                                                                $order->netbanking = $order->netbanking;
//                                                                        }

                                                                if($order->netbanking != '') {
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
                                                                } else if($order->paypal != '') {

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
                        $this->render('bill_address', array('deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'gift_user' => $gift_user, 'billing' => $billing));

//todo render a cart empty page here
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
                if($model->validate()) {
                        if($model->save()) {
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
                if(!empty($model)) {
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
                if($new_card->validate()) {
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

}
