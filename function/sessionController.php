<?php
session_start();

if (isset($_POST)) {

    extract($_POST);

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    echo json_encode("okay");
}
