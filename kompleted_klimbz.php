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

?>

<html>
<head>
	<title>So, whatcha klimbz?</title>
</head>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

