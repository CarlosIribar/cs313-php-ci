<html>
<?php
    require "products.php";
?>
<body>

  <h1>Items in your cart</h1>
  <ul>

    <?php
      if ($_SESSION["has_moma"] == true) {
        echo '<li>' . $moma . '<button onclick="removeProduct(\'' . $moma . '\')">Remove</button></li>';
      }
      if ($_SESSION["has_central"] == true) {
        echo '<li>' . $central . '<button onclick="removeProduct(\'' . $central . '\')">Remove</button></li>';
    } 
      if ($_SESSION["has_empire"] == true) {
        echo '<li>' . $empire . '<button onclick="removeProduct(\'' . $empire . '\')">Remove</button></li>';
    } 
      if ($_SESSION["has_statue"] == true) {
        echo '<li>' . $statue . '<button onclick="removeProduct(\'' . $statue . '\')">Remove</button></li>';
    } 
    ?>
</ul>
<a href="./browser.php"> Keep shopping </a>
<script>
  function removeProduct(product) {
    $.ajax({
      type: "POST",
      url: "removeProduct.php",
      data: { product: product }
    })
  }
</script>
</body>

</html>