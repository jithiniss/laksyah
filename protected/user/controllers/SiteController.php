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
                                $model->wallet_amt = '0.00';
                                $model->email_verification = 0;
                                if($model->validate()) {
                                        $model->status = 1;
                                        $model->CB = 1;
                                        $model->UB = 1;
                                        $model->DOC = date('Y-m-d');
                                        $model->verify_code = rand(1000, 9999);
                                        if($model->password == $model->confirm) {
                                                if($model->save()) {


                                                        if($model->email_verification == 0) {
                                                                Yii::app()->user->setFlash('emailverify', "One Time Password (OTP) has been sent to your email <b>" . $model->email . "</b>, please enter the same here to access your account.");

                                                                Yii::app()->user->setFlash('verify_code', $model->id);
                                                                Yii::app()->session['user_email_verify'] = $model->id;
                                                                Yii::app()->session['gift_card_option'] = $_POST['gift_id'];
                                                                $this->VerificationMail($model);
                                                        }

                                                        $this->siteNavigator($model);
                                                }
                                        } else {
                                                $model->addError('confirm', 'password mismatch');
                                        }
                                }
                        }
                        if(isset($_POST['verify_email'])) {

                                $unverified_user = UserDetails::model()->findByPk(Yii::app()->session['user_email_verify']);
                                if($unverified_user->verify_code == $_POST['verify_code']) {
                                        $unverified_user->email_verification = 1;
                                        $unverified_user->status = 1;
                                        $unverified_user->save(FALSE);
                                        $this->RegisterMail($unverified_user);

                                        $this->siteNavigator($unverified_user);
                                } else {
                                        Yii::app()->user->setFlash('email_verification1', "Invalid OTP.Try Again..");
                                }
                        }
                        $this->render('register', array('model' => $model));
                }
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



                                $modell = UserDetails::model()->findByAttributes(array('email' => $_REQUEST['UserDetails']['email'], 'password' => $_REQUEST['UserDetails']['password']));

                                if(!empty($modell)) {
                                        if($modell->status == 0) {
                                                Yii::app()->user->setFlash('login_list', "Access Denied.Contact Laksyah");
                                        } else if($modell->email_verification == 0) {


                                                Yii::app()->user->setFlash('emailverify', "One Time Password (OTP) has been sent to your email <b>" . $modell->email . "</b>, please enter the same here to access your account.");

                                                Yii::app()->user->setFlash('verify_code', $modell->id);
                                                Yii::app()->session['user_email_verify'] = $modell->id;
                                                Yii::app()->session['gift_card_option'] = $_POST['gift_id'];

                                                $this->VerificationMail($modell);
                                        } else if($modell->email_verification == 1 && $modell->status == 1) {
                                                Yii::app()->user->setFlash('emailverify', null);
                                                Yii::app()->user->setFlash('email_verification1', null);


                                                $this->siteNavigator($modell);
                                        }
                                } else {
                                        Yii::app()->user->setFlash('login_list', "Username or password invalid");
                                }
                        }

                        if(isset($_POST['verify_email'])) {

                                $unverified_user = UserDetails::model()->findByPk(Yii::app()->session['user_email_verify']);

                                if($unverified_user->verify_code == $_POST['verify_code']) {
                                        $unverified_user->email_verification = 1;
                                        $unverified_user->status = 1;
                                        $unverified_user->save(FALSE);
                                        unset(Yii::app()->session['user_email_verify']);
                                        $this->siteNavigator($unverified_user);
                                } else {
                                        Yii::app()->user->setFlash('email_verification1', "Invalid OTP.Try Again..");
                                }
                        }

                        $this->render('login_new', array('model' => $model));
                }
        }

        public function siteNavigator($model) {

                if($model->email_verification == 1) {


                        Yii::app()->session['user'] = $model;
                        if(isset(Yii::app()->session['gift_card_option']) != '') {

                                $this->redirect($this->createUrl('/giftcard/index', array('card_id' => Yii::app()->session['gift_card_option'])));
                        } else if(isset(Yii::app()->session['temp_user'])) {


                                Cart::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                UserWishlist::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);
                                ProductViewed::model()->updateAll(array("user_id" => $model->id, 'session_id' => ''), 'session_id=' . Yii::app()->session['temp_user']);

                                unset(Yii::app()->session['temp_user']);
                        } else if(Yii::app()->session['measure_details'] != '') {
                                $this->redirect($this->createUrl('/Myaccount/SizeChartType?m=' . Yii::app()->session['measure_details']));
                        } else if(Yii::app()->session['make_paid'] != '') {
                                $this->redirect($this->createUrl('/Myaccount/Makepayment?p=' . Yii::app()->session['make_paid']));
                        } else if(Yii::app()->session['login_flag'] != '' && Yii::app()->session['login_flag'] == 1) {
                                unset(Yii::app()->session['login_flag']);

                                $this->redirect($this->createUrl('/Cart/Proceed'));
                        } else {

                                unset(Yii::app()->session['wishlist_user']);

                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/index');
                        }
                        if(isset(Yii::app()->session['wishlist_user'])) {

                                Yii::app()->user->setFlash('wishlist_user', "Dear, You must login to see Wishlist Items");
                        }
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/index');
                }
        }

        /* mail to user and admin */

        public function RegisterMail($model) {
//$user=$model->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'Welcome to laksyah.com!';
                $user_message = $this->renderPartial('_register_user_mail', array('model' => $model), true);

                $admin = 'sibys09@gmail.com';
                $admin_subject = $model->first_name . ' registered with laksyah';
                $admin_message = $this->renderPartial('_register_admin_mail', array('model' => $model), true);
// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";


                mail($user, $user_subject, $user_message, $headers);
                mail($admin, $admin_subject, $admin_message, $headers);
        }

        /* mail to user and admin */

        public function VerificationMail($model) {
//$user=$model->email;
                $user = 'sibys09@gmail.com';
                $user_subject = 'laksyah Account - ' . $model->verify_code . ' is your verification code for secure access!';
                $user_message = $this->renderPartial('_verify_user_mail', array('model' => $model), true);


// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";


                mail($user, $user_subject, $user_message, $headers);
        }

        /**
         * Logs out the current user and redirect to homepage.
         */
        public function actionLogout() {
// Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                Yii::app()->user->logout();
                unset(Yii::app()->session['user']);
// unset($_SESSION);
                $this->redirect(Yii::app()->homeUrl);
        }

        public function actionBookAppointment() {
                $model = new BookAppointment;
                $measure = StaticPage::model()->findByPk(8);

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
                $this->render('appointment', array('model' => $model, 'measure' => $measure));
        }

        public function actioncontactUs() {
                $model = new ContactUs;
                if(isset($_POST['ContactUs'])) {
                        $model->attributes = $_POST['ContactUs'];
                        $model->date = date("Y-m-d");
                        if($model->validate()) {
                                if($model->save()) {
                                        Yii::app()->user->setFlash('success', " Your email sent successfully");
                                } else {
                                        Yii::app()->user->setFlash('error', "Error Occured");
                                }

                                $this->redirect(array('site/contactUs'));
                        }
                }
                $this->render('contact_us', array('model' => $model));
        }

        public function actionNewsLetter() {
                $model = new Newsletter;
                if(isset($_POST['submit'])) {
                        $model->attributes = $_POST['submit'];
                        $model->first_name = $_POST['Newsletter']['first_name'];
                        $model->email = $_POST['Newsletter']['email'];
                        $model->status = 1;
                        $model->date = date('Y-m-d');
                        if($model->validate()) {
                                if($model->save()) {
// $this->SuccessMail();
                                        Yii::app()->user->setFlash('newsletter', " Your email sent successfully");
                                } else {
                                        Yii::app()->user->setFlash('error_newsletter', "Error Occured");
                                }
                        } else {
                                if($model->first_name != '' || $model->email != '') {
                                        Yii::app()->user->setFlash('newslettererror', "Please Fill the Feilds in correct format");
                                } else {
                                        Yii::app()->user->setFlash('newslettererror1', "Please Fill the  Feilds");
                                }
                        }
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

        public function SuccessMail() {

//$user = $model->email;
                $user = 'shahana@intersmart.in';
                $user_subject = 'News Letter Confirmation';
                $user_message = 'Your Email added  successfully in our news letter!';

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
// echo $user_message;
// echo $admin_message;
//unset(Yii::app()->session['orderid']);
// exit;
                mail($user, $user_subject, $user_message, $headers);
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
                $model = StaticPage::model()->findByPk(2);
                $this->render('about_us', array('model' => $model));
        }

        public function actionContactLakysah() {
                $model = '';
                $this->render('contact_us', array('model' => $model));
        }

        public function actionLocationLakysah() {
                $model = '';
                $this->render('laksyah_location', array('model' => $model));
        }

        public function actionLeavemessage() {
                $model = '';
                $this->render('leave_message', array('model' => $model));
        }

        public function actionProductSubmission() {
                $model = StaticPage::model()->findByPk(6);
                $this->render('product_submission', array('model' => $model));
        }

        public function actionPrivacyPolicy() {
//$model = StaticPage::model()->findByPk(13);
//$this->render('privacy_policy', array('model' => $model));
                $this->render('privacy_policy');
        }

        public function actionFaq() {
//                $model = QAndA::model()->findByPk(1);
//                $this->render('faq', array('model' => $model));
                $this->render('faq');
        }

        public function actionSupport() {
                $model = StaticPage::model()->findByPk(7);
                $this->render('support', array('model' => $model));
        }

        public function actionGuarantees() {
                $model = StaticPage::model()->findByPk(9);
                $this->render('Guarantees', array('model' => $model));
        }

        public function actionShippingPolicy() {
                $model = StaticPage::model()->findByPk(11);
                $this->render('Shipping_Policy', array('model' => $model));
        }

        public function actionReturnPolicy() {
                $model = StaticPage::model()->findByPk(10);
                $this->render('Return_Policy', array('model' => $model));
        }

        public function actionPublicPickup() {
                $model = StaticPage::model()->findByPk(12);
                $this->render('Public_Pickup', array('model' => $model));
        }

        public function actionSecurity() {
                $model = StaticPage::model()->findByPk(5);
                $this->render('Security', array('model' => $model));
        }

        public function actionTerms() {
//  $model = StaticPage::model()->findByPk(4);
//  $this->render('Terms', array('model' => $model));
                $this->render('Terms');
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

        public function actionCareers() {
                $model = StaticPage::model()->findByPk(14);
                $this->render('careers', array('model' => $model));
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName;
        }

}
