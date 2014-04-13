<?php
include("base.php");
if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = md5($_POST['password']);
    $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'") or die('Query failed: ' . mysql_error());

    if(mysql_num_rows($checklogin) == 1)
    {
    	$row = mysql_fetch_assoc($checklogin);
    	print_r($row);
        
        $_SESSION['Username'] = $row['username'];
        $_SESSION['user_id'] = $row['user_id'];

      
        header('Location: home.php');
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

    <link rel="stylesheet" type="text/css" href="/css/site.css">
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
  </body>
</html>
