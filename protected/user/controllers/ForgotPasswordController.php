<?php

class ForgotPasswordController extends Controller {

        public function actionIndex() {

                if(isset($_POST['btn_submit'])) {
                        $email = $_POST['email'];
                        $user = UserDetails::model()->findByAttributes(array('email' => $email));
                        if($user != '') {
                                $this->render('confirmation', array('model' => $user));
                                exit();
                        } else {
                                $this->render('sorry');
                                exit();
                        }
                }
                $this->render('index');
        }

        public function actionMail() {
                if($_REQUEST['id'] != 0) {
                        $id = $_REQUEST['id'];
                        $details = UserDetails::model()->findByPk($id);
                        $forgot = new ForgotPassword;
                        $forgot->user_id = $details->id;
                        $forgot->code = rand(10000, 1000000);
                        $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                        $forgot->status = 1;
                        $forgot->DOC = date('Y-m-d');
                        $forgot->save();
                        $to = $details->email;
                        $subject = 'Password Reset Link';
                        echo $message = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th><a href="http://localhost/laksyah/index.php/ForgotPassword/Changepassword/token/' . $token . '">Click Here to Reset Password</a></th>
</tr>
</table>
</body>
</html>';
                        exit();
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: <picklebowl.com>' . "\r\n";
//mail($to, $subject, $message, $headers);
                        $this->render('mail');
                } else {
                        $this->render('sorry');
                }
        }

        public function actionChangepassword($token) {

                $var = base64_decode($token);
                $arr = explode(':', $var);
                $id = $arr[0];
                $token2 = $arr[1];
                $token_test = ForgotPassword::model()->findByAttributes(array('code' => $token2, 'user_id' => $id));
                $pass1 = UserDetails::model()->findByPk($id);
                if($token_test != '') {
                        Yii::app()->session['frgt_usrid'] = $id;
                        $token_test->delete();
                        $this->render('changepassword');
                } else {

                        echo'...Invalid user..';
                }
        }

        public function actionNewpassword() {
                if(isset($_POST['btn_submit'])) {

                        if(isset(Yii::app()->session['frgt_usrid'])) {

                                $id = Yii::app()->session['frgt_usrid'];
                                $pass1 = UserDetails::model()->findByPk($id);
                                $newpass = $_POST['password1'];
                                $pass1->password = $newpass;
                                $pass1->update(array('password'));
                                if($pass1->save()) {
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
