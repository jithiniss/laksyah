<?php

class ProductsController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['admin']) || Yii::app()->session['post']['products'] != 1) {
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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'categoryOptions', 'NewDelete'),
                        'users' => array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update', 'delete', 'NewDelete'),
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


                $model = new Products('create');

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['Products'])) {
                        $this->performAjaxValidation($model);
                        $model->attributes = $_POST['Products'];
                        $image = CUploadedFile::getInstance($model, 'main_image');
                        $hover_image = CUploadedFile::getInstance($model, 'hover_image');
                        $video = CUploadedFile::getInstance($model, 'video');
                        //$model->search_tag = $_POST['ProductCategory']['search_tag'];
                        if ($model->search_tag != "") {
                                $model->search_tag = implode(",", $model->search_tag);
                        } else {
                                $model->search_tag = $_POST['ProductCategory']['search_tag'];
                        }
                        $images = CUploadedFile::getInstancesByName('gallery_images');
                        $model->product_name = $_POST['Products']['product_name'];
                        $model->enquiry_sale = $_POST['Products']['enquiry_sale'];
                        $model->sizechartforwhat = $_POST['Products']['sizechartforwhat'];
                        if ($_POST['Products']['category_id']) {
                                $cat = $_POST['Products']['category_id'];
                                $model->category_id = $cat;
                        }
                        $model->main_image = $image->extensionName;
                        $model->hover_image = $hover_image->extensionName;
                        $model->video = $video->extensionName;

                        $model->related_products = $_POST['Products']['related_products'];
                        // $model->related_products = implode(",", $model->related_products);

                        if ($model->related_products != "") {
                                $model->related_products = implode(",", $model->related_products);
                        } else {
                                $model->related_products = "";
                        }

                        $model->meta_description = $_POST['Products']['meta_description'];
                        if ($_POST['Products']['new_from'] != "")
                                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
                        else
                                $model->new_from = 0;
                        if ($_POST['Products']['new_to'] != "")
                                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
                        else
                                $model->new_to = 0;
                        if ($_POST['Products']['sale_from'] != "")
                                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
                        else
                                $model->sale_from = 0;
                        if ($_POST['Products']['sale_to'] != "")
                                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
                        else
                                $model->sale_to = 0;
                        if ($_POST['Products']['special_price_from'] != "")
                                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                        else
                                $model->special_price_from = 0;
                        if ($_POST['Products']['special_price_to'] != "")
                                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                        else
                                $model->special_price_to = 0;
                        $model->stock_availability = $_POST['Products']['stock_availability'];
                        $model->CB = Yii::app()->session['admin']['id'];
                        $model->DOC = date('Y-m-d');


                        if ($model->validate()) {


                                if ($model->save()) {
                                        if ($image != "") {
                                                $id = $model->id;
                                                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                                $dimension[1] = array('width' => '263', 'height' => '408', 'name' => 'medium');
                                                $dimension[2] = array('width' => '544', 'height' => '758', 'name' => 'big');
                                                $dimension[2] = array('width' => '800', 'height' => '1060', 'name' => 'zoom');
                                                Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                                        }

                                        if ($hover_image != "") {
                                                $id = $model->id;
                                                $dimensions[0] = array('width' => '263', 'height' => '408', 'name' => 'hover');
                                                Yii::app()->Upload->uploadHoverImage($hover_image, $id, true, $dimensions);
                                        }

                                        if ($images != "") {
                                                $id = $model->id;
                                                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                                $dimension[1] = array('width' => '544', 'height' => '758', 'name' => 'big');
                                                $dimension[2] = array('width' => '800', 'height' => '1060', 'name' => 'zoom');

                                                Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                                        }
                                        if ($video != "") {

                                                $id = $model->id;
                                                $dimensions[0] = array('name' => 'video');

                                                // var_dump($video);
                                                // exit;

                                                Yii::app()->Upload->uploadVideo($video, $id, true, $dimensions);
                                        }

                                        $this->redirect(array('admin', 'id' => $model->id));
                                }
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


                $image1 = $model->main_image;
                $image0 = $model->gallery_images;
                $image2 = $model->hover_image;
                $video = $model->video;
                $rel_pdt = $model->related_products;
                $oldvideo = 'video.' . $video;
                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['Products'])) {

                        $image = CUploadedFile::getInstance($model, 'main_image');
                        $h_image = CUploadedFile::getInstance($model, 'hover_image');
                        $images = CUploadedFile::getInstancesByName('gallery_images');
                        $new_video = CUploadedFile::getInstance($model, 'video');
                        $model->attributes = $_POST['Products'];
                        $model->main_image = $image->extensionName;
                        $model->search_tag = $_POST['Products']['search_tag'];
                        $model->hover_image = $h_image->extensionName;
                        $model->video = $new_video->extensionName;
                        $model->sizechartforwhat = $_POST['Products']['sizechartforwhat'];

                        $model->related_products = $_POST['Products']['related_products'];

                        if ($model->related_products != "") {
                                $model->related_products = implode(",", $model->related_products);
                        } else {
                                $model->related_products = "";
                        }
                        if ($_POST['Products']['new_from'] != "" && $_POST['Products']['new_from'] != '0000-00-00')
                                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
                        else
                                $model->new_from = 0;
                        if ($_POST['Products']['new_to'] != "" && $_POST['Products']['new_to'] != '0000-00-00')
                                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
                        else
                                $model->new_to = 0;
                        if ($_POST['Products']['sale_from'] != "" && $_POST['Products']['sale_from'] != '0000-00-00')
                                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
                        else
                                $model->sale_from = 0;
                        if ($_POST['Products']['sale_to'] != "" && $_POST['Products']['sale_to'] != '0000-00-00')
                                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
                        else
                                $model->sale_to = 0;
                        if ($_POST['Products']['special_price_from'] != "" && $_POST['Products']['special_price_from'] != '0000-00-00')
                                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                        else
                                $model->special_price_from = 0;
                        if ($_POST['Products']['special_price_to'] != "" && $_POST['Products']['special_price_to'] != '0000-00-00')
                                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                        else
                                $model->special_price_to = 0;
                        $model->status = $_POST['Products']['status'];
                        $model->enquiry_sale = $_POST['Products']['enquiry_sale'];
                        $model->DOU = date('Y-m-d');


                        if ($image != "") {
                                $id = $model->id;
                                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                $dimension[1] = array('width' => '263', 'height' => '408', 'name' => 'medium');
                                $dimension[2] = array('width' => '544', 'height' => '758', 'name' => 'big');
                                $dimension[3] = array('width' => '800', 'height' => '1060', 'name' => 'zoom');
                                Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                        } else {
                                $model->main_image = $image1;
                        }


                        if ($h_image != "") {
                                $id = $model->id;

                                $dimensions[0] = array('width' => '280', 'height' => '310', 'name' => 'medium');

                                Yii::app()->Upload->uploadHoverImage($h_image, $id, true, $dimensions);
                        } else {

                                $model->hover_image = $image2;
                        }


                        if ($images != "") {
                                $id = $model->id;
                                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                $dimension[1] = array('width' => '544', 'height' => '758', 'name' => 'big');
                                $dimension[2] = array('width' => '800', 'height' => '1060', 'name' => 'zoom');
                                Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                        } else {
                                $model->gallery_images = $image0;
                        }


                        if ($new_video != "") {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                $id = $model->id;
                                $dimensions[0] = array('name' => 'video');
                                Yii::app()->Upload->uploadVideo($new_video, $id, true, $dimension);
                                // $old = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/videos/video.' . $video;
                                //  unlink($old);
                        } else {
                                $model->video = $video;
                        }

                        $model->product_name = $_POST['Products']['product_name'];
                        $model->description = $_POST['Products']['description'];
                        $model->meta_description = $_POST['Products']['meta_description'];
                        $model->stock_availability = $_POST['Products']['stock_availability'];
                        if ($model->stock_availability == 1) {
                                $this->notify($id, $model->canonical_name);
                        }
                        $model->deal_day_status = $_POST['Products']['deal_day_status'];
                        $model->deal_day_date = date('Y-m-d', strtotime($_POST['Products']['deal_day_date']));
                        if ($model->validate()) {
                                if ($model->save(false)) {
                                        $this->redirect(array('admin', 'id' => $model->id));
                                }
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        public function notify($id, $name) {
                $datas = UserNotify::model()->findAllByAttributes(array('prod_id' => $id, 'status' => 1));
                if (!empty($datas)) {
                        foreach ($datas as $data) {
                                $user = $data->email_id;
//                                $to = $user->email;
//                                $subject = "Product Availability";
//
//                                $message = "
//                                                <html>
//                                                <head>
//                                                <title>Confirmation</title>
//                                                </head>
//                                                <body>
//                                                <p>Dear, " . $user->first_name . ' ' . $user->last_name . " this mail is to inform you that your interested item is now available in our site </p>
//                                                <table>
//
//                                                <tr><td><a href='http://localhost/laksyah/index.php/Products/Detail/name/$name'>Click Here To purchase </a></td></tr>
//                                                </table>
//                                                </body>
//                                                </html>
//                                                ";
//
//
//
//
//// Always set content-type when sending HTML email
//                                $headers = "MIME-Version: 1.0" . "\r\n";
//                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
//// More headers
//                                $headers .= 'From: <>' . "\r\n";
//                                $headers .= 'Cc: ' . "\r\n";
//
//                                mail($to, $subject, $message, $headers);
                                $data->delete();
                        }
                } else {
                        return true;
                }
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete() {

                $model = $this->loadModel($id);
                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                if (is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder)) {
                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id;
                        $this->imageDelete($path);
                        $model->delete();
                }





                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        public function imageDelete($path) {


                if (is_dir($path)) {
                        foreach (glob("{$path}/*") as $file) {
                                if ($file != '') {
                                        if (is_dir($file)) {
                                                $this->imageDelete($file);
                                        } else {
                                                unlink($file);
                                        }
                                        //
                                }
                                // rmdir($file);
                        }
                        rmdir($path);
                }
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('Products');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin($out_ofstock = '') {

                $model = new Products('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Products'])) {
                        $model->attributes = $_GET['Products'];
                        $model->product_name = $_GET['Products']['product_name'];
                }
                if ($out_ofstock != '') {
                        $model->quantity = '<' . $out_ofstock;
                }

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        public function actionNewDelete() {
                $image = $_GET['path'];
                $id = $_GET['id'];
                $model = $this->loadModel($id);
                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);

                if (is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder)) {
                        $big = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/big/' . $image;
                        $small = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/small/' . $image;
                        $zoom = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/zoom/' . $image;
//                        $this->imageDelete($path);
                        unlink($big);
                        unlink($small);
                        unlink($zoom);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionCategoryOptions() {
                if (Yii::app()->request->isAjaxRequest) {
                        $categories = ProductCategory::model()->findAll();
                        foreach ($categories as $category) {
                                echo '<div class = "' . $_REQUEST['type'] . '_tag-sub" id = "2">Electronics</div>';
                                // echo '<div class = "' . $_REQUEST['type'] . '_tag-sub" id = "1">Mobiles</div>';
                        }
                }
        }

        public function selectCategory($data) {

                $index = count($_SESSION['category']);
                if ($data->id == $data->parent) {
                        $_SESSION['category'][$index + 1] = $data->category_name;
                } else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->category_name;
                        return $this->selectCategory($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                }
                return rtrim($return, '>');
        }

        public function saveCategories($cat_ids) {

        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Products the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Products::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Products $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'products-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
