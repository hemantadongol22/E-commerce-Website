<?php

session_start();
$count = $_REQUEST['count'];
$toDelete = $count;
$id = $_SESSION['count'][$toDelete];
$id1 = $_SESSION['count'][$toDelete];

print_r($id);
print_r($id1);

unset($_SESSION['cart'][$toDelete]);

// unset($_SESSION['count'][$count]);
// header('Location: cart.php');