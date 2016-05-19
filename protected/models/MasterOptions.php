<?php

/**
 * This is the model class for table "master_options".
 *
 * The followings are the available columns in table 'master_options':
 * @property integer $id
 * @property integer $product_id
 * @property integer $option_type_id
 *
 * The followings are the available model relations:
 * @property OptionType $optionType
 * @property Products $product
 * @property OptionDetails[] $optionDetails
 */
class MasterOptions extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'master_options';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('product_id', 'required'),
                    array('product_id, option_type_id', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, product_id, option_type_id', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'optionType' => array(self::BELONGS_TO, 'OptionType', 'option_type_id'),
                    'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                    'optionDetails' => array(self::HAS_MANY, 'OptionDetails', 'master_option_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'product_id' => 'Product',
                    'option_type_id' => 'Option Type',
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
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('option_type_id', $this->option_type_id);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MasterOptions the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
