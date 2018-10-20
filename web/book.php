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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book</title>
</head>

<body>
<div>
<a href="/books.php"> Back to Book List </a>
<h1>Book Detail</h1>
<?php
$id = $_GET["id"];
$query = "SELECT b.Id, b.Name, b.Author, b.ISBN, b.cover, a.Name as user FROM books b LEFT JOIN Accounts a ON UserId = a.Id WHERE b.id = ?";
$statement = $db->prepare($query);  
$statement->execute(array($id));

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{  
	echo "<b>Name:</b> ";
    echo $row['name'] . "<br>";
    echo "<b>Author:</b> ";
    echo $row['author'] . "<br>";
    echo "<b>ISBN:</b> ";
    echo $row['isbn'] . "<br>";
    echo "<b>Owner:</b> ";
    echo $row['user'] . "<br>";
    echo "<img height='300px' width='200px' src='". $row['cover'] . "'/><br>";
}
?>


</div>

</body>
</html>

</div>

</body>
</html>