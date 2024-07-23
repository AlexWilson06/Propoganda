<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['score'])) {
    $_SESSION['score'] = $data['score'];
}

echo json_encode(['status' => 'success']);
?>