<?php
include('../Auth/fetch.php');
if($login_role_session==1){
  header("location:javascript://history.go(-1)");
}
?>
<title>Success Page</title>
<?php include "../Layouts/Navbar.php"?>

          <div class="container mt-3 alert alert-success ">
          <h3>Your Grievance Success fully submitted...</h3>
          <hr>
          <div class="text-center">
          <small>For checking status and further Queries use this Reference Key.</small><br>
          <?php
          if(isset($_GET['RefKey'])){
          $id=$_GET['RefKey'];
          $query="SELECT RefKey FROM grievance WHERE id='$id'";
          $result=mysqli_query($conn,$query);
          $row=mysqli_fetch_assoc($result);
          $queryx="SELECT phone FROM grievance WHERE id='$id'";
          $resultx=mysqli_query($conn,$queryx);
          $rowx=mysqli_fetch_assoc($resultx);
          echo "Message sent to ".$rowx['phone']."<br>";
          if(isset($rowx['phone']))
     {  
    
    
        $usernam = "helloworld022020@gmail.com";
        $hash = "2fde971a0dfd4415acfbe3b822cb02941b4de13140b13d1e546c3e30331e6ae5"; 
        $test = "1";
    
        
        $sender = "TXTLCL";
        $numbers = "91".$rowx['phone'];
        $message = "Hi , Your  Your grievance is submitted successfully.
        you can check your status using below reference key.".$row['RefKey'];
        
        
    
        $message = urlencode($message);
        
        $data = "username=".$usernam."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        //echo $data;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;
        if($result==true){echo "Message has been sent";} 
        curl_close($ch);
        }

          echo '<strong>'.$row['RefKey'].'</strong>';
          }

          else{
            header("Location: /Railway/index.php");
          }

          ?>
          </div>
          </div>
<?php include "../Layouts/Footer.php"?>