<html>
<head>
	<title> #Coding365Challenge: Day 7 (Form Submission to Database)</title>
</head>
<body>
	<header><h1>Coding365Challenge: Day 7 (Form Submission to Database)</h1></header>
	<main>
		<?php 
// Only process the form if $_POST isn't empty

if (! empty( $_POST )) {
	
	//Connect to MySQL
	$mysqli = new mysqli( 'localhost',root','root', 'root');
	
	//Check our Connection
	if ( $mysqli->connect_error) {
		die('Connect Error:' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
	}
	
	//Insert our data
	$sql = "INSERT INTO user ( NAME, EMAIL, PASSWORD ) VALUES ('{$mysqli->real_escape_string($_POST['NAME'])}', '{$mysqli->real_escape_string($_POST['EMAIL'])}', '{$mysqli->real_escape_string($_POST['PASSWORD'])}')"; 
	$insert = $mysqli->query($sql);
	
	//Print response from MySQL
	if ( $insert ) {
		echo "Success! Row ID:{$mysqli->insert_id}";
	} else {
		die("Error: {$mysqli->errno} : {$mysqli->error}");
	}
	
	//Close our connection
	$mysqli->close();
}
?>
<form method="post" action="">
	<input name="NAME" type="text" placeholder="Enter Your Name">
	<input name="EMAIL" type="email" placeholder="Email">
	<input name="PASSWORD" type="text" placeholder="Password">
	<input type="submit" value="Submit data">
</form>
	</main>
</body>
</html>
