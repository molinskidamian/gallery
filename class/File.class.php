<?php

class File {
    public $file;
    public $name;
    public $type;
    public $size;

    public function __construct($file){
        $this->file = $file;
        $this->name = $_FILES['fileInput']['name'];
        $this->type = $_FILES['fileInput']['type'];
        $this->size = $_FILES['fileInput']['size'];

    }

    public function getFileName() {
        return $this->name;
    }

    public function getFileType() {
        return $this->type;
    }

    public function getFileSize() {
        return $this->size;
    }
}