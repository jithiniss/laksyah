<?php

/**
 * This is the model class for table "user_sizechart".
 *
 * The followings are the available columns in table 'user_sizechart':
 * @property integer $id
 * @property integer $user_id
 * @property double $around_neck
 * @property double $neck_depth
 * @property double $around_upper_chest
 * @property double $around_chest
 * @property double $around_lower_chest
 * @property double $shoulder_to_breastpoint
 * @property double $around_waist
 * @property double $shoulder_to_waist
 * @property double $around_armhole
 * @property double $sleeve_length
 * @property double $arm_length
 * @property double $around_upper_arm
 * @property double $around_elbow
 * @property double $around_wrist
 * @property double $length_upper_garment
 * @property double $shoulder_width
 * @property double $around_lower_waist
 * @property double $waist_to_ankle
 * @property double $inseam_to_ankle
 * @property double $around_hip
 * @property double $around_tigh
 * @property double $around_knee
 * @property double $around_calf
 * @property double $around_ankle
 * @property double $skirt_length
 * @property double $gown_full_length
 * @property string $date
 * @property string $product_name
 * @property string $product_code
 * @property integer $unit
 * @property integer $type
 * @property integer $standerd
 * @property string $comments
 * @property string $enq_id
 * @property string $enq_history_id
 */
class UserSizechart extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'user_sizechart';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('user_id, around_neck, neck_depth, around_upper_chest, around_chest, around_lower_chest, shoulder_to_breastpoint, around_waist, shoulder_to_waist, around_armhole, sleeve_length, arm_length, around_upper_arm, around_elbow, around_wrist, length_upper_garment, shoulder_width, around_lower_waist, waist_to_ankle, inseam_to_ankle, around_hip, around_tigh, around_knee, around_calf, around_ankle, skirt_length, gown_full_length, date', 'required'),
                    array('user_id, type, unit, standerd', 'numerical', 'integerOnly' => true),
                    array('around_neck, neck_depth, around_upper_chest, around_chest, around_lower_chest, shoulder_to_breastpoint, around_waist, shoulder_to_waist, around_armhole, sleeve_length, arm_length, around_upper_arm, around_elbow, around_wrist, length_upper_garment, shoulder_width, around_lower_waist, waist_to_ankle, inseam_to_ankle, around_hip, around_tigh, around_knee, around_calf, around_ankle, skirt_length, gown_full_length', 'numerical'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, around_neck, neck_depth, around_upper_chest, around_chest, around_lower_chest, shoulder_to_breastpoint, around_waist, shoulder_to_waist, around_armhole, sleeve_length, arm_length, around_upper_arm, around_elbow, around_wrist, length_upper_garment, shoulder_width, around_lower_waist, waist_to_ankle, inseam_to_ankle, around_hip, around_tigh, around_knee, around_calf, around_ankle, skirt_length, gown_full_length, date', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'user' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'product_name' => 'Product Name',
                    'product_code' => 'Product Code',
                    'unit' => 'Unit',
                    'type' => 'Type',
                    'standerd' => 'Standerd',
                    'user_id' => 'User',
                    'around_neck' => 'Around Neck',
                    'neck_depth' => 'Neck Depth',
                    'around_upper_chest' => 'Around Upper Chest',
                    'around_chest' => 'Around Chest',
                    'around_lower_chest' => 'Around Lower Chest',
                    'shoulder_to_breastpoint' => 'Shoulder To Breastpoint',
                    'around_waist' => 'Around Waist',
                    'shoulder_to_waist' => 'Shoulder To Waist',
                    'around_armhole' => 'Around Armhole',
                    'sleeve_length' => 'Sleeve Length',
                    'arm_length' => 'Arm Length',
                    'around_upper_arm' => 'Around Upper Arm',
                    'around_elbow' => 'Around Elbow',
                    'around_wrist' => 'Around Wrist',
                    'length_upper_garment' => 'Length of Upper Garment',
                    'shoulder_width' => 'Shoulder Width',
                    'around_lower_waist' => 'Around Lower Waist',
                    'waist_to_ankle' => 'Waist To Ankle',
                    'inseam_to_ankle' => 'Inseam To Ankle',
                    'around_hip' => 'Around Hip',
                    'around_tigh' => 'Around Tigh',
                    'around_knee' => 'Around Knee',
                    'around_calf' => 'Around Calf',
                    'around_ankle' => 'Around Ankle',
                    'skirt_length' => 'Skirt Length',
                    'gown_full_length' => 'Dress/Gown Full Length',
                    'date' => 'Date',
                    'comments' => 'Comments',
                    'enq_id' => 'Enquiry Id',
                    'enq_history_id' => 'Hitory Id',
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
                $criteria->compare('product_name', $this->product_name, true);
                $criteria->compare('product_code', $this->product_code, true);
                $criteria->compare('unit', $this->unit);
                $criteria->compare('type', $this->type);
                $criteria->compare('standerd', $this->standerd);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('around_neck', $this->around_neck);
                $criteria->compare('neck_depth', $this->neck_depth);
                $criteria->compare('around_upper_chest', $this->around_upper_chest);
                $criteria->compare('around_chest', $this->around_chest);
                $criteria->compare('around_lower_chest', $this->around_lower_chest);
                $criteria->compare('shoulder_to_breastpoint', $this->shoulder_to_breastpoint);
                $criteria->compare('around_waist', $this->around_waist);
                $criteria->compare('shoulder_to_waist', $this->shoulder_to_waist);
                $criteria->compare('around_armhole', $this->around_armhole);
                $criteria->compare('sleeve_length', $this->sleeve_length);
                $criteria->compare('arm_length', $this->arm_length);
                $criteria->compare('around_upper_arm', $this->around_upper_arm);
                $criteria->compare('around_elbow', $this->around_elbow);
                $criteria->compare('around_wrist', $this->around_wrist);
                $criteria->compare('length_upper_garment', $this->length_upper_garment);
                $criteria->compare('shoulder_width', $this->shoulder_width);
                $criteria->compare('around_lower_waist', $this->around_lower_waist);
                $criteria->compare('waist_to_ankle', $this->waist_to_ankle);
                $criteria->compare('inseam_to_ankle', $this->inseam_to_ankle);
                $criteria->compare('around_hip', $this->around_hip);
                $criteria->compare('around_tigh', $this->around_tigh);
                $criteria->compare('around_knee', $this->around_knee);
                $criteria->compare('around_calf', $this->around_calf);
                $criteria->compare('around_ankle', $this->around_ankle);
                $criteria->compare('skirt_length', $this->skirt_length);
                $criteria->compare('gown_full_length', $this->gown_full_length);
                $criteria->compare('date', $this->date, true);
                $criteria->compare('comments', $this->comments, true);
                $criteria->compare('enq_id', $this->enq_id);
                $criteria->compare('enq_history_id', $this->enq_history_id);
                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'id DESC',
                    ),
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UserSizechart the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
