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
                        $wallet_add = new WalletHistory('addWallet1');
                        if(isset($_POST['WalletHistory'])) {
                                $wallet_add->attributes = $_POST['WalletHistory'];

                                $entry_amount = $_POST['WalletHistory']['amount'];
                                $wallet_add->user_id = $model->id;

                                $wallet_add->entry_date = date('Y-m-d H:i:s');
                                $wallet_add->credit_debit = 1;
                                $wallet_add->balance_amt = $wallet_amount + $entry_amount;


                                if($wallet_add->validate()) {
                                        if($wallet_add->save()) {

                                                $this->redirect(array('CreditSuccess', 'user_id' => $model->id, 'wallet_id' => $wallet_add->id));

                                                //  $this->redirect(array('CreditError', 'wallet_id' => $wallet_add->id));
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

        public function actionCreditSuccess($user_id, $wallet_id) {
                $user_wallet = UserDetails::model()->findByPk($user_id);
                $wallet_history = WalletHistory::model()->findByPk($wallet_id);
                if(!empty($user_id) && !empty($wallet_id)) {

                        $amount = $user_wallet->wallet_amt + $wallet_history->amount;
                        $user_wallet->wallet_amt = $amount;
                        $wallet_history->field2 = 1; //success
                        if($wallet_history->save()) {
                                if($user_wallet->save()) {
                                        Yii::app()->session['user'] = $user_wallet;
                                        Yii::app()->user->setFlash('wallet_success', "Money Added Successfully");
                                        $this->SuccessMail($wallet_history->id);

                                        $this->redirect(array('Index'));
                                } else {
                                        $wallet_history->delete();
                                }
                        } else {
                                Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                                $this->redirect(array('CreditError', 'wallet_id' => $wallet_history->id));
                        }
                } else {
                        Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                        $this->redirect(array('CreditError', 'wallet_id' => $wallet_history->id));
                }
        }

        /*  send mail to admin and user */

        public function SuccessMail($wallet_id) {
                $user_wallet = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $wallet_history = WalletHistory::model()->findByPk($wallet_id);
                //$user = $userdetails->email;

                $credit_amount = Yii::app()->Currency->convert($wallet_history->amount);

                $user = 'sibys09@gmail.com';
                $user_subject = 'laksyah.com : Credit Money ' . $credit_amount . ' has been successfully added!';
                $user_message = $this->renderPartial('_user_wallet_mail', array('user_wallet' => $user_wallet, 'wallet_history' => $wallet_history), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = 'laksyah.com : Credit Money ' . $credit_amount . ' has been successfully added to ' . $user_wallet->first_name;
                $admin_message = $this->renderPartial('_admin_wallet_mail', array('user_wallet' => $user_wallet, 'wallet_history' => $wallet_history), true);
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
         * if payment got any error
         */

        public function actionCreditError($wallet_id) {
                $wallet_history = WalletHistory::model()->findByPk($wallet_id);

                $username = UserDetails::model()->findByPk($wallet_history->user_id);
                if(!empty($wallet_history) && !empty($username)) {

                        $this->errorMail($wallet_history->id);
                        $wallet_history->delete();
                        Yii::app()->user->setFlash('wallet_error', "Oops some error occured.Transaction rejected.");
                        $this->redirect(array('Index'));
                } else {
                        die('114:Error Occured');
                }
        }

        /* error mail for user */

        public function ErrorMail($wallet_id) {


                $user_wallet = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $wallet_history = WalletHistory::model()->findByPk($wallet_id);
                //$user = $userdetails->email;



                $user = 'sibys09@gmail.com';
                $user_subject = 'laksyah.com : Transaction Failure - Credit Money!';
                $user_message = $this->renderPartial('_error_wallet_mail', array('user_wallet' => $user_wallet, 'wallet_history' => $wallet_history), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = 'laksyah.com : Credit Money ' . $credit_amount . ' has been successfully added to ' . $user_wallet->first_name;
                $admin_message = $this->renderPartial('_admin_wallet_mail', array('user_wallet' => $user_wallet, 'wallet_history' => $wallet_history), true);
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

        public function actionCreditHistory() {
                $history = WalletHistory::model()->findAllByAttributes(['user_id' => Yii::app()->session['user']['id']], ['order' => 'entry_date desc']);
                $this->render('wallet_history', array('history' => $history));
        }

}
