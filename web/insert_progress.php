<?php include 'loginDatabase.php';?>
<?php

// get the data from the POST
$start = $_POST['start'];
$end = $_POST['end'];
$userid = $_POST['userid'];
$bookid = $_POST['bookid'];

if ($start == '') {
    $start = null;
}

if ($end == '') {
    $end = null;
}

try
{
    $password = password_hash($password, PASSWORD_DEFAULT);

	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO LectureProgress(StartDate, EndDate, UserId, BookId) VALUES (:start, :end, :userid, :bookid)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':start', $start);
	$statement->bindValue(':end', $end);
	$statement->bindValue(':userid', $userid);
	$statement->bindValue(':bookid', $bookid);
    $statement->execute();
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
$header = "Location: book.php?id="+ $bookid;
header($header);
die(); 
?>