<?php

/**
 * This is the model class for table "currency".
 *
 * The followings are the available columns in table 'currency':
 * @property integer $id
 * @property string $country
 * @property string $currency
 * @property string $currency_code
 * @property string $symbol
 * @property double $rate
 * @property string $image
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 */
class Currency extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'currency';

        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('country, currency, currency_code, symbol, rate, image, cb, ub, doc', 'required'),
                    array('cb, ub', 'numerical', 'integerOnly' => true),
                    array('rate', 'numerical'),
                    array('country, currency, currency_code', 'length', 'max' => 50),
                    array('symbol, image', 'length', 'max' => 225),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, country, currency, currency_code, symbol, rate, image, cb, ub, doc, dou', 'safe', 'on' => 'search'),
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
                    'country' => 'Country',
                    'currency' => 'Currency',
                    'currency_code' => 'Currency Code',
                    'symbol' => 'Symbol',
                    'rate' => 'Rate',
                    'image' => 'Image',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
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
                $criteria->compare('country', $this->country, true);
                $criteria->compare('currency', $this->currency, true);
                $criteria->compare('currency_code', $this->currency_code, true);
                $criteria->compare('symbol', $this->symbol, true);
                $criteria->compare('rate', $this->rate);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));

        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Currency the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);

        }
}
