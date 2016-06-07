<?php

/**
 * This is the model class for table "product_enquiry".
 *
 * The followings are the available columns in table 'product_enquiry':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property integer $country
 * @property integer $size
 * @property string $requirement
 * @property integer $product_id
 * @property string $doc
 * @property string $dou
 * @property integer $user_id
 * @property double $total_amount
 * @property double $balance_to_pay
 * @property integer $status
 * The followings are the available model relations:
 * @property ProductEnquiry $country0
 * @property ProductEnquiry[] $productEnquiries
 * @property Products $product
 */
class ProductEnquiry extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'product_enquiry';
        }

        public $verifyCode;

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('verifyCode', 'captcha', 'allowEmpty' => !extension_loaded('gd'), 'on' => 'create'),
                    array('name, email, phone, country,  product_id', 'required'),
                    array('country, size, product_id, user_id', 'numerical', 'integerOnly' => true),
                    array('name, email', 'length', 'max' => 250),
                    array('phone', 'length', 'max' => 15),
                    array('email', 'email'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, email, phone, country, size, requirement, product_id, doc, dou, user_id', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'country0' => array(self::BELONGS_TO, 'Countries', 'country'),
                    'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'country' => 'Country',
                    'size' => 'Size',
                    'requirement' => 'Requirement',
                    'product_id' => 'Product',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
                    'user_id' => 'User',
                    'total_amount' => 'Total Amount',
                    'balance_to_pay' => 'Balance To Pay',
                    'status' => 'Status',
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
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone', $this->phone, true);
                $criteria->compare('country', $this->country);
                $criteria->compare('size', $this->size);
                $criteria->compare('requirement', $this->requirement, true);
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('total_amount', $this->total_amount);
                $criteria->compare('balance_to_pay', $this->balance_to_pay);
                $criteria->compare('status', $this->status);
                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ProductEnquiry the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
