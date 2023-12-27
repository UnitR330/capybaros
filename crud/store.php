<?php

$boxId = rand(1000000000, 9999999999);
$amount = $_POST['amount'] ?? 0;

$boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);
$boxes[] = [
    'boxId' => $boxId,
    'amount' => $amount,
];

file_get_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

header('Location: http://localhost:8080/capybaros/crud/read.php');