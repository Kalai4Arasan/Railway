<?php
include('../Auth/fetch.php');
if($login_role_session=6){
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
        $user=$res['Username'];
        $pfno=$res['PFNumber'];
        $email=$res['Email'];
        $cat=$res['GCategory'];
        $desc=$res['Description'];
        $files=$res['Files'];
        $rol=$res['Role'];
        $key=$res['RefKey'];
        $phone=$res['phone'];
        $remarks=$res['remarks'];
        $approved='Rejected';
        $cdate=date("d-m-Y");
        date_default_timezone_set("Asia/Calcutta");
        $ctime=date("H:i:s");
        if($role==2 or $role==1){
        $status=-1;
        $query2="UPDATE grievance SET Status=$status WHERE id=$id";
        mysqli_query($conn,$query2);
        $query3="INSERT INTO rejectedgrievance(Username, PFNumber, Email, GCategory, Description, Files, Role, Status, RefKey,RejectedDate,phone,reason) VALUES('$user','$pfno','$email','$cat','$desc','$files','$rol','$status','$key','$cdate','$phone','$remarks')";
        $queryd="DELETE FROM grievance where Status=-1";
        mysqli_query($conn,$query3);
        mysqli_query($conn,$queryd);
      }



         /*mail to the Employee
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = false;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('IRCTC@Corp.com', 'IRCTCAdministration');
        $mail->addAddress($email, $user);

        $mail->isHTML(true);

        $mail->Subject = 'Your Grievance Rejected.';
        $mail->Body = '
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
        </head>
        <body style="font-family: Arial, Helvetica, sans-serif;">
                        <h2 style="color:red;text-align:center;margin-top:50px;">Sorry Your Grievance is Rejected...</h2>
                        <div style="text-align: center;">
                        <p>
                            Hi '.$res['Username'].' . We feel sad to say this "Your grievance is rejected for some reasons".
                            For further help contact our grievance department.
                        </p>
                        <p>Dont forget to give feedback. please click below button.</p>
                        <button style="border-color: #5a57ff;background-color:#5a57ff;padding:5px;color:white;border-radius:8px;" href="">click here</button>
                    </div>

        </body>
        </html>
        ';
        $mail->send();*/

        echo '<script>alert("Successfully Grivance Rejected");window.location.href = "./ShowGrievance.php";</script>';
        //return header('location: /Railway/HomePages/ShowGrievance.php');
        ?>
