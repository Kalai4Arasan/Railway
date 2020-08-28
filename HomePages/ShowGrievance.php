<?php
include('../Auth/fetch.php');
if($login_role_session==1){
  echo '<title>SuperAdmin Grivance</title>';
}
if($login_role_session==2){
  echo '<title>Admin Grievances</title>';
}
if($login_role_session==3){
  echo '<title>Co-ordinator Grievances</title>';
}
if($login_role_session==4){
  echo '<title>Supervisor Grievances</title>';
}
if($login_role_session==5){
  echo '<title>Sub-Supervisor Grievances</title>';
}
?>
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
        $dept=$login_Department_session;
        if($role==3){
              $query="SELECT * FROM grievance WHERE Role>'$role' and (Status=0 or Status=4 or Status=6 or Status=8)";
              }
        else if($role==4){
              $query="SELECT * FROM grievance WHERE Role>'$role' and (Status=5 or Status=9)";
              }
        else if($role==5){
              $query="SELECT * FROM grievance WHERE Role>'$role' and Status=10";
              }
        else if($role==2){
               if($dept=="TR")
              {$query="SELECT * FROM grievance WHERE Role>'$role' and Status=2 and GCategory='-MACP<br>'";}
	elseif($dept=="ME")
{$query="SELECT * FROM grievance WHERE Role>'$role' and Status=2";}
              }
        else if($role==1){
              $query="SELECT * FROM grievance WHERE Role>'$role' and (Status=1 or Status=3 or Status=7) ";
              }
        else if($role==6){
              $query="SELECT * FROM grievance WHERE PFNumber='$pfno'";
              }

        if($role==6){
          echo'<div id="fade"><p class="mt-2"><small class="alert alert-info" > If your grievance is not processed within 7 days.</small></p>';
          echo'<p class="mt-4"><small class="alert alert-info" > Please call the grievance department .</small></p></div>';
        }

        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
          echo '<table class="table table-hover mt-4">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Employee</th>
                <th scope="col">Email</th>
                <th scope="col">PFNumber</th>
                <th scope="col">Days Counter</th>';
                if($role==6){
                  echo '<th scope="col">Granted</th>';
                }
                echo '<th></th>
              </tr>
            </thead>
            <tbody>';
            $c=1;
            $dt=date("d-m-yy");

            while($row=mysqli_fetch_assoc($result)){
              $diff=0;
              echo'<tr>
                <th scope="row">'.$c.'</th>';
                if($role==6){
                  echo '<td>'.$row['Username'].'</td>';
                }
                else{
                echo '<td><center><a  class="small" href="./ShowOne.php?id='.$row['id'].'">'.$row['Username'].'</centre></a></td>';
                }
                $diff = strtotime($row['CurrentDate']) - strtotime($dt);
                $dc=abs(round($diff / 86400));
                echo'<td><center>'.$row['Email'].'</centre></td>
                <td><center>'.$row['PFNumber'].'</centre></td>
                <td><center>'.$dc.'</centre></td>';
                if($role==6){
                  if($row['Status']==4){
                    echo '<td class="text-center"><i class="fa fa-check-circle text-success" aria-hidden="true"></i></td>';
                  }
                  elseif($row['Status']>=0){
                    echo '<td class="text-center"><i class="fa fa-ellipsis-h"></i></td>';
                  }
                  else{
                    echo '<td class="text-center"><i class="fa fa-window-close text-danger"></i></td>';
                  }
                }
                echo'</tr>';
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
