<?php

/**
 * This is the model class for table "product_category".
 *
 * The followings are the available columns in table 'product_category':
 * @property integer $id
 * @property string $parent
 * @property string $category_name
 * @property string $Description
 * @property string $image
 * @property integer $sort_order
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $header_visibility
 * @property string $search_tag
 * @property integer $status
 * @property string $canonical_name
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class ProductCategory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'product_category';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    // array('parent, category_name,description, image, sort_order, meta_title, meta_description, meta_keywords, header_visibility, status, CB, UB, DOC', 'required'),
                    array('sort_order, header_visibility, status, CB, UB', 'numerical', 'integerOnly' => true),
                    array('parent, category_name, image, meta_title, meta_keywords,canonical_name', 'length', 'max' => 225),
                    array('DOU', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, parent, category_name, description, image, sort_order, meta_title, meta_description, meta_keywords, header_visibility, status,canonical_name, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('category_name, description, image', 'required', 'on' => 'create'),
                    array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'update'),
                    array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
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
                    'parent' => 'Parent',
                    'category_name' => 'Category Name',
                    'description' => 'Description',
                    'image' => 'Image',
                    'sort_order' => 'Sort Order',
                    'meta_title' => 'Meta Title',
                    'meta_description' => 'Meta Description',
                    'meta_keywords' => 'Meta Keywords',
                    'header_visibility' => 'Header Visibility',
                    'search_tag' => 'Search Tag',
                    'status' => 'Status',
                    'canonical_name' => 'Canonical Name',
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
                $criteria->compare('parent', $this->parent, true);
                $criteria->compare('category_name', $this->category_name, true);
                $criteria->compare('description', $this->description, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('meta_title', $this->meta_title, true);
                $criteria->compare('meta_description', $this->meta_description, true);
                $criteria->compare('meta_keywords', $this->meta_keywords, true);
                $criteria->compare('header_visibility', $this->header_visibility);
                $criteria->compare('search_tag', $this->search_tag, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('canonical_name', $this->canonical_name, true);
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
         * @return ProductCategory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
