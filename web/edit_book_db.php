<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

// get the data from the POST
$name = $_POST['name'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$ownerid = $_POST['ownerid'];
$cover = $_POST['cover'];
$id = $_POST['id'];

try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'UPDATE books set Name=:name, Author=:author, isbn=:isbn, Cover=:cover, userId=:ownerid WHERE id = :id ';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':name', $name);
	$statement->bindValue(':author', $author);
	$statement->bindValue(':isbn', $isbn);
    $statement->bindValue(':cover', $cover);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->bindValue(':id', $id);
    $statement->execute();
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: books.php");
die(); 
?>

?>