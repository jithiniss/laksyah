<?php

/**
 * This is the model class for table "admin_post".
 *
 * The followings are the available columns in table 'admin_post':
 * @property integer $id
 * @property string $post_name
 * @property string $admin
 * @property string $products
 * @property integer $orders
 * @property integer $coupons
 * @property integer $cms
 * @property integer $masters
 * @property integer $user_details
 * @property integer $reports
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class AdminPost extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'admin_post';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('post_name, admin, products, orders, coupons, cms, masters, user_details, reports,status,', 'required'),
                    array('orders, coupons, cms, masters, user_details, reports, CB, UB', 'numerical', 'integerOnly' => true),
                    array('post_name, admin, products', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, post_name, admin, products, orders, coupons, cms, masters, user_details, reports,status, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'adminUsers' => array(self::HAS_MANY, 'AdminUser', 'admin_post_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'post_name' => 'Post Name',
                    'admin' => 'Admin',
                    'products' => 'Products',
                    'orders' => 'Orders',
                    'coupons' => 'Coupons',
                    'cms' => 'Cms',
                    'masters' => 'Masters',
                    'user_details' => 'User Details',
                    'reports' => 'Reports',
                    'status' => 'Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         *
         * Typical usecase:
         * - Initialize the model fields with values from filter form.
         * - Execute this method to get CActiveDataProvider instance which will filter
         * models according to data in model fields.
         * - Pass data provider to CGridView, CListView or any similar widget.
         *
         * @return CActiveDataProvider the data provider that can return the models
         * based on the search/filter conditions.
         */
        public function search() {
                // @todo Please modify the following code to remove attributes that should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('post_name', $this->post_name, true);
                $criteria->compare('admin', $this->admin);
                $criteria->compare('products', $this->products, true);
                $criteria->compare('orders', $this->orders);
                $criteria->compare('coupons', $this->coupons);
                $criteria->compare('cms', $this->cms);
                $criteria->compare('masters', $this->masters);
                $criteria->compare('user_details', $this->user_details);
                $criteria->compare('reports', $this->reports);
                $criteria->compare('status', $this->status);
                $criteria->compare('CB', $this->CB);
                $criteria->compare('UB', $this->UB);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('DOU', $this->DOU, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return AdminPost the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}

?>