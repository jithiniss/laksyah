<?php

class ProductsController extends Controller {

        public function actionCategory($name) {
                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));
                if (empty($parent)) {
                        $this->render('ProductNotfound');
                }
                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));
                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));

                if (isset($_POST['category'])) {
                        $categ = $_POST['category'];
                } else {
                        $categ = '';
                }
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $categ, $min = '', $max = '', $size = '');

                if (isset(Yii::app()->session['temp_product_filter'])) {
                        unset(Yii::app()->session['temp_product_filter']);
                        unset(Yii::app()->session['temp_product_filter_check']);
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
                $recently = '';
                $related_products = explode(",", $prduct->related_products);

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_id = Yii::app()->session['user']['id'];
                        $product_view_exist = ProductViewed::model()->findByAttributes(array('user_id' => $user_id, 'product_id' => $prduct->id));
                        if ($product_view_exist == NULL) {
                                $product_view->date = date('Y-m-d');
                                $product_view->product_id = $prduct->id;
                                $product_view->session_id = NULL;
                                $product_view->user_id = $user_id;
                                if ($prduct->id != '') {
                                        $product_view->save(FALSE);
                                }
                        }
                        $recently = ProductViewed::model()->findAllByAttributes(array('user_id' => $user_id), array('order' => 'date DESC'));
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $sessonid = Yii::app()->session['temp_user'];
                        $product_view_exist = ProductViewed::model()->findByAttributes(array('session_id' => $sessonid, 'product_id' => $prduct->id));

                        if (empty($product_view_exist) && $product_view_exist == NULL) {
                                $product_view->date = date('Y-m-d');
                                $product_view->product_id = $prduct->id;
                                $product_view->session_id = $sessonid;
                                $product_view->user_id = NULL;
                                if ($prduct->id != '') {
                                        $product_view->save(FALSE);
                                }
                        }
                        $recently = ProductViewed::model()->findAllByAttributes(array('session_id' => $sessonid), array('order' => 'date DESC'));
                }
                $model = new ProductEnquiry;
                if (isset($_POST['ProductEnquiry'])) {
                        $model->attributes = $_POST['ProductEnquiry'];
                        if ($model->validate()) {
                                $model->save();
                                Yii::app()->user->setFlash('enuirysuccess', "Your Enquiry Send Successfully ");
                        }
                }
                if (!empty($prduct)) {
                        $this->render('detailed', array('product' => $prduct, 'model' => $model, 'recently' => $recently, 'related_products' => $related_products));
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
                        $min = $_REQUEST['min'];
                        $max = $_REQUEST['max'];
                        $cat = $_REQUEST['cat'];
                        $size_type = $_REQUEST['size'];
                        $data[0] = $min;
                        $data[1] = $max;
                        $data[3] = $cat;
// $data[4] = $size_type;


                        if ($cat != '' && $min != '' && $max != '') {
                                $categry = ProductCategory::model()->findByPk($cat);
                                if (!empty($categry)) {
                                        Yii::app()->session['temp_product_filter'] = $data;
                                }
                        }
                        if ($size_type != '' && $cat != '') {
                                $sizes = OptionCategory::model()->findByAttributes(array('option_type_id' => 2, 'id' => $size_type));
                                if (!empty($sizes)) {
                                        $data[4] = $size_type;
                                        Yii::app()->session['temp_product_filter'][4] = $size_type;
                                        Yii::app()->session['temp_product_filter'][3] = $size_type;
                                } else {
                                        $size_type = '';
                                }
                        }
                        if ($cat != '' && $min != '' && $max != '') {
                                $parent = ProductCategory::model()->findByPk($cat);
                                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $categ = '', $min, $max, $size_type);
                        } else {
                                $parent = ProductCategory::model()->findByPk(Yii::app()->session['temp_product_filter'][3]);
                                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $categ = '', Yii::app()->session['temp_product_filter'][0], Yii::app()->session['temp_product_filter'][1], Yii::app()->session['temp_product_filter'][4]);
                        }

//$this->renderPartial('_view1', array('dataProvider' => $dataProvider));
                        $this->renderPartial('_view1', array('dataProvider' => $dataProvider, 'parent' => $parent, 'name' => $cat));
                } else {

                }
        }

        public function actionmailfn() {
                $page_url = $_SERVER["HTTP_REFERER"];
                $from = $_POST['from'];
                $to = $_POST['email'];
                $subject = 'Enquiry message from ' . $from;
                $message = '<html>
   <body>
       <table border="0" style="border-spacing: 20px;background-color: #b3e6ff;width:100%;">
           <tr>
               <td></td>
           </tr>
              <tr> <td>  Mail from :' . $from . '  </td>   </tr>
           <tr> <td>  Page Url:' . $page_url . '  </td>   </tr>
           <tr>
               <td>Thanks</td>
           </tr>
           <tr>
             <td style="font-weight:bold;">Lakshya </span></td>
           </tr>
       </table>
   </body>
</html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <rejin@intersmart.in>' . "\r\n";

                /*    if (mail($to, $subject, $message, $headers)) {
                  Yii::app()->user->setFlash('success', " your email sent successfully..");
                  $this->redirect($page_url);
                  } */
        }

        public function actionOptions() {
                if (Yii::app()->request->isAjaxRequest) {

                        $option = $_REQUEST['option'];
                        $color = $_REQUEST['color'];
                        if ($option != "" && $color != "") {


                                $sizes = OptionDetails::model()->findAllByAttributes(['status' => 1, 'master_option_id' => $option], ['condition' => 'stock>=1', 'select' => 'size_id,color_id', 'distinct' => true, 'order' => 'size_id']);
                                if (!empty($sizes)) {
                                        foreach ($sizes as $size) {
                                                $size_name = OptionCategory::model()->findByPk($size->size_id);

                                                if ($size->color_id == $color) {
                                                        $disabled = '';
                                                } else {
                                                        $disabled = 'disabled';
                                                }
                                                ?>
                                                <label class="<?php echo $disabled; ?>" id="<?php echo $size->size_id; ?>"><?php echo $size_name->size; ?>
                                                    <input type = "radio" name = "size_selector_<?php echo $size_name->id; ?>" value = "<?php echo $size_name->id; ?>" id = "size_selector_<?php echo $size_name->id; ?>">
                                                </label>
                                                <?php
                                        }
                                }
                        }
                }
        }

        public function actionPolicies() {
                if (Yii::app()->request->isAjaxRequest) {
                        $this->renderPartial('_policy');
                }
        }

        public function actionorder_giftoption() {
                $model = Products::model()->findAllByAttributes(array('gift_option' => 1, 'status' => 1));
                $this->render('order_giftoption', array('model' => $model));
//                $this->redirect($this->createUrl('/products/Category', array('name' => $_POST['gift_id'])));
        }

}
