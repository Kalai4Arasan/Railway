<?php
include('../Auth/fetch.php');
if($login_role_session!=1){
  header("location:javascript://history.go(-1)");
}
?>
<title>Users</title>
<?php include "../Layouts/SuperAdminNavbar.php"?>
        <div class="row">
        <div class="col-sm-2 col-md-2">
        </div>
        <div class="col-sm-4 col-md-8">
        <h5 class="font-weight-bold pt-4 text-center">Employees</h5>
        <div class="container" style="margin-top:2%;">
        <?php
        $role=$login_role_session;
        $Roles=array(
          1=>"SuperAdmin",
          2=>"Admin",
          3=>"Co-ordinator",
          4=>"Supervisor",
          5=>"Sub-Supervisor",
          6=>"Employee",
        );
        $query="SELECT * FROM login WHERE Role>'$role' order by Role";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
          echo '<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Employee</th>
                <th scope="col">PFNumber</th>
                <th scope="col">Role</th>
                <th scope="col">Tasks</th>
              </tr>
            </thead>
            <tbody>';
            
            while($row=mysqli_fetch_assoc($result)){
              echo'
              <div class="modal fade" id="exampleModal'.$row['PFNumber'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change The Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../Employee/ChangeRole.php" method="POST">
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Name:</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control-plaintext" value="'.$row['Username'].'">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">PF Number:</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control-plaintext" value="'.$row['PFNumber'].'">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Roles:</label>
                        <select name="role" class="form-control" id="exampleFormControlSelect1" required >
                        <option value="" disabled selected hidden>Please Choose...</option>
                        ';
                          for($x=2;$x<=6;$x++){
                                if($x!=$row['Role']){
                                echo'<option>'.$Roles[$x].'</option>';
                                }
                          }
                        echo'
                        </select>
                      </div>
                      <div class="text-center">
                      <button class="btn btn-success">Change</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              
              ';

              echo'<tr>
                <td>'.$row['Username'].'</td>
                <td>'.$row['PFNumber'].'</d>
                <td>
                ';
                if($row['Role']==2){
                  echo 'Admin';
                }
                else if($row['Role']==3){
                  echo 'Cordinater';
                }
                else if($row['Role']==4){
                  echo 'Supervisor';
                }
                else if($row['Role']==6){
                  echo 'Employee';
                }
                else if($row['Role']==5){
                  echo 'Sub-Supervisor';
                }

                echo'
                </td>';
                if($row['Role']>2){
                echo'
                <td>
                <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal'.$row['PFNumber'].'"><i class="fa fa-edit text-primary"   data-toggle="tooltip" data-placement="top" title="Change Role" > Role</i><br></a>
                 <a class="btn btn-light" href="../Employee/DeleteEpmloyee.php"><i class=" fa fa-trash text-danger"  data-toggle="tooltip" data-placement="top" title="Remove This Employee"> Remove</i></a></td>
              </tr>';
                }
              else{
                echo'
                <td>
                 <a class="btn btn-light" href="../Employee/DeleteEpmloyee.php"><i class=" fa fa-trash text-danger"  data-toggle="tooltip" data-placement="top" title="Remove This Employee"> Remove</i></a></td>
              </tr>';
              }
            }
           echo'</tbody>
      </table>';
          }
          else{
            echo "NO grievances";
          }

        ?>
        </div>

        <div class="col-sm-2 col-md-2">
        </div>

        </div>
        </div>

<?php include "../Layouts/SuperAdminFooter.php"?>
