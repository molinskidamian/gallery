<?php

class File {
    private $file;
    private $fileName;
    public $fileType;
    public $fileSize;
    private $originalfilePath;
    private $uploadPath = UPLOAD_FILES;

    public function __construct($file){
        $this->fileName = $_FILES['fileInput']['name'];
        $this->fileType = $_FILES['fileInput']['type'];
        $this->fileSize = $_FILES['fileInput']['size'];
        $this->originalfilePath = $_FILES['fileInput']['tmp_name'];
        $this->fileError = $_FILES['fileInput']['error'];

    }

    public function getOriginalFilePath(){
        return $this->originalfilePath;
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

    public function getUploadPath(){
        return $this->uploadPath;
    }

    public function setFileName($name) {
        $this->fileName = $name;
    }

    public function addFile(){
        try {
            $target = $this->getUploadPath() . $this->getFileName;
            // if(move_uploaded_file($this->getOriginalFilePath(), $target)){
            if(move_uploaded_file($_FILES['fileInput']['tmp_name'], 'images/'.$_FILES['fileInput']['name'])){
                include './connect.db.php';
                $sql='INSERT INTO files
                    (date, fileName, fileType, fileSize)
                VALUES(
                        NOW(),
                        :fileName,
                        :fileType,
                        :fileSize
                    )';
                    $s = $pdo->prepare($sql);

                    $s->bindValue(':fileName',$this->fileName);
                    $s->bindValue(':fileType',$this->fileType);
                    $s->bindValue(':fileSize',$this->fileSize);
                    $s->execute();
                    $alert = new Alert('success', 'Plik został dodany');
                    $alert->show();
            }
        } catch (PDOException $e) {
            echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
        }
    }
}