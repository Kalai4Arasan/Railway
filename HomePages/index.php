<?php
session_start();
if(isset($_SESSION['login_user'])){
    if($_SESSION['role']==6){
        return header("location: /Railway/HomePages/Homepage.php");
     }
     else if($_SESSION['role']==1){
        return header("location: /Railway/HomePages/HomepageSuperAdmin.php");
     }
     else if($_SESSION['role']==2){
        return header("location: /Railway/HomePages/HomepageAdmin.php");
     }
     else if($_SESSION['role']==3){
        return header("location: /Railway/HomePages/HomepageCo-ordinator.php");
     }
     else if($_SESSION['role']==4){
        return header("location: /Railway/HomePages/HomepageSupervisor.php");
     }
     else if($_SESSION['role']==5){
        return header("location: /Railway/HomePages/HomepageSubSupervisor.php");
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <title>Login</title>
    <style>
        .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        }
        .form {
        position: relative;
        z-index: 1;
        border-radius:20px;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
        font-family: "Roboto", sans-serif;
        border-radius:15px;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        }
        .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        }
        .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
        }
        .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
        }
        .form .message a {
        color: #4CAF50;
        text-decoration: none;
        }
        .form .register-form {
        display: none;
        }
        .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
        }
        .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
        }
        .container .info {
        margin: 50px auto;
        text-align: center;
        }
        .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
        }
        .container .info span {
        color: #4d4d4d;
        font-size: 12px;
        }
        .container .info span a {
        color: #000000;
        text-decoration: none;
        }
        .container .info span .fa {
        color: #EF3B3A;
        }
        body {
        margin-top: 6%;
        font-family: "Roboto", sans-serif; 
        }
        .bg {
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body style="background-image: url('/Railway/Images/wall5.jpg')";>
    <div class="form">
       <form name="myform" action="Auth/Auth.php" method="POST" >
       <img src="irctc.png" width="60" height="50" class="d-inline-block align-top mb-3" alt="">
            <input type="text" name="pfno" id="1" placeholder="PF Number" required/>
            <input type="password" name="password" placeholder="Password" id="2" required/>
            <input style="background-color:#4CAF50;color:white;width:40%;" type="submit" value="LOGIN"/>
            <small id="pf" class="lead" style="color:red;font-size:15px;"> 
                <?php 
                    if(isset($_SESSION['error'])){
                        $error=$_SESSION['error'];
                        echo "<br>".$error;
                    }
                ?>
            </small>
            <span id="pass" style="font-size:15px; color:red;"></span>
          <p class="message" style="color:green">Welcome to our grievance portal... </p>
        </form>
    </div>
    <?php 
    unset($_SESSION['error']);
    ?>
    <script type="Text/JavaScript">
    
    </script>
</body>
</html>