<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $game;
}

echo json_encode($game);
?>
