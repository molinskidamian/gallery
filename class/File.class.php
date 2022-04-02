<?php

class File {
    private $file;
    private $fileName;
    private $fileType;
    private $fileSize;
    private $fileOriginalPath;
    private $fileUploadPath;
    private $fileErrorCode;

    public function __construct($file){
        $this->file = $file;
        $this->setName();
        $this->setType();
        $this->setSize();
        $this->setfileOriginalPath();
        $this->setErrorCode();
        $this->setPath(UPLOAD_FILES);
    }

    private function setName(){
        // $name = $this->file['name'];
        $type = strchr($this->getType(), "/");
        $this->fileName = str_ireplace("/", '.', time().$type);
    }

    private function setType(){
        $this->fileType = $this->file['type'];
    }

    private function setSize(){
        $this->fileSize = $this->file['size'];
    }

    private function setfileOriginalPath(){
        $this->fileOriginalPath = $this->file['tmp_name'];
    }

    private function setErrorCode(){
        $this->fileErrorCode = $this->file['error'];
    }

    private function setPath($path){
        $this->fileUploadPath = $path;
    }

    public function getName(){
        return $this->fileName;
    }

    public function getType(){
        return $this->fileType;
    }

    public function getSize(){
        return $this->fileSize;
    }

    public function getfileOriginalPath(){
        return $this->fileOriginalPath;
    }

    public function getErrorCode(){
        return $this->fileErrorCode;
    }

    public function getPath(){
        return $this->fileUploadPath;
    }

    public function uploadFile(){
        // if(move_uploaded_file($this->getfileOriginalPath(), $this->getPath().'/'.$this->getName()))
        {
            include './connect.db.php';
            try {
                $sql='INSERT INTO files SET
                    date = CURDATE(),
                    fileName = :fileName,
                    fileType = :Type,
                    fileSize = :fileSize
                ';
                $s = $pdo->prepare($sql);
                $s->bindValue(':fileName', time().$this->getName(), PDO::PARAM_STR);
                $s->bindValue(':fileType', $this->getType(), PDO::PARAM_STR);
                $s->bindValue(':fileSize', $this->getSize(), PDO::PARAM_STR);
                $s->execute();
            } catch (PDOException $e) {
                echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
            }
        }
    }
}