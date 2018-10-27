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
<title>Edit Book</title>
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
<h1>Edit Book</h1>

<form action="edit_book_db.php" method="post">
<?php
$id = $_GET["id"];
$query = "SELECT b.Id, b.Name, b.Author, b.ISBN, b.cover, a.Name as user FROM books b LEFT JOIN Accounts a ON UserId = a.Id WHERE b.id = ?";
$statement = $db->prepare($query);  
$statement->execute(array($id));

$q = "SELECT id as i, name FROM Accounts";
$st = $db->prepare($q);  
$st->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{  
    echo "<label>Name</label>";
    echo "<input style=\"display:none\" type=\"text\" value=\"". $row['id'] . "\" placeholder=\"id\" name=\"id\">";
    echo "<input type=\"text\" value=\"". $row['name'] . "\" placeholder=\"Name\" name=\"name\">";
    echo "<br>";
    echo "<label>Author</label>";
    echo "<input type=\"text\" placeholder=\"Author\" value=\"" . $row['author'] . "\" name=\"author\">";
    echo "<br>";
    echo "<label>ISBN</label>";
    echo "<input type=\"text\" placeholder=\"ISBN\" value=\"" . $row['isbn'] . "\" name=\"isbn\">";
    echo "<br>";
    echo "<label>OWNER</label>";

    echo "<select name='ownerid'>";
    
    while ($item = $st->fetch(PDO::FETCH_ASSOC))
        {  
            if ($item['id'] = $row['user']) {
                echo "<option selected='selected' value='" . $item['i'] . "'>" . $item['name'] . "</option>";
            } else {
                echo "<option value='" . $item['i'] . "'>" . $item['name'] . "</option>";

            }

        }
    echo "</select>";

    echo "<br>";
    echo "<label>Cover link</label>";
    echo "<input type=\"text\" placeholder=\"Cover link\" value=\"" . row['cover'] .  "\" name=\"cover\">";
    echo "<br>";
}
?>

<input type="submit">
</form>



</div>

</body>
</html>

</div>

</body>
</html>