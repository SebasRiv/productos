<?php

    abstract class Controller  {

        private $view;
        private $model;

        public function __construct() {
            echo __CLASS__ . 'instanciada';
        }

        protected function render($controller_name = '', $params = array()) {
            $this->view = new View($controller_name, $params);
        }

        abstract public function exec($param);

    }
    
?>