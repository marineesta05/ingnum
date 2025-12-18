<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$response = [
    'name' => 'Marine',  
    'service' => 'prenomService',
    'timestamp' => date('Y-m-d H:i:s')
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>