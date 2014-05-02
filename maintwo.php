<?php
include("base.php");

if(!$_SESSION['username']) {
	header("Location: login.php");
	exit();
}

// Performing SQL query
$query = 'SELECT * FROM climbs';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

include("header.php") ; 

//define variables and initialize with empty values
$categoryErr = $levelErr = $setterErr = $nameErr = "";
$category = $level = $setter = $name = "";

if ($_SERVER["POST"]) {
	if (empty($_POST["category"])) {
		$categoryErr = "Missing";

}
	else {
		$category = $_POST["category"]
	
	}
	
	if (empty($_POST["level"])) {
		$levelErr = "Missing";

}
	else {
		$level = $_POST["level"]
	
	}
	
	if (empty($_POST["setter"])) {
		$setterErr = "Missing";

}
	else {
		$setter = $_POST["setter"]
	
	}
	
	if (empty($_POST["name"])) {
		$nameErr = "Missing";

}
	else {
		$name = $_POST["name"]
	
	}
}



?>

<html>
<head>
	<title>So, whatcha klimbz?</title>
</head>
<body>
	<form name="new_klimbz" method="post" action="kompleted_klimbz.php"
					
			<input type="radio" name="category" value="lead" /> lead
			<input type="radio" name="category" value="top-rope" /> top-rope
			<input type="radio" name="category" value="boulder" /> boulder 

			<p>Rating</p>
			<select name="Level">
				<option value="5.4">5.4</option>
				<option value="5.5">5.5</option>
				<option value="5.6">5.6</option>
				<option value="5.7">5.7</option>
				<option value="5.8">5.8</option>
				<option value="5.9">5.9</option>
				<option value="5.10">5.10</option>
				<option value="5.11">5.11</option>
				<option value="5.12">5.12</option>
				<option value="V0">V0</option>
				<option value="V1">V1</option>
				<option value="V2">V2</option>
				<option value="V3">V3</option>
				<option value="V4">V4</option>
				<option value="V5">V5</option>	
			</select>
		
			
			<p>Setter</p>
				<input type="text" name="Setter" size="15" maxlength="5"/></p>
	
			<p>Name
				<input type="text" name="Name" size="15" maxlength="30"/></p>
	
			<p>Submit:
				<input type="submit" name="Submit" value="submit"/></p>
		</form>

			
		

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

