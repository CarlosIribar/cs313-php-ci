<?php
    require "products.php";
    session_start();
?>
<html>
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
</script>
  <p>Complete with your adress please and confirm your order</p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Address: <br><input type="text" name="address" required><br>
    <input type="submit">
  </form>
  <a href="./cart.php"> Return to cart</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $address = test_input($_POST["address"]);
  if ($address != '') {
    $_SESSION["address"] = $address; 
  
    //header('Location: nextpage.php');
    echo "<script> location.replace('confirmation.php'); </script>";
  }
  
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

</body>

</html>