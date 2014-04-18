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

		<h1>all klimbz</h1>
		
		<table>
				<thead>
					<tr>
						<th scope="col">Completed</th>
						<th scope="col">Name</th>
						<th scope="col">Level</th>
						<th scope="col">Setter</th>
					</tr>
				</thead>
			 <tbody>
			 
			 <?php
			 while ($climbs = mysql_fetch_assoc($result)) {
				//print_r($climbs);
				echo "<tr><td><input type=\"checkbox\"></td> <td>$climbs[name]</td> <td>$climbs[level]</td> <td>$climbs[setter]</td> </tr>";
		
			}
			mysql_free_result($result);
			?>
	
			</tbody>
		</table> 
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>