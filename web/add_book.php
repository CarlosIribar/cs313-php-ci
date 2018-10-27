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
    $query = "SELECT Id, Name FROM Accounts";
    $statement = $db->prepare($query);  
    $statement->execute();
 
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
<style>
input {
    height: 20px;
    width: 30%;
}
label {
    display: block;
    margin: 5px 0px;
}
form {
    padding: 5px;
}
</style>

<body>
<div>
<a href="/books.php"> Back to Book List </a>
<h1>Add Book</h1>

<form action="" method="post">
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
<?php
$index = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {  
        echo "<select name='owner'>";
        if ($index == 0) {
            echo "<option selected='selected' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        } else {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";

        }
        $index = $index + 1;
    }
    echo "</select>";
?>
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