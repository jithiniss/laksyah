<?php

/**
 * This is the model class for table "user_giftscard_history".
 *
 * The followings are the available columns in table 'user_giftscard_history':
 * @property integer $id
 * @property integer $giftcard_id
 * @property integer $user_id
 * @property string $amount
 * @property string $unique_code
 * @property string $date
 */
class UserGiftscardHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_giftscard_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('giftcard_id, user_id, amount, unique_code, date', 'required'),
                    array('giftcard_id, user_id', 'numerical', 'integerOnly' => true),
                    array('amount, unique_code', 'length', 'max' => 225),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, giftcard_id, user_id, amount, unique_code, date', 'safe', 'on' => 'search'),
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
                    'giftcard_id' => 'Giftcard',
                    'user_id' => 'User',
                    'amount' => 'Amount',
                    'unique_code' => 'Unique Code',
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
                $criteria->compare('giftcard_id', $this->giftcard_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('amount', $this->amount, true);
                $criteria->compare('unique_code', $this->unique_code, true);
                $criteria->compare('date', $this->date, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UserGiftscardHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
