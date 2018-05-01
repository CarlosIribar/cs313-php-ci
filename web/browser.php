<?php
  session_start();
?>
<html>
<?php require 'products.php';?>
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<p>Buy our amazing tours!</p>
<h1>Tours</h1>
<ul>

    <?php
      echo '<li>' . $moma . '<button onclick="addProduct(\'' . $moma . '\')">Add</button></li>';
      echo '<li>' . $central . '<button onclick="addProduct(\'' . $central . '\')">Add</button></li>';
      echo '<li>' . $empire . '<button onclick="addProduct(\'' . $empire . '\')">Add</button></li>';
      echo '<li>' . $statue . '<button onclick="addProduct(\'' . $statue . '\')">Add</button></li>';
      print_r($_SESSION);
    ?>
    
</ul>
<a href="./cart.php"> View cart </a>
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