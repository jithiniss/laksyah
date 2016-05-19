<?php

class SliderController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['post']['cms']) || Yii::app()->session['post']['cms'] != 1) {
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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
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
                $model = new Slider('create');

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);
                //  die(Yii::app()->basePath);
                if (isset($_POST['Slider'])) {
                        $model->attributes = $_POST['Slider'];
                        $image_extension = CUploadedFile::getInstance($model, 'image_extension');
                        $model->image_extension = $image_extension->extensionName;
                        $model->content = $_POST['Slider']['content'];
                        $model->CB = Yii::app()->session['admin']['id'];
                        $model->DOC = date('Y-m-d');
                        if ($model->save()) {
                                $image_extension->saveAs(Yii::app()->basePath . "/../uploads/sliders/" . $model->id . "." . $image_extension->extensionName);
                                $this->redirect(array('admin', 'id' => $model->id));
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
                $model->setScenario('update');
                $image = $model->image_extension;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['Slider'])) {
                        $image_extension = CUploadedFile::getInstance($model, 'image_extension');
                        $model->attributes = $_POST['Slider'];
                        $model->UB = Yii::app()->session['admin']['id'];
                        $model->DOU = date('Y-m-d');
                        $model->image_extension = $image_extension->extensionName;
                        $model->content = $_POST['Slider']['content'];
                        if ($image_extension == "") {
                                $model->image_extension = $image;
                        } else {
                                $image_extension->saveAs(Yii::app()->basePath . "/../uploads/sliders/" . $model->id . "." . $image_extension->extensionName);
                        }
                        if ($model->save()) {
                                $this->redirect(array('admin', 'id' => $model->id));
                        }
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

                $model = $this->loadModel($id);
                if (unlink(Yii::app()->basePath . "/../uploads/sliders/" . $model->id . "." . $model->image_extension)) {
                        $model->delete();
                }
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('Slider');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new Slider('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Slider']))
                        $model->attributes = $_GET['Slider'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Slider the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Slider::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Slider $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'slider-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
