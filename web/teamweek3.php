<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
Major:
<input type="radio" name="major" value="Computer Science">Computer Science
<input type="radio" name="major" value="Web Design and Development">Web Design and Development
<input type="radio" name="major" value="Computer information Technology">Computer information Technology
<input type="radio" name="major" value="Computer Engineering">Computer Engineering
Comments: 
<input type="textarea" name="comments"><br>

<input type="checkbox" name="north_america">North America
<input type="checkbox" name="south_america">South America
<input type="checkbox" name="europe">Europe
<input type="checkbox" name="asia">Asia
<input type="checkbox" name="australia">Australia
<input type="checkbox" name="africa">Africa
<input type="checkbox" name="antarctica">Antarctica
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo 'Continents visited: ';
if (north_america == true) {
    echo 'North America';
}
if (south_america == true) {
    echo 'South America';
}
if (europe == true) {
    echo 'Europe';
}
if (asia == true) {
    echo 'Asia';
}
if (australia == true) {
    echo 'Australia';
}
if (africa == true) {
    echo 'Africa';
}
if (antarctica == true) {
    echo 'Antartica';
}
?>

<?php echo 'name: ' . $name;?>
<?php echo 'email: ' . $email;?>
<?php echo 'major: ' . $major;?>
<?php echo 'comments: ' . $comments;?>
<?php echo 'comments: ' . $comments;?>


</body>
</html>