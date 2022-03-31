<?php
    try {
        include './connect.db.php';
        $sql='CREATE TABLE IF NOT EXISTS images (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            date DATETIME NOT NULL,
            name VARCHAR(255),
            type VARCHAR(255),
            size VARCHAR(255),
            path VARCHAR(255)
        ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
        $pdo->exec($sql);

    } catch (PDOException $e) {
        echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
    }

    $alert = new Alert('success', 'Utworzono tabelę images.');
    $alert->show();

    try {
        include './connect.db.php';
        $sql='CREATE TABLE IF NOT EXISTS gallery (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            date DATETIME NOT NULL,
            name VARCHAR(255)
        ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
        $pdo->exec($sql);

    } catch (PDOException $e) {
        echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
    }

    $alert = new Alert('success', 'Utworzono tabelę gallery.');
    $alert->show();

    try {
        include './connect.db.php';
        $sql='CREATE TABLE IF NOT EXISTS files (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            date DATETIME NOT NULL,
            fileName VARCHAR(255),
            fileType VARCHAR(255),
            fileSize TEXT
        ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
        $pdo->exec($sql);

    } catch (PDOException $e) {
        echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
    }

    $alert = new Alert('success', 'Utworzono tabelę files.');
    $alert->show();
?>