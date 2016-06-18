<?php

/**
 * This is the model class for table "newsletter_content".
 *
 * The followings are the available columns in table 'newsletter_content':
 * @property integer $id
 * @property string $heading
 * @property string $subheading
 * @property string $content
 * @property string $image
 * @property string $link
 * @property integer $status
 * @property integer $type
 * @property string $doc
 * @property integer $cb
 * @property string $dou
 * @property integer $ub
 */
class NewsletterContent extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'newsletter_content';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('heading, subheading, content, image, status, ', 'required'),
                    array('status, type, cb, ub', 'numerical', 'integerOnly' => true),
                    array('heading, subheading, image, link', 'length', 'max' => 100),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, heading, subheading, content, image, link, status, type, doc, cb, dou, ub', 'safe', 'on' => 'search'),
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
                    'subheading' => 'Subheading',
                    'content' => 'Content',
                    'image' => 'Image',
                    'link' => 'Link',
                    'status' => 'Status',
                    'type' => 'Type',
                    'doc' => 'Doc',
                    'cb' => 'Cb',
                    'dou' => 'Dou',
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
                $criteria->compare('heading', $this->heading, true);
                $criteria->compare('subheading', $this->subheading, true);
                $criteria->compare('content', $this->content, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('type', $this->type);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('ub', $this->ub);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return NewsletterContent the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
