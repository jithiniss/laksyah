<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $heading
 * @property string $small_image
 * @property string $big_image
 * @property string $small_content
 * @property string $big_content
 * @property string $meta_keywords
 * @property string $meta_title
 * @property string $meta_description
 * @property integer $status
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Blog extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'blog';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('heading, small_image, big_image, small_content, big_content, meta_keywords, meta_title, meta_description, status', 'required'),
                    array('status, CB, UB', 'numerical', 'integerOnly' => true),
                    array('heading, meta_title', 'length', 'max' => 100),
                    array('small_image, big_image', 'length', 'max' => 20),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, heading, small_image, big_image, small_content, big_content, meta_keywords, meta_title, meta_description, status, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
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
                    'heading' => 'Heading',
                    'small_image' => 'Small Image',
                    'big_image' => 'Big Image',
                    'small_content' => 'Small Content',
                    'big_content' => 'Big Content',
                    'meta_keywords' => 'Meta Keywords',
                    'meta_title' => 'Meta Title',
                    'meta_description' => 'Meta Description',
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
                $criteria->compare('heading', $this->heading, true);
                $criteria->compare('small_image', $this->small_image, true);
                $criteria->compare('big_image', $this->big_image, true);
                $criteria->compare('small_content', $this->small_content, true);
                $criteria->compare('big_content', $this->big_content, true);
                $criteria->compare('meta_keywords', $this->meta_keywords, true);
                $criteria->compare('meta_title', $this->meta_title, true);
                $criteria->compare('meta_description', $this->meta_description, true);
                $criteria->compare('status', $this->status);
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
         * @return Blog the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
