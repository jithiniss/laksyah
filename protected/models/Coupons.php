<?php

/**
 * This is the model class for table "coupons".
 *
 * The followings are the available columns in table 'coupons':
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $session_id
 * @property integer $cash_limit
 * @property string $code
 * @property string $starting_date
 * @property string $expiry_date
 * @property integer $discount
 * @property string $discount_type
 * @property integer $unique
 * @property integer $status
 * The followings are the available model relations:
 * @property UserDetails $user
 * @property Products $product
 */
class Coupons extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'coupons';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('product_id, user_id, cash_limit, code, expiry_date, discount, discount_type, status', 'required'),
                    array('cash_limit, discount,  unique,status', 'numerical', 'integerOnly' => true),
                    array('code, discount_type', 'length', 'max' => 50),
                    array('code', 'unique'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, product_id, user_id, session_id, cash_limit, code, expiry_date, discount, discount_type, status', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                        //'user' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
                        //'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'product_id' => 'Product',
                    'user_id' => 'User',
                    'session_id' => 'Session ID',
                    'cash_limit' => 'Cash Limit',
                    'code' => 'Code',
                    'starting_date' => 'Starting Date',
                    'expiry_date' => 'Expiry Date',
                    'discount' => 'Discount',
                    'discount_type' => 'Discount Type',
                    'unique' => 'Unique',
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
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('session_id', $this->session_id);
                $criteria->compare('cash_limit', $this->cash_limit);
                $criteria->compare('code', $this->code, true);
                $criteria->compare('starting_date', $this->starting_date, true);
                $criteria->compare('starting_date', $this->starting_date, true);
                $criteria->compare('expiry_date', $this->expiry_date, true);
                $criteria->compare('discount', $this->discount);
                $criteria->compare('discount_type', $this->discount_type, true);
                $criteria->compare('unique', $this->unique);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Coupons the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
