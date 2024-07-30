<?php
session_start();

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

echo json_encode(['score' => $_SESSION['score']]);
?>
