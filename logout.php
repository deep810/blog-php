<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
echo "Logged out";	
header("Location: index.php"); // Redirecting To Home Page
}
?>