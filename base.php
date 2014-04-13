<?php
session_start();

// Connecting, selecting database
$link = mysql_connect('127.0.0.1', 'root', 'password')
    or die('Could not connect: ' . mysql_error());
mysql_select_db('klimbz') or die('Could not select database');
