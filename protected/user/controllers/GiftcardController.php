<?php

class GiftcardController extends Controller {

        public function actionIndex($card_id) {
                Yii::app()->session['gift_card_detail'] = $card_id;
                $this->redirect('Address');
        }

        public function actionAddress() {
                if (isset(Yii::app()->session['user'])) {
                        $billing = new UserAddress;
                        $shipping = new UserAddress;
                        $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        if (isset($_POST['giftsubmit'])) {
                                if ($_REQUEST['bill_address'] == 0) {
                                        if (isset($_POST['UserAddress']['bill'])) {
                                                $billing_address = $this->addAddress($addresss, $billing, $_POST['UserAddress']['bill']);
                                                $bill_address_id = $billing_address;
                                                $this->AddCard($bill_address_id);
                                                $this->redirect('Payment');
                                        }
                                } else {
                                        $bill_address_id = $_REQUEST['bill_address'];
                                        $this->AddCard($bill_address_id);
                                        $this->redirect('Payment');
                                }
                        } else {
                                $this->render('bill_address', array('addresss' => $addresss, 'billing' => $billing, 'shipping' => $shipping));
                        }
                } else {
                        $this->redirect('Login');
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

}
