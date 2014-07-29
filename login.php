<?php
include("base.php");
if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string(sha1($_POST['password']));
    $checklogin = mysql_query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'") or die('Query failed: ' . mysql_error());

    if(mysql_num_rows($checklogin) == 1)
    {
    	$row = mysql_fetch_assoc($checklogin);
    	//print_r($row);

        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];


        header('Location: addnewclimb.php');
        exit();
    }
    else
    {
    	echo "<h1>Error</h1>";
        echo "<p>Oops, wrong username or password. <a href=\"index.php\">Try again</a>.</p>";
    }
}
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>klimbz</title>


		<link href="css/site.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <form class="form-horizontal" role="form" action="login.php" method="post">
  <div class="form-group">
    <label for="inputusername" class="col-sm-2 control-label">username</label>
    <div class="col-sm-10">
      <input type="username" class="form-control" name="username" id="inputusername" placeholder="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputpassword" class="col-sm-2 control-label">password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputpassword" placeholder="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">sign in</button>
    </div>
  </div>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
