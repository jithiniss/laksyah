<?php

/**
 * This is the model class for table "q_and_a".
 *
 * The followings are the available columns in table 'q_and_a':
 * @property integer $id
 * @property string $order_q1
 * @property string $order_a1
 * @property string $order_q2
 * @property string $order_a2
 * @property string $payment_q1
 * @property string $payment_a1
 * @property string $payment_q2
 * @property string $payment_a2
 * @property integer $sort_order
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 */
class QAndA extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'q_and_a';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('order_q1, order_a1, order_q2, order_a2, payment_q1, payment_a1, payment_q2, payment_a2', 'required'),
                    array('sort_order, cb, ub', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, order_q1, order_a1, order_q2, order_a2, payment_q1, payment_a1, payment_q2, payment_a2, sort_order, cb, ub, doc, dou', 'safe', 'on' => 'search'),
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
                    'order_q1' => 'Order Q1',
                    'order_a1' => 'Order A1',
                    'order_q2' => 'Order Q2',
                    'order_a2' => 'Order A2',
                    'payment_q1' => 'Payment Q1',
                    'payment_a1' => 'Payment A1',
                    'payment_q2' => 'Payment Q2',
                    'payment_a2' => 'Payment A2',
                    'sort_order' => 'Sort Order',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
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
                $criteria->compare('order_q1', $this->order_q1, true);
                $criteria->compare('order_a1', $this->order_a1, true);
                $criteria->compare('order_q2', $this->order_q2, true);
                $criteria->compare('order_a2', $this->order_a2, true);
                $criteria->compare('payment_q1', $this->payment_q1, true);
                $criteria->compare('payment_a1', $this->payment_a1, true);
                $criteria->compare('payment_q2', $this->payment_q2, true);
                $criteria->compare('payment_a2', $this->payment_a2, true);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return QAndA the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
