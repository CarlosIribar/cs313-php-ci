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
	<style>
		table {
			margin-top: 30px;
		}

		th,
		td {
			padding: 3px;
		}
	</style>
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
    echo "<a href='/add_lecture_progress.php?id=" . $id . "'> Add Progress </a>";
    echo "<table>
          <tr>
          <th>StartDate</th>
          <th>EndDate</th>
          <th>User</th>
          </tr>";
$q = "SELECT b.StartDate, b.EndDate, b.Id, a.Name as user FROM LectureProgress b LEFT JOIN Accounts a ON UserId = a.Id WHERE b.BookId = ?";
$st = $db->prepare($q);
$st->execute(array($_GET['id']));
while ($progress = $st->fetch(PDO::FETCH_ASSOC))
{  
	echo "<tr id='row-" . $progress['id'] . "'>";
    echo "<td>" . $progress['startdate'] . "</td>";
    echo "<td>" . $progress['enddate'] . "</td>";
    echo "<td>" . $progress['user'] . "</td>";
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