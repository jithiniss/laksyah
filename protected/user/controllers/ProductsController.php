<?php

class ProductsController extends Controller {

        public function actionCategory($name) {
                if (isset(Yii::app()->session['temp_product_filter']) != '') {
                        unset(Yii::app()->session['temp_product_filter']);
                }
                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));

                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));

                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                if (isset($_GET['category'])) {
                        $categ = $_GET['category'];
                } else {
                        $categ = '';
                }
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $categ);


                $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name));
        }

        public function actionDeal() {
                $date = date('Y-m-d');

                if (isset($_GET['category'])) {
                        $categ = $_GET['category'];
                } else {
                        $categ = '';
                }
                $dataProvider = new CActiveDataProvider('Products', array(
                    'criteria' => array(
                        'condition' => 'deal_day_status = 1 and quantity > 0 and deal_day_date = "' . $date . '"',
                    ),
                    'sort' => array(
                        //'defaultOrder' => 'price ASC',
                        'defaultOrder' => $categ,
                    )
                        )
                );

                $this->render('deal', array('dataProvider' => $dataProvider));
        }

        public function actionDetail($name) {
                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
                $model = new ProductEnquiry;
                if (isset($_POST['ProductEnquiry'])) {
                        $model->attributes = $_POST['ProductEnquiry'];
                        if ($model->validate()) {
                                $model->save();
                                Yii::app()->user->setFlash('enuirysuccess', "Your Enquiry Send Successfully ");
                        }
                }
                if (!empty($prduct)) {
                        $this->render('detailed', array('product' => $prduct, 'model' => $model));
                } else {
                        $this->redirect(array('Site/Error'));
                }
        }

        public function actionWishlist($id) {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $value = UserWishlist::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $model = new UserWishlist;
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->session_id = NULL;
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $value = UserWishlist::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $model = new UserWishlist;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                }
        }

        public function actionProductNotify($id) {
                if ($id != "") {
                        if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                        } else {
                                $email = Yii::app()->session['user']['email'];
                        }
                        $model = UserNotify::model()->findByAttributes(array('email_id' => $email, 'prod_id' => $id));
                        if (!empty($model)) {
                                Yii::app()->user->setFlash('error', "Sorry! This email id is already added.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $notify = new UserNotify();
                                $notify->email_id = $email;
                                $notify->prod_id = $id;
                                $notify->status = 1;
                                $notify->date = date('Y-m-d');
                                if ($notify->validate()) {
                                        $notify->save();
                                        Yii::app()->user->setFlash('success', " We will notify you when this product back in stock.");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                } else {
                                        Yii::app()->user->setFlash('error', "Sorry! Message seniding Failed..");
                                }
                        }
                } else {
                        $this->redirect('site/error');
                }
        }

        public function actionPriceRange() {
                if (Yii::app()->request->isAjaxRequest) {
                        Yii::app()->session['temp_product_filter'] = 1;
                        $min = $_REQUEST['amount'];
                        $max = $_REQUEST['amount1'];
                        $cat = $_REQUEST['cat_name'];
                        $parent = ProductCategory::model()->findByPk($cat);
                        $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                        $dataProvider = Yii::app()->Menu->MenuCategoriesFilter($cats, $parent, $categ = 0, $min, $max);
                        $this->renderPartial('_view1', array('dataProvider' => $dataProvider, 'parent' => $parent, 'name' => $cat));
                }
        }

}
