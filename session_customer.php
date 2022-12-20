<?php
// mysqli_connect() function opens a new connection to the MySQL server.
require 'connection.php';
$conn = Connect();

session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['user_login'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT firstname FROM users WHERE firstname = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
?>