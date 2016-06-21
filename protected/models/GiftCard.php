<?php

/**
 * This is the model class for table "gift_card".
 *
 * The followings are the available columns in table 'gift_card':
 * @property integer $id
 * @property string $name
 * @property string $amount
 * @property string $image
 * @property string $weight
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class GiftCard extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'gift_card';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, amount, image,status,', 'required'),
                    array('cb, ub', 'numerical', 'integerOnly' => true),
                    array('name, amount, image', 'length', 'max' => 200),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, amount, image,weight,status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'amount' => 'Amount',
                    'image' => 'Image',
                    'weight' => 'Weight',
                    'status' => 'Status',
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
                $criteria->compare('amount', $this->amount, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('weight', $this->weight, true);
                $criteria->compare('status', $this->status, true);
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
         * @return GiftCard the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
