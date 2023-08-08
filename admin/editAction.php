<?php
include 'navbar.php';
$folder = "./image/";

echo $_POST['upimg'];
function uploadImage($tempname, $folder)
{
  move_uploaded_file($tempname, $folder);
}

function updateProduct($conn, $pid, $pname, $image, $qty, $pprice, $desc)
{
  $sql = "UPDATE product SET `name` = ?, `image` = ?, `quantity` = ?, `price` = ?, `description` = ? WHERE `id` = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sssssi", $pname, $image, $qty, $pprice, $desc, $pid);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // The request is using the POST method
  if (isset($_FILES["upimg"])) {
    print_r($_POST);
    $image = $_FILES["upimg"]["name"];
    $targetPath = $folder . basename($image);
    $pname = $_POST['prname'];
    $pprice = $_POST['prpric'];
    $qty = $_POST['prqty'];
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $unescapedString = stripcslashes($desc);
    $description = str_replace('\r\n', PHP_EOL, $unescapedString);

    if ($_FILES["upimg"]["error"] === UPLOAD_ERR_OK) {
      move_uploaded_file($_FILES["upimg"]["tmp_name"], $targetPath);
      $pid = $_POST['id'];
      updateProduct($conn, $pid, $pname, $image, $qty, $pprice, $description);

      header('location:products.php');
    }
  } else {
    echo "File upload failed.";
  }
}
