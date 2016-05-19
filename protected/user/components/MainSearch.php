<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainSearch
 *
 * @author admin
 */
class MainSearch extends CWidget {

        //public $category_id = '';
        public $category_tag_id = '';
        public $type = '';
        public $form_id = '';
        public $field_val = '';

        public function run() {

                $this->render('main_search');

        }

}
