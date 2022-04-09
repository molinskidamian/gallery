<?php


class Form {

    private $value;

    public function __construct($value){
        return $this->value = htmlspecialchars($value, ENT_QUOTES);
    }

    public function isEmpty($value){
        if(empty($value)){
            echo 'Wartość nie została wprowadzona';
            return false;
        } else {
            return $value;
        }
    }
}