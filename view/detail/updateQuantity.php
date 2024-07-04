<?php
session_start();

$id_product = $_GET['id'];

if (isset($_GET['action'])) {
    $action = $_GET['action'];
   

    if (isset($_SESSION['quantity'])) {
        if ($action === 'add') {
            $_SESSION['quantity']++;
        } elseif ($action === 'min') {
            if ($_SESSION['quantity'] > 1) {
                $_SESSION['quantity']--;
            } else {
            }
        }
    }
}

// Redirect kembali ke halaman keranjang
header("Location: index.php?id=$id_product");
exit();