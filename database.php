<?php
// Create a new MySQLi instance
$mysqli = new mysqli("localhost", "root", "", "quizzer");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
