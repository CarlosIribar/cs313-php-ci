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
<style>
table {
    margin-top: 30px;
}
th, td {
    padding: 3px;
}
</style>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
 function removeBook(id) {
    console.log(id);
    $.ajax({
        type: "POST",
        url: "deleteBook.php",
        data: { id: id }
    }).done(function( msg ) {
        $(`#row-${id}`).remove();
    }); 
 }
</script>
<div>


<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get">
Search: <input type="text" placeholder="Search book by owner" name="owner">
<input type="submit">
</form>

<a href="/add_book.php">Add book </a>
<a href="/add_user.php">Add User </a>

<h1>Books List</h1>

<?php

if(isset($_GET['owner']) && !empty($_GET['owner'])){
    $query = "SELECT b.Id, b.Name, b.Author, b.ISBN, a.Name as user FROM books b LEFT JOIN Accounts a ON UserId = a.Id WHERE a.Name = ?";
    $statement = $db->prepare($query);
    $statement->execute(array($_GET['owner']));
} else {
    $query = "SELECT b.Id, b.Name, b.Author, b.ISBN, a.Name as user FROM books b LEFT JOIN Accounts a ON UserId = a.Id";
    $statement = $db->prepare($query);
    $statement->execute();
}

echo "<table>
<tr>
<th>Name</th>
<th>Author</th>
<th>ISBN</th>
<th>Owner</th>
<th>Actions</th>
</tr>";

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{  
	echo "<tr id='row-" . $row['id'] . "'>";
    echo "<td><a href='/book.php?id=" . $row['id'] . "'>". $row['name'] . "</a></td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['isbn'] . "</td>";
    echo "<td>" . $row['user'] . "</td>";
    echo "<td><button onClick='removeBook(". $row['id'] . ")'> Remove </button>";
    echo "<a href='/editBook.php?id=" . $row['id'] . "'> Edit </a></td>";
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