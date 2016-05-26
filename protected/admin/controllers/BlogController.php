<?php

class BlogController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['admin']) || Yii::app()->session['post']['cms'] != 1) {
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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'ImageDelete'),
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
                $model = new Blog;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['Blog'])) {
                        $model->attributes = $_POST['Blog'];
                        $model->status = $_POST['Blog']['status'];
                        $small_image = CUploadedFile::getInstance($model, 'small_image');
                        $big_image = CUploadedFile::getInstance($model, 'big_image');


                        //var_dump($model->attributes);
                        //die;
                        if (isset($small_image)) {
                                $model->small_image = $small_image->extensionName;
                        }

                        if (isset($big_image)) {
                                $model->big_image = $big_image->extensionName;
                        }
                        if ($model->save()) {
                                if ($model->big_image != "") {
                                        $this->ImageUpload($big_image, 'blog', $model->id, 'big');
                                }
                                if ($model->small_image != "") {
                                        $this->ImageUpload($small_image, 'blog', $model->id, 'small');
                                }
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
                $small_image = $model->small_image;
                $big_image = $model->big_image;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['Blog'])) {
                        $model->attributes = $_POST['Blog'];
                        $model->status = $_POST['Blog']['status'];
                        $big = CUploadedFile::getInstance($model, 'big_image');
                        $small = CUploadedFile::getInstance($model, 'small_image');
                        if (isset($big)) {
                                $model->big_image = $big->extensionName;
                        } else {
                                $model->big_image = $big_image;
                        }

                        if (isset($small)) {

                                $model->small_image = $small->extensionName;
                        } else {
                                $model->small_image = $small_image;
                        }

                        if ($model->save())
                                if ($model->big_image != "") {
                                        $this->ImageUpload($big, 'blog', $model->id, 'big');
                                }
                        if ($model->small_image != "") {
                                $this->ImageUpload($small, 'blog', $model->id, 'small');
                        }
                        $this->redirect(array('admin', 'id' => $model->id));
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
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        public function actionImageDelete() {

                if (isset($_GET['id'], $_GET['type'])) {
                        $id = $_GET['id'];
                        $type = $_GET['type'];
                        switch ($type) {

                                case "small":
                                        $img_type = "small_image";
                                        break;
                                case "big":
                                        $img_type = "big_image";
                                        break;
                        }
                        $model = $this->loadModel($id);
                        $image = $model->$img_type;
                        $path = Yii::app()->basePath . '/../uploads/blog/' . $model->id . '/' . $type . '.' . $image;
                        //echo $path;
                        //die;
                        unlink($path);
                        $model->$img_type = '';
                        $model->save(false);
                        $this->redirect(Yii::app()->baseUrl . '/admin.php/Blog/update/id/' . $model->id);
                }
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('Blog');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new Blog('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Blog']))
                        $model->attributes = $_GET['Blog'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        public function ImageUpload($uploadedFile, $folder, $id, $name) {
                if (isset($uploadedFile)) {

                        if (Yii::app()->basePath . '/../uploads') {
                                chmod(Yii::app()->basePath . '/../uploads', 0777);

                                if (!is_dir(Yii::app()->basePath . '/../uploads/' . $folder . '/'))
                                        mkdir(Yii::app()->basePath . '/../uploads/' . $folder . '/');
                                chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/', 0777);

                                if (!is_dir(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/'))
                                        mkdir(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/');
                                chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/', 0777);

                                if ($uploadedFile->saveAs(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName, 0777);
                                        return true;
                                } else {
                                        return false;
                                }
                        } else {
                                return false;
                        }
                } else {
                        return false;
                }
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Blog the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Blog::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Blog $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'blog-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
