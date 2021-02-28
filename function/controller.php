<?php

if (isset($_POST)) {

    extract($_POST);

    $data['data'] = [
        'firstName' => $first_name,
        'lastName' => $last_name,
        'email' => $email,
        'address' => $address,
        'city' => $city
    ];

    echo json_encode($data);
}
