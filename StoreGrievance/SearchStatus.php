<?php
include('../Auth/fetch.php');
if($login_role_session!=6){
  header("location:javascript://history.go(-1)");
}
?>
<title>Grievance Status</title>
  <?php include "../Layouts/Navbar.php" ?>
          
        <br>
        <div class="container card">
        <h5 class="card-title text-center font-weight-bold mt-3">Search Status</h5><hr>
        <div class="card-body text-center">
        
            <div  class="mb-4 ">
            <div class="row">
            <div class="col-sm-2 col-md-4"></div>
            <div class="col-sm-2 col-md-6">
            <form action="ShowStatus.php" method="POST" class="form-inline">
            <input style="width:400px;"  class="form-control mt-2" type="text" name="searchkey" placeholder="Enter Your Reference Key" aria-label="Search" required>
            <button type="submit" class="btn btn-primary ml-2 mt-2 p-2"><i class="fa fa-search" aria-hidden="true"></i></button>
            <small id="pf" class="lead" style="color:red;font-size:15px;"> 
                <?php 
                    if(isset($_SESSION['error'])){
                        $error=$_SESSION['error'];
                        echo "<br>".$error;
                    }
                ?>
            </small>
            </div>
            </form>
            </div>
            <?php 
            unset($_SESSION['error']);
            ?>
        </div>
        </div>
  <?php include "../Layouts/Footer.php" ?>