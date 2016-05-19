<?php

/**
 * This is the model class for table "coupon_history".
 *
 * The followings are the available columns in table 'coupon_history':
 * @property integer $id
 * @property string $coupon_id
 * @property string $session_id
 *  * @property string $user_id
 * @property integer $order_id
 * @property integer $total_amount
 */
class CouponHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'coupon_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('coupon_id, order_id, total_amount', 'required'),
                    array('order_id, total_amount', 'numerical', 'integerOnly' => true),
                    array('coupon_id', 'length', 'max' => 225),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, coupon_id, user_id, session_id order_id, total_amount', 'safe', 'on' => 'search'),
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
                    'coupon_id' => 'Coupon',
                    'session_id' => 'SESSION ID',
                    'user_id' => 'User ID',
                    'order_id' => 'Order',
                    'total_amount' => 'Total Amount',
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
                $criteria->compare('coupon_id', $this->coupon_id, true);
                $criteria->compare('order_id', $this->order_id);
                $criteria->compare('total_amount', $this->total_amount);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return CouponHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
