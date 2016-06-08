<?php

class SearchingController extends Controller {

//        public function Init() {
//                if (!isset(Yii::app()->session['user']) && Yii::app()->session['user'] == '')
//                {
//                        $this->redirect(Yii::app()->baseUrl . '/index.php/site/out');
//                }
//        }


        public function actionIndex() {
                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['SearchValue'])) {
                                $model = ProductCategory::model()->findAll(array('select' => 'category_name', 'limit' => 10,
                                    "condition" => "category_name LIKE '" . $_REQUEST['SearchValue'] . "%'"));

                                $model1 = MasterCategoryTags::model()->findAll(array('select' => 'category_tag', 'limit' => 10,
                                    "condition" => "category_tag LIKE '" . $_REQUEST['SearchValue'] . "%'"));
                                $this->renderPartial('_ajaxSearchDealers', array('model' => array_merge($model, $model1)));
                        }
                } else {
                        die("Can't access this url.");
                }
        }

        public function actionSearchList() {

                if (isset($_REQUEST['Keyword'])) {
                        $searchterm = $_REQUEST['Keyword'];

                        $dataProvider = new CActiveDataProvider('Products', array(
                            'criteria' => array(
                                'condition' => "status =1  AND (product_name LIKE '%" . $searchterm . "%'"
                                . " OR search_tag LIKE '%" . $searchterm . "%' )"),
                                )
                        );

                        $this->render('searchresult', array('dataProvider' => $dataProvider, 'file_name' => '_searchresult', 'parameter' => $_REQUEST['saerchterm'], 'search_parm' => $category, 'searchterm' => $searchterm));
                        exit;
                }
                $dataProvider1 = new CActiveDataProvider('ProductCategory', array(
                    'criteria' => array(
                        'condition' => 'status = 1', 'order' => 'id desc', 'limit' => 5),
                        )
                );
                //$latest = Books::model()->findAll(['condition' => 'status = 2', 'order' => 'id desc', 'limit' => 5]);
                $this->render('searchresult', array('dataProvider' => $dataProvider1, 'file_name' => '_searchresult', 'parameter' => $_REQUEST['saerchterm'], 'search_parm' => $category, 'searchterm' => $searchterm));
                //$this->render('search');
        }

        public function actionPriceRange() {



                if (Yii::app()->request->isAjaxRequest) {

                        $min = $_REQUEST['min'];
                        $max = $_REQUEST['max'];
                        $cat = $_REQUEST['cat'];
                        $size_type = $_REQUEST['size'];
                        $data[0] = $min;
                        $data[1] = $max;
                        $data[3] = $cat;
                        // $data[4] = $size_type;

                        if ($cat != '' && $min != '' && $max != '') {
                                Yii::app()->session['temp_product_filter'] = $data;
                        }
                        if ($size_type != '') {
                                $sizes = OptionCategory::model()->findByAttributes(array('option_type_id' => 2, 'id' => $size_type));
                                if (!empty($sizes)) {
                                        $data[4] = $size_type;
                                        Yii::app()->session['temp_product_filter'][4] = $size_type;
                                        Yii::app()->session['temp_product_filter_check'] = 1;
                                } else {
                                        $size_type = '';
                                }
                        }
                        if ($cat != '' && $min != '' && $max != '') {
                                $condition = "product_name LIKE '%" . $cat . "%'"
                                        . " OR search_tag LIKE '%" . $cat . "%' ";
                                $products = Products::model()->findAllByAttributes(array(), array('condition' => $condition));
                                // $ids = array();
                                $b = 1;
                                foreach ($products as $prods) {
                                        if ($b == 1) {
                                                $prod_ids .= $prods->id;
                                        } else {
                                                $prod_ids .= ',' . $prods->id;
                                        }
                                        $b++;
                                }

                                $dataProvider = Yii::app()->Menu->filterMenuProducts($prod_ids, $min, $max, $size_type);
                                //   var_dump($dataProvider);
                                //   exit;
                        } else {
                                $condition = "product_name LIKE '%" . Yii::app()->session['temp_product_filter'][3] . "%'"
                                        . " OR search_tag LIKE '%" . Yii::app()->session['temp_product_filter'][3] . "%' ";
                                $products = Products::model()->findAllByAttributes(array(), array('condition' => $condition));
                                // $ids = array();
                                $b = 1;
                                foreach ($products as $prods) {
                                        if ($b == 1) {
                                                $prod_ids .= $prods->id;
                                        } else {
                                                $prod_ids .= ',' . $prods->id;
                                        }
                                        $b++;
                                }
                                $dataProvider = Yii::app()->Menu->filterMenuProducts($prod_ids, Yii::app()->session['temp_product_filter'][0], Yii::app()->session['temp_product_filter'][1], Yii::app()->session['temp_product_filter'][4]);
                        }

                        //$this->renderPartial('_view1', array('dataProvider' => $dataProvider));
                        $this->renderPartial('_view1', array('dataProvider' => $dataProvider, 'parent' => $parent, 'name' => $cat));
                } else {

                }
        }

        /*
         * setting session for unlogged users
         * redirect to selected chapter after loggin
         */



//        public function actionSearching() {
//                if(Yii::app()->request->isAjaxRequest) {
//                        if(isset($_REQUEST['SearchValue'])) {
//
//
//                                $model1 = MasterCategoryTags::model()->findAll(array('select' => 'category_tag',
//                                    "condition" => "category_tag LIKE '" . $_REQUEST['SearchValue'] . "%'"));
//
//
//                                $this->renderPartial('_ajaxSearchDealers', array('model' => $model1));
//                        }
//                } else {
//                        die("Can't access this url.");
//                }
//        }
        // Uncomment the following methods and override them if needed
        /*
          public function filters()
          {
          // return the filter configuration for this controller, e.g.:
          return array(
          'inlineFilterName',
          array(
          'class'=>'path.to.FilterClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }

          public function actions()
          {
          // return external action classes, e.g.:
          return array(
          'action1'=>'path.to.ActionClass',
          'action2'=>array(
          'class'=>'path.to.AnotherActionClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }
         */
}
