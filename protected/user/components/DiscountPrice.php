<?php

class DiscountPrice extends CApplicationComponent {

        public function Discount($model) {

                //discount rate value not equal to null//

                if ($model->discount_rate != 0) {

                        //check date for special price //
                        if ($model->special_price_from != 0 && $model->special_price_to != 0) {

                                $from = $model->special_price_from;
                                $to = $model->special_price_to;

                                if (strtotime($from) <= strtotime($today) && strtotime($to) >= strtotime($today)) {
                                        $value = $this->DiscountType($model);
                                        return Yii::app()->Currency->convert($value);
                                } else {
                                        return Yii::app()->Currency->convert($model->price);
                                }
                        }
                        //no date limitation//
                        else {
                                $value = $this->DiscountType($model);
                                return Yii::app()->Currency->convert($value);
                        }
                } else {
                        return Yii::app()->Currency->convert($model->price);
                }
        }

        public function DiscountAmount($model) {

                //discount rate value not equal to null//

                if ($model->discount_rate != 0) {

                        //check date for special price //
                        if ($model->special_price_from != 0 && $model->special_price_to != 0) {

                                $from = $model->special_price_from;
                                $to = $model->special_price_to;

                                if (strtotime($from) <= strtotime($today) && strtotime($to) >= strtotime($today)) {
                                        $value = $this->DiscountType($model);
                                        return $value;
                                } else {
                                        return $model->price;
                                }
                        }
                        //no date limitation//
                        else {
                                $value = $this->DiscountType($model);
                                return $value;
                        }
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


