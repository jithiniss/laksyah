<?php

class SiteController extends Controller {

        /**
         * Declares class-based actions.
         */
        public function actions() {
                return array(
// captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha' => array(
                        'class' => 'CCaptchaAction',
                        'backColor' => 0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
                    'page' => array(
                        'class' => 'CViewAction',
                    ),
                );
        }

        /**
         * This is the default 'index' action that is invoked
         * when an action is not explicitly requested by users.
         */
        public function actionIndex() {
                $model = Testimonial::model()->findAllByAttributes(array('status' => 1));
                $blog = Blog::model()->findAllByAttributes(array('status' => 1));
                $slider = Slider::model()->findAllByAttributes(array('status' => 1));
                $this->render('index', array('model' => $model, 'blog' => $blog, 'slider' => $slider));
        }

        public function actionError() {
                $error = Yii::app()->errorHandler->error;
                if ($error)
                        $this->render('error', array('error' => $error));
                else
                        throw new CHttpException(404, 'Page not found.');
        }

        /**
         * Displays the contact page
         */
        public function actionContact() {
                $model = new ContactForm;

                if (isset($_POST['ContactForm'])) {
                        $model->attributes = $_POST['ContactForm'];
                        if ($model->validate()) {
                                $name = ' = ?UTF-8?B?' . base64_encode($model->name) . '? = ';
                                $subject = ' = ?UTF-8?B?' . base64_encode($model->subject) . '? = ';
                                $headers = "From: $name <{$model->email}>\r\n" .
                                        "Reply-To: {$model->email}\r\n" .
                                        "MIME-Version: 1.0\r\n" .
                                        "Content-Type: text/plain; charset=UTF-8";

                                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                                $this->refresh();
                        }
                }
                $this->render('contact', array('model' => $model));
        }

        public function actionMywishlists() {

                if (!isset(Yii::app()->session['user'])) {
                        Yii::app()->session['wishlist_user'] = 1;
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        /**
         * Displays the login page
         */
        public function actionRegister() {


                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new UserDetails('create');
                        if (isset($_POST['UserDetails'])) {


                                $model->attributes = $_POST['UserDetails'];
                                $date1 = $_POST['UserDetails']['dob'];
                                $newDate = date("Y-m-d", strtotime($date1));
                                $model->dob = $newDate;
                                $model->gender = $_POST['UserDetails']['gender'];
                                $model->phone_no_1 = $_POST['UserDetails']['phone_no_1'];
                                $model->phone_no_2 = $_POST['UserDetails']['phone_no_2'];

                                if ($model->validate()) {
                                        $model->status = 1;
                                        $model->CB = 1;
                                        $model->UB = 1;
                                        $model->DOC = date('Y-m-d');

                                        if ($model->password == $model->confirm) {
                                                if ($model->save()) {

                                                        //       $this->SendMail($model);
                                                        //       $this->adminmail($model);
//Yii::app()->user->setFlash('success', "Dear, $model->first_name, your message has been sent successfully");
                                                        Yii::app()->session['user'] = $model;
                                                        if (Yii::app()->session['temp_user'] != '') {

                                                                ProductViewed::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                                                Cart::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                                                UserWishlist::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                                                unset(Yii::app()->session['temp_user']);
                                                        }
                                                        //  $this->redirect('site/index');
                                                        $this->redirect(Yii::app()->request->baseUrl .
                                                                '/index.php/site/index');
                                                } else {
// Yii::app()->user->setFlash('error', "Sorry! Message seniding Failed..");
                                                }
                                        } else {
                                                $model->addError(confirm, 'password mismatch');
                                        }
                                }
                        }
                        $this->render('register', array('model' => $model));
                }
        }

        /* mail to user and admin */

        public function SendMail($model) {


                $newDate = date("d-m-Y", strtotime($model->DOC));
                //$to = 'rejin@intersmart.in';
                $to = $model->email;

                $subject = 'info_lakshya';
                $message = $this->renderPartial(_user_mail, array('model' => $model));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                //  echo $message;
                //  exit();
                //  mail($to, $subject, $message, $headers);
        }

        public function Adminmail($model) {


                $newDate = date("d-m-Y", strtotime($model->DOC));
                $to = 'admin@intersmart.in';
                // $to = $model->email;

                $subject = 'info_lakshya';
                $message = $this->renderPartial(_admin_mail, array('model' => $model));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                //  echo $message;
                //   exit();
                //  mail($to, $subject, $message, $headers);
        }

        /**
         * Displays the login page
         */
        public function actionLogin() {
                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new UserDetails();
                        if (isset($_REQUEST['UserDetails'])) {

                                $modell = UserDetails::model()->findByAttributes(array('email' => $_REQUEST['UserDetails']['email'], 'password' => $_REQUEST['UserDetails']['password'], 'status' => 1));

                                if ($modell != '' && $modell != NULL) {


                                        Yii::app()->session['user'] = $modell;
                                        if (isset(Yii::app()->session['temp_user'])) {
//  Cart::model()->deleteAllByAttributes(array("user_id" => $modell->id));

                                                Cart::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                                UserWishlist::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                                ProductViewed::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                                unset(Yii::app()->session['temp_user']);
                                        }
                                        if (Yii::app()->session['login_flag'] != '' && Yii::app()->session['login_flag'] == 1) {
                                                unset(Yii::app()->session['login_flag']);

                                                $this->redirect($this->createUrl('/Cart/Proceed'));
                                        } else {
                                                unset(Yii::app()->session['wishlist_user']);
                                                $this->redirect($this->createUrl('/site/index'));
                                        }
                                } else {

                                        $model->addError('password', 'invalid username or password');
                                }
                        }
                        if (isset(Yii::app()->session['wishlist_user'])) {

                                Yii::app()->user->setFlash('wishlist_user', "Dear, You must login to see Wishlist Items");
                        }

                        $this->render('login', array('model' => $model));
                }
        }

        /**
         * Logs out the current user and redirect to homepage.
         */
        public function actionLogout() {
// Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                Yii::app()->user->logout();
                unset(Yii::app()->session['user']);
                unset($_SESSION);
                $this->redirect(Yii::app()->homeUrl);
        }

        public function actionBookAppointment() {
                $model = new BookAppointment;
                if (isset($_POST['BookAppointment'])) {
                        $model->attributes = $_POST['BookAppointment'];
                        $model->date = date("Y-m-d");
                        if ($model->validate()) {
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', " Your Appointment Booked successfully");
                                } else {
                                        Yii::app()->user->setFlash('error', "Error Occured");
                                }
                                $this->redirect(array('site/BookAppointment'));
                        }
                }
                $this->render('appointment', array('model' => $model));
        }

        public function actioncontactUs() {
                $model = new ContactUs;
                if (isset($_POST['ContactUs'])) {
                        $model->attributes = $_POST['ContactUs'];
                        $model->date = date("Y-m-d");
                        if ($model->validate()) {
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', " Your email send successfully");
                                } else {
                                        Yii::app()->user->setFlash('error', "Error Occured");
                                }

                                $this->redirect(array('site/contactUs'));
                        }
                }
                $this->render('contact', array('model' => $model));
        }

        public function actionNewsLetter() {
                if (isset($_POST['submit'])) {
                        $model = new Newsletter;
                        $model->email = $_POST['email'];
                        $model->date = date('Y-m-d');
                        $model->save();
                        $this->redirect('Index');
                }
        }

        public function actionCurrencyChange($id) {
                $data = Currency::model()->findByPk($id);
                Yii::app()->session['currency'] = $data;
                $this->redirect(Yii::app()->request->urlReferrer);
        }

        public function actionGiftcard() {
                $model = GiftCard::model()->findAll();

                $this->render('giftcard', array('model' => $model));
        }

}
