<?php

/**
 * This is the model class for table "weight_class".
 *
 * The followings are the available columns in table 'weight_class':
 * @property integer $id
 * @property string $title
 * @property string $unit
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class WeightClass extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'weight_class';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('title, unit, CB, UB, DOC', 'required'),
                    array('CB, UB', 'numerical', 'integerOnly' => true),
                    array('title', 'length', 'max' => 225),
                    array('unit', 'length', 'max' => 100),
                    array('DOU', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, title, unit, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('title,unit', 'required', 'on' => 'create'),
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
                    'title' => 'Title',
                    'unit' => 'Unit',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
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
                $criteria->compare('title', $this->title, true);
                $criteria->compare('unit', $this->unit, true);
                $criteria->compare('CB', $this->CB);
                $criteria->compare('UB', $this->UB);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('DOU', $this->DOU, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));

        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return WeightClass the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }

}
