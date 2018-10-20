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
	<title>Add Book</title>
</head>

<body>
<div>
<a href="/books.php"> Back to Book List </a>
<h1>Add Book</h1>

<form action=""> method="post">
<label>Name</label>
<input type="text" placeholder="Name" name="name">
<br>
<label>Author</label>
<input type="text" placeholder="Author" name="author">
<br>
<label>ISBN</label>
<input type="text" placeholder="ISBN" name="isbn">
<br>
<label>OWNER</label>
<input type="text" placeholder="Owner" name="owner">
<br>
<label>Cover link</label>
<input type="text" placeholder="Cover link" name="cover">
<br>

<input type="submit">
</form>



</div>

</body>
</html>

</div>

</body>
</html>