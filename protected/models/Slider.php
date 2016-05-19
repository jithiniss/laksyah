<?php

/**
 * This is the model class for table "slider".
 *
 * The followings are the available columns in table 'slider':
 * @property integer $id
 * @property string $image_extension
 * @property string $content
 * @property string $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Slider extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'slider';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('content, status', 'required'),
                    //array('image_extension', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false),
                    array('CB, UB', 'numerical', 'integerOnly' => true),
                    array('image_extension', 'length', 'max' => 100),
                    array('status', 'length', 'max' => 50),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, image_extension, content, status, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('image_extension', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
                    array('content, status,image_extension', 'required', 'on' => 'create'),
                    array('content, status', 'required', 'on' => 'update'),
                    array('image_extension', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'update'),
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
                    'image_extension' => 'Image',
                    'content' => 'Content',
                    'status' => 'Status',
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
                $criteria->compare('image_extension', $this->image_extension, true);
                $criteria->compare('content', $this->content, true);
                $criteria->compare('status', $this->status, true);
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
         * @return Slider the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }

}
