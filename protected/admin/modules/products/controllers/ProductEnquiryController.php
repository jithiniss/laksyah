<?php

class ProductEnquiryController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['admin']) || Yii::app()->session['post']['products'] != 1) {
                        $this->redirect(Yii::app()->request->baseUrl . '/admin.php/site/logOut');
                }
        }

        /**
         * @return array action filters
         */
        public function filters() {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
                );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
                return array(
                    array('allow', // allow all users to perform 'index' and 'view' actions
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'eroductenquiryeail', 'siteURL'),
                        'users' => array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update'),
                        'users' => array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('admin', 'delete'),
                        'users' => array('admin'),
                    ),
                    array('deny', // deny all users
                        'users' => array('*'),
                    ),
                );
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */
        public function actionView($id) {
                $this->render('view', array(
                    'model' => $this->loadModel($id),
                ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
                $model = new ProductEnquiry;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['ProductEnquiry'])) {
                        $model->attributes = $_POST['ProductEnquiry'];
                        $model->add_to_order = $_POST['ProductEnquiry']['add_to_order'];
                        if ($model->save()) {
                                $this->redirect(array('admin'));
                        }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
                $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['ProductEnquiry'])) {
                        $model->attributes = $_POST['ProductEnquiry'];
                        $model->total_amount = $_POST['ProductEnquiry']['total_amount'];
                        $model->add_to_order = $_POST['ProductEnquiry']['add_to_order'];
                        $total_amount_paids = CelibStyleHistory::model()->findAllByAttributes(array('enq_id' => $model->id, 'payment_status' => 1));
                        if ($_POST['ProductEnquiry']['add_to_order'] == 1) {

                                $order = new Order;
                                $order->user_id = $model->user_id;
                                $order->total_amount = $model->total_amount;
                                $order->order_date = date('Y-m-d');
                                $order->payment_status = 1;
                                if ($order->save()) {
                                        $order_history = new OrderHistory;
                                        $order_history->order_id = $order->id;
                                        $order_history->date = date('Y-m-d');
                                        $order_history->cb = $model->id;
                                        $order_history->order_status_comment = 'Order Placed';
                                        if ($order_history->save()) {
                                                $order_products = new OrderProducts;
                                                $order_products->order_id = $order->id;
                                                $order_products->product_id = $_POST['ProductEnquiry']['product_id'];
                                                $order_products->option_id = $_POST['ProductEnquiry']['size'];
                                                $order_products->amount = $model->total_amount;
                                                $order_products->DOC = date('Y-m-d');
                                                $order_products->save();
                                        }
                                }
                        }
                        if (!empty($total_amount_paids)) {
                                foreach ($total_amount_paids as $total_amount_paid) {
                                        $total_amt += $total_amount_paid->pay_amount;
                                }
                        } else {
                                $total_amt = 0;
                        }

                        $model->balance_to_pay = $model->total_amount - $total_amt;

                        if ($_POST['ProductEnquiry']['status'] == 2) {
                                $celib_history = new CelibStyleHistory;
                                $celib_history->enq_id = $model->id;
                                $celib_history->status = 2;
                                if ($celib_history->save()) {
                                        $celib_history_update = CelibStyleHistory::model()->findByPk($celib_history->id);
                                        $enc_enq_id = $model->id;
                                        $enc_celib_history_id = $celib_history->id;
                                        $getToken = $this->encrypt_decrypt('encrypt', 'enquiry_id=' . $enc_enq_id . ',history_id=' . $enc_celib_history_id);
                                        $celib_history_update->link = Yii::app()->request->baseUrl . '/index.php/Myaccount/SizeChartType?m=' . $getToken;
                                        if ($celib_history_update->save()) {
                                                $model->status = 2;
                                                if ($model->save()) {
                                                        $model->add_to_order = 3;
//                                                        $this->ProductEnquiryMail($celib_history_update);
                                                }
                                        }
                                }
                        } else if ($_POST['ProductEnquiry']['status'] == 3) {
                                $celib_history = new CelibStyleHistory;
                                $celib_history->enq_id = $model->id;
                                $celib_history->status = 3;
                                $celib_history->pay_amount = $_POST['amount'];
                                if ($celib_history->save()) {
                                        $celib_history_update = CelibStyleHistory::model()->findByPk($celib_history->id);
                                        $enc_enq_id = $model->id;
                                        $enc_celib_history_id = $celib_history->id;
                                        $getToken1 = $this->encrypt_decrypt('encrypt', 'enquiry_id=' . $enc_enq_id . ',history_id=' . $enc_celib_history_id);
                                        $celib_history_update->link = Yii::app()->request->baseUrl . '/index.php/Myaccount/Makepayment?p=' . $getToken1;
                                        if ($celib_history_update->save()) {
                                                $model->status = 3;
                                                if ($model->save()) {
                                                        $model->add_to_order = 3;
                                                        $this->ProductEnquiryMail($celib_history_update);
                                                }
                                        }
                                }
                        }

                        if ($model->save()) {
                                $model->add_to_order = 3;
                                $this->redirect(array('update', 'id' => $model->id));
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        public function ProductEnquiryMail($celib_history_update) {

                //$to = 'rejin@intersmart.in';
                $toclient = ProductEnquiry::model()->findByPk($celib_history_update->enq_id)->email;
                $toadmin = AdminUser::model()->findByPk(4)->email;
                $enq_data = ProductEnquiry::model()->findByPk($celib_history_update->enq_id);
                $subject = 'Product Enquiry';
                $message = $this->renderPartial('_product_enquiry_mail_client', array('model' => $celib_history_update, 'enq_data' => $enq_data), true);

                $message1 = $this->renderPartial('_product_enquiry_mail_admin', array('model' => $celib_history_update, 'enq_data' => $enq_data), true);
//                echo $message;
//                echo $message1;
//                exit;
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <store@intersmarthosting.in>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                //echo $message;
                //echo $message1;
                //exit();
                mail($toclient, $subject, $message, $headers);
                mail($toadmin, $subject, $message1, $headers);
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('ProductEnquiry');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin($ctype = '') {
                $model = new ProductEnquiry('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ProductEnquiry']))
                        $model->attributes = $_GET['ProductEnquiry'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return ProductEnquiry the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = ProductEnquiry::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param ProductEnquiry $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-enquiry-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
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
