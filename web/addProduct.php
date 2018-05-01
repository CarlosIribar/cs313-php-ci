<?php
require "products.php";
echo "callling this";
if (isset($_POST['product'])) {
    $_SESSION["calling"] = true;
    $product = $_POST['product'];
    if ($product === $moma) {
        $_SESSION["has_moma"] = true;
    }
    if ($product === $central) {
        $_SESSION["has_central"] = true;
    }
    if ($product === $statue) {
        $_SESSION["has_statue"] = true;
    }
    if ($product === $empire) {
        $_SESSION["has_empire"] = true;
    }
}
?>
