<div class="upper-menu">
<form method="post" action="">
    <button class="btn primary">Dodaj galerię</button>
</form>
</div>


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

    echo'<ol>';
    foreach($galleries as $gallery){
        echo '<li>'.htmlspecialchars($gallery['id'], ENT_QUOTES, 'UTF-8');
        echo htmlspecialchars($gallery['name'], ENT_QUOTES, 'UTF-8').'</li>';
    }
    echo '</ol>';



} catch (PDOException $e) {
    echo '<p>'.$e->getLine().' --- '.$e->getMessage().'</p>';
}