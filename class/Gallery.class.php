<?php

class Gallery {
    public $name;
    public $galeries = array();

    public function setGallery($name) {
        $this->name = $name;
    }

    public function getGalleries() {
        $this->galeries;
    }
}



$foto = new Gallery();