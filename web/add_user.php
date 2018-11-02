<?php include 'loginDatabase.php';?>
<!DOCTYPE html>
<html>

<head>
	<title>Add User</title>
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
		<h1>Add User</h1>

		<form action="insert_user.php" method="post">
			<label>Name</label>
			<input type="text" placeholder="Name" name="name">
			<br>
			<label>Password</label>
			<input type="password" placeholder="Password" name="password">
			<br>
			<label>Email</label>
			<input type="email" placeholder="email" name="email">
			<br>
			<input type="submit">
		</form>



	</div>

</body>

</html>

</div>

</body>

</html>