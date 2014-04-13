<?php
//	print_r ($_POST); 
//	print_r ("INSERT INTO climbs SET UserID=2, Rating=$_POST[Climb_Rating], Color=\"$_POST[Color]\", Rope=$_POST[Rope], Setter=\"$_POST[Setter]\", Name=\"$_POST[Name]\", Tags=\"$_POST[Tags]\""); 
	DB::nonQuery("INSERT INTO climbs SET UserID=2, Rating=$_POST[Climb_Rating], Color=\"$_POST[Color]\", Rope=$_POST[Rope], Setter=\"$_POST[Setter]\", Name=\"$_POST[Name]\", Tags=\"$_POST[Tags]\"");
	
	echo  "<p> Nice klimbz! </p>"; 
	
