<?php

session_start();


$category="";
$remark = $_POST['remark'];
if(isset($_POST['cb'])){
foreach($_POST['cb'] as $cat){
        $category.="- ".$cat."<br>";
    }
  }
$pf= $_SESSION["PF"];
$conn = mysqli_connect("localhost", "root","","railway");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$iq="SELECT * from grievance where PFNumber='$pf'";
$idr=mysqli_query($conn,$iq);
$row = mysqli_fetch_assoc($idr);
$id=$row['id'];
$oremark=$row['remarks'];
$cat=$row['GCategory'];

//if(($oremark=="No Remarks" or $oremark==""))
{
$sql = "UPDATE grievance SET remarks='$remark'  WHERE PFNumber='$pf'";
$result=mysqli_query($conn,$sql);
}
if ($category!="") {
  $sql = "UPDATE grievance SET GCategory='$category'  WHERE PFNumber='$pf'";
  $result=mysqli_query($conn,$sql);
}

mysqli_close($conn);
echo '
<script type="text/javascript">alert("Remark Added");window.location.href = "../HomePages/ShowOne.php?id='.$id.'";</script>'
;


//header("location:ShowOne.php");<a  class="small" href="./ShowOne.php?id='.$id.'">'.$pf.'</centre></a>

?>
