<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $heading
 * @property string $description
 * @property string $link
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class Banner extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'banner';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, image, heading, description, link, cb, doc', 'required'),
                    array('cb, ub', 'numerical', 'integerOnly' => true),
                    array('name, heading', 'length', 'max' => 100),
                    array('image, description, link', 'length', 'max' => 200),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, image, heading, description, link, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'name' => 'Name',
                    'image' => 'Image',
                    'heading' => 'Heading',
                    'description' => 'Description',
                    'link' => 'Link',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
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
                $criteria->compare('name', $this->name, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('heading', $this->heading, true);
                $criteria->compare('description', $this->description, true);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Banner the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
