<?php
    require "products.php";
    session_start();
?>
<html>
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <h1>Items in your cart</h1>
  <ul>
    <?php
      if ($_SESSION["has_moma"] == true) {
        echo '<li id="moma">' . $moma . '<button onclick="removeProduct(\'' . $moma . '\',\'moma\')">Remove</button></li>';
      }
      if ($_SESSION["has_central"] == true) {
        echo '<li id="central">' . $central . '<button onclick="removeProduct(\'' . $central . '\',\'central\')">Remove</button></li>';
    } 
      if ($_SESSION["has_empire"] == true) {
        echo '<li id="empire">' . $empire . '<button onclick="removeProduct(\'' . $empire . '\',\'empire\')">Remove</button></li>';
    } 
      if ($_SESSION["has_statue"] == true) {
        echo '<li id="statue">' . $statue . '<button onclick="removeProduct(\'' . $statue . '\',\'statue\')">Remove</button></li>';
    } 
    ?>
</ul>
<a href="./browser.php"> Continue shopping </a>
<a href="./checkout.php"> Continue to checkout </a>
<script>
  function removeProduct(product, elem) {
    $.ajax({
      type: "POST",
      url: "removeProduct.php",
      data: { product: product }
    })
    $('#' + elem).remove();
  }
</script>
</body>

</html>