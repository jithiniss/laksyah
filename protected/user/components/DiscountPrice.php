<?php

class DiscountPrice extends CApplicationComponent {

        public function Discount($model) {

                //discount rate value not equal to null//

                if ($model->discount_rate != 0) {
                        $today_deal_products = DealProducts::model()->findByAttributes(array('date' => date('Y-m-d')));
                        if (!empty($today_deal_products)) {
                                $HiddenProducts = explode(',', $today_deal_products->deal_products);
                                if (in_array($model->id, $HiddenProducts)) {
//                                        if ($product->discount_type == 1) {
//                                                $discountRate = $product->price - $product->discount_rate;
//                                        } else {
//                                                $discountRate = $product->price - ( $product->price * ($product->discount_rate / 100));
//                                        }
                                        $value = $this->DiscountType($model);
                                        return Yii::app()->Currency->convert($value);
                                } else {
                                        return Yii::app()->Currency->convert($model->price);
                                }
                        } else {
                                return Yii::app()->Currency->convert($model->price);
                        }

                        //check date for special price //
                        //no date limitation//
                } else {
                        return Yii::app()->Currency->convert($model->price);
                }
        }

        public function DiscountAmount($model) {

                //discount rate value not equal to null//
                if ($model->discount_rate != 0) {
                        $today_deal_products = DealProducts::model()->findByAttributes(array('date' => date('Y-m-d')));
                        if (!empty($today_deal_products)) {
                                $HiddenProducts = explode(',', $today_deal_products->deal_products);
                                if (in_array($model->id, $HiddenProducts)) {
//                                        if ($product->discount_type == 1) {
//                                                $discountRate = $product->price - $product->discount_rate;
//                                        } else {
//                                                $discountRate = $product->price - ( $product->price * ($product->discount_rate / 100));
//                                        }
                                        $value = $this->DiscountType($model);
                                        return $value;
                                } else {
                                        return $model->price;
                                }
                        } else {
                                return $model->price;
                        }

                        //check date for special price //
                        //no date limitation//
                } else {
                        return $model->price;
                }
        }

        public function DiscountType($data) {
                if ($data->discount_type == 1) {
                        $discountRate = $data->price - $data->discount_rate;
                } else {
                        $discountRate = $data->price - ( $data->price * ($data->discount_rate / 100));
                }
                return $discountRate;
        }

        public function checks($model) {
                if ($data->stock_availability == 1) {
                        $new_from = $model->new_from;
                        $new_to = $model->new_to;
                        $today = date('Y-m-d');
                        if (strtotime($new_from) <= strtotime($today) && strtotime($new_to) >= strtotime($today)) {
                                echo '<span class="label label-danger">New </span> &nbsp';
                        }
                        $sale_from = $model->sale_from;
                        $sale_to = $model->sale_to;

                        if (strtotime($sale_from) <= strtotime($today) && strtotime($sale_to) >= strtotime($today)) {
                                echo '<span class = "label label-warning">Sale</span>';
                        }
                } else {
                        echo '';
                }
        }

}
?>


