<?php
    require "products.php";
    session_start();
?>
<html>

<body>

  <h1>Thanks for your purchase</h1>
  <p> Items </p>
  <ul>
    <?php
      if ($_SESSION["has_moma"] == true) {
        echo '<li id="moma">' . $moma .' </li>';
      }
      if ($_SESSION["has_central"] == true) {
        echo '<li id="central">' . $central .'</li>';
    } 
      if ($_SESSION["has_empire"] == true) {
        echo '<li id="empire">' . $empire . '</li>';
    } 
      if ($_SESSION["has_statue"] == true) {
        echo '<li id="statue">' . $statue . '</li>';
    } 
    ?>
</ul>
<p>
    <?php
        echo "Shipping Address: " . $_SESSION["address"];
        session_destroy();
    ?>
</p>
</body>

</html>