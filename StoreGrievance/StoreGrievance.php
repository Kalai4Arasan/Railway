<?php
include('../Auth/fetch.php');
if($login_role_session!=6){
  header("location:javascript://history.go(-1)");
}
?>
<title>Grievance Submission</title>
<?php include "../Layouts/Navbar.php"?>


        <br>
        <div class="container card" id="bg" >
        <div class="container">
        <h5 class="font-weight-bold pt-4 text-center">Grievance Submission</h5>
        <hr>
          <form action="Store.php" clss="pb-4"  method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="username">UserName :</label>
            <input type="hidden" name="pfno" value="<?php echo $login_pfno_session?>">
            <input type="hidden" name="role" value="<?php echo $login_role_session?>">
            <input name="username" type="text" class="form-control" id="username" value="<?php echo $login_user_session ?>" readonly>
          </div>
          <div class="form-group">
            <label for="email">Email Address :</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Email Address" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone Number" required>
          </div>
          <div class="form-group">
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
            <p id="total"></p>
          </div>
          <div class="form-group">
            <label for="desc">Description : <p style="font-size:15px;" class="lead">(less than 250 words)</p></label>
            <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
          </div>
          <div class="form-group">
          <label for="file">Related Documents :</label>
          <input name="files" type="file" id="file" required><br>
          <small style="font-size:15px;" class="lead">(maximum 5MB)</small>
          </div>
          <div class="form-group">
          <small id="pf" class="lead mb-2" style="color:red;font-size:15px;">
                <?php
                    if(isset($_SESSION['error'])){
                        $error=$_SESSION['error'];
                        echo $error."<br>";
                    }
                ?>
            </small>
            </div>
          <input type="submit" class=" btn btn-outline-primary mb-3" value="Submit">
        </form>
      </div>
      </div>
    </div>
    <?php
   unset($_SESSION['error']);
    ?>
<?php include "../Layouts/Footer.php" ?>
