<?php

/**
 * This is the model class for table "measurement_pdfs".
 *
 * The followings are the available columns in table 'measurement_pdfs':
 * @property integer $id
 * @property string $name
 * @property string $file
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class MeasurementPdfs extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'measurement_pdfs';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, file, cb, doc', 'required'),
                    array('cb, ub', 'numerical', 'integerOnly' => true),
                    array('name', 'length', 'max' => 100),
                    array('file', 'length', 'max' => 200),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, file, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'file' => 'File',
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
                $criteria->compare('file', $this->file, true);
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
         * @return MeasurementPdfs the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
