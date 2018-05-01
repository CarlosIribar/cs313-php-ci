<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<?php require 'products.php';?>
<body>
<h1>Tours</h1>
<ul>

    <?php
      echo '<li>' . $moma . '<button onclick="addProduct(' . $moma . ')">Add</button></li>';
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