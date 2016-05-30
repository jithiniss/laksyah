<?php

class MyaccountController extends Controller {

        public function init() {

//var_dump(Yii::app()->session['post']['admin']);
//die;
                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionIndex() {
                $this->render('myaccount');
        }

        public function actionMywishlists() {

                if (!isset(Yii::app()->session['user'])) {

                        Yii::app()->session['wishlist_user'] = 1;
                } else {
                        $wishlists = UserWishlist::model()->findAllByAttributes(array(), array('select' => 't.prod_id', 'distinct' => true, 'condition' => 'user_id = ' . Yii::app()->session['user']['id']));
                        $this->render('mywishlists', array('wishlists' => $wishlists));
                }
        }

        public function actionRemoveMywishlists($pid) {

                UserWishlist::model()->deleteAllByAttributes(array('prod_id' => $pid, 'user_id' => Yii::app()->session['user']['id']));
                $this->redirect(Yii::app()->request->urlReferrer);
        }

        public function actionMyorders() {
                $myorder = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 1));
                $this->render('myorder', array('myorders' => $myorder));
        }

        public function actionOrderitems($id) {
                $myorder = Order::model()->findByPk($id);
                $this->render('orders', array('myorders' => $myorder));
        }

        public function actionSizeChartType() {
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
                        }
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->date = date('Y-m-d');
                        if ($model->save()) {
                                Yii::app()->user->setFlash('meas_success', "Your Measurement Successfully Saved");
                                $this->redirect(array('myaccount/sizecharttype'));
                        }
                }
                $this->render('size_type', array('model' => $model));
        }

        public function actionSizeChartList() {

                $chart = UserSizechart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'id DESC'));
                $this->render('size_chart_list', array('chart' => $chart));
        }

        public function actionSizeChart($type) {
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

        public function inchToCm($model, $type = 1) {
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

        public function actionCopyChart($id) {

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

        public function actionViewChart($id) {

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

        public function actionProfile() {
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

        public function actionAddressbook() {
                if (Yii::app()->session['user']['id'] != '') {
                        $model = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->session['user']['id']));
                        $this->render('addressbook', array('model' => $model));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function checkDefault($model, $default) {
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

        public function actionReview($id) {
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

        public function actionNewaddress() {
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

        public function actionEditAddress($id) {

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

        public function actionDeleteAddress($id) {
                $model = UserAddress::model()->deleteByPk($id);
                $this->redirect(array('Myaccount/Addressbook'));
        }

        public function actionDeletaddress($id) {
                $model = UserAddress::model()->deleteByPk($id);
                $this->redirect('addressbook');
        }

        public function actionMakepayment() {
                $model = new MakePayment;
                if (isset($_POST['MakePayment'])) {
                        $model->attributes = $_POST['MakePayment'];
                        $model->userid = Yii::app()->session['user']['id'];
                        $model->date = date('Y-m-d');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        if ($model->amount <= $_POST['wallet_amt']) {
                                                $wallet_add = new WalletHistory;
                                                $wallet_add->user_id = Yii::app()->session['user']['id'];
                                                $wallet_add->type_id = 3;
                                                $wallet_add->amount = $_POST['wallet_amt'];
                                                $wallet_add->entry_date = date('Y-m-d');
                                                $wallet_add->credit_debit = 2;
                                                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                                $wallet_amount = $user->wallet_amt;
                                                $wallet_add->balance_amt = $wallet_amount - $wallet_add->amount;
                                                if ($wallet_add->save()) {
                                                        $amount = $wallet_amount - $wallet_add->amount;
                                                        $user->wallet_amt = $amount;
                                                        $user->save();
                                                        $wallet_add->unsetAttributes();
                                                }
                                        } else {
                                                $this->redirect('Makepayment_debit');
                                        }

//                                                $to = 'shahana@intersmart.in,$user->email';
//                                                $subject = "Product Availability";
//
//                                                $message = "sssssssssssssssssssssss";
//                                                $headers = "MIME-Version: 1.0" . "\r\n";
//                                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//                                                $headers .= 'From: <>' . "\r\n";
//                                                mail($to, $subject, $message, $headers);
                                        Yii::app()->user->setFlash('success', "your amount has been  successfully added");
                                        $this->redirect('Makepayment');
                                } else {
                                        Yii::app()->user->setFlash('error', "Sorry! There is some error..");
                                }
                        }
                }


                $this->render('make_payment', array(
                    'model' => $model, 'payment' => $payment
                ));
        }

        public function actionMakepaymentProduct() {
                $product_code = $_REQUEST['product_code'];
                $payment = Products::model()->findByAttributes(array('product_code' => $model->product_code));
                var_dump($payment);
                exit;
        }

        public function actionMakepayment_debit() {
                echo 'jgjh';
        }

        public function actionMyordernew() {
                $myorders = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'order_date DESC'));
                $this->render('myorder_new', array('myorders' => $myorders));
        }

        public function actionTest() {
                $myorders = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                $this->render('myorders', array('myorders' => $myorders));
        }

        public function actionChangePassword() {
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

//        public function loadModel($id) {
//                $model = UserSizechart::model()->findByPk($id);
//                if ($model === null)
//                        throw new CHttpException(404, 'The requested page does not exist.');
//                return $model;
//        }
}
