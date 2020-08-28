<?php
include('../Auth/fetch.php');
if($login_role_session==6){
  header("location:javascript://history.go(-1)");
}
?>
<?php session_start();
?>
<title>Grievance</title>

<?php include "../Layouts/Navbar.php" ?>
        <br>
        <?php
        $role=$login_role_session;
        $id=$_GET['id'];
        $_SESSION['id']=$id;
        $query="SELECT * FROM grievance WHERE (id=$id )";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        echo '
        <div class="container mt-4">
        <div class="row">
        <div class="col-sm-4 col-md-8 ">
            <div class="container">
            ';
            if($role==1){
            echo '<h5 class="font-weight-bold mt-3">'.$row['Username'].'<a style="float:right;" class="btn btn-outline-primary" href="./VerifyGrievance.php?id='.$row['id'].'">Grant</a> <a style="float:right;" class="btn btn-outline-danger mr-2" href="./RejectGrievance.php?id='.$row['id'].'">Reject</a></h5><hr><br>';
            }
            elseif($role==2 || $role==3){
              echo '<h5 class="font-weight-bold mt-3">'.$row['Username'].'<a style="float:right;" class="btn btn-primary" href="./VerifyGrievance.php?id='.$row['id'].'">Verify</a></h5><hr><br>';
            }
            else{
                echo '<h5 class="font-weight-bold mt-3">'.$row['Username'].'<a style="float:right;" class="btn btn-primary" href="./VerifyGrievance.php?id='.$row['id'].'">Verify</a> <a style="float:right;" class="btn btn-danger mr-2" href="./RejectGrievance.php?id='.$row['id'].'">Decline</a></h5><hr><br>';
            }

            echo '
            <h5><b>PF Number   : </b>'.$row['PFNumber'].'  </h5>
            <br>
            <h5><b>Email       : </b>'.$row['Email'].'</h5>
            <br>
            <h5><b>Category    : </b>'.$row['GCategory'].'</h5><br>
            <h5><b>Description : </b>'.$row['Description'].'</h5><br>
            <h5><b>Remarks     : </b>'.$row['remarks'].'</h5><br>
            ';

            if($role==1 || $role==2) {
              $_SESSION["PF"]=$row['PFNumber'];
              echo'
              <div class="form-group">
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit </button>
               <div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">
               <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
              <form action="remark.php" clss="pb-4"  method="POST" enctype="multipart/form-data">
              <label for="remark"><b>Remarks : </b><p style="font-size:15px;" class="lead">(less than 250 words)</p></label>
              <textarea name="remark" class="form-control" id="remark" rows="3" >'.$row['remarks'].'</textarea>
              <label for="selectCategory">Select Grievance Category :</label>
                <div class="checkbox container">
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Date of Appointment"> Date of Appointment</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Seniority"> Seniority</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Promotion"> Promotion</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="MACP"> MACP</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Fixation"> Fixation</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Arrears"> Arrears</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Allowances"> Allowances</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="IPAS Related Corrections"> IPAS Related Corrections</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Income Tax"> Income Tax</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Transfer"> Transfer</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Provident Fund(PF)"> Provident Fund(PF)</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="National Pension System (NPS)"> National Pension System (NPS)</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Quarters"> Quarters</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Staff Benefit Fund"> Staff Benefit Fund</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Discipline & Appeal Rules"> Discipline & Appeal Rules</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Leave / Joining Time"> Leave / Joining Time</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Service Register"> Service Register</label><br>
                  <label><input name="cb[]" class="mr-2" type="checkbox" value="Others"> Others </label>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="submit" >
              </div>
              </div>
            </div>
            </div>
            </form>
            </div>
            ';
            }
            echo'
            </div>
            <div class="col-sm-2 col-md-4">
                  <div>  <object class="img img-thumbnail" style="height:500px;width:300px;" data="/Railway/Files/'.$row['PFNumber'].$row['Files'].'" type=""></object><br><div class="mt-4"><small>Download this Document :</small></div> <a class="btn btn-outline-success mt-2" href="/Railway/Files/'.$row['PFNumber'].$row['Files'].'" download> <i class="fa fa-download" aria-hidden="true"></i></a></div>
                  <div> ';
            }

        ?>
        </div>
       <script type="text/javascript">

        </script>
<?php include "../Layouts/Footer.php" ?>
