<?php


if(isset($_POST['addFile'])){
    echo '<h2>Formularz został wysłany</h2>';

    echo '<pre>';
    // var_dump($_FILES['fileInput']);
    $file = new File($_FILES['fileInput']);

    // $newString = strchr($file->getType(), "/");

    // $file->addFile();
    echo '<p>Name: '.$file->getName().'</p>';
    echo '<p>Type: '.$file->getType().'</p>';
    // echo '<p>'.strchr($file->getType(), "/").'</p>';
    // echo '<p>New string: '.$newString.'</p>';
    // echo '<p>New string: '.str_ireplace("/", '.', time().$newString).'</p>';
    echo '<p>Size: '.$file->getSize().' bajtow</p>';
    echo '<p>Original path: '.$file->getfileOriginalPath().'</p>';
    echo '<p>Error code: '.$file->getErrorCode().'</p>';
    echo '<p>Replace path: '.$file->getPath().'</p>';
    echo '</pre>';
    $file->uploadFile();


    // echo '<p><strong>File name: </strong>'. $file->getFileName() .'</p>';
    // echo '<p><strong>File type: </strong>'. $file->getFileType() .'</p>';
    // echo '<p><strong>File size: </strong>'. $file->getFileSize() .'</p>';



    return;
}

?>


<form
    enctype="multipart/form-data"
    method="POST"
    class="form"
>

    <div class="form-control">
        <label>
            Category: <?php echo ' '. time(); ?>
            <select name="category">
                <option value="0">Wybierz</option>
            <?php
                try {
                    include 'connect.db.php';
                    $sql='SELECT * FROM gallery';
                    $result = $pdo->query($sql);

                    foreach ($result as $row) {
                        $galleries[] = array(
                            'id' => $row['id'],
                            'name' => $row['name']
                        );
                    }


                    foreach($galleries as $gallery){
                        ?>
                            <option value="<?php echo htmlspecialchars($gallery['id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($gallery['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php
                    }



                } catch (PDOException $e) {
                    echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
                }
                ?>
                </select>
        </label>
    </div>

    <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
    <!-- 32 kilobajty (32768 bajtów) -->
    <div class="form-control">
        <label>
            <input type="file" id="fileInput" name="fileInput" multiple="multiple" />
        </label>
    </div>

    <div class="form-control">
        <label>
            Details:
            <p id="fileName">Name:</p>
            <p id="fileSize">Size:</p>
            <p id="fileType">Type:</p>
            <p id="fileLastModifiedDate">Last modifier date:</p>
        </label>
    </div>

    <div class="form-control">
        <label>
            <button type="submit" name="addFile">Dodaj</button>
        </label>
    </div>
</form>