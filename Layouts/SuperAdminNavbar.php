<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">\
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>


     #bg{
      border-radius:7px;
    }
    .nav-wrapper{
        background-color:whitesmoke;
    }
    #navbarSupportedContent ul li a:hover{
        background-color:white;
        border-radius:6px;
        color:black;
    }
    #navbarSupportedContent ul li a{
        color:white;
    }
    #dropdownMenuButton{
      color:white;
    }
    #dropdownMenuButton:hover{
      background-color:white;
      color:black;
    }
    a{
        font-size:18px;
    }
    h4{
      margin-top:20px;
      margin-left:20px;
      color:grey;
    }
    textarea{
      margin-left:8px;
    }

    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
        <nav style="margin:0;padding:0;"  class="navbar navbar-expand-lg fixed-top navbar-light bg-primary">
          <a class="navbar-brand"  href="/Railway/index.php"><img class="ml-2" style="border-radius:8px;"  height="50" width="60" src="../Images/irctc1.png" alt="IRCTC" ></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/Railway/index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <?php
              if($login_role_session==6){
                echo ' <li class="nav-item">
                    <a class="nav-item nav-link" href="../StoreGrievance/SearchStatus.php">Status</a>
                </li>';
                echo ' <li class="nav-item">
                    <a class="nav-item nav-link" href="../HomePages/ShowGrievance.php">Your Grievances</a>
                </li>';
                echo ' <li class="nav-item">
                      <a class="nav-item nav-link" href="../StoreGrievance/StoreGrievance.php">GrievanceSubmit</a>
                  </li>';
              }
              if($login_role_session==1){
                echo ' <li class="nav-item">
                  <a class="nav-item nav-link" href="../HomePages/ShowUsersToAdmin.php">Employees</a>
              </li>';
                echo ' <li class="nav-item">
                  <a class="nav-item nav-link" href="../HomePages/Report.php">Report</a>
              </li>';
                echo ' <li class="nav-item">
                  <a class="nav-item nav-link" href="../HomePages/AddAdmin.php">Add Admin</a>
              </li>';


              }
              ?>
              <?php
              if($login_role_session!=6){
             echo ' <li class="nav-item">
                  <a class="nav-item nav-link" href="../HomePages/ShowGrievance.php">ShowGrievances</a>
              </li>
              <li class="nav-item">
                   <a class="nav-item nav-link" href="../HomePages/GrievancesStatus.php">Grievance Tracker</a>
               </li>
              ';
              }
              ?>

            </ul>
            <div class=" dropdown ">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="collapse" data-target="#col" aria-haspopup="true" aria-expanded="false" >
              <?php echo $login_user_session;?>
              </button>
              <div id="col" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item text-sm" href="/Railway/logout.php"> Logout </a>
              </div>
            </div>
          </div>
        </nav>
        <div class="sticky-top hidden-spacer"> </div>

        <div class="container pt-5">
