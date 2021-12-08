<?php
include "includes/autoload.php";

if (isset($_POST["submit"])) {
    $total = filter_input(INPUT_POST, 'id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    if (is_array($total)) {
        foreach ($total as $id) {
            $delete = new product;
            $delete->deleteProduct($id);
        }
    }
    else {
        $goHome = new product;
        $goHome->goHome();
    }
}

include_once "includes/index.html";

?>
