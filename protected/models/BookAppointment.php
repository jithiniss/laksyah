<?php

/**
 * This is the model class for table "book_appointment".
 *
 * The followings are the available columns in table 'book_appointment':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $notes
 * @property string $date
 */
class BookAppointment extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'book_appointment';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, email, phone, country, city, address, notes', 'required'),
                    array('email', 'email'),
                    array('phone', 'numerical'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, name, email, phone, country, city, address, notes, date', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'country0' => array(self::BELONGS_TO, 'Countries', 'country'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'country' => 'Country',
                    'city' => 'City',
                    'address' => 'Address',
                    'notes' => 'Notes',
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
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone', $this->phone, true);
                $criteria->compare('country', $this->country, true);
                $criteria->compare('city', $this->city, true);
                $criteria->compare('address', $this->address, true);
                $criteria->compare('notes', $this->notes, true);
                $criteria->compare('date', $this->date, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return BookAppointment the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
