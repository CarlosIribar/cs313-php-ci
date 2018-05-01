<?php
require "products.php";
if (isset($_POST['product'])) {
    $product = $_POST['product'];
    if ($product === $moma) {
        $_SESSION["has_moma"] = false;
    }
    if ($product === $central) {
        $_SESSION["has_central"] = false;
    }
    if ($product === $statue) {
        $_SESSION["has_statue"] = false;
    }
    if ($product === $empire) {
        $_SESSION["has_empire"] = false;
    }
}
?>