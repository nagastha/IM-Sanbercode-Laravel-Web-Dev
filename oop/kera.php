<?php
    require_once("animal.php");
    class kera extends Animal {
        public $kaki = 2;

        public function yell() {
            return "wakwaw";
        }
    }
?>