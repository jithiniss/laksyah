<?php

/**
 * This is the model class for table "user_address".
 *
 * The followings are the available columns in table 'user_address':
 * @property integer $id
 * @property integer $userid
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $contact_number
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postcode
 * @property integer $country
 * @property string $state
 * @property string $default_billing_address
 * @property string $default_shipping_address
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class UserAddress extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_address';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('userid, first_name, last_name, company, contact_number, address_1, address_2, city, postcode, country, state, default_billing_address, default_shipping_address, CB, UB, DOC', 'required'),
                    //array('userid, first_name, last_name, contact_number, address_1, address_2, city, postcode, country, state', 'required'),
                    array('userid, first_name, last_name, contact_number, address_1, address_2, city, postcode, country, state', 'required'),
                    array('userid, country, CB, UB', 'numerical', 'integerOnly' => true),
                    array('first_name, last_name, company, contact_number, city', 'length', 'max' => 100),
                    array('postcode, state, default_billing_address, default_shipping_address', 'length', 'max' => 111),
                    array('DOU', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, userid, first_name, last_name, company, contact_number, address_1, address_2, city, postcode, country, state, default_billing_address, default_shipping_address, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
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
                    'userid' => 'Userid',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'company' => 'Company',
                    'contact_number' => 'Contact Number',
                    'address_1' => 'Address 1',
                    'address_2' => 'Address 2',
                    'city' => 'City',
                    'postcode' => 'Postcode',
                    'country' => 'Country',
                    'state' => 'State',
                    'default_billing_address' => 'Default Billing Address',
                    'default_shipping_address' => 'Default Shipping Address',
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
                $criteria->compare('userid', $this->userid);
                $criteria->compare('first_name', $this->first_name, true);
                $criteria->compare('last_name', $this->last_name, true);
                $criteria->compare('company', $this->company, true);
                $criteria->compare('contact_number', $this->contact_number, true);
                $criteria->compare('address_1', $this->address_1, true);
                $criteria->compare('address_2', $this->address_2, true);
                $criteria->compare('city', $this->city, true);
                $criteria->compare('postcode', $this->postcode, true);
                $criteria->compare('country', $this->country);
                $criteria->compare('state', $this->state, true);
                $criteria->compare('default_billing_address', $this->default_billing_address, true);
                $criteria->compare('default_shipping_address', $this->default_shipping_address, true);
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
         * @return UserAddress the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
