<?php

class MyaccountController extends Controller {

//        public function init() {
//
////var_dump(Yii::app()->session['post']['admin']);
////die;
//                if (!isset(Yii::app()->session['user'])) {
//
//                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
//                }
//        }

        public function actionIndex() {


                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $this->render('myaccount');
                }
        }

        public function actionMywishlists() {

                if (!isset(Yii::app()->session['user'])) {

                        Yii::app()->session['wishlist_user'] = 1;
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $wishlists = UserWishlist::model()->findAllByAttributes(array(), array('select' => 't.prod_id', 'distinct' => true, 'condition' => 'user_id = ' . Yii::app()->session['user']['id']));
                        $this->render('mywishlists', array('wishlists' => $wishlists));
                }
        }

        public function actionRemoveMywishlists($pid) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        UserWishlist::model()->deleteAllByAttributes(array('prod_id' => $pid, 'user_id' => Yii::app()->session['user']['id']));
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionMyorders() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $myorder = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 1));
                        $this->render('myorder', array('myorders' => $myorder));
                }
        }

        public function actionOrderitems($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $myorder = Order::model()->findByPk($id);
                        $this->render('orders', array('myorders' => $myorder));
                }
        }

        public function actionSizeChartType($m = '') {


                if (!isset(Yii::app()->session['user'])) {

                        Yii::app()->session['measure_details'] = $m;
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $decrypt = $this->encrypt_decrypt('decrypt', $m);

                        $mstr = explode(",", $decrypt);
                        $a = array();
                        foreach ($mstr as $nstr) {
                                $narr = explode("=", $nstr);
                                $narr[0] = str_replace("\x98", "", $narr[0]);
                                $ytr[1] = $narr[1];
                                $a[$narr[0]] = $ytr[1];
                        }
                        $enquiry_id = $a['enquiry_id'];
                        $history_id = $a['history_id'];


                        $enquery = ProductEnquiry::model()->findBypk($enquiry_id);
                        $history = CelibStyleHistory::model()->findBypk($history_id);
                        if (empty($enquery) && empty($history)) {

                        } else {
                                $enquery->user_id = Yii::app()->session['user']['id'];
                                $enquery->save(FALSE);
                        }
                }
//  if(Yii::app()->session['measure_details'] != "") {
                $product_details = Products::model()->findByPk($enquery->product_id);
//  }
                $model = new UserSizechart;

                if (isset($_POST['UserSizechart'])) {

                        $model->attributes = $_POST['UserSizechart'];

                        $model->product_name = $_POST['UserSizechart']['product_name'];
                        $model->product_code = $_POST['UserSizechart']['product_code'];
                        $model->type = $_POST['UserSizechart']['type'];

                        if ($model->type == 1) {
                                $model->unit = 2;
                                $model->standerd = $_POST['UserSizechart']['standerd'];
                        } else if ($model->type == 2) {
                                $model->unit = $_POST['UserSizechart']['unit'];
                                $model->standerd = 0;
                                if ($sizechart->unit == 1) {
                                        $model = $this->inchToCm($model, 1);
                                }
                                $model->comments = $_POST['UserSizechart']['comments'];
                        }
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->date = date('Y-m-d');
                        $model->enq_id = $_POST['UserSizechart']['enq_id'];
                        $model->enq_history_id = $_POST['UserSizechart']['enq_history_id'];
                        $model->product_name = $_POST['UserSizechart']['product_name'];
                        $model->product_code = $_POST['UserSizechart']['product_code'];
                        $model->type = $_POST['UserSizechart']['type'];
                        $model->comments = $_POST['UserSizechart']['comments'];

                        if ($model->save()) {
                                if (!empty($enquery) && !empty($history)) {
                                        $enq_history_update = CelibStyleHistory::model()->findByAttributes(array('enq_id' => $model->enq_id, 'id' => $model->enq_history_id));
                                        $enq_history_update->measurement_id = $model->id;
                                        if ($enq_history_update->save()) {
                                                Yii::app()->session['measure_details'] = '';
                                                unset(Yii::app()->session['measure_details']);
// $this->ProductEnquiryMail($model, $enq_history_update);
                                        }
                                }
                                Yii::app()->user->setFlash('meas_success', " Your Measurement Successfully Saved");
                                $this->redirect(array('Myaccount/SizeChartType'));
                        }
                        $this->render('size_type', array('model' => $model));
                }
                $this->render('size_type', array('model' => $model, 'product_details' => $product_details, 'enquery' => $enquery, 'history' => $history));
        }

        public function ProductEnquiryMail($model, $enq_history_update) {
//$to = 'rejin@intersmart.in';

                $toclient = ProductEnquiry::model()->findByPk($enq_history_update->enq_id)->email;
                $toadmin = AdminUser::model()->findByPk(4)->email;
                $enq_data = ProductEnquiry::model()->findByPk($enq_history_update->enq_id);

                $subject = 'Product Enquiry';
                $message = $this->renderPartial('mail/_product_enquiry_mail_client', array('model' => $model, 'enq_data' => $enq_data), true);

                $message1 = $this->renderPartial('mail/_product_enquiry_mail_admin', array('model' => $model, 'enq_data' => $enq_data), true);
// echo $message;
// echo $message1;
// exit;
// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                $headers .= 'From: <store@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
//  echo $message;
//  exit();
                mail($toclient, $subject, $message, $headers);
                mail($toadmin, $subject, $message1, $headers);
        }

        public function actionSizeChartList() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $chart = UserSizechart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'id DESC'));
                        $this->render('size_chart_list', array('chart' => $chart));
                }
        }

        public function actionSizeChart($type) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $user_size_chart = new UserStandardSizechart;
                        $model = new UserSizechart;
                        if (isset($_POST['UserSizechart'])) {
                                $model->attributes = $_POST['UserSizechart'];
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->date = date('Y-m-d');
                                if ($model->validate()) {
                                        if ($model->save()) {
                                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/Myaccount/SizeChartList/type/' . $type);
                                        }
                                }
                        }
                        if ($type == 0) {
                                $model = $this->inchToCm($model, 0);
                        }
                        $this->render('size_chart', array('model' => $model, 'user_size_chart' => $user_size_chart));
                }
        }

        public function inchToCm($model, $type = 1) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        foreach ($model->attributes as $attribute => $key) {
                                if ($attribute == 'id' || $attribute == 'user_id' || $attribute == 'date' || $attribute == 'product_name' || $attribute == 'product_code' || $attribute == 'type' || $attribute == 'unit' || $attribute == 'standerd') {

                                } else {
                                        if ($key != '' && $key != 0) {
                                                if ($type == 0) {
                                                        $val = $key / 2.54;
                                                } else {
                                                        $val = $key * 2.54;
                                                }
                                                $model->$attribute = $val;
                                        }
                                }
                        }
                        return $model;
                }
        }

        public function actionCopyChart($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserSizechart::model()->findByPk(array('id' => $id));
                        if (!empty($model)) {
                                $sizechart = new UserSizechart;
                                if (isset($_POST['UserSizechart'])) {

                                        $sizechart->attributes = $_POST['UserSizechart'];
                                        $sizechart->product_name = $model->product_name;
                                        $sizechart->product_code = $model->product_code;
                                        $sizechart->type = $model->type;
                                        if ($sizechart->type == 1) {
                                                $sizechart->unit = 2;
                                        } else if ($sizechart->type == 2) {
                                                $sizechart->unit = $_POST['UserSizechart']['unit'];

                                                $sizechart->standerd = 0;
                                                if ($sizechart->unit == 1) {
                                                        $model = $this->inchToCm($model, 1);
                                                }
                                        }
                                        $sizechart->user_id = Yii::app()->session['user']['id'];
                                        $sizechart->date = date('Y-m-d');
                                        if ($sizechart->validate()) {
                                                if ($sizechart->save()) {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Myaccount/SizeChartList/type/' . $type);
                                                }
                                        }
                                }
//                        if ($type == 0) {
//                                $sizechart = $this->inchToCm($sizechart, 0);
//                        }
                                if ($model->unit == 1) {
                                        $model = $this->inchToCm($model, 0);
                                }
                        }
                        $this->render('size_chart', array('model' => $model));
                }
        }

        public function actionViewChart($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserSizechart::model()->findByPk(array('id' => $id));
                        if (!empty($model)) {
                                if ($model->unit == 1) {
                                        $model = $this->inchToCm($model, 0);
                                }
                                $this->render('view_size_chart', array('model' => $model));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                }
        }

        public function actionProfile() {
                $model = UserDetails::model()->findByPk(array('id' => Yii::app()->session['user']['id']));
                $this->render('myprofile', array('model' => $model));
        }

        public function actionProfileedit() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserDetails::model()->findByPk(array('id' => Yii::app()->session['user']['id']));
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                $date1 = $_POST['UserDetails']['dob'];
                                $newDate = date("Y-m-d", strtotime($date1));
                                $model->dob = $newDate;
                                $model->gender = $_POST['UserDetails']['gender'];
                                if ($model->validate()) {
                                        $model->UB = Yii::app()->session['user']['id'];
                                        if ($model->save()) {
                                                Yii::app()->user->setFlash('success', " Your account has been updated successfully");
                                        } else {
                                                Yii::app()->user->setFlash('error', " Something went wrong..");
                                        }
                                }
                        }
                        $this->render('mydetails', array('model' => $model));
                }
        }

        public function actionAddressbook() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user']['id'] != '') {
                                $model = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                                $this->render('addressbook', array('model' => $model));
                        } else {
                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                        }
                }
        }

        public function checkDefault($model, $default) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $default_address = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id'], $default => 1));
                        if (empty($default_address)) {
                                $model->$default = 1;
                        } elseif ($model->$default == 1) {
                                $address = UserAddress::model()->updateAll(array($default => 0), 'userid = ' . Yii::app()->session['user']['id']);
                                $model->$default = 1;
                        } elseif ($model->$default == 0) {
                                $model->$default = 0;
                        }
                        return $model;
                }
        }

        public function actionReview($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $order = OrderProducts::model()->findByAttributes(array('id' => $id));
                        $user = Order::model()->findByPk($order->order_id);
                        if (Yii::app()->session['user']['id'] == $user->user_id && $user->status == 1) {
                                $model = new UserReviews;
                                if ($id != '') {
                                        if (isset($_POST['UserReviews'])) {
                                                $model->attributes = $_POST['UserReviews'];
                                                if ($model->validate()) {
                                                        $model->product_id = $order->product_id;
                                                        $model->user_id = Yii::app()->session['user']['id'];
                                                        $model->review = $_POST['UserReviews']['review'];
                                                        $model->date = date('Y-m-d');
                                                        if ($model->save()) {

                                                                Yii::app()->user->setFlash('success', "your review has been  successfully added");
                                                        } else {
                                                                Yii::app()->user->setFlash('error', "Sorry! There is some error..");
                                                        }
                                                }
                                        }
                                } else {
                                        echo 'Invalid data.....';
                                }
                                $this->render('user_review', array('model' => $model, 'id' => $id));
                        }
                }
        }

        public function actionNewaddress() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = new UserAddress;
                        if (isset($_POST['UserAddress'])) {
                                $model->attributes = $_POST['UserAddress'];
                                $model->userid = Yii::app()->session['user']['id'];
                                $model = $this->checkDefault($model, 'default_billing_address');
                                $model = $this->checkDefault($model, 'default_shipping_address');
                                if ($model->save()) {
                                        $this->redirect('addressbook');
                                }
                        }
                        $this->render('newaddress', array('model' => $model));
                }
        }

        public function actionEditAddress($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserAddress::model()->findByPk($id);
                        if (isset($_POST['UserAddress'])) {
                                $model->attributes = $_POST['UserAddress'];
                                $model->userid = Yii::app()->session['user']['id'];
                                $model = $this->checkDefault($model, 'default_billing_address');
                                $model = $this->checkDefault($model, 'default_shipping_address');
                                if ($model->save()) {

                                        $this->redirect(array('Myaccount/Addressbook'));
                                }
                        }
                        $this->render('newaddress', array('model' => $model));
                }
        }

        public function actionDeleteAddress($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserAddress::model()->deleteByPk($id);
                        $this->redirect(array('Myaccount/Addressbook'));
                }
        }

        public function actionDeletaddress($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserAddress::model()->deleteByPk($id);
                        $this->redirect('addressbook');
                }
        }

        public function actionMakepayment($p = '') {

                if (!isset(Yii::app()->session['user'])) {
                        Yii::app()->session['make_paid'] = $p;
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $decrypt = $this->encrypt_decrypt('decrypt', $p);

                        $mstr = explode(",", $decrypt);
                        $a = array();
                        foreach ($mstr as $nstr) {
                                $narr = explode("=", $nstr);
                                $narr[0] = str_replace("\x98", "", $narr[0]);
                                $ytr[1] = $narr[1];
                                $a[$narr[0]] = $ytr[1];
                        }
                        $enquiry_id = $a['enquiry_id'];
                        $history_id = $a['history_id'];
                        $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                        $celeb_history = CelibStyleHistory::model()->findByPk($history_id);
                        $enquiry_product = Products::model()->findByPk($enquiry->product_id);
                }
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if (!empty($enquiry) && !empty($celeb_history) && !empty($user) && !empty($enquiry_product)) {
                        /* usetting makepayment session if logged users */

                        Yii::app()->session['make_paid'] = '';
                        unset(Yii::app()->session['make_paid']);
                        /*     end                    * ** */


                        $model = new MakePayment;
                        if (isset($_REQUEST['MakePayment'])) {

                                $model->attributes = $_POST['MakePayment'];
                                $model->userid = $user->id;
                                $model->date = date('Y-m-d H:i:s');
                                $wallet_amount = $_POST['MakePayment']['credit_amount'];

                                if (!empty($wallet_amount)) {
                                        if ($wallet_amount <= Yii::app()->session['user']['wallet_amt']) {
                                                if ($wallet_amount == $celeb_history->pay_amount) {

                                                        $model->payment_mode = 1;
                                                        $model->wallet = $celeb_history->pay_amount;
                                                        $model->netbanking = '';
                                                        $model->paypal = '';
                                                } else {

                                                        if ($model->payment_mode == 2) {

                                                                $model->wallet = $wallet_amount;
                                                                $model->netbanking = $celeb_history->pay_amount - $wallet_amount;
                                                                $model->paypal = '';
                                                                $model->payment_mode = 4;
                                                        } else if ($model->payment_mode == 3) {

                                                                $model->wallet = $wallet_amount;
                                                                $model->paypal = $celeb_history->pay_amount - $wallet_amount;
                                                                $model->netbanking = '';
                                                                $model->payment_mode = 4;
                                                        }
                                                }
                                        } else {

                                                Yii::app()->user->setFlash('error', "Invalid data.Please try again");
                                                $this->redirect(array('Makepayment', 'p' => $p));
                                        }
                                } else {
                                        $model->payment_mode = $_POST['MakePayment']['payment_mode'];
                                        if ($model->payment_mode == 2) {
                                                $model->netbanking = $celeb_history->pay_amount;
                                                $model->paypal = '';
                                        } else if ($model->payment_mode == 3) {
                                                $model->paypal = $celeb_history->pay_amount;
                                                $model->netbanking = '';
                                        }
                                }
                                $model->total_amount = $celeb_history->pay_amount;
                                $order_billing_details = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->session['user']['id']));

                                if ($model->validate()) {
                                        if ($model->save()) {
                                                /* wallet entry starts */
                                                if ($model->wallet != '') {


                                                        $wallet_amount = new WalletHistory;
                                                        $wallet_amount->user_id = Yii::app()->session['user']['id'];
                                                        $wallet_amount->type_id = 3;
                                                        $wallet_amount->amount = $model->wallet;
                                                        $wallet_amount->entry_date = date('Y-m-d H:i:s');
                                                        $wallet_amount->credit_debit = 2;
                                                        $wallet_amount->balance_amt = Yii::app()->session['user']['wallet_amt'] - $model->wallet;
                                                        $wallet_amount->payment_method = 0;
                                                        $wallet_amount->field2 = 0;
                                                        $wallet_amount->ids = $model->id;
                                                        $wallet_amount->save(FALSE);
                                                }

                                                /* wallet entry ends */
                                                if ($model->netbanking != '') {
                                                        $hdfc_details = array();
                                                        $hdfc_details['description'] = 'Laksyah Payment';
                                                        $hdfc_details['order'] = $model->id;
                                                        $hdfc_details['totaltopay'] = $model->netbanking;
                                                        $hdfc_details['bill_name'] = $order_billing_details->first_name . ' ' . $order_billing_details->last_name;
                                                        $hdfc_details['bill_address'] = $order_billing_details->address_1 . ' ' . $order_billing_details->address_2;
                                                        $hdfc_details['bill_city'] = $order_billing_details->city;
                                                        $hdfc_details['bill_state'] = $order_billing_details->state;
                                                        $hdfc_details['bill_postal_code'] = $order_billing_details->postcode;
                                                        $hdfc_details['bill_country'] = Countries::model()->findbypk($order_billing_details->country)->country_name;
                                                        $hdfc_details['bill_email'] = Yii::app()->session['user']['email'];
                                                        $hdfc_details['bill_phone_number'] = Yii::app()->session['user']['phone_no_1'];

                                                        $hdfc_details['ship_name'] = $order_shipping_detils->first_name . ' ' . $order_shipping_detils->last_name;
                                                        $hdfc_details['ship_address'] = $enquiry_id;
                                                        $hdfc_details['ship_city'] = $history_id;
                                                        $hdfc_details['ship_state'] = $model->id;
                                                        $hdfc_details['ship_postal_code'] = $order_shipping_detils->postcode;
                                                        $hdfc_details['ship_country'] = Countries::model()->findbypk($order_shipping_detils->country)->country_name;
                                                        $hdfc_details['ship_email'] = Yii::app()->session['user']['email'];
                                                        $hdfc_details['bill_phone_number'] = Yii::app()->session['user']['phone_no_1'];
                                                        $hdfc_details['enquiry_id'] = $enquiry_id;
                                                        $hdfc_details['history_id'] = $history_id;
                                                        $this->render('hdfcpay', array('hdfc_details' => $hdfc_details, 'aid' => '20951', 'sec' => 'b837f49de88e6be36f077b6928c43bf9'));
                                                } else if ($model->paypal != '') {
                                                        $trid = time();
                                                        $eid = $enquiry_id;
                                                        $hid = $history_id;
                                                        $pid = $model->id;
// $totaltopay = round(Currency::model()->findBypk(2)->rate * $order->paypal, 2);
                                                        $this->render('paypalpay', array('order' => $model->id, 'totaltopay' => $model->paypal, 'trid' => $trid, 'eid' => $eid, 'hid' => $hid, 'pid' => $pid));
                                                }

// $this->redirect(array('MakePaymentSuccess', 'enquiry_id' => $enquiry_id, 'history_id' => $history_id, 'payment_id' => $model->id));
//  $this->redirect(array('MakePaymentError', 'enquiry_id' => $enquiry_id, 'history_id' => $history_id, 'payment_id' => $model->id));
                                        } else {
                                                Yii::app()->user->setFlash('error', "Oops some error occured.Transaction rejected.");
                                        }
                                }
                        }
                        $this->render('make_payment', array(
                            'model' => $model, 'enquiry_product' => $enquiry_product, 'celeb_history' => $celeb_history, 'balance' => $balance,
                        ));
                } else {
                        $this->render('//site/error');
                }
        }

        /*

         * Make Payment Success Action         */

        /* mail send to admin and user */

        public function actionMakePaymentSuccess($enquiry_id, $history_id, $payment_id, $tranid) {

                if (isset(Yii::app()->session['user']['id']) != '') {
                        $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                        $celeb_history = CelibStyleHistory::model()->findByPk($history_id);
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $make_payment = MakePayment::model()->findByPk($payment_id);
                        if (!empty($enquiry) && !empty($celeb_history) && !empty($user) && !empty($make_payment)) {

                                $enquiry->user_id = $user->id;



                                $enquiry->balance_to_pay = $enquiry->balance_to_pay - $make_payment->total_amount;

                                $enquiry->status = 2;
                                $enquiry->save(False);

                                $celeb_history->payment_id = $make_payment->id;
                                $celeb_history->payment_status = 1;
                                $celeb_history->save(False);
                                if ($make_payment->payment_mode == 1 || $make_payment->payment_mode == 4) {
                                        $wallet_history = WalletHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'type_id' => 3, 'ids' => $payment_id));
                                        $user->wallet_amt = $user->wallet_amt - $make_payment->wallet;
                                        $wallet_history->field2 = 1;
                                        $user->save();
                                        $wallet_history->save();
                                }


                                $make_payment->status = 1;
                                if ($make_payment->save(FALSE)) {

// $this->PaymentSuccessMail($enquiry->id, $make_payment->id);
                                        Yii::app()->session['user'] = $user;
                                        if ($enquiry->balance_to_pay == 0) {

                                                $this->redirect(array('AddToOrder', 'enq_id' => $enquiry->id));
                                        }
                                }
                        } else {
                                $this->redirect(array('MakePaymentError', 'enquiry_id' => $enquiry_id, 'history_id' => $history_id, 'payment_id' => $model->id));
                        }
                } else {
                        $this->render('//site/error');
                }
        }

        public function PaymentSuccessMail($enquiry_id, $payment_id) {
                $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                $payment = MakePayment::model()->findByPk($payment_id);
                $userdetails = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
//$user = $userdetails->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'Payment of product ' . $payment->product_name . ' with laksyah.com  succesfully Completed';
                $user_message = $this->renderPartial('mail/_user_payment_success_mail', array('userdetails' => $userdetails, 'enquiry' => $enquiry, 'payment' => $payment), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = 'Payment of product ' . $payment->product_name . ' towards Enquiry #' . $enquiry->id . ' got received';
                $admin_message = $this->renderPartial('mail/_admin_payment_mail', array('userdetails' => $userdetails, 'enquiry' => $enquiry, 'payment' => $payment), true);

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
// echo $user_message;
// echo $admin_message;
//unset(Yii::app()->session['orderid']);

                mail($user, $user_subject, $user_message, $headers);
                mail($admin, $admin_subject, $admin_message, $headers);
        }

        /*

         * Make Payment Success Action         */

        /* mail send to admin and user */

        public function actionMakePaymentError($enquiry_id, $history_id, $payment_id) {
                if (isset(Yii::app()->session['user']['id']) != '') {
                        $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                        $celeb_history = CelibStyleHistory::model()->findByPk($history_id);
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $make_payment = MakePayment::model()->findByPk($payment_id);
                        if (!empty($enquiry) && !empty($celeb_history) && !empty($user) && !empty($make_payment)) {

                                $enquiry->user_id = $user->id;
                                $enquiry->balance_to_pay = $enquiry->total_amount - $celeb_history->pay_amount;
                                $enquiry->save();

                                $celeb_history->payment_id = $make_payment->id;
                                $celeb_history->payment_status = 2;
                                $celeb_history->save();
                                if ($make_payment->payment_mode == 1 || $make_payment->payment_mode == 4) {
                                        $wallet_history = WalletHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'type_id' => 3, 'ids' => $payment_id));
                                        $wallet_history->delete();
                                }


                                $make_payment->status = 2;
                                if ($make_payment->save()) {
                                        $this->PaymentErrorMail($enquiry->id, $make_payment->id);
                                }
                        } else {
                                $this->redirect(array('MakePaymentError', 'enquiry_id' => $enquiry_id, 'history_id' => $history_id, 'payment_id' => $model->id));
                        }
                } else {
                        $this->render('//site/error');
                }
        }

        public function PaymentErrorMail($enquiry_id, $payment_id) {
                $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                $payment = MakePayment::model()->findByPk($payment_id);
                $userdetails = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
//$user = $userdetails->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'Payment Failure :Payment of product ' . $payment->product_name . ' with laksyah.com';
                $user_message = $this->renderPartial('mail/_user_payment_error_mail', array('userdetails' => $userdetails, 'enquiry' => $enquiry, 'payment' => $payment), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = 'Payment Failure :Payment of product ' . $payment->product_name . '  towards Enquiry #' . $enquiry->id;
                $admin_message = $this->renderPartial('mail/_admin_payment_mail', array('userdetails' => $userdetails, 'enquiry' => $enquiry, 'payment' => $payment), true);

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
// echo $user_message;
// echo $admin_message;
//unset(Yii::app()->session['orderid']);

                mail($user, $user_subject, $user_message, $headers);
                mail($admin, $admin_subject, $admin_message, $headers);
        }

        public function actionMakepayment_debit() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        echo 'jgjh';
                        exit;
                }
        }

        public function actionAddToOrder($enq_id) {
                if (!empty($enq_id) && $enq_id != '') {
                        $enquiry = ProductEnquiry::model()->findByPk($enq_id);
                        $celeb = CelibStyleHistory::model()->findByAttributes(array('enq_id' => $enq_id));
                        $enquiry->status = 4;
                        if ($enquiry->save()) {
                                $order = new Order;
                                $order->user_id = $enquiry->user_id;
                                $order->total_amount = $enquiry->total_amount;
                                $order->order_date = date('Y-m-d');
                                $order->payment_status = 1;
//  $order->discount_rate = '0.00';
                                $order->status = 1;
                                if ($order->save(false)) {
                                        $order_history = new OrderHistory;
                                        $order_history->order_id = $order->id;
                                        $order_history->order_status = 1;
                                        $order_history->date = date('Y-m-d');
                                        $order_history->cb = Yii::app()->session['user']['id'];
                                        if ($order_history->save()) {

                                                $celeb->save();
                                                Yii::app()->user->setFlash('order', "your Payment has been  successfully Completed");
                                                $this->redirect('Profile');
                                        } else {
                                                Yii::app()->user->setFlash('notorder', "Error Occured");
                                                $this->redirect('Profile');
                                        }
                                }
                        }
                } else {
                        $this->redirect('Profile');
                        Yii::app()->user->setFlash('notorder', "Error Occured");
                }
        }

        public function actionMyordernew() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $myorders = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'order_date DESC'));
                        $this->render('myorder_new', array('myorders' => $myorders));
                }
        }

        public function actionTest() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $myorders = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $this->render('myorders', array('myorders' => $myorders));
                }
        }

        public function actionChangePassword() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        if (isset($_POST['submit'])) {
                                if ($_REQUEST['current'] == $model->password) {
                                        $model->password = $_POST['password'];
                                        $model->confirm = $_POST['confirm'];
                                        $model->save(FALSE);

                                        Yii::app()->user->setFlash('success', 'Password successfully changed');
                                        $this->render('changepassword');
                                        exit;
                                } else {
                                        Yii::app()->user->setFlash('notice', ' Incorrect Current Password');
                                        $this->render('changepassword');
                                        exit;
                                }
                        } else {
                                $this->render('changepassword', array('model' => $model));
                        }
                }
        }

//        public function actionCardToWallet() {
//                if (isset($_POST['card_submit'])) {
//                        $data = UserGiftscardHistory::model()->findByAttributes(array('unique_code' => $_POST['card_id']), array('condition' => 'status = 1'));
//                        if (!empty($data)) {
//                                $this->render('addmoney_confirmation', array('data' => $data));
//                        } else {
//                                Yii::app()->user->setFlash('notice', 'Card is invalid or it may be already used');
//                        }
//                } else {
//                        $this->render('addmoney');
//                }
//        }
//
//        public function actionAddToWallet($id) {
//                $data = UserGiftscardHistory::model()->findByPk($id);
//                $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
//                if (!empty($model)) {
//                        $wallet_amount = $model->wallet_amt;
//                        $wallet_add = new WalletHistory('addWallet');
//                        if (!empty($data)) {
//                                $entry_amount = $data->amount;
//                                $wallet_add->user_id = $model->id;
//                                $wallet_add->entry_date = date('Y-m-d H:i:s');
//                                $wallet_add->credit_debit = 1;
//                                $wallet_add->balance_amt = $wallet_amount + $entry_amount;
//
//
//                                if ($wallet_add->validate()) {
//                                        if ($wallet_add->save()) {
//
//                                                $this->redirect(array('Success', 'user_id' => $model->id, 'wallet_id' => $wallet_add->id));
//
//                                                // $this->redirect(array('Error', 'wallet_id' => $wallet_add->id));
//                                                $wallet_add->unsetAttributes();
//                                        }
//                                }
//                        }
//                        $this->render('index', array('wallet_add' => $wallet_add));
//                }
//        }

        public function actionSuccess($user_id, $wallet_id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (!empty($user_id) && !empty($wallet_id) && $user_id != '' && $wallet_id != '') {
                                $user_wallet = UserDetails::model()->findByPk($user_id);
                                $wallet_history = WalletHistory::model()->findByPk($wallet_id);


                                $amount = $user_wallet->wallet_amt + $wallet_history->amount;
                                $user_wallet->wallet_amt = $amount;
                                $wallet_history->field2 = 1; //success
                                if ($wallet_history->save()) {
                                        if ($user_wallet->save()) {
                                                Yii::app()->session['user'] = $user_wallet;
                                                Yii::app()->user->setFlash('wallet_success', "Money Added Successfully");
//$this->SendMail($user_wallet, $wallet_history);
// $this->adminmail($user_wallet, $wallet_history);
                                                $this->redirect(array('Index'));
                                        } else {
                                                $wallet_history->delete();
                                        }
                                } else {
                                        Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                                        $this->redirect(array('AddToWallet'));
                                }
                        } else {
                                Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                                $this->redirect(array('AddToWallet'));
                        }
                }
        }

//        public function loadModel($id) {
//                $model = UserSizechart::model()->findByPk($id);
//                if ($model === null)
//                        throw new CHttpException(404, 'The requested page does not exist.');
//                return $model;
//        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

        public function encrypt_decrypt($action, $string) {
                $output = false;

                $encrypt_method = "AES-256-CBC";
                $secret_key = 'This is my secret key';
                $secret_iv = 'This is my secret iv';

// hash
                $key = hash('sha256', $secret_key);

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                if ($action == 'encrypt') {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                } else if ($action == 'decrypt') {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }

                return $output;
        }

}
