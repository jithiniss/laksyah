<?php

class ProductCategoryController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                $test = Yii::app()->session['post']['products'];
                if (!isset(Yii::app()->session['admin']) || $test != 1) {
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

                $model = new ProductCategory('create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['ProductCategory'])) {

                        $image = CUploadedFile::getInstance($model, 'image');
                        $model->attributes = $_POST['ProductCategory'];
                        $model->image = $image->extensionName;
                        $model->description = $_POST['ProductCategory']['description'];
                        $model->search_tag = $_POST['ProductCategory']['search_tag'];
                        $model->CB = Yii::app()->session['admin']['id'];
                        $model->DOC = date('Y-m-d');
                        $canon_name = strtolower($_POST['ProductCategory']['category_name']);
                        $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
                        $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
                        $model->canonical_name = preg_replace('/-+/', '-', $canonical_name); // Replaces multiple hyphens with single one.
                        if ($model->save()) {
                                if ($image != "") {
                                        $id = $model->id;
                                        $image->saveAs(Yii::app()->basePath . "/../uploads/products/category/" . $model->id . "." . $image->extensionName);
                                        $file = Yii::app()->basePath . "/../uploads/products/category/" . $model->id . "." . $image->extensionName;
                                        $path = Yii::app()->basePath . "/../uploads/products/category";
                                        $extension = $image->extensionName;
                                        $this->Resize($file, 472, 339, $id, $path, $extension);
                                }
                                $cat_id = $model->id;
                                $this->settingParentPath($cat_id);
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
                $image0 = $model->image;




// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['ProductCategory'])) {
                        $image = CUploadedFile::getInstance($model, 'image');
                        $model->attributes = $_POST['ProductCategory'];
                        $model->image = $image->extensionName;
                        $model->description = $_POST['ProductCategory']['description'];
                        $model->meta_description = $_POST['ProductCategory']['meta_description'];
                        $model->search_tag = $_POST['ProductCategory']['search_tag'];
                        $model->status = $_POST['ProductCategory']['status'];
                        $model->UB = Yii::app()->session['admin']['id'];
                        $model->DOU = date('Y-m-d');
                        $canon_name = strtolower($_POST['ProductCategory']['category_name']);
                        $canonical_name = str_replace(' ', '-', $canon_name); // Replaces all spaces with hyphens.
                        $canonical_name = preg_replace('/[^A-Za-z0-9\-]/', '', $canonical_name); // Removes special chars.
                        $model->canonical_name = preg_replace('/-+/', '-', $canonical_name); // Replaces multiple hyphens with single one.

                        if ($image != "") {

                                $image->saveAs(Yii::app()->basePath . "/../uploads/products/category/" . $model->id . "." . $image->extensionName);
                        } else {
                                $model->image = $image0;
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
                $image0 = $model->image;

                if ($image0 != "") {
                        if (file_exists(Yii::app()->basePath . '/../uploads/products/category/' . $model->id . '.' . $model->image)) {
                                unlink(Yii::app()->basePath . "/../uploads/products/category/" . $model->id . "." . $model->image);
                        }
                        $model->delete();
                } else {
                        $model->delete();
                }
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('ProductCategory');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        public function Resize($file, $width, $height, $id, $path, $extension) {
                $resize = new EasyImage($file);
                $resize->resize($width, $height);
                $resize->save($path . '/' . $id . '.' . $extension);
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new ProductCategory('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ProductCategory']))
                        $model->attributes = $_GET['ProductCategory'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        public function selectCategory($data) {


                //unset($_SESSION['category']);
                if ($data->id == $data->parent) {

                        $index = count($_SESSION['category']);
                        if ($index == '') {
                                $index = 0;
                        }

                        $_SESSION['category'][$index + 1] = $data->category_name;
                } else {
                        $index = count($_SESSION['category']);
                        if ($index == '') {
                                $index = 0;
                        }
                        $results = ProductCategory::model()->findByPk($data->parent);

                        $_SESSION['category'][$index + 1] = $data->category_name;

                        return $this->selectCategory($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                        $value = rtrim($return, '>');
                }
                return $value;
        }

        /**
         *
         * sets parent id
         * sets categorypath attributes
         */
        public function settingParentPath($id) {

                $path = new ProductCategoryPath;

                /**
                 * parent id setting in catogory table.
                 */
                $model = ProductCategory::model()->findByPk($id);
                if ($model->parent == "")
                        $model->parent = $id;
                $model->save();

                $path->category = $id;
                $path->parent = $model->parent;
                if ($id == $path->parent) {
                        $path->level = 0;
                } else {
                        $level = ProductCategoryPath::model()->findByAttributes(array('category' => $path->parent));
                        $path->level = $level->level + 1;
                }
                if ($path->save()) {

                }
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return ProductCategory the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = ProductCategory::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param ProductCategory $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-category-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
