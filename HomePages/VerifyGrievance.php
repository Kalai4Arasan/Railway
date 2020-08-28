<?php
include('../Auth/fetch.php');
if($login_role_session==6){
  header("location:javascript://history.go(-1)");
}
?>

        <?php
        $role=$login_role_session;
        $id=$_GET['id'];
        $query="SELECT * FROM grievance WHERE id='$id'";
        $result=mysqli_query($conn,$query);
        $res=mysqli_fetch_assoc($result);
        $status=$res['Status'];
        $email=$res['Email'];
        $user=$res['Username'];
        $approved=$res['approved'];
        $remarks=$res['remarks'];
        $pfno=$res['PFNumber'];
        $cat=$res['GCategory'];
        $desc=$res['Description'];
        $files=$res['Files'];
        $rol=$res['Role'];
        $key=$res['RefKey'];
        $phone=$res['phone'];
        $cdate=date("d-m-Y");
        date_default_timezone_set("Asia/Calcutta");
        $ctime=date("H:i:s");
        $status++;
        $query2="UPDATE grievance SET Status='$status' WHERE id='$id'";
        mysqli_query($conn,$query2);


        if($status==11){
        /*mail to the Employee */
        $approved='Verified';

        $query3="INSERT INTO verifiedgrievance (Username, PFNumber, Email, GCategory, Description, Files, Role, Status, RefKey,VerifiedDate,phone,remarks) VALUES('$user','$pfno','$email','$cat','$desc','$files','$rol','$status','$key','$cdate','$phone','$remarks')";
        mysqli_query($conn,$query3);
        $queryd="DELETE FROM grievance where Status=9";
        mysqli_query($conn,$queryd);
        /*require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = false;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';       //Email Id
        $mail->Password = '';       //Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('IRCTC@Corp.com', 'IRCTCAdministration');
        $mail->addAddress($email, $username);

        $mail->isHTML(true);

        $mail->Subject = 'Your Grievance Granted.';
        $mail->Body = '
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
        </head>
        <body style="font-family: Arial, Helvetica, sans-serif;">
                        <h2 style="color:green;text-align:center;margin-top:50px;">Congratulations...</h2>
                        <div style="text-align: center;">
                        <p>
                            Hi '.$res['Username'].' .Your grievance is successfully granted.
                            We will try to find solution for your grievance.
                        </p>
                        <p>Dont forget to give feedback. please click below button.</p>
                        <button style="border-color: #5a57ff;background-color:#5a57ff;padding:5px;color:white;border-radius:8px;" href="">click here</button>
                    </div>

        </body>
        </html>
        ';
        $mail->send();*/
        }
        if($role==1){
        echo '<script>alert("Successfully Grivance Granted");window.location.href = "./ShowGrievance.php";</script>';
        }
        else{
        echo '<script>alert("Successfully Grivance verified.");window.location.href = "./ShowGrievance.php";</script>';
        }
        ?>
