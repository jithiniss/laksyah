<?php

class ForgotPasswordController extends Controller {

        public function actionIndex() {

                if (isset($_POST['btn_submit'])) {

                        $email = $_POST['email'];
                        $user = UserDetails::model()->findByAttributes(array('email' => $email));
                        if ($user != '') {
                                $details = UserDetails::model()->findByPk($user->id);
                                $forgot = new ForgotPassword;
                                $forgot->user_id = $details->id;
                                $forgot->code = rand(10000, 1000000);
                                $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                                $forgot->status = 1;
                                $forgot->DOC = date('Y-m-d');
                                if ($forgot->save(FALSE)) {
                                        $this->SuccessMail($forgot, $token, $details);
                                        $this->render('mail');
                                } else {
                                        $this->render('sorry');
                                }exit;
                        }
                }
                $this->render('index');
        }

        public function SuccessMail($forgot, $token, $details) {

                $user = $details->email;
                //$user = 'shahana@intersmart.in';
                $user_subject = 'Please Reset Your Password';
                $user_message = 'We heard that you lost your Laksyah password. Sorry about that!<br><br>'
                        . 'But don’t worry! You can use the following link within the next day to reset your password:'
                        . '<a href="http://beta.laksyah.com/index.php/ForgotPassword/Changepassword/token/' . $token . '">Click Here to Reset Password</a><br><br>'
                        . 'Thanks';

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <no-reply@beta.laksyah.com/>' . "\r\n";
                mail($user, $user_subject, $user_message, $headers);
        }

        public function actionChangepassword($token) {

                $var = base64_decode($token);
                $arr = explode(':', $var);

                $id = $arr[0];
                $token2 = $arr[1];
                $token_test = ForgotPassword::model()->findByAttributes(array('code' => $token2, 'user_id' => $id));
                $pass1 = UserDetails::model()->findByPk($id);
                if ($token_test != '') {
                        Yii::app()->session['frgt_usrid'] = $id;
                        $token_test->delete();
                        $this->render('changepassword');
                } else {

                        echo'...Invalid user..';
                }
        }

        public
                function actionNewpassword() {
                if (isset($_POST['btn_submit'])) {

                        if (isset(Yii::app()->session['frgt_usrid'])) {

                                $id = Yii::app()->session['frgt_usrid'];
                                $pass1 = UserDetails::model()->findByPk($id);
                                $newpass = $_POST['password1'];
                                $pass1->password = $newpass;
                                $pass1->update(array('password'));
                                if ($pass1->save()) {
                                        Yii::app()->user->setFlash('success', "Your password changed.....<a href='" . Yii::app()->baseUrl . "/index.php/site/login'><u>Click here to login</u></a>");
                                } else {

                                        Yii::app()->user->setFlash('error', "Inavlid user,..");
                                        //$this->render('changepassword');
                                }
                        }
                }
                $this->render('changepassword');
        }

}
