<?php

class SearchController extends Controller {

        public function actionIndex() {
                if (isset($_POST['SearchValue'])) {
                        $model = MasterCategoryTags::model()->findAll(array('select' => 'category_tag', "condition" => "category_tag LIKE '" . $_POST['SearchValue'] . "%'"));
                        $this->renderPartial('search', array('model' => $model));
                }
        }

        public function actionSearch() {

                if (isset($_POST['search'])) {

                        $model = $_POST['Keyword'];
                        $dataProvider = new CActiveDataProvider('ProductCategory', array(
                            'criteria' => array(
                                'condition' => "status =1 AND (category_name LIKE '%" . $model . "%'"
                                . " OR search_tag LIKE '%" . $model . "%' )"),
                                )
                        );
                        $this->render('searching', array('model' => $model, 'dataProvider' => $dataProvider));
                }
        }

}
