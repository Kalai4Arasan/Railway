<?php
include('../Auth/fetch.php');
if($login_role_session!=3){
  header("location:javascript://history.go(-1)");
}
?>
<title>Co-Ordinator Home</title>

<?php include "../Layouts/Navbar.php" ?>
  <?php include "../Layouts/carouselcontent.php"?>



  <?php


  $query="SELECT * FROM grievance WHERE (Status=0 or Status=4 or Status=6 or Status=8)";
  $result=mysqli_query($conn,$query);
  $dt=date("d-m-yy");
  $min=0;
  while($row=mysqli_fetch_assoc($result)){
    $diff=0;
    $diff = strtotime($row['CurrentDate']) - strtotime($dt);
    $dc=abs(round($diff / 86400));
    if($dc>$min)
    {
      $min=$dc;
    }
  }

  if($min>2)
  {
    /*echo '<script>
  var txt;
  if (confirm("Grivance Pending . Click OK to verify now.")) {
    txt = "You pressed OK!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>';*/
  echo "<script type='text/javascript'>alert('Grievance Pending Verify Now.');window.location.href = '../HomePages/ShowGrievance.php';</script>";
  }


  ?>
  <?php include "../Layouts/Footer.php" ?>
