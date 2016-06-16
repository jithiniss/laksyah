<?php

/**
 * This is the model class for table "make_payment_history".
 *
 * The followings are the available columns in table 'make_payment_history':
 * @property integer $id
 * @property string $product_name
 * @property string $product_code
 * @property string $message
 * @property integer $amount_type
 * @property string $amount
 * @property integer $pay_method
 * @property integer $make_payment_id
 * @property string $amount_payment_gateway
 * @property string $amount_from_paypal
 * @property integer $enq_id
 * @property integer $history_id
 * @property integer $date
 */
class MakePaymentHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'make_payment_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('product_name, product_code,userid, message, amount_type, amount, pay_method, make_payment_id,  date', 'required'),
                    array('amount_type, pay_method, make_payment_id, enq_id, history_id, date', 'numerical', 'integerOnly' => true),
                    array('product_name, product_code, amount, amount_payment_gateway, amount_from_paypal', 'length', 'max' => 200),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, product_name, product_code, message, amount_type, amount, pay_method, make_payment_id, amount_payment_gateway, amount_from_paypal, enq_id, history_id,userid ,from_wallet, date', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'userid' => 'Userid',
                    'product_name' => 'Product Name',
                    'product_code' => 'Product Code',
                    'message' => 'Message',
                    'amount_type' => 'Amount Type',
                    'amount' => 'Amount',
                    'pay_method' => 'Pay Method',
                    'make_payment_id' => 'Make Payment',
                    'amount_payment_gateway' => 'Amount Payment Gateway',
                    'amount_from_paypal' => 'Amount From Paypal',
                    'from_wallet' => 'From Wallet',
                    'enq_id' => 'Enq',
                    'history_id' => 'History',
                    'date' => 'Date',
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
                $criteria->compare('userid', $this->userid);
                $criteria->compare('product_name', $this->product_name, true);
                $criteria->compare('product_code', $this->product_code, true);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('amount_type', $this->amount_type);
                $criteria->compare('amount', $this->amount, true);
                $criteria->compare('pay_method', $this->pay_method);
                $criteria->compare('make_payment_id', $this->make_payment_id);
                $criteria->compare('amount_payment_gateway', $this->amount_payment_gateway, true);
                $criteria->compare('amount_from_paypal', $this->amount_from_paypal, true);
                $criteria->compare('from_wallet', $this->from_wallet, true);
                $criteria->compare('enq_id', $this->enq_id);
                $criteria->compare('history_id', $this->history_id);
                $criteria->compare('date', $this->date);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MakePaymentHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
