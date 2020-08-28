<?php
session_start();
$conn = mysqli_connect("localhost", "root","","railway");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$PFNumber=$_POST['pfno'];
$password=$_POST['password'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
      $PFNumber = mysqli_real_escape_string($conn,$_POST['pfno']);
      echo strlen($PFNumber);
      if(strlen($PFNumber)!=12){
         if(strlen($PFNumber)!=16){
            $_SESSION['error']="PFNumber length must be 12 or 16";
            return header("location: /Railway/index.php");
         }
      }
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      if(strlen($password)<6){
         $_SESSION['error']="Password must be greater than 5";
         return header("location: /Railway/index.php");
      }

      $sql = "SELECT PFNumber,Role FROM login WHERE PFNumber = '$PFNumber' and Password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $Role=$row['Role'];
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $PFNumber;
         $_SESSION['role']= $Role;
         if($Role==6){
            return header("location: /Railway/HomePages/Homepage.php");
         }
         else if($Role==1){
            return header("location: /Railway/HomePages/HomepageSuperAdmin.php");
         }
         else if($Role==2){
            return header("location: /Railway/HomePages/HomepageAdmin.php");
         }
         else if($Role==4){
            return header("location: /Railway/HomePages/HomepageSupervisor.php");
         }
          else if($Role==5){
            return header("location: /Railway/HomePages/HomepageSubSupervisor.php");
         }
         else if($Role==3){
            return header("location: /Railway/HomePages/HomepageCo-ordinator.php");
         }
      }
      else {
         $_SESSION['error']="Invalid Username and Password";
         return header("location: /Railway/index.php");
      }
   }
   mysql_close($conn);
 ?>
