<?php

class Converter extends CApplicationComponent {

        public function convert($price) {
                if (Yii::app()->session['currency'] != "") {
                        $result = '<i class="fa ' . Yii::app()->session['currency']->symbol . '"></i>' . round(Yii::app()->session['currency']->rate * $price, 2);
                } else {
                        $result = '<i class="fa fa-inr"></i>' . $price;
                }
                return $result;
        }

}
?>


