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
                // renders the view file 'protected/views/site/index.php'
                // using the default layout 'protected/views/layouts/main.php'

                $this->layout = "login";
                $model = new AdminUser('signin');
                if (isset($_POST['AdminUser'])) {
                        $model->attributes = $_POST['AdminUser'];
                        if ($model->validate()) {
                                $admin = AdminUser::model()->findByAttributes(array('username' => $model->username, 'password' => $model->password));
                                if ($admin == '') {
                                        $model->addError(password, 'invalid username or password');
                                }
                                else {
                                        $id = $admin->admin_post_id;
                                        $post = AdminPost::model()->findByPk($id);
                                        Yii::app()->session['post'] = $post;

                                        yii::app()->session['admin'] = $admin->attributes;
                                        $this->redirect(array('site/home'));
                                }
                        }
                }



                $this->render('login', array(
                    'model' => $model,
                ));

        }

        public function actionHome() {
                // renders the view file 'protected/views/site/index.php'
                // using the default layout 'protected/views/layouts/main.php'
                if (!isset(Yii::app()->session['admin'])) {
                        $this->redirect('logOut');
                }
                $this->render('index');

        }

        /**
         * This is the action to handle external exceptions.
         */
        public function actionError() {
                if ($error = Yii::app()->errorHandler->error) {
                        if (Yii::app()->request->isAjaxRequest)
                                echo $error['message'];
                        else
                                $this->render('error', $error);
                }

        }

        /**
         * Displays the contact page
         */
        public function actionContact() {
                $model = new ContactForm;
                if (isset($_POST['ContactForm'])) {
                        $model->attributes = $_POST['ContactForm'];
                        if ($model->validate()) {
                                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
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

        public function actionCategoryTagAdd() {

                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['tag'])) {
                                $model = new MasterCategoryTags;
                                $model->category_tag = $_REQUEST['tag'];
                                $model->CB = Yii::app()->session['admin']['id'];
                                $model->UB = Yii::app()->session['admin']['id'];
                                $model->DOC = date('Y-m-d');
                                $model->save(false);
                        }
                }

        }

        public function actionCategoryTag() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_tag', $_REQUEST['tag'], 'AND');

                        //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_tag', $arrs, 'AND');
                        }
                        $tags = MasterCategoryTags::model()->findAll($criteria);
                        foreach ($tags as $tag) {
                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub">' . $tag->category_tag . '</div>';
                        }
                }

        }

        public function actionCategoryCat() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_name', $_REQUEST['tag'], 'AND');

                        //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_name', $arrs, 'AND');
                        }
                        $tags = ProductCategory::model()->findAll($criteria);
                        $options = array();
                        $_SESSION['category'][0] = '';
                        foreach ($tags as $tag) {
                                unset($_SESSION['category']);
                                $cat_parent = $this->findParent(ProductCategory::model()->findByPk($tag->id));
                                //echo $cat_parent;

                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub" id="' . $tag->id . '">' . $cat_parent . '</div>';
                        }
                }

        }

        public function findParent($data) {
//                $master = ProductCategory::model()->findByPk($parent);
//                if ($master != '') {
//                        if ($master->id == $master->parent) {
//                                return $master->category_name;
//                        }
//                        else {
//                                return $this->findParent($master->parent);
//                        }
//                }
//                else {
//                        return $parent;
//                }

                $index = count($_SESSION['category']);
                if ($data->id == $data->parent) {
                        $_SESSION['category'][$index + 1] = $data->category_name;
                }
                else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->category_name;
                        return $this->findParent($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                }
                return rtrim($return, '>');

        }

        /**
         * Displays the login page
         */
        public function actionLogin() {
                $model = new LoginForm;

                // if it is ajax validation request
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }

                // collect user input data
                if (isset($_POST['LoginForm'])) {
                        $model->attributes = $_POST['LoginForm'];
                        // validate user input and redirect to the previous page if valid
                        if ($model->validate() && $model->login())
                                $this->redirect(Yii::app()->user->returnUrl);
                }
                // display the login form
                $this->render('login', array('model' => $model));

        }

        /**
         * Logs out the current user and redirect to homepage.
         */
        public function actionLogout() {
                Yii::app()->user->logout();
                unset(Yii::app()->session['admin']);
                unset(Yii::app()->session['post']);
                $this->redirect(Yii::app()->homeUrl);

        }
}
