<?php

/**
 * This is the model class for table "order_products".
 *
 * The followings are the available columns in table 'order_products':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $option_id
 * @property integer $quantity
 * @property integer $amount
 * @property string $DOC
 * @property integer $status
 * @property integer $gift_option
 * @property double $rate
 */
class OrderProducts extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'order_products';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('quantity, amount,status', 'required'),
                    array('order_id, product_id, quantity,option_id, amount, status', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, order_id, product_id, quantity, amount, DOC, status', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                    'order' => array(self::BELONGS_TO, 'OrderAddress', 'order_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'order_id' => 'Order',
                    'product_id' => 'Product',
                    'option_id' => 'Option',
                    'quantity' => 'Quantity',
                    'amount' => 'Amount',
                    'DOC' => 'Doc',
                    'status' => 'Status',
                    'gift_option' => 'Gift Option',
                    'rate' => 'Rate',
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
                $criteria->compare('order_id', $this->order_id);
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('option_id', $this->option_id);
                $criteria->compare('quantity', $this->quantity);
                $criteria->compare('amount', $this->amount);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('gift_option', $this->gift_option);
                $criteria->compare('rate', $this->rate);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return OrderProducts the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
