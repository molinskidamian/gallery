<?php

if(!isset($_POST['sub-login'])){
    include './sites/login-form.php';
} else {
    echo "<p>FORMULARZ został wysłany</p>";
    echo "<p>Przyjmuje dane</p>";
    $form = new Form($_POST['sub-login']);
    echo '<p>'.$form->isEmpty($_POST['login']).'</p>';
    echo '<p>'.$form->isEmpty($_POST['password']).'</p>';
}