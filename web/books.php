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
	<title>Books List</title>
</head>

<body>
<div>

<h1>Books List</h1>
<?php
$query = "SELECT b.Id, b.Name, b.Author, b.ISBN, a.Name as user FROM books b LEFT JOIN Accounts a ON UserId = a.Id";
$statement = $db->prepare($query);
$statement->execute();

echo "<table border='1'>
<tr>
<th>Id</th>
<th>Name</th>
<th>Author</th>
<th>ISBN</th>
<th>User</th>
</tr>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{  
	echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['isbn'] . "</td>";
    echo "<td>" . $row['user'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>


</div>

</body>
</html>

</div>

</body>
</html>