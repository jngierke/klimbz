<h1>klimbz</h1>
    
    <ol>
    
    <?php
    while ($unit = mysql_fetch_assoc($result)) {
		echo "<li><a href=\"words.php?unit=$unit[Slug]\">$unit[Title]</a></li>";
		
	}
	mysql_free_result($result);
	?>

  		
	</ol>
	
    
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>