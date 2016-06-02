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
                if($error)
                        $this->render('error', array('error' => $error));
                else
                        throw new CHttpException(404, 'Page not found.');
        }

        /**
         * Displays the contact page
         */
        public function actionContact() {
                $model = new ContactForm;

                if(isset($_POST['ContactForm'])) {
                        $model->attributes = $_POST['ContactForm'];
                        if($model->validate()) {
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

                if(!isset(Yii::app()->session['user'])) {
                        Yii::app()->session['wishlist_user'] = 1;
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        /**
         * Displays the login page
         */
        public function actionRegister() {


                if(isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new UserDetails('create');
                        if(isset($_POST['UserDetails'])) {


                                $model->attributes = $_POST['UserDetails'];
                                $date1 = $_POST['UserDetails']['dob'];
                                $newDate = date("Y-m-d", strtotime($date1));
                                $model->dob = $newDate;
                                $model->gender = $_POST['UserDetails']['gender'];
                                $model->phone_no_1 = $_POST['UserDetails']['phone_no_1'];
                                $model->phone_no_2 = $_POST['UserDetails']['phone_no_2'];

                                if($model->validate()) {
                                        $model->status = 1;
                                        $model->CB = 1;
                                        $model->UB = 1;
                                        $model->DOC = date('Y-m-d');

                                        if($model->password == $model->confirm) {
                                                if($model->save()) {

                                                        $this->SendMail($model);
                                                        $this->adminmail($model);
                                                        Yii::app()->user->setFlash('success', "Dear, $model->first_name, your message has been sent successfully");
                                                        Yii::app()->session['user'] = $model;
                                                        if(Yii::app()->session['temp_user'] != '') {

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
                mail($to, $subject, $message, $headers);
        }

        public function Adminmail($model) {



                $to = 'rejin@intersmart.in';
                // $to = $model->email;

                $subject = 'info_lakshya';
                $message = $this->renderPartial('_admin_mail', array('model' => $model));
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-reply@lakshya.com>' . "\r\n";
                //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                //  echo $message;
                //   exit();
                mail($to, $subject, $message, $headers);
        }

        /**
         * Displays the login page
         */
        public function actionLogin() {

                if(isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $model = new UserDetails();
                        if(isset($_REQUEST['UserDetails'])) {

                                $modell = UserDetails::model()->findByAttributes(array('email' => $_REQUEST['UserDetails']['email'], 'password' => $_REQUEST['UserDetails']['password'], 'status' => 1));

                                if(!empty($modell)) {

                                        Yii::app()->session['user'] = $modell;

                                        if($_POST['gift_id'] != '') {

                                                $this->redirect($this->createUrl('/giftcard/index', array('card_id' => $_POST['gift_id'])));
                                        }
                                        if(isset(Yii::app()->session['temp_user'])) {


                                                Cart::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                                UserWishlist::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                                ProductViewed::model()->updateAll(array("user_id" => $modell->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                                unset(Yii::app()->session['temp_user']);
                                        }
                                        if(Yii::app()->session['login_flag'] != '' && Yii::app()->session['login_flag'] == 1) {
                                                unset(Yii::app()->session['login_flag']);

                                                $this->redirect($this->createUrl('/Cart/Proceed'));
                                        } else {
                                                unset(Yii::app()->session['wishlist_user']);
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        }
                                } else {


                                        Yii::app()->user->setFlash('login_list', "Username or password invalid");
                                }
                        }
                        if(isset(Yii::app()->session['wishlist_user'])) {

                                Yii::app()->user->setFlash('wishlist_user', "Dear, You must login to see Wishlist Items");
                        }

                        //$this->redirect(Yii::app()->request->urlReferrer);

                        $this->render('login_new', array('model' => $model));
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
                if(isset($_POST['BookAppointment'])) {
                        $model->attributes = $_POST['BookAppointment'];
                        $model->date = date("Y-m-d");
                        if($model->validate()) {
                                if($model->save()) {
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
                if(isset($_POST['ContactUs'])) {
                        $model->attributes = $_POST['ContactUs'];
                        $model->date = date("Y-m-d");
                        if($model->validate()) {
                                if($model->save()) {
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
                if(isset($_POST['submit'])) {
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

        public function actionBlog() {
                $dataProvider = new CActiveDataProvider('Blog', array(
                    'criteria' => array(
                        'condition' => 'status=1',
                        'order' => 'DOC DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                $this->render('blogs', array('dataProvider' => $dataProvider));
        }

        public function actionBlogDetails($blog) {
                $model = Blog::model()->findByPk($blog);
                $last_id = Blog::model()->find(array('order' => 'id DESC'));
                $first_id = Blog::model()->find(array('order' => 'id ASC'));
                $this->render('blog_details', array('model' => $model, 'last_id' => $last_id, 'first_id' => $first_id));
        }

        public function actionBlogDetailsPrevious($currentId) {
                $prevId = $this->getNextOrPrevId($currentId, 'prev');
                $model = Blog::model()->findByPk($prevId);
                $this->render('blog_details', array('model' => $model));
        }

        public function actionBlogDetailsNext($currentId) {
                $nextId = $this->getNextOrPrevId($currentId, 'next');
                $model = Blog::model()->findByPk($nextId);
                $this->render('blog_details', array('model' => $model));
        }

        public function actionAboutUs() {
                $model = '';
                $this->render('about_us', array('model' => $model));
        }

        public function actionContactLakysah() {
                $model = '';
                $this->render('contact_us', array('model' => $model));
        }

        public function actionProductSubmission() {
                $model = '';
                $this->render('product_submission', array('model' => $model));
        }

        public function actionPrivacyPolicy() {
                $model = '';
                $this->render('privacy_policy', array('model' => $model));
        }

        public function actionFaq() {
                $model = '';
                $this->render('faq', array('model' => $model));
        }

        public function actionSupport() {
                $model = '';
                $this->render('support', array('model' => $model));
        }

        public function actionGuarantees() {
                $model = '';
                $this->render('Guarantees', array('model' => $model));
        }

        public function actionShippingPolicy() {
                $model = '';
                $this->render('Shipping_Policy', array('model' => $model));
        }

        public function actionReturnPolicy() {
                $model = '';
                $this->render('Return_Policy', array('model' => $model));
        }

        public function actionPublicPickup() {
                $model = '';
                $this->render('Public_Pickup', array('model' => $model));
        }

        public function actionSecurity() {
                $model = '';
                $this->render('Security', array('model' => $model));
        }

        public function actionTerms() {
                $model = '';
                $this->render('Terms', array('model' => $model));
        }

        public static function getNextOrPrevId($currentId, $nextOrPrev) {
                $records = NULL;
                if($nextOrPrev == "prev")
                        $order = "id DESC";
                if($nextOrPrev == "next")
                        $order = "id ASC";

                $records = Blog::model()->findAll(
                        array('select' => 'id', 'order' => $order)
                );

                foreach($records as $i => $r)
                        if($r->id == $currentId)
                                return $records[$i + 1]->id ? $records[$i + 1]->id : NULL;

                return NULL;
        }

}
