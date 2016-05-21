<?php

/**
 * This is the model class for table "order_history".
 *
 * The followings are the available columns in table 'order_history':
 * @property integer $id
 * @property integer $order_id
 * @property string $order_status_comment
 * @property integer $order_status
 * @property integer $shipping_type
 * @property string $tracking_id
 * @property string $date
 * @property integer $status
 * @property integer $cb
 * @property integer $ub
 */
class OrderHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'order_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('order_id, order_status_comment, order_status, shipping_type, tracking_id, date, status, cb, ub', 'required'),
                    array('order_id, order_status, shipping_type, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('order_status_comment', 'length', 'max' => 500),
                    array('tracking_id', 'length', 'max' => 225),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, order_id, order_status_comment, order_status, shipping_type, tracking_id, date, status, cb, ub', 'safe', 'on' => 'search'),
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
                    'order_id' => 'Order',
                    'order_status_comment' => 'Order Status Comment',
                    'order_status' => 'Order Status',
                    'shipping_type' => 'Shipping Type',
                    'tracking_id' => 'Tracking',
                    'date' => 'Date',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
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
                $criteria->compare('order_status_comment', $this->order_status_comment, true);
                $criteria->compare('order_status', $this->order_status);
                $criteria->compare('shipping_type', $this->shipping_type);
                $criteria->compare('tracking_id', $this->tracking_id, true);
                $criteria->compare('date', $this->date, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return OrderHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
