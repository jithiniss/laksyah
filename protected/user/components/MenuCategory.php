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

        public function MenuCategories($cats, $parent, $categ, $min_, $max_, $size) {
                if (Yii::app()->session['currency'] != "") {
                        $min = $this->currencychange($min_);
                        $max = $this->currencychange($max_);
                } else {
                        $min = $min_;
                        $max = $max_;
                }
                if (!empty($cats) || $cats != '') {
                        $find_ids = $this->ids($cats, $parent, $categ);
                }

                if (!empty($categ)) {
                        $srt = $this->sorting($categ);
                }

                if (!empty($find_ids) || $find_ids != '') {
                        $find_in_set = '';
                        foreach ($find_ids as $find_id) {
                                if ($find_id != '') {
                                        $find_in_set .= "FIND_IN_SET('$find_id',`category_id`) OR ";
                                }
                        }
                }
//                var_dump($find_in_set);
//                exit;
                $find_in_set = rtrim($find_in_set, ' OR');
                if (!empty($find_in_set) && !empty($min) && !empty($max) && !empty($size)) {
                        $condition = '(id  IN (SELECT product_id FROM option_details WHERE size_id = ' . $size . ')) AND (' . $find_in_set . ') AND (price > ' . $min . ' AND price <' . $max . ')';
                        $order = '';
                } elseif (!empty($find_in_set) && !empty($min) && !empty($max)) {
                        $condition = '(' . $find_in_set . ') AND (price > ' . $min . ' AND price <' . $max . ')';
                        $order = '';
                } elseif (!empty($find_in_set) && !empty($categ)) {
                        $condition = $find_in_set;
                        $order = '';
                } elseif (!empty($find_in_set) && !empty($size)) {
                        $condition = '(id  IN (SELECT product_id FROM option_details WHERE size_id = ' . $size . ')) AND (' . $find_in_set . ')';
                        $order = '';
                } elseif (!empty($find_in_set)) {
                        $condition = $find_in_set;
                        $order = 'RAND()';
                }



                if ($find_in_set != '') {
                        return $dataProvider = new CActiveDataProvider('Products', array(
                            'criteria' => array(
                                'condition' => $condition,
                            //'order' => $order,
                            ),
                            'pagination' => array(
                                'pageSize' => 15,
                            ),
                            'sort' => array(
                                'defaultOrder' => $srt,
                            // 'defaultOrder' => 'product_name RAND() ',
                            )
                                )
                        );
//                        var_dump($dataProvider);
//                        exit;
                } else {

                        return $dataProvider = '';
                }
        }

        public function filterMenuProducts($products, $min, $max, $size_type) {

                if (!empty($products) && !empty($min) && !empty($max) && !empty($size_type)) {

                        $condition .= '(id  IN (SELECT product_id FROM option_details WHERE size_id = ' . $size_type . ')) AND (id  IN (' . $products . ')) AND (price > ' . $min . ' AND price <' . $max . ')';
                        $order = '';
                } elseif (!empty($products) && !empty($min) && !empty($max)) {
                        $condition .= '(id  IN (' . $products . ')) AND  (price > ' . $min . ' AND price <' . $max . ')';
                        $order = '';
                }

                if ($products != '') {

                        return $dataProvider = new CActiveDataProvider('Products', array(
                            'criteria' => array(
                                'condition' => $condition,
                                'order' => $order,
                            ),
                            'pagination' => array(
                                'pageSize' => 1,
                            ),
                            'sort' => array(
                                'defaultOrder' => $srt,
                            // 'defaultOrder' => 'product_name RAND() ',
                            )
                                )
                        );
//                        var_dump($dataProvider);
//                        exit;
                } else {

                        return $dataProvider = '';
                }
        }

        public function ids($cats, $parent, $categ) {
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
                return $ids;
        }

        public function sorting($categ) {
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
                return $srt;
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

        public function findParent($parent) {
                $master = ProductCategory::model()->findByPk($parent);
                if ($master != '') {
                        if ($master->id == $master->parent) {
                                return $master->id;
                        } else {
                                return $this->findParent($master->parent);
                        }
                } else {
                        return $parent;
                }
        }

        public function currencychange($price) {
                if (Yii::app()->session['currency']->rate < 1) {
                        return $price / Yii::app()->session['currency']->rate;
                } else {
                        return $price * Yii::app()->session['currency']->rate;
                }
        }

}
