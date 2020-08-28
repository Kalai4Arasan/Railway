<?php
include('../Auth/fetch.php');
if($login_role_session==1){
  echo '<title>Grivance Tracker</title>';
}
if($login_role_session==2){
  echo '<title>Grivance Tracker</title>';
}
if($login_role_session==3){
  echo '<title>Grivance Tracker</title>';
}
if($login_role_session==4){
  echo '<title>Grivance Tracker</title>';
}
if($login_role_session==5){
  echo '<title>Grivance Tracker</title>';
}
?>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="jQuery-plugin-progressbar.js"></script>
<!-- Accepted Grievance -->


<?php include "../Layouts/Navbar.php" ?>
        <br>
        <div class="container">
        <div class="row">
        <div class="col-sm-2 col-md-2">
        </div>
        <div class="col-sm-2 col-md-8">
        <h5 class="font-weight-bold text-center mt-3">Grievances</h5>
        <?php
        $role=$login_role_session;
        $pfno=$login_pfno_session;
        if($role==3){
              $query="SELECT * FROM grievance WHERE Role>'$role' and (Status>=0)";
              }
        else if($role==4){
              $query="SELECT * FROM grievance WHERE Role>'$role' and Status>=5";
              }
        else if($role==5){
              $query="SELECT * FROM grievance WHERE Role>'$role' and Status>=10";
              }
        else if($role==2){
              $query="SELECT * FROM grievance WHERE Role>'$role' and Status>=2";
              }
        else if($role==1){
              $query="SELECT * FROM grievance WHERE Role>'$role' and (Status>=1) ";
              }
        else if($role==6){
              $query="SELECT * FROM grievance WHERE PFNumber='$pfno'";
              }

        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
          echo '<table class="table table-hover mt-4">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Employee</th>
                <th scope="col">PFNumber</th>
                <th scope="col">Days Counter</th>
                <th scope="col">In the hands of</th>
                <th scope="col">  Status   </th>';

            $c=1;
            $dt=date("d-m-yy");

            while($row=mysqli_fetch_assoc($result)){
              $diff=0;
              echo'<tr>
                <th scope="row">'.$c.'</th>';
                echo '<td><center>'.$row['Username'].'</centre></td>';
                $diff = strtotime($row['CurrentDate']) - strtotime($dt);
                $dc=abs(round($diff / 86400));

                $Status=$row['Status'];
                echo'
                <td><center>'.$row['PFNumber'].'</centre></td>
                <td><center>'.$dc.'</centre></td>';
                if ($Status==0 or $Status==4 or $Status==6 or $Status==8)
                {
                  echo'<td><center>Coordinator</centre></td>';
                }
                else if($Status==5 or $Status==9)
                {
                  echo'<td><center>Supervisor</centre></td>';
                }
                else if($Status==1 or $Status==3 or $Status==7)
                {
                  echo'<td><center>SuperAdmin</centre></td>';
                }
                else if($Status==10)
                {
                  echo'<td><center>SubSupervisor</centre></td>';
                }
                else if($Status==2)
                {
                  echo'<td><center>Admin</centre></td>';
                }

                $percent=(intval($Status)/11)*100;
                echo'<td>

                <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">
    <span class="sr-only">'.$percent.'</span>
  </div>
</div>
</td></tr>';

              $c++;
            }
           echo'</tbody>
      </table>';
          }
          else{
            echo "<script type='text/javascript'>alert('No Grievances');window.location.href = '../index.php';</script>";
            //return header("location: index.php");
          }

        ?>
        </div>
        <div class="col-sm-2 col-md-4">
        </div>
        </div>
        </div>
        <script>
        setTimeout(function() {
            document.getElementById("fade").remove();
        }, 2000);
        </script>
<?php include "../Layouts/Footer.php" ?>
