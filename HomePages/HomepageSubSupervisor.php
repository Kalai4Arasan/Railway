<?php
include('../Auth/fetch.php');
if($login_role_session!=5){
  header("location:javascript://history.go(-1)");
}
?>
<title>Sub-Supervisor Home</title>
<?php include "../Layouts/Navbar.php" ?>
  <?php include "../Layouts/carouselcontent.php"?>  
  <?php include "../Layouts/Footer.php" ?>