<?php
include('../Auth/fetch.php');
if($login_role_session!=6){
  header("location:javascript://history.go(-1)");
}
?>
<title>Employee Home</title>
  <?php include "../Layouts/Navbar.php" ?>
  <?php include "../Layouts/carouselcontent.php"?>  
  <?php include "../Layouts/Footer.php" ?>