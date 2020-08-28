<?php
session_start();
$conn = mysqli_connect("localhost", "root","","railway");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_SESSION['login_user'])){
    $PFcheck=$_SESSION['login_user'];
    $Rolecheck=$_SESSION['role'];
    }
    else{
        header("location: index.php");
    }

$sql= "SELECT PFNumber,Username,Role,Department FROM login WHERE PFNumber ='$PFcheck' and Role='$Rolecheck'" ;
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$login_pfno_session=$row['PFNumber'];
$login_user_session =$row['Username'];
$login_role_session =$row['Role'];
$login_Department_session =$row['Department'];
if(!isset($login_user_session)){
mysql_close($conn); // Closing Connection
header('Location:Auth.php'); // Redirecting To Home Page
}
?>
