<?php
include('../Auth/fetch.php');
if($login_role_session==1){
  echo '<title>SuperAdmin Grivance</title>';
}
if($login_role_session==2){
  echo '<title>Admin Grievances</title>';
}
if($login_role_session==3){
  echo '<title>Co-ordinater Grievances</title>';
}
if($login_role_session==4){
  echo '<title>Manager Grievances</title>';
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

        global $v;
        global $p;
        global $r;


        $query="SELECT Username,Email,PFNumber,Status,RefKey FROM verifiedgrievance UNION SELECT Username,Email,PFNumber,Status,RefKey FROM grievance UNION SELECT Username,Email,PFNumber,Status,RefKey FROM rejectedgrievance";
        $result=mysqli_query($conn,$query);
        $tot=mysqli_num_rows($result);

        if(mysqli_num_rows($result)>0){
          echo '<table class="table table-hover mt-4">
            <thead>
              <tr style="text-align: center;">
                <th scope="col"></th>
                <th scope="col">Employee</th>
                <th scope="col">Email</th>
                <th scope="col">PFNumber</th>
                <th scope="col">Status</th>';
                echo '<th></th>
              </tr>
            </thead>
            <tbody>';
            $c=1;

            while($row=mysqli_fetch_assoc($result)){
              echo'<tr>
                <th scope="row" >'.$c.'</th>';

                if($row['Status']==11)
                {
                echo'
                <td><center>'.$row['Username'].'</center></td>
                <td><center>'.$row['Email'].'</center></td>
                <td><center>'.$row['PFNumber'].'</center></td>
                <td><center>Verified <i class="fa fa-check-circle text-success" aria-hidden="true"></i>'.'</center></td>';
                $v++;
                }
                if($row['Status']>=0 and $row['Status']<11) {
                echo'
                <td><center>'.$row['Username'].'</center></td>
                <td><center>'.$row['Email'].'</center></td>
                <td><center>'.$row['PFNumber'].'</center></td>
                <td><center>Pending <i style="font-size:22px" class="fa text-primary">&#xf110;</i>'.'</center></td>';
                $p++;
                }
                if($row['Status']==-1) {
                  echo'
                  <td><center>'.$row['Username'].'</center></td>
                  <td><center>'.$row['Email'].'</center></td>
                  <td><center>'.$row['PFNumber'].'</center></td>
                  <td><center >Rejected <i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i>'.'</center></td>';
                  $r++;

                }


                if($role==6){
                  if($row['Status']==9){
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
           echo '<center>
           <div id="piechart"></div>

           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

           <script type="text/javascript">
           google.charts.load("current", {"packages":["corechart"]});
           google.charts.setOnLoadCallback(drawChart);

           // Draw the chart and set the chart values
           function drawChart() {
             var data = google.visualization.arrayToDataTable([
             ["Task", "Hours per Day"],
             ["Verified Grievances", '.$v.'],
             ["Rejected", '.$r.'],
             ["Pending", '.$p.'],


           ]);

             // Optional; add a title and set the width and height of the chart
             var options = {"title":"Grievances Chart", "width":550, "height":400};

             // Display the chart inside the <div> element with id="piechart"
             var chart = new google.visualization.PieChart(document.getElementById("piechart"));
             chart.draw(data, options);
           }
           </script>
</center>';
        ?>
        </div>
        <div class="col-sm-2 col-md-4">
        </div>
        </div>


        <script>
        setTimeout(function() {
            document.getElementById("fade").remove();
        }, 2000);
        </script>

<?php include "../Layouts/Footer.php" ?>
