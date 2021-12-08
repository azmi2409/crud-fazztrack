<?php
include "includes/autoload.php";

if (isset($_POST['submit'])) {
    $save = new product;
    //$data = $_POST['save'];
    $data = $_POST;
    $save->addProduct($data);
    $save->goHome();
}

include_once "includes/product_add.html";
?>