<?php
include("base.php");
if(!$_SESSION['Username']) {
	header("Location: login.php");
	exit();
}

// Performing SQL query
$query = 'SELECT * FROM units';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

include("header.php") ; 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>all klimbz</title>
		<link rel="stylesheet" type="text/css" href="/css/site.css">
	</head>	
	
	<body>
		<h1>all klimbz</h1>
		<table>
			<thead>
				<tr>
					<th scope="col">Level</th>
					<th scope="col">Name</th>
					<th scope="col">Setter</th>
					<th scope="col">Color</th>
					<th scope="col">Rope</th>
					<th scope="col">Date</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
				
				foreach ($climbs as $climb) {
					//print_r($climb);
					echo "<tr> <td>$climb[Rating] </td> <td> $climb[Name] </td> <td> $climb[Setter] </td> <td> $climb[Color] </td> <td> $climb[Rope] </td> <td> $climb[Tags] </td> </tr>";
			
				}
			
			?>
				
			</tbody>
		</table>
	</body>
</html>
		