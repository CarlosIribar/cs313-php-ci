<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <br><input type="text" name="name"><br>
E-mail: <br><input type="text" name="email"><br>

Major: <br>
<input type="radio" name="major" value="Computer Science">Computer Science<br>
<input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
<input type="radio" name="major" value="Computer information Technology">Computer information Technology<br>
<input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>
Comments: <br>
<input type="textarea" name="comments"><br>

<input type="checkbox" name="continents[]" vaule="North America">North America<br>
<input type="checkbox" name="continents[]" vaule="South America">South America<br>
<input type="checkbox" name="continents[]" vaule="Europe">Europe<br>
<input type="checkbox" name="continents[]" vaule="Asia">Asia<br>
<input type="checkbox" name="continents[]" vaule="Australia">Australia<br>
<input type="checkbox" name="continents[]" vaule="Africa">Africa<br>
<input type="checkbox" name="continents[]" vaule="Antarctica">Antarctica<br>
<input type="submit">
</form>

<?php
// define variables and set to empty values
$name = $email = $major = $comments = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $major = test_input($_POST["major"]);
  $comments = test_input($_POST["comments"]);
  $north_america = $_POST["north_america"];
  $south_america = $_POST["south_america"];
  $europe = $_POST["europe"];
  $asia = $_POST["asia"];
  $australia = $_POST["australia"];
  $africa = $_POST["africa"];
  $antarctica = $_POST["antarctica"];

    echo '<h3>Continents visited: </h3>';
    $continents = $_POST['continents'];

    // optional
    // echo "You chose the following color(s): <br>";

    foreach ($continents as $continent){ 
    echo $continent . "<br>";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php echo 'name: ' . $name . '<br>' ;?>
<?php echo 'email: ' . $email . '<br>' ;?>
<?php echo 'major: ' . $major . '<br>' ;?>
<?php echo 'comments: ' . $comments . '<br>' ;?>


</body>
</html>