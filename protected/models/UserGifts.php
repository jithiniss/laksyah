<?php

/**
 * This is the model class for table "user_gifts".
 *
 * The followings are the available columns in table 'user_gifts':
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_product_id
 * @property integer $order_id
 * @property string $from
 * @property string $to
 * @property string $message
 * @property integer $status
 * @property string $date
 */
class UserGifts extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_gifts';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('user_id, order_id, from, to, message, status, date', 'required'),
                    array('user_id, order_product_id, order_id, status', 'numerical', 'integerOnly' => true),
                    array('from, to', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, order_id, from, to, message, status, date', 'safe', 'on' => 'search'),
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
                    'user_id' => 'User',
                    'order_id' => 'Order',
                    'order_product_id' => 'Order Product id',
                    'from' => 'From',
                    'to' => 'To',
                    'message' => 'Message',
                    'status' => 'Status',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('order_id', $this->order_id);
                $criteria->compare('order_product_id', $this->order_product_id);
                $criteria->compare('from', $this->from, true);
                $criteria->compare('to', $this->to, true);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('date', $this->date, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UserGifts the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
