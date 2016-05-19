<?php

/**
 * This is the model class for table "admin_post".
 *
 * The followings are the available columns in table 'admin_post':
 * @property integer $id
 * @property string $post_name
 * @property string $static_pages
 * @property string $products
 * @property string $enquiry
 * @property string $CB
 * @property string $UB
 * @property string $DOC
 * @property string $DOU
 *
 * The followings are the available model relations:
 * @property AdminUser[] $adminUsers
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
                    // array('post_name, static_pages, products, CB, UB, DOC, DOU', 'required'),
                    array('post_name, static_pages, products, CB, UB', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, post_name, static_pages, products,enquiry,CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('post_name', 'required', 'on' => 'post_create')
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
                    'static_pages' => 'Static Pages',
                    'products' => 'Products',
                    'enquiry' => 'Enquiry',
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
                $criteria->compare('static_pages', $this->static_pages, true);
                $criteria->compare('products', $this->products, true);
                $criteria->compare('enquiry', $this->enquiry);
                $criteria->compare('CB', $this->CB, true);
                $criteria->compare('UB', $this->UB, true);
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
