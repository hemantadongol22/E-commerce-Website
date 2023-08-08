<?php
    $id = $_GET['id'];
    echo $id;
    $url = 'prod_detail.php?id='.$id;
    header('location:'.$url);

