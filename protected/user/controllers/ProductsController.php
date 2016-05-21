<?php

class ProductsController extends Controller {

        public function actionCategory($name) {

                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));

                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));

                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                if (isset($_GET['category'])) {
                        $categ = $_GET['category'];
                } else {
                        $categ = '';
                }
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $categ);
                if (isset(Yii::app()->session['temp_product_filter'])) {
                        unset(Yii::app()->session['temp_product_filter']);
                }
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
                $product_view = new ProductViewed;
                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        $product_view_exist = ProductViewed::model()->findByAttributes(array('product_id' => $prduct->id, 'user_id' => $user_id));
                        if ($product_view_exist == NULL) {
                                $product_view->date = date('Y-m-d');
                                $product_view->product_id = $prduct->id;
                                $product_view->session_id = NULL;
                                $product_view->user_id = $user_id;
                                $product_view->save();
                        }
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $sessonid = Yii::app()->session['temp_user'];
                        $product_view_exist = ProductViewed::model()->findByAttributes(array('product_id' => $prduct->id, 'session_id' => $sessonid));

                        if (empty($product_view_exist) && $product_view_exist == NULL) {
                                $product_view->date = date('Y-m-d');
                                $product_view->product_id = $prduct->id;
                                $product_view->session_id = $sessonid;
                                $product_view->user_id = NULL;
                                if ($product_view->product_id != '') {
                                        $product_view->save(FALSE);
                                }
                        }
                }

                $recently = ProductViewed::model()->findAllByAttributes(array('product_id' => $prduct->id, 'session_id' => $sessonid));

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
                        $min = $_REQUEST['amount'];
                        $max = $_REQUEST['amount1'];
                        $cat = $_REQUEST['cat_name'];
                        $data[0] = $min;
                        $data[1] = $max;
                        $data[3] = $cat;
                        if (!isset(Yii::app()->session['temp_product_filter'])) {
                                Yii::app()->session['temp_product_filter'] = $data;
                        }
                        if ($cat != '' && $min != '' && $max != '') {
                                $parent = ProductCategory::model()->findByPk($cat);
                                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                                $dataProvider = Yii::app()->Menu->MenuCategoriesFilter($cats, $parent, $categ = 0, $min, $max);
                        } else {
                                $parent = ProductCategory::model()->findByPk(Yii::app()->session['temp_product_filter'][3]);
                                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                                $dataProvider = Yii::app()->Menu->MenuCategoriesFilter($cats, $parent, $categ = 0, Yii::app()->session['temp_product_filter'][0], Yii::app()->session['temp_product_filter'][1]);
                        }

                        //$this->renderPartial('_view1', array('dataProvider' => $dataProvider));
                        $this->renderPartial('_view1', array('dataProvider' => $dataProvider, 'parent' => $parent, 'name' => $cat));
                } else {

                }
        }

}
