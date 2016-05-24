<?php

/**
 * This is the model class for table "option_details".
 *
 * The followings are the available columns in table 'option_details':
 * @property integer $id
 * @property integer $master_option_id
 * @property integer $product_id
 * @property integer $color_id
 * @property integer $size_id
 * @property integer $stock
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MasterOptions $masterOption
 * @property OptionCategory $color
 * @property OptionCategory $size
 */
class OptionDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'option_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('master_option_id, stock, status,product_id', 'required'),
                    array('master_option_id, color_id, size_id, stock, status,product_id', 'numerical', 'integerOnly' => true),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, master_option_id, color_id, size_id, stock, status,product_id', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'masterOption' => array(self::BELONGS_TO, 'MasterOptions', 'master_option_id'),
                    'color' => array(self::BELONGS_TO, 'OptionCategory', 'color_id'),
                    'size' => array(self::BELONGS_TO, 'OptionCategory', 'size_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'master_option_id' => 'Master Option',
                    'color_id' => 'Color',
                    'size_id' => 'Size',
                    'stock' => 'Stock (nos)',
                    'status' => 'Status',
                    'product_id' => 'Product',
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
                $criteria->compare('master_option_id', $this->master_option_id);
                $criteria->compare('color_id', $this->color_id);
                $criteria->compare('size_id', $this->size_id);
                $criteria->compare('stock', $this->stock);
                $criteria->compare('status', $this->status);
                $criteria->compare('product_id', $this->product_id);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return OptionDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
