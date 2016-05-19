<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author user
 */
class autoLoad extends CWidget {

        public $field_name = "";
        public $model = "";

        public function run() {
                $this->render('autoload');

        }

}
