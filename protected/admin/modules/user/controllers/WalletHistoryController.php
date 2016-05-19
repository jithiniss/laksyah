<?php

class WalletHistoryController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'addWallet'),
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

        /**
         * Lists all models.
         */
        public function actionView($id) {

                $model = UserDetails::model()->findByPk($id);

                if(!empty($model)) {

                        $wallet = new WalletHistory('search');
                        $wallet->unsetAttributes();  // clear any default values
                        $wallet->user_id = $id;
                        if(isset($_GET['WalletHistory'])) {
                                $wallet->attributes = $_GET['WalletHistory'];
                        }

                        $wallet_amount = $model->wallet_amt;

                        $wallet_add = new WalletHistory('addWallet');
                        $wallet_redeem = new WalletHistory('redeemWallet');

                        if(isset($_POST['WalletHistory'])) {


                                if($_POST['WalletHistory']['type_form'] == '1') {

                                        $_SESSION['wallet_bag'] = '7';
                                        $wallet_redeem->attributes = $_POST['WalletHistory'];
                                        $entry_amount = $_POST['WalletHistory']['amount'];
                                        if($entry_amount > $wallet_amount) {
                                                $wallet_redeem->addError('amount', 'Insufficient Balance');
                                        } else {
                                                $wallet_redeem->user_id = $id;

                                                $wallet_redeem->entry_date = date('Y-m-d H:i:s');
                                                $wallet_redeem->credit_debit = 2;
                                                $wallet_redeem->balance_amt = $wallet_amount - $entry_amount;

                                                if($wallet_redeem->validate()) {
                                                        if($wallet_redeem->save()) {
                                                                $amount = $wallet_amount - $entry_amount;
                                                                $model->wallet_amt = $amount;
                                                                $model->save();
                                                                $wallet_redeem->unsetAttributes();
                                                                Yii::app()->user->setFlash('success', "Reduced Money from Wallet");
                                                        }
                                                }
                                        }
                                } else if($_POST['WalletHistory']['type_form'] == '2') {
                                        $_SESSION['wallet_bag'] = '8';
                                        $wallet_add->attributes = $_POST['WalletHistory'];

                                        $entry_amount = $_POST['WalletHistory']['amount'];
                                        $wallet_add->user_id = $model->id;
                                        $wallet_add->type_id = 2;
                                        $wallet_add->entry_date = date('Y-m-d H:i:s');
                                        $wallet_add->credit_debit = 1;
                                        $wallet_add->balance_amt = $wallet_amount + $entry_amount;

                                        if($wallet_add->validate()) {
                                                if($wallet_add->save()) {
                                                        $amount = $wallet_amount + $entry_amount;
                                                        $model->wallet_amt = $amount;
                                                        $model->save();
                                                        $wallet_add->unsetAttributes();
                                                        Yii::app()->user->setFlash('success1', "Money Added Successfully");
                                                }
                                        } else {

                                        }
                                }
                        }




                        $this->render('wallet', array(
                            'model' => $model, 'wallet' => $wallet, 'wallet_add' => $wallet_add, 'wallet_redeem' => $wallet_redeem
                        ));
                }
        }

        public function actionAddWallet() {
                $wallet_add = new WalletHistory('addWallet');
                $model = UserDetails::model()->findByPk($_REQUEST['user_id']);
                $wallet_amount = $model->wallet_amt;

                if(isset($_POST['WalletHistory'])) {
                        $_SESSION['wallet_bag'] = '8';
                        $wallet_add->attributes = $_POST['WalletHistory'];
                        $entry_amount = $_POST['WalletHistory']['amount'];
                        $wallet_add->user_id = $model->id;
                        $wallet_add->type_id = 2;
                        $wallet_add->entry_date = date('Y-m-d H:i:s');
                        $wallet_add->credit_debit = 1;
                        $wallet_add->balance_amt = $wallet_amount + $entry_amount;

                        if($wallet_add->validate()) {
                                if($wallet_add->save()) {
                                        $amount = $wallet_amount + $entry_amount;
                                        $model->wallet_amt = $amount;
                                        $model->save();
                                        $wallet_add->unsetAttributes();

                                        $this->redirect(array('view', 'id' => $model->id));
                                }
                        } else {

                                $this->redirect(array('view', 'id' => $model->id));
                        }
                }
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
                $model = new WalletHistory;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['WalletHistory'])) {
                        $model->attributes = $_POST['WalletHistory'];
                        if($model->save())
                                $this->redirect(array('admin'));
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

                if(isset($_POST['WalletHistory'])) {
                        $model->attributes = $_POST['WalletHistory'];
                        if($model->save())
                                $this->redirect(array('update', 'id' => $model->id));
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new WalletHistory('search');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['WalletHistory']))
                        $model->attributes = $_GET['WalletHistory'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return WalletHistory the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = WalletHistory::model()->findByPk($id);
                if($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param WalletHistory $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'wallet-history-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
