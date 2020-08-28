<?php
session_start();
$conn = mysqli_connect("localhost", "root","","railway");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Roles=array(
          "SuperAdmin"=>1,
          "Admin"=>2,
          "Co-ordinator"=>3,
          "Supervisor"=>4,
          "Sub-Supervisor"=>5,
          "Employee"=>6,
        );

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $role=$_POST['role'];
    echo $role;
    $rolval=$Roles[$role];
    $countSuperAdmin=mysqli_query($conn,"SELECT COUNT(*) where role=$rolval ")
}

?>
