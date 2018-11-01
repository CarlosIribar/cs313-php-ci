<?php include 'loginDatabase.php';?>
<?php

// get the data from the POST
$start = $_POST['start'];
$end = $_POST['end'];
$userid = $_POST['user'];

try
{
    $password = password_hash($password, PASSWORD_DEFAULT);

	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO LectureProgress(Start, End, UserId)  VALUES(:start, :end, :userid)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':start', $start);
	$statement->bindValue(':end', $end);
	$statement->bindValue(':userid', $userid);
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