<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuCategory
 *
 * @author admin
 */
class MenuCategory extends CApplicationComponent {

        public function MenuCategories($cats, $parent, $categ) {

                if (!empty($cats) || $cats != '') {
                        $ids = array();
                        foreach ($cats as $cat) {

                                /* 3rd level of subcategory */
                                $subcats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id));

                                if (!empty($subcats) || $subcats != '') {

                                        foreach ($subcats as $subcat) {
                                                $_SESSION['category']['0'] = '';
                                                $vals = $this->selectCategory($subcat, $parent->id);
                                                if (!empty($vals) || $vals != '') {
                                                        foreach ($vals as $val) {
                                                                if (!in_array($val, $ids)) {
                                                                        array_push($ids, $val);
                                                                }
                                                        }
                                                }
                                                $find_ids = $ids;
                                        }
                                }
                        }
                        $cat_details = ProductCategory::model()->findByPk($parent->id);
                        $vals = $this->selectCategory($cat_details, $parent->id);
                        if (!empty($vals) || $vals != '') {
                                foreach ($vals as $val) {
                                        if (!in_array($val, $ids)) {
                                                array_push($ids, $val);
                                        }
                                }
                        }
                        $find_ids = $ids;
                }

                if (!empty($categ)) {
                        if ($categ == 1) {
                                $srt = 'sale_from DESC';
                        } elseif ($categ == 2) {
                                $srt = 'price ASC';
                        } elseif ($categ == 3) {
                                $srt = 'price DESC';
                        } elseif ($categ == 4) {
                                $srt = 'product_name ASC';
                        } elseif ($categ == 5) {
                                $srt = 'product_name DESC';
                        }
                }

                if (!empty($find_ids) || $find_ids != '') {

                        $find_in_set = '';
                        foreach ($find_ids as $find_id) {
                                if ($find_id != '') {
                                        $find_in_set .= "FIND_IN_SET('$find_id',`category_id`) OR ";
                                }
                        }
                }

                $find_in_set = rtrim($find_in_set, ' OR');
                if ($find_in_set != '') {

                        return $dataProvider = new CActiveDataProvider('Products', array(
                            'criteria' => array(
                                'condition' => $find_in_set,
                                'order' => 'RAND()',
                            ),
                            'pagination' => array(
                                'pageSize' => 20,
                            ),
                            'sort' => array(
                            //'defaultOrder' => 'price ASC',
                            // 'defaultOrder' => 'product_name RAND() ',
                            )
                                )
                        );
                } else {

                        return $dataProvider = '';
                }
        }

        public function selectCategory($data, $id) {
                $index = count($_SESSION['category']);
                if ($data->id == $id) {
                        $_SESSION['category'][$index + 1] = $data->id;
                } else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->id;
                        return $this->selectCategory($results, $id);
                }
                $return = array();
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        array_push($return, $cat);
                }
                return $return;
        }

}
