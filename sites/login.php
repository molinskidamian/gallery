<?php

if(!isset($_POST['sub-login'])){
    include './sites/login-form.php';
} else {
    echo "<p>FORMULARZ został wysłany</p>";
    echo "<p>Przyjmuje dane</p>";
    // $form = new Form($_POST['sub-login']);
    $user = new User($_POST['sub-login']);
    $user->setSession($_POST['login'], $_POST['password']);

    // echo '<p>'.$form->isEmpty($_POST['login']).'</p>';
    // echo '<p>'.$form->isEmpty($_POST['password']).'</p>';
    echo '<p>Session Login: '.$user->getSessionLogin().'</p>';
    echo '<p>Session Password '.$user->getSessionPassword().'</p>';


}