<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $category_id
 * @property string $product_name
 * @property string $product_code
 * @property string $main_image
 * @property string $hover_image
 * @property string $gallery_images
 * @property string $video
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $header_visibility
 * @property integer $sort_order
 * @property double $price
 * @property integer $quantity
 * @property integer $subtract_stock
 * @property double $discount
 * @property string $discount_type
 * @property double $discount_rate
 * @property string $deal_day_date
 * @property integer $deal_day_status
 * @property integer $requires_shipping
 * @property integer $enquiry_sale
 * @property string $new_from
 * @property string $new_to
 * @property string $sale_from
 * @property string $sale_to
 * @property string $special_price_from
 * @property string $special_price_to
 * @property double $tax
 * @property integer $gift_option
 * @property integer $stock_availability
 * @property string $canonical_name
 * @property string $video_link
 * @property double $dimensionl
 * @property double $dimensionw
 * @property double $dimensionh
 * @property integer $dimension_class
 * @property double $weight
 * @property integer $weight_class
 * @property integer $status
 * @property integer $exchange
 * @property string $search_tag
 * @property string $related_products
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class Products extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'products';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('category_id, main_image, gallery_images, description, meta_title, meta_description, meta_keywords, header_visibility, sort_order, price, quantity, subtract_stock, requires_shipping, dimensionl, dimensionw, dimensionh, dimension_class, weight, weight_class, status, related_products, CB, UB, DOC', 'required'),
                    array('header_visibility, sort_order, quantity, subtract_stock, requires_shipping, dimension_class, weight_class, status, CB, UB', 'numerical', 'integerOnly' => true),
                    array('price, dimensionl, dimensionw, dimensionh, weight', 'numerical'),
                    //array('main_image, gallery_images', 'length', 'max' => 100),
                    array('meta_title, meta_keywords, product_code, related_products', 'length', 'max' => 225),
                    array('DOU', 'safe'),
                    array('product_code', 'unique'),
                    array('canonical_name', 'unique'),
                    array('video', 'file', 'types' => 'mp4', 'allowEmpty' => true, 'on' => 'create'),
                    array('video', 'file', 'types' => 'mp4', 'allowEmpty' => true, 'on' => 'update'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, category_id, main_image,hover_image, gallery_images, description, meta_title, meta_description, meta_keywords, header_visibility, sort_order, price, quantity, subtract_stock,discount,discount_type,discount_rate, requires_shipping, dimensionl, dimensionw, dimensionh, dimension_class, weight, weight_class, status, related_products, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
                    array('id, category_id, gallery_images, description, meta_title, meta_description, meta_keywords, header_visibility, sort_order, price, quantity, subtract_stock,discount,discount_type,discount_rate, requires_shipping, dimensionl, dimensionw, dimensionh, dimension_class, weight, weight_class, status, related_products, CB, UB, DOC, DOU', 'safe'),
                    // array('main_image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
                    //array('gallery_images', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
                    array('category_id,product_name,product_code,main_image,description', 'required', 'on' => 'create'),
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
                    'category_id' => 'Category',
                    'deal_day_date' => 'Deal Date',
                    'deal_day_status' => 'Deal Status',
                    'product_name' => 'Product Name',
                    'product_code' => 'Product Code',
                    'main_image' => 'Main Image',
                    'hover_image' => 'Hover Image',
                    'gallery_images' => 'Gallery Images',
                    'video' => 'Video',
                    'description' => 'Description',
                    'meta_title' => 'Meta Title',
                    'meta_description' => 'Meta Description',
                    'meta_keywords' => 'Meta Keywords',
                    'header_visibility' => 'Header Visibility',
                    'sort_order' => 'Sort Order',
                    'price' => 'Price',
                    'quantity' => 'Quantity',
                    'subtract_stock' => 'Subtract Stock',
                    'discount' => 'Discount',
                    'discount_type' => 'Discount Type',
                    'discount_rate' => 'Discount Rate',
                    'requires_shipping' => 'Requires Shipping',
                    'enquiry_sale' => 'Enquiry/Sale',
                    'new_from' => 'New From',
                    'new_to' => 'New To',
                    'sale_from' => 'Sale From',
                    'sale_to' => 'Sale To',
                    'special_price_from' => 'Special Price From',
                    'special_price_to' => 'Special Price To',
                    'sizechartforwhat' => 'Size Chart for What?',
                    'tax' => 'Tax',
                    'gift_option' => 'Gift Option',
                    'stock_availability' => 'Stock Availability',
                    'canonical_name' => 'Canonical Name',
                    'video_link' => 'Video Link',
                    'dimensionl' => 'Dimensionl',
                    'dimensionw' => 'Dimensionw',
                    'dimensionh' => 'Dimensionh',
                    'dimension_class' => 'Dimension Class',
                    'weight' => 'Weight',
                    'weight_class' => 'Weight Class',
                    'status' => 'Status',
                    'exchange' => 'Exchange',
                    'search_tag' => 'Search Tag',
                    'related_products' => 'Related Products',
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
                $criteria->compare('category_id', $this->category_id, true);
                $criteria->compare('product_name', $this->product_name, true);
                $criteria->compare('product_code', $this->product_code, true);
                $criteria->compare('main_image', $this->main_image, true);
                $criteria->compare('hover_image', $this->hover_image, true);
                $criteria->compare('gallery_images', $this->gallery_images, true);
                $criteria->compare('video', $this->video, true);
                $criteria->compare('description', $this->description, true);
                $criteria->compare('meta_title', $this->meta_title, true);
                $criteria->compare('meta_description', $this->meta_description, true);
                $criteria->compare('meta_keywords', $this->meta_keywords, true);
                $criteria->compare('header_visibility', $this->header_visibility);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('price', $this->price);
                $criteria->compare('quantity', $this->quantity);
                $criteria->compare('subtract_stock', $this->subtract_stock);
                $criteria->compare('discount', $this->discount);
                $criteria->compare('deal_day_status', $this->deal_day_status);
                $criteria->compare('deal_day_date', $this->deal_day_date, true);
                $criteria->compare('discount_type', $this->discount_type, true);
                $criteria->compare('discount_rate', $this->discount_rate);
                $criteria->compare('requires_shipping', $this->requires_shipping);
                $criteria->compare('enquiry_sale', $this->enquiry_sale);
                $criteria->compare('new_from', $this->new_from, true);
                $criteria->compare('new_to', $this->new_to, true);
                $criteria->compare('sale_from', $this->sale_from, true);
                $criteria->compare('sale_to', $this->sale_to, true);
                $criteria->compare('special_price_from', $this->special_price_from, true);
                $criteria->compare('special_price_to', $this->special_price_to, true);
                $criteria->compare('sizechartforwhat', $this->sizechartforwhat, true);
                $criteria->compare('tax', $this->tax);
                $criteria->compare('gift_option', $this->gift_option);
                $criteria->compare('stock_availability', $this->stock_availability);
                $criteria->compare('canonical_name', $this->canonical_name, true);
                $criteria->compare('video_link', $this->video_link, true);
                $criteria->compare('dimensionl', $this->dimensionl);
                $criteria->compare('dimensionw', $this->dimensionw);
                $criteria->compare('dimensionh', $this->dimensionh);
                $criteria->compare('dimension_class', $this->dimension_class);
                $criteria->compare('weight', $this->weight);
                $criteria->compare('weight_class', $this->weight_class);
                $criteria->compare('status', $this->status);
                $criteria->compare('exchange', $this->exchange);
                $criteria->compare('search_tag', $this->search_tag, true);
                $criteria->compare('related_products', $this->related_products, true);
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
         * @return Products the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
