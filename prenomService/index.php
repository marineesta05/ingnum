<?php
header('Content-Type: application/json');
$name = isset($_GET['name']) ? $_GET['name'] : 'Unknown';

$response = [
    'name' => $name,  
    'service' => 'prenomService',
    'timestamp' => date('Y-m-d H:i:s')
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>