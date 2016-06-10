<?php

/**
 * This is the model class for table "celib_style_history".
 *
 * The followings are the available columns in table 'celib_style_history':
 * @property integer $id
 * @property integer $enq_id
 * @property integer $status
 * @property string $link
 * @property integer $measurement_id
 * @property integer $payment_id
 * @property integer $add_to_order
 * @property double $pay_amount
 * @property string $date
 */
class CelibStyleHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'celib_style_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('enq_id, status, link, measurement_id, payment_id, pay_amount, date', 'required'),
                    array('enq_id, status, measurement_id, payment_id', 'numerical', 'integerOnly' => true),
                    array('pay_amount', 'numerical'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, enq_id, status, link, measurement_id, payment_id, pay_amount, date', 'safe', 'on' => 'search'),
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
                    'enq_id' => 'Enq',
                    'status' => 'Status',
                    'link' => 'Link',
                    'measurement_id' => 'Measurement',
                    'payment_id' => 'Payment',
                    'pay_amount' => 'Pay Amount',
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
                $criteria->compare('enq_id', $this->enq_id);
                $criteria->compare('status', $this->status);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('measurement_id', $this->measurement_id);
                $criteria->compare('payment_id', $this->payment_id);
                $criteria->compare('pay_amount', $this->pay_amount);
                $criteria->compare('date', $this->date, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return CelibStyleHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
