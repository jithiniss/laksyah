<?php

/**
 * This is the model class for table "admin_user".
 *
 * The followings are the available columns in table 'admin_user':
 * @property integer $id
 * @property integer $admin_post_id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $CB
 * @property string $UB
 * @property string $DOC
 * @property string $DOU
 *
 * The followings are the available model relations:
 * @property AdminPost $adminPost
 */
class AdminUser extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'admin_user';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    // array('admin_post_id, username, password, name, email, phone, CB, UB, DOC, DOU', 'required'),
                    array('admin_post_id, cb, UB,phone', 'numerical', 'integerOnly' => true),
                    array('username, password, name, email, phone', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, admin_post_id, username, password, name, email, phone, cb, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('username,password', 'required', 'on' => 'signin'),
                    array('admin_post_id,username,password,name,email,phone', 'required', 'on' => 'create'),
                    // array('phone', 'match', 'pattern' => '/^[+]?[0-9]{10,13}$/', 'on' => 'create'),
                    array('email,username', 'unique', 'on' => 'create'),
                    array('email', 'email', 'on' => 'create'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'adminPost' => array(self::BELONGS_TO, 'AdminPost', 'admin_post_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'admin_post_id' => 'Admin Post',
                    'username' => 'Username',
                    'password' => 'Password',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'cb' => 'Cb',
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
                $criteria->compare('admin_post_id', $this->admin_post_id);
                $criteria->compare('username', $this->username, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone', $this->phone);
                $criteria->compare('cb', $this->cb, true);
                $criteria->compare('UB', $this->UB, true);
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
         * @return AdminUser the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
