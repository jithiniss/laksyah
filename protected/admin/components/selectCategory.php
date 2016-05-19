<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of selectCategory
 *
 * @author user
 */
class selectCategory extends CApplicationComponent {

        //put your code here
        public function selectCategories($data) {

                $index = count($_SESSION['category']);
                if ($data->id == $data->parent) {
                        $_SESSION['category'][$index + 1] = $data->category_name;
                }
                else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->category_name;
                        return $this->selectCategories($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                }
                return rtrim($return, '>');

        }

}
