<?php
include "includes/autoload.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $ids = $_GET['id'];
    $data = new product;
    $data2 = $data->getProductByID($ids);
    $id = $data2['id'];
}

if (isset($_POST['submit'])) {
    $save = new product;
    //$data = $_POST['save'];
    $data = $_POST;
    $save->saveProduct($data);
    $save->goHome();
}

include_once "includes/product_edit.html";