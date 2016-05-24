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

                        $dataProvider = new CActiveDataProvider('ProductCategory', array(
                            'criteria' => array(
                                'condition' => "status =1  AND (category_name LIKE '%" . $searchterm . "%'"
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
