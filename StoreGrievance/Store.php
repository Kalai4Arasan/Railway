<?php
session_start();
$conn = mysqli_connect("localhost", "root","","railway");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $pfno=$_POST['pfno'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $category="";
    $role=$_POST['role'];


    if(isset($_POST['cb'])){
        $c=1;
    foreach($_POST['cb'] as $cat){
            $category.="- ".$cat."<br>";
        }
    }
    $desc=$_POST['desc'];
    if(strlen($desc)>255){
        $_SESSION['error']="Description went above limit";
        return header('location: /Railway/StoreGrievance/StoreGrievance.php');
    }

    if(isset($_FILES['files'])){
        $errors= array();
        $target_dir = "../Files/";
        $target_file = $target_dir .$pfno. basename($_FILES["files"]["name"]);
        $file_name = $_FILES['files']['name'];
        $file_size =$_FILES['files']['size'];
        $file_tmp =$_FILES['files']['tmp_name'];
        $file_type=$_FILES['files']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        $extensions= array("jpg","jpeg","pdf","xlsx","docx");

        if(in_array($file_ext,$extensions)=== false){
           $_SESSION['error']=$file_ext." files not allowed";
           return header('location: /Railway/StoreGrievance/StoreGrievance.php');
        }
       /*if($file_size > 5242880){
           $_SESSION['error']='File size must be less than 5 MB';
           return header('location: /Railway/StoreGrievance/StoreGrievance.php');
        }*/
        move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);

    }
    $str=rand();

    //$refkey=sha1($str);
    $cdate=date("d-m-Y");
    date_default_timezone_set("Asia/Calcutta");
    $ctime=date("H:i:s");

    $dt = preg_replace("/[^a-zA-Z0-9]/", "", $cdate);
    $t=preg_replace("/[^a-zA-Z0-9]/","",$ctime);
    $refkey=$pfno.'D'.$dt.'T'.$t;
    $query="INSERT INTO grievance(Username,PFNumber,Email,GCategory,Description,Files,Role,RefKey,CurrentDate,CurrentTime,phone) VALUES ('$username','$pfno','$email','$category','$desc','$file_name','$role','$refkey','$cdate','$ctime','$phone')";
    $result=mysqli_query($conn,$query);
    $query2="SELECT id FROM grievance WHERE RefKey='$refkey'";
    $result2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_assoc($result2);

     /*mail to the Employee */
     /*require 'PHPMailerAutoload.php';

     $mail = new PHPMailer;

     $mail->SMTPDebug = false;

     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'helloworld022020';
     $mail->Password = 'SampleText00';
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;

     $mail->setFrom('IRCTC@Corp.com', 'IRCTCAdministration');
     $mail->addAddress($email, $username);

     $mail->isHTML(true);

     $mail->Subject = 'Your Grievance Submitted.';
     $mail->Body = '
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
     </head>
     <body style="font-family: Arial, Helvetica, sans-serif;">
                     <h2 style="color:blue;text-align:center;margin-top:50px;"> Your grievance successfully submitted...</h2>
                     <div style="text-align: center;">
                     <p>
                         Hi '.$username.' . Your grievance is submitted successfully.
                         you can check your status using below reference key.
                     </p>
                     <h2 style="text-align:center">'.$refkey.'</h2><br>
                     <p>Dont forget to give feedback. please click below button.</p>
                     <button style="border-color: #5a57ff;background-color:#5a57ff;padding:5px;color:white;border-radius:8px;" href="">click here</button>
                 </div>

     </body>
     </html>
     ';
     $mail->send();*/



    return header("location: /Railway/StoreGrievance/Success.php?RefKey=".$row['id']."");




}

?>
