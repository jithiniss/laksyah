<?php

class Converter extends CApplicationComponent {

        public function convert($price) {
                if (Yii::app()->session['currency'] != "") {
                        $pri_val = Yii::app()->session['currency']->rate * $price;
                        $cur_val = number_format((float) $pri_val, 2, '.', '');
                        if (Yii::app()->session['currency']->symbol != "") {

                                $result = '<i class="fa ' . Yii::app()->session['currency']->symbol . '"></i>' . $cur_val;
                        } else {
                                $result = $cur_val . " " . Yii::app()->session['currency']->currency_code;
                        }
                } else {
                        $result = '<i class="fa fa-inr"></i>' . number_format((float) $price, 2, '.', '');
                }
                return $result;
        }

        public function convertPrice($price) {
                if (Yii::app()->session['currency'] != "") {
                        $result = round(Yii::app()->session['currency']->rate * $price, 2);
                } else {
                        $result = $price;
                }
                return $result;
        }

        public function convertCurrencyCode($price) {
                if (Yii::app()->session['currency'] != "") {

                        $result = round(Yii::app()->session['currency']->rate * $price, 2) . ' ' . Yii::app()->session['currency']->currency_code;
                } else {
                        $result = $price . ' INR';
                }

                return $result;
        }

}
?>


