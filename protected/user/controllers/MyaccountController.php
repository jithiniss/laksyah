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

        public function actionSizeChartType($enquiry_id = NULL, $history_id = NULL) {

                if (!isset(Yii::app()->session['user'])) {
                        Yii::app()->session['enquiry_id'] = $enquiry_id;
                        Yii::app()->session['history_id'] = $history_id;

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (isset(Yii::app()->session['enquiry_id'])) {
                                Yii::app()->session['enquiry_id'] = Yii::app()->session['enquiry_id'];
                        } else {
                                Yii::app()->session['enquiry_id'] = $enquiry_id;
                        }
                        if (isset(Yii::app()->session['history_id'])) {
                                Yii::app()->session['history_id'] = Yii::app()->session['history_id'];
                        } else {
                                Yii::app()->session['history_id'] = $history_id;
                        }
                        if (Yii::app()->session['enquiry_id'] != NULL && Yii::app()->session['history_id'] != NULL) {
                                $enquery = ProductEnquiry::model()->findBypk(Yii::app()->session['enquiry_id']);
                                $history = CelibStyleHistory::model()->findBypk(Yii::app()->session['history_id']);
                        }
                }
                $product_details = Products::model()->findByPk($enquery->product_id);
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
                                $enq_history_update = CelibStyleHistory::model()->findByAttributes(array('enq_id' => $model->enq_id, 'id' => $model->enq_history_id));
                                $enq_history_update->measurement_id = $model->id;
                                if ($enq_history_update->save()) {
                                        unset(Yii::app()->session['history_id']);
                                        unset(Yii::app()->session['enquiry_id']);
                                        $this->ProductEnquiryMail($model, $enq_history_update);

                                        $this->ProductEnquiryMail($model, $enq_history_update);
                                        Yii::app()->user->setFlash('meas_success', "Your Measurement Successfully Saved");
                                        $this->redirect(array('myaccount/sizecharttype'));
                                }
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
                echo $message;
                echo $message1;
                exit;
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

        public function actionMakepayment($enquiry_id = NULL, $history_id = NULL) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {

                        $enquiry = ProductEnquiry::model()->findByPk($enquiry_id);
                        $celeb_history = CelibStyleHistory::model()->findByPk($history_id);
                        $enquiry_product = Products::model()->findByPk($enquiry->product_id);
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $model = new MakePayment;
                        if (isset($_POST['MakePayment'])) {
                                $model->attributes = $_POST['MakePayment'];
                                $model->userid = Yii::app()->session['user']['id'];
                                $model->date = date('Y-m-d');
                                $model->amount_type = $_POST['total_amount'];
                                $balance = $celeb_history->pay_amount - $model->total_amount;
                                if ($celeb_history->pay_amount == $model->total_amount) {
                                        /* wallet */
                                        $model->payment_mode = 3;
                                } else {
                                        echo 'g';
                                        exit;
                                        if ($_POST['total_amount'] != 0 && $_POST['wallet_amt'] != 0) {
                                                $model->payment_mode = 4;

                                                if ($_POST['payment_mode'] == 2) {
                                                        $model->netbanking = $post_total_pay;
                                                        $model->wallet = $wallet;
                                                } else if ($_POST['payment_mode'] == 1) {
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
                                        $this->redirect('payment_gateway');
                                }
                                if ($model->validate()) {

                                        if ($model->save()) {
                                                $enquiry->user_id = Yii::app()->session['user']['id'];
                                                $enquiry->total_amount = $celeb_history->pay_amount;
                                                $enquiry->balance_to_pay = $balance;
                                                $enquiry->status = 2;
                                                if ($enquiry->save()) {
                                                        $celeb_history = new CelibStyleHistory;
                                                        $celeb_history->enq_id = $enquiry_id;
                                                        $celeb_history->status = 3;
                                                        $celeb_history->payment_id = $model->id;
                                                        $celeb_history->payment_status = 1;
                                                        $celeb_history->save();
                                                        $wallet_add = new WalletHistory;
                                                        $wallet_add->user_id = Yii::app()->session['user']['id'];
                                                        $wallet_add->type_id = 3;
                                                        $wallet_add->amount = $_POST['wallet_amt'];
                                                        $wallet_add->entry_date = date('Y-m-d');
                                                        $wallet_add->credit_debit = 2;
                                                        $wallet_add->payment_method = $_POST['MakePayment']['payment_mode'];
                                                        $wallet_add->balance_amt = $model->total_amount - $wallet_add->amount;
                                                        if ($wallet_add->save()) {
                                                                $amount = $model->total_amount - $wallet_add->amount;
                                                                $user->wallet_amt = $amount;
                                                                $user->save();
                                                                $wallet_add->unsetAttributes();
                                                        }
                                                }
                                        }
                                        Yii::app()->user->setFlash('success', "your amount has been  successfully added");
                                        $this->redirect('Makepayment');
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Sorry! There is some error..");
                        }
                }



                $this->render('make_payment', array(
                    'model' => $model, 'enquiry_product' => $enquiry_product, 'celeb_history' => $celeb_history, 'balance' => $balance,
                ));
        }

        public function actionMakepayment_debit() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        echo 'jgjh';
                        exit;
                }
        }

        public function actionAddto_order($enq_id) {
                $enquiry = ProductEnquiry::model()->findByPk($enq_id);
                $celeb = CelibStyleHistory::model()->findByAttributes(array('enq_id' => $enq_id));
                $enquiry->status = 4;
                if ($enquiry->save()) {
                        $order = new Order;
                        $order->user_id = $enquiry->user_id;
                        $order->total_amount = $enquiry->total_amount;
                        $order->order_date = date('Y-m-d');
                        $order->payment_status = 1;
                        $order->status = 1;
                        if ($order->save()) {
                                $order_history = new OrderHistory;
                                $order_history->order_id = $order->id;
                                $order_history->order_status = 1;
                                $order_history->date = date('Y-m-d');
                                $order_history->cb = Yii::app()->session['user']['id'];
                                if ($order_history->save()) {
                                        $celeb->add_to_order = 1;
                                        $celeb->save();
                                        $this->redirect('Profile');
                                        Yii::app()->user->setFlash('order', "your order has been  successfully added");
                                } else {
                                        $this->redirect('Profile');
                                        Yii::app()->user->setFlash('notorder', "Error Occured");
                                }
                        }
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
}
