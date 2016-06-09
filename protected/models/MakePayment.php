<?php

/**
 * This is the model class for table "make_payment".
 *
 * The followings are the available columns in table 'make_payment':
 * @property integer $id
 * @property integer $userid
 * @property string $product_name
 * @property string $product_code
 * @property string $message
 * @property string $amount_type
 * @property string $amount
 * @property string $date
 */
class MakePayment extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'make_payment';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('userid, product_name, product_code, message, amount_type, total_amount, payment_mode,date', 'required'),
                    array('userid,total_amount', 'numerical', 'integerOnly' => true),
                    array('product_name', 'length', 'max' => 200),
                    array('product_code, amount_type', 'length', 'max' => 15),
                    array('total_amount', 'length', 'max' => 25),
                    array('netbanking, paypal, wallet', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, userid, product_name, product_code, message, amount_type, total_amount, payment_mode, date,netbanking, paypal, wallet', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'user' => array(self::BELONGS_TO, 'UserDetails', 'userid'),
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
                    'total_amount' => 'Amount',
                    'payment_mode' => 'Payment Mode',
                    'netbanking' => 'Netbanking',
                    'paypal' => 'Paypal',
                    'wallet' => 'Wallet',
                    'date' => 'Date',
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
                $criteria->compare('userid', $this->userid);
                $criteria->compare('product_name', $this->product_name, true);
                $criteria->compare('product_code', $this->product_code, true);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('amount_type', $this->amount_type, true);
                $criteria->compare('total_amount', $this->total_amount, true);
                $criteria->compare('payment_mode', $this->payment_mode, true);
                $criteria->compare('netbanking', $this->netbanking, true);
                $criteria->compare('paypal', $this->paypal, true);
                $criteria->compare('wallet', $this->wallet, true);
                $criteria->compare('date', $this->date, true);
                $criteria->compare('status', $this->status);
                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MakePayment the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
