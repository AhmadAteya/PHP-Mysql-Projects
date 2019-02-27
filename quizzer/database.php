<?php

//Create mysqli object
$mysqli = new mysqli('localhost','root','','quizzer');

//Error Handler
if ($mysqli->connect_error) {
	printf('Connect failed: %s\n', $mysqli->connect_error);
	exit();
}