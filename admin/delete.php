<?php
include 'navbar.php';

$id = $_GET['id'];

deleteProduct($id, $conn);

function deleteProduct($id, $conn) {
  mysqli_query($conn, "DELETE FROM product WHERE id = $id");
  header('location: products.php');
}
