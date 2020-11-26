<?php
    class Model {
        protected $db;

        public function __construct() {
            $this->db = new mysqli(HOST, USER, PASSWORD, DB_NAME);
        }
    }
?>