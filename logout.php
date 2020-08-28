<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
return header("Location: index.php"); // Redirecting To Home Page
}
?>