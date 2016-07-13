<?php

class Converter extends CApplicationComponent {

        public function convert($price) {
                if(Yii::app()->session['currency'] != "") {
                        if(Yii::app()->session['currency']->symbol != "") {
                                $result = '<i class="fa ' . Yii::app()->session['currency']->symbol . '"></i>' . round(Yii::app()->session['currency']->rate * $price, 2);
                        } else {
                                $result = round(Yii::app()->session['currency']->rate * $price, 2) . " " . Yii::app()->session['currency']->currency_code;
                        }
                } else {
                        $result = '<i class="fa fa-inr"></i>' . $price;
                }
                return $result;
        }

        public function convertPrice($price) {
                if(Yii::app()->session['currency'] != "") {
                        $result = round(Yii::app()->session['currency']->rate * $price, 2);
                } else {
                        $result = $price;
                }
                return $result;
        }

        public function convertCurrencyCode($price) {
                if(Yii::app()->session['currency'] != "") {

                        $result = round(Yii::app()->session['currency']->rate * $price, 2) . ' ' . Yii::app()->session['currency']->currency_code;
                } else {
                        $result = $price . ' INR';
                }

                return $result;
        }

}
?>


