<?php

/**
 * This is the model class for table "user_reviews".
 *
 * The followings are the available columns in table 'user_reviews':
 * @property integer $id
 * @property integer $user_id
 * @property string $guest_user
 * @property string $user_image
 * @property integer $product_id
 * @property string $review
 * @property integer $approvel
 */
class UserReviews extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_reviews';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('user_id, guest_user, user_image, product_id, review, approvel', 'required'),
                    array('user_id, product_id, approvel', 'numerical', 'integerOnly' => true),
                    array('guest_user, user_image', 'length', 'max' => 225),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, guest_user, user_image, product_id, review, approvel', 'safe', 'on' => 'search'),
                    array('user_image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
                    array('user_id, guest_user,product_id, review', 'required', 'on' => 'create'),
                    array('user_image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'update'),
                );

        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                    'user' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
                );

        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'guest_user' => 'Guest User',
                    'user_image' => 'User Image',
                    'product_id' => 'Product',
                    'review' => 'Review',
                    'approvel' => 'Approvel',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('guest_user', $this->guest_user, true);
                $criteria->compare('user_image', $this->user_image, true);
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('review', $this->review, true);
                $criteria->compare('approvel', $this->approvel);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));

        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UserReviews the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }

}
