<?php

class MyWalletController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
                if(!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        /*
         * Add money to user wallet by user
         */

        public function actionIndex() {
                $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);

                if(!empty($model)) {
                        $wallet_amount = $model->wallet_amt;
                        $wallet_add = new WalletHistory('addWallet');
                        if(isset($_POST['WalletHistory'])) {
                                $wallet_add->attributes = $_POST['WalletHistory'];

                                $entry_amount = $_POST['WalletHistory']['amount'];
                                $wallet_add->user_id = $model->id;

                                $wallet_add->entry_date = date('Y-m-d H:i:s');
                                $wallet_add->credit_debit = 1;
                                $wallet_add->balance_amt = $wallet_amount + $entry_amount;


                                if($wallet_add->validate()) {
                                        if($wallet_add->save()) {

                                                $this->redirect(array('Success', 'user_id' => $model->id, 'wallet_id' => $wallet_add->id));

                                                // $this->redirect(array('Error', 'wallet_id' => $wallet_add->id));
                                                $wallet_add->unsetAttributes();
                                        }
                                }
                        }
                        $this->render('index', array('wallet_add' => $wallet_add));
                }
        }

        /*
         * if payment success
         */

        public function actionSuccess($user_id, $wallet_id) {
                if(!empty($user_id) && !empty($wallet_id) && $user_id != '' && $wallet_id != '') {
                        $user_wallet = UserDetails::model()->findByPk($user_id);
                        $wallet_history = WalletHistory::model()->findByPk($wallet_id);
                        $amount = $user_wallet->wallet_amt + $wallet_history->amount;
                        $user_wallet->wallet_amt = $amount;
                        $wallet_history->field2 = 1; //success
                        if($wallet_history->save()) {
                                if($user_wallet->save()) {
                                        Yii::app()->session['user'] = $user_wallet;
                                        Yii::app()->user->setFlash('wallet_success', "Money Added Successfully");
                                        $this->redirect(array('Index'));
                                } else {
                                        $wallet_history->delete();
                                }
                        } else {
                                Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                                $this->redirect(array('Index'));
                        }
                } else {
                        Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                        $this->redirect(array('Index'));
                }
        }

        /*
         * if payment got any error
         */

        public function actionError($wallet_id) {
                if(!empty($wallet_id) && $wallet_id != '') {

                        $wallet_history = WalletHistory::model()->findByPk($wallet_id);
                        if(!empty($wallet_history)) {
                                $wallet_history->delete();
                                Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                                $this->redirect(array('Index'));
                        } else {
                                die('113:Error Occured');
                        }
                } else {
                        die('114:Error Occured');
                }
        }

        public function actionCreditHistory() {
                $history = WalletHistory::model()->findAllByAttributes(['user_id' => Yii::app()->session['user']['id']], ['order' => 'entry_date desc']);
                $this->render('wallet_history', array('history' => $history));
        }

}
