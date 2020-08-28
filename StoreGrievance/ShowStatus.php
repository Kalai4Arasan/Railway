<?php
include('../Auth/fetch.php');
if($login_role_session!=6){
  header("location:javascript://history.go(-1)");
}
?>
<title>Grievance Status</title>

  <?php include "../Layouts/Navbar.php" ?>
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="jQuery-plugin-progressbar.js"></script>
  <!-- Accepted Grievance -->
  <style>
    .progress-bar {
        background-color:white;
        position: relative;
        height: 100px;
        width: 100px;
        }

        .progress-bar div {
        position: absolute;
        height: 100px;
        width: 100px;
        border-radius: 50%;
        }

        .progress-bar div span {
        position: absolute;
        font-family: Arial;
        font-size: 25px;
        line-height: 75px;
        height: 75px;
        width: 75px;
        left: 12.5px;
        top: 12.5px;
        text-align: center;
        border-radius: 50%;
        color:black;
        background-color: white;
        }

        .progress-bar .background { background-color: #b3cef6; }

        .progress-bar .rotate {
        clip: rect(0 50px 100px 0);
        background-color: #20fc14;
        }

        .progress-bar .left {
        clip: rect(0 50px 100px 0);
        opacity: 1;
        background-color: #b3cef6;
        }

        .progress-bar .right {
        clip: rect(0 50px 100px 0);
        transform: rotate(180deg);
        opacity: 0;
        background-color: #20fc14;
        }

        @keyframes
        toggle {  0% {
        opacity: 0;
        }
        100% {
        opacity: 1;
        }
        }
</style>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $key=$_POST['searchkey'];
        $query="SELECT * From grievance WHERE RefKey='$key' ";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $status=$row['Status'];
        if($status==0){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                    <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                        <table style="border-color:white;" class="table ml-4">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Employee Name </td>
                            <td>'.$row['Username'].'</td>
                            </tr>
                            <tr>
                            <td>PF Number </td>
                            <td>'.$row['PFNumber'].'</td>
                            </tr>
                            <tr>
                            <td>Category </td>
                            <td>'.$row['GCategory'].'</td>
                            </tr>
                            <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>

                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==1){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                    <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                        <table style="border-color:white;" class="table ml-4">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Employee Name </td>
                            <td>'.$row['Username'].'</td>
                            </tr>
                            <tr>
                            <td>PF Number </td>
                            <td>'.$row['PFNumber'].'</td>
                            </tr>
                            <tr>
                            <td>Category </td>
                            <td>'.$row['GCategory'].'</td>
                            </tr>
                            <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>

                    <strong class="alert alert-success text-center"> Grievance verified by Co-ordinater </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==10){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                    <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                        <table style="border-color:white;" class="table ml-4">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Employee Name </td>
                            <td>'.$row['Username'].'</td>
                            </tr>
                            <tr>
                            <td>PF Number </td>
                            <td>'.$row['PFNumber'].'</td>
                            </tr>
                            <tr>
                            <td>Category </td>
                            <td>'.$row['GCategory'].'</td>
                            </tr>
                            <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>

                    <strong class="alert alert-success text-center"> Grievance verified by Supervisor </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="50" data-duration="1000" data-color=""></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="25" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="15" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==10){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                    <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                        <table style="border-color:white;" class="table ml-4">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Employee Name </td>
                            <td>'.$row['Username'].'</td>
                            </tr>
                            <tr>
                            <td>PF Number </td>
                            <td>'.$row['PFNumber'].'</td>
                            </tr>
                            <tr>
                            <td>Category </td>
                            <td>'.$row['GCategory'].'</td>
                            </tr>
                            <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>


                    <strong class="alert alert-success text-center"> Grievance verified by Admin </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==4){
            echo '
            <div class="container">
            <div class="container card mt-5">
            <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                <div class="row">
                <div class="col-sm-3 col-md-6">
                    <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                    <table style="border-color:white;" class="table ml-4">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Employee Name </td>
                        <td>'.$row['Username'].'</td>
                        </tr>
                        <tr>
                        <td>PF Number </td>
                        <td>'.$row['PFNumber'].'</td>
                        </tr>
                        <tr>
                        <td>Category </td>
                        <td>'.$row['GCategory'].'</td>
                        </tr>
                        <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                    <strong class="alert alert-success text-center"> Congratulations. Your Grievance is  Accepted </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }

        elseif($status==-1){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                     <div class="row">
                <div class="col-sm-3 col-md-6">
                    <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                    <table style="border-color:white;" class="table ml-4">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Employee Name </td>
                        <td>'.$row['Username'].'</td>
                        </tr>
                        <tr>
                        <td>PF Number </td>
                        <td>'.$row['PFNumber'].'</td>
                        </tr>
                        <tr>
                        <td>Category </td>
                        <td>'.$row['GCategory'].'</td>
                        </tr>
                        <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                    <strong class="alert alert-info text-center"> Sorry. Your Grievance is  Declined.Please Edit and fill Your details correctly. </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==-2){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                     <div class="row">
                <div class="col-sm-3 col-md-6">
                    <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                    <table style="border-color:white;" class="table ml-4">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Employee Name </td>
                        <td>'.$row['Username'].'</td>
                        </tr>
                        <tr>
                        <td>PF Number </td>
                        <td>'.$row['PFNumber'].'</td>
                        </tr>
                        <tr>
                        <td>Category </td>
                        <td>'.$row['GCategory'].'</td>
                        </tr>
                        <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                <strong class="alert alert-info text-center"> Sorry. Your Grievance cannot be solved by our department. </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,red"></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==-3){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                     <div class="row">
                <div class="col-sm-3 col-md-6">
                    <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                    <table style="border-color:white;" class="table ml-4">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Employee Name </td>
                        <td>'.$row['Username'].'</td>
                        </tr>
                        <tr>
                        <td>PF Number </td>
                        <td>'.$row['PFNumber'].'</td>
                        </tr>
                        <tr>
                        <td>Category </td>
                        <td>'.$row['GCategory'].'</td>
                        </tr>
                        <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                <strong class="alert alert-info text-center"> Sorry. Your Grievance cannot be solved by our department. </strong>
                    <div class="card-body">
            <div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,red"></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="00" data-duration="1000" data-color=""></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>';
        }
        elseif($status==-4){
            echo '
            <div class="container">
            <div class="container card mt-5">
                    <h5 class="card-title mt-3 text-center font-weight-bold">Search Status</h5><hr>
                     <div class="row">
                <div class="col-sm-3 col-md-6">
                    <h5 class="card-title mt-3 ml-4 font-weight-bold">Grievance Details :</h5>
                    <table style="border-color:white;" class="table ml-4">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Employee Name </td>
                        <td>'.$row['Username'].'</td>
                        </tr>
                        <tr>
                        <td>PF Number </td>
                        <td>'.$row['PFNumber'].'</td>
                        </tr>
                        <tr>
                        <td>Category </td>
                        <td>'.$row['GCategory'].'</td>
                        </tr>
                        <td>Submitted On </td>
                            <td>'.$row['CurrentDate'].'</td>
                            </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                    <strong class="alert alert-danger text-center"> Sorry. Your Grievance is  Rejected </strong>
                    <div class="card-body">
            /*<div style="margin-left:10%" class="mb-4 row">
            <div class="col-sm-2 col-md-3">

            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Co-Ordinater</h5><br>
            </div>

            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Supervisor</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,rgb(25, 244, 54)"></div><h5 class="text-center">Admin</h5><br>
            </div>
            <div class="col-sm-2 col-md-3">
            <div class="progress-bar" data-percent="100" data-duration="1000" data-color="#ccc,red"></div><h5 class="text-center">Super Admin</h5><br>
            </div>
            </div>
            </div>
            </div>
            </div>*/';
        }
    }
    else{
        $_SESSION['error']="Sorry... Please enter a valid Reference Key.";
        echo "<script type='text/javascript'>window.location.href = '/Railway/StoreGrievance/SearchStatus.php';</script>";
    }
}

?>





    <script>
    $(".progress-bar").loading();

    </script>
  <?php include "../Layouts/Footer.php" ?>
