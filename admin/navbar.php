<?php
require_once 'connection/conn.php';
$dbConnection = DatabaseConnection::getInstance();
$conn = $dbConnection->getConnection(); ?>

<!DOCTYPE html>
<html lang="en">
<?php
//Do not delete cookies below
setcookie("amp_6e403e", "", time() - 3600, "/");
?>

<head>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap@5.1.3.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- <script src="https://kit.fontawesome.com/9c2fab3cd9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Admin Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">
                        <i class="fa-solid fa-house" style="color: #d4d4d4;"></i>&nbsp Home
                    </a>
                    <a class="nav-link" href="products.php">
                        <i class="fa-solid fa-pen-to-square" style="color: #d4d4d4;"></i>&nbsp Product
                    </a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>

