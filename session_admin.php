<?php
// mysqli_connect() function opens a new connection to the MySQL server.
require 'connection.php';
$conn = Connect();

session_start();// Starting Session

// Storing Session
$admin_check=$_SESSION['admin_login'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT firstname FROM users WHERE firstname = '$admin_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
?>