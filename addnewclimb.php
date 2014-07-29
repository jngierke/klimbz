<?php
include("base.php");

if(!$_SESSION['username']) {
	header("Location: login.php");
	exit();
}

// Performing SQL query
$query = 'SELECT * FROM climbs';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// This code will run when the page is loaded with a POST request from the form, but NOT when the page is initally loaded with a GET request
	//
	// Given the form below, the following variables will be defined:
	// 		$_POST['email']
	//  	$_POST['rating']
	//		$_POST['setter']
	//		$_POST['name']


	// initialize a variable for holding errors as an empty array
	$errors = array();

	// check if category is provided and valid
	$validcategory = array('lead', 'top-rope', 'boulder');
	
	if (empty($_POST['category'])) {
		$errors['category'] = 'Oops! You forgot something...';
	} elseif (!in_array($_POST['category'], $validcategory)) {
		$errors['category'] = 'Oops, what kind of klimbz did you do?';
	}

	// name
	if (empty($_POST['name'])) {
		$errors['name'] = 'Oops! You forgot something...';
	} 
	
	// check that rating is provided and valid
	$validlevel = array('5.4', '5.5', '5.6', '5.7', '5.8', '5.9', '5.10', '5.11', '5.12', 'V0', 'V1', 'V2', 'V3', 'V4', 'V5');
	
	if (empty($_POST['level'])) {
		$errors['level'] = 'Oops! You forgot something...';
	} elseif (!in_array($_POST['level'], $validlevel)) {
		$errors['level'] = 'The rating you provided was not from the list';
	}
	
	// check that the setter is provided and valid
	$validsetter = array('CC', 'FN', 'RL', 'TJ', 'other');
	
	if (empty($_POST['setter'])) {
		$errors['setter'] = 'Oops! Who set your climb?';
	} elseif (!in_array($_POST['setter'], $validsetter)) {
		$errors['setter'] = 'The setter you provided was not from the list';
	}
	
	// only proceed with saving to the database if the $errors array is empty
	if (empty($errors)) {
		// escape the user inputs for use inside a MySQL query
		$category = mysql_escape_string($_POST['category']);
		$name = mysql_escape_string($_POST['name']);
		$level = mysql_escape_string($_POST['level']);
		$setter = mysql_escape_string($_POST['setter']);
		
		// execute MySQL query to insert into table
		mysql_query("INSERT INTO climbs SET category = '$category', name = '$name', level = '$level', setter = '$setter'") or die('Query failed: ' . mysql_error());
		
		// redirect user to another page and exit
		header("Location: kompleted_klimbz.php");
		exit();
	}
	
	// if there WERE errors, the rest of the page will load and $errors will be set
}
//print_r($errors);

include("header.php") ;
?>

	<form name="new_klimbz" method="post">
		
			<?php
				// print out any errors
				
				if (!empty($errors)) {
					echo "<div class='panel panel-danger'>";
					echo 	"<div class='panel-heading'>";
					echo		"<h3 class='panel-title'>There were errors in your form</h3>";
					echo	"</div>";
					echo	"<div class='panel-body'>";
					echo		"<ul>";
					
					foreach ($errors AS $field => $error) {
						echo		"<li>$field: $error</li>";
					}
					
					echo		"</ul>";
					echo	"</div>";
					echo "</div>";
				}
			?>

	
		<div class="radio-inline">
  		  <label>
    		<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="lead">lead</label>
		</div>
		
		<div class="radio-inline">
		  <label>
			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="top">top</label>
		</div>
		
		<div class="radio-inline">
		  <label>
			<input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="boulder">boulder</label>
		</div>
			
		<div class="form-group">
			<label for="namefield">Whatcha klimbz?</label>
			<input type="text" name="name" class="form-control" placeholder="Name" id="namefield">
		</div>
			
		<div class="form-group">
			<label for="ratingselect">Rating</label>
			<select class="form-control" name="level" id="ratingselect">
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
		</div>
			
		<div class="form-group">
			<label for="setterselect">Setter</label>
			<select class="form-control" name="setter" id="setterselect">
				<option>CC</option>
				<option>Devon</option>
				<option>TJ</option>
				<option>FN</option>
				<option>other</option>
			</select>
		</div>
  
  		<div class="form-group">
  			<button type="submit" name="Submit" value="submit" class="btn btn-default">I klimbzed it!</button>
		</div>		
	</form>

			
		

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

