<?php include 'loginDatabase.php';?>
<!DOCTYPE html>
<html>

<head>
	<title>Add Progress</title>
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
		<h1>Add Progress</h1>

		<form action="insert_progress.php" method="post">
			<label>Start Date</label>
			<input type="date" placeholder="Start Date" name="start">
			<br>
			<label>End Date</label>
			<input type="date" placeholder="End Date" name="end">
			<br>
			<label>User</label>

			<?php
$id = $_GET["id"];
echo "<input style=\"display:none\" type=\"text\" value=\"". $id . "\" placeholder=\"id\" name=\"bookid\">";

$query = "SELECT Id, Name FROM Accounts";
$statement = $db->prepare($query);  
$statement->execute();

$index = 0;
echo "<select name='userid'>";
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {  
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
			<input type="submit">
		</form>



	</div>

</body>

</html>

</div>

</body>

</html>