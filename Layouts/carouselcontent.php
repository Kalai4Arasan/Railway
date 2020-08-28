<style>
    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 8px 0 rgba(0, 0, 0, 0.19);
    }
    .img-rounded.announce{
      float: left;
      background-color:white; 
      width: 260px; 
      height: 260px; 
      margin: 10px;
    }
    h4{
      color:white;
      background-color: rgba(4, 40, 158, 0.788); 
      text-align: center; 
      margin: 0px; 
      padding: 0px;
      border-radius:5px 5px 0 0;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);
    }
    .announce1{
      height: 200px;
      overflow-y: scroll; 
      padding: 6px; 
      text-align:left; 
      border: 2px solid  rgba(229, 227, 233, 0.753);
      border-radius:0 0 8px 8px;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);
    }
    .announce1::-webkit-scrollbar {
      display: none;
    }

    .blinking{
    animation:blinkingText 1.2s infinite;
    }
    @keyframes blinkingText{
        0%{     color: #ffff;    }
        49%{    color: #ffff; }
        60%{    color: transparent; }
        99%{    color:transparent;  }
        100%{   color: #ffff;    }
    }

</style>
      <div class="container"><h5 id="welcome" class="font-weight-bold alert alert-success" style="text-align:center">Welcome <?php echo $login_user_session;?></h5></div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-75" src="../Images/rail3.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-75" src="../Images/rail2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-75" src="../Images/rail4.png"alt="Third slide">
            </div>
          </div>
      </div>
      <div class="row mt-4" style="margin-left:10%;">
      <div class="col-sm-4 col-md-3">
      <div class="img-rounded announce" >
        <h4>Latest News</h4>
          <div id="cc-homepage-announcements" class="announce1">
          <marquee behavior="scroll" scrollamount="4"direction="up" style="height:200px; ">
          <p><i class="fa fa-angle-double-right"></i> IRCTC Alert! Book Indian Railways ticket today and pay later! This digital payment platform is making it possible</p>
          </marquee>
          </div>
      </div>
      </div>
      <div class="img-rounded announce" style="margin-left:6%;">
        <h4>Announcements</h4>
          <div id="cc-homepage-announcements" class="announce1" >
          <p>
          <span class="blinking badge badge-pill badge-danger">New</span> Now you can view your grievance status transparently.
          </p>
          <p>
          <span class="blinking badge badge-pill badge-danger">New</span> Welcome to our Grievance portal
          </p>
          </div>
      </div>
      <div class="img-rounded announce" style="margin-left:2%;">
        <h4>More</h4>
          <div id="cc-homepage-announcements" class="announce1">
          </div>
        </div>
      </div>

      <script>
        setTimeout(function() {
            document.getElementById("welcome").remove();
        }, 2000);
        </script>