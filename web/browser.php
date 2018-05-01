<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<?php require 'products.php';?>
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<h1>Tours</h1>
<ul>

    <?php
      echo '<li>' . $moma . '<button onclick="addProduct("' . $moma . '")">Add</button></li>';
      echo '<li>' . $central . '<button onclick="addProduct(' . $central . ')">Add</button></li>';
      echo '<li>' . $empire . '<button onclick="addProduct(' . $empire . ')">Add</button></li>';
      echo '<li>' . $statue . '<button onclick="addProduct(' . $statue . ')">Add</button></li>';

    ?>
</ul>
<script>
  function addProduct(product) {
    $.ajax({
      type: "POST",
      url: "addProduct.php",
      data: { product: product }
    })
  }
</script>
</body>

</html>