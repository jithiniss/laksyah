<?php

/**
 * This is the model class for table "user_notify".
 *
 * The followings are the available columns in table 'user_notify':
 * @property integer $id
 * @property string $email_id
 * @property integer $prod_id
 * @property integer $status
 * @property string $date
 */
class UserNotify extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_notify';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('email_id, prod_id, status, date', 'required'),
                    array('prod_id, status', 'numerical', 'integerOnly' => true),
                    array('email_id', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, email_id, prod_id, status, date', 'safe', 'on' => 'search'),
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
                    'email_id' => 'Email',
                    'prod_id' => 'Prod',
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
                $criteria->compare('email_id', $this->email_id, true);
                $criteria->compare('prod_id', $this->prod_id);
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
         * @return UserNotify the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }
}
