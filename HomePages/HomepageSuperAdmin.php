<?php
include('../Auth/fetch.php');
if($login_role_session!=1){
  header("location:javascript://history.go(-1)");
}
?>
<title>SuperAdmin Home</title>
<?php include "../Layouts/Navbar.php"?>
<?php include "../Layouts/carouselcontent.php"?> 
<?php include "../Layouts/Footer.php"?>