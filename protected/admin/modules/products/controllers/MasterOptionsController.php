<?php

class MasterOptionsController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

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
                        'actions' => array('create', 'admin', 'delete', 'OptionDetails', 'ProductOptions', 'OptionsDelete', 'ProductTypeOptions'),
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
                $model = new MasterOptions;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['MasterOptions'])) {
                        $model->attributes = $_POST['MasterOptions'];
                        $productOptions = MasterOptions::model()->findByAttributes(array('product_id' => $_POST['MasterOptions']['product_id']));
                        if(!empty($productOptions)) {
                                $this->redirect(array('OptionDetails', 'id' => $productOptions->id));
                        } else {

                                if($_POST['MasterOptions']['option_type_id'] == "") {
                                        $model->addError('option_type_id', 'Type cannot be blank');
                                } else {
                                        if($model->save()) {
                                                $this->redirect(array('OptionDetails', 'id' => $model->id));
                                        }
                                }
                        }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        public function actionOptionDetails($id, $optionid = '') {

                if(!empty($id)) {
                        $productOptions = MasterOptions::model()->findByPk($id);
                        if(!empty($productOptions)) {
                                if($optionid == "") {
                                        $model = new OptionDetails;
                                } else {
                                        $model = OptionDetails::model()->findByPk($optionid);
                                }
                                if(isset($_POST['OptionDetails'])) {
                                        $model->attributes = $_POST['OptionDetails'];

                                        $model->master_option_id = $id;

                                        if($productOptions->option_type_id == 1) {

                                                if(empty($model->color_id)) {
                                                        $model->addError('color_id', 'Color cannot be blank');
                                                }
                                        } else if($productOptions->option_type_id == 2) {

                                                if(empty($model->size_id)) {
                                                        $model->addError('size_id', 'Size cannot be blank');
                                                }
                                        } else if($productOptions->option_type_id == 3) {


                                                if(empty($model->color_id)) {
                                                        $model->addError('color_id', 'Color cannot be blank');
                                                }
                                                if(empty($model->size_id)) {
                                                        $model->addError('size_id', 'Size cannot be blank');
                                                }
                                        }
                                        if(!$model->hasErrors()) {
                                                if($model->validate()) {

                                                        if($model->save()) {
                                                                $model->unsetAttributes();
                                                                //  $this->redirect(array('admin', 'id' => $model->id));
                                                        }
                                                }
                                        }
                                }
                                $options = new OptionDetails('search');
                                $options->unsetAttributes();  // clear any default values
                                $options->master_option_id = $id;

                                if(isset($_GET['OptionDetails']))
                                        $options->attributes = $_GET['OptionDetails'];

                                $this->render('option_details', array(
                                    'model' => $model, 'productOptions' => $productOptions, 'options' => $options
                                ));
                        }else {
                                $this->redirect(array('create'));
                        }
                }
        }

        public function actionProductOptions() {
                if(Yii::app()->request->isAjaxRequest) {
                        if($_REQUEST['product_id'] != "") {
                                $productOptions = MasterOptions::model()->findByAttributes(array('product_id' => $_REQUEST['product_id']));
                                if(!empty($productOptions)) {
                                        echo '1';
                                } else {
                                        echo "0";
                                }
                        } else {
                                echo "0";
                        }
                }
        }

        public function actionProductTypeOptions() {
                if(Yii::app()->request->isAjaxRequest) {
                        if($_REQUEST['color_id'] != "" && $_REQUEST['master_id'] != "") {
                                $check_type = OptionDetails::model()->findAll(['condition' => 'master_option_id=' . $_REQUEST['master_id'] . ' and color_id=' . $_REQUEST['color_id']]);


                                if(!empty($check_type)) {
                                        $t = 1;
                                        foreach($check_type as $type) {

                                                if($t == 1) {
                                                        $types.=$type->size_id;
                                                } else {
                                                        $types.=',' . $type->size_id;
                                                }



                                                $t++;
                                        }

                                        if($types != "") {
                                                $condition = ' and id not in(' . $types . ') ';
                                        } else {
                                                $condition = '';
                                        }

                                        $data = OptionCategory::model()->findAll(['condition' => 'option_type_id=2 and id not in(' . $types . ') ']);

                                        if($data != '') {
                                                $data = CHtml::listData($data, 'id', 'size');
                                                echo CHtml::tag('option', array('value' => ''), '--Select--', true);
                                                foreach($data as $value => $name) {
                                                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                                                }
                                        }
                                } else {
                                        $data = OptionCategory::model()->findAll(['condition' => 'option_type_id=2']);

                                        if($data != '') {
                                                $data = CHtml::listData($data, 'id', 'size');
                                                echo CHtml::tag('option', array('value' => ''), '--Select--', true);
                                                foreach($data as $value => $name) {
                                                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                                                }
                                        }
                                }
                        } else {
                                $data = OptionCategory::model()->findAll(['condition' => 'option_type_id=2']);

                                if($data != '') {
                                        $data = CHtml::listData($data, 'id', 'size');
                                        echo CHtml::tag('option', array('value' => ''), '--Select--', true);
                                        foreach($data as $value => $name) {
                                                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                                        }
                                }
                        }
                }
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $fe = $this->loadModel($id);
                if($fe->delete()) {
                        OptionDetails::model()->deleteAllByAttributes(['master_option_id' => $id]);
                }

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        public function actionOptionsDelete($id, $option) {

                if(Yii::app()->request->isPostRequest) {
                        // we only allow deletion via POST request
                        $del = OptionDetails::model()->findByPk($id)->delete();
                        if($del) {
                                $product_options = OptionDetails::model()->findAllByAttributes(['master_option_id' => $option]);
                                if(empty($product_options)) {

                                        $master_del = MasterOptions::model()->findByPk($option)->delete();
                                        if($master_del) {
                                                // echo "ggiii";
                                                $this->redirect(array('/products/masterOptions/create'));
                                        } else {
                                                echo "558";
                                        }
                                }
                        }
                } else
                        throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('MasterOptions');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new MasterOptions('search');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['MasterOptions']))
                        $model->attributes = $_GET['MasterOptions'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return MasterOptions the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = MasterOptions::model()->findByPk($id);
                if($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param MasterOptions $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'master-options-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
