<?php

/**
 * This is the model class for table "static_page".
 *
 * The followings are the available columns in table 'static_page':
 * @property integer $id
 * @property string $title
 * @property string $big_content
 * @property string $small_content
 * @property string $image
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class StaticPage extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'static_page';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('title, big_content, small_content, image', 'required'),
                    array('CB, UB', 'numerical', 'integerOnly' => true),
                    array('title', 'length', 'max' => 100),
                    array('DOU', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('title', 'required', 'on' => 'create'),
                    array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'update'),
                    array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'create'),
                    array('id, title, big_content, small_content, image, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
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
                    'big_content' => 'Big Content',
                    'small_content' => 'Small Content',
                    'image' => 'Image',
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
                $criteria->compare('big_content', $this->big_content, true);
                $criteria->compare('small_content', $this->small_content, true);
                $criteria->compare('image', $this->image, true);
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
         * @return StaticPage the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }

}
