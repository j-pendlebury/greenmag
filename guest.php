<?php 
session_start();

  $servername = "mysql.hostinger.co.uk";
  $dbusername = "u495998595_admin";
  $dbpassword = "apb32axsoJVr";
  $dbname = "u495998595_admin";
  $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Greenmag</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="style.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
</head>
<body class="w3-theme-l5">
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-medium">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a> <a class="w3-bar-item w3-button w3-theme-d4" href="#"><img src="guidance_g_color_rgb.png" height="30px"></a> <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="#" title="News"><i class="fa fa-bar-chart"></i></a> <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" href="#" title="Account Settings"><i class="fa fa-cog"></i></a><a class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white w3-theme-d4" href="http://www.greenmag.co.uk/logout.php" title="My Account"><i aria-hidden="true" class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div><!-- Navbar on small screens -->
  <div class="w3-navblock w3-theme-d2 w3-large w3-hide w3-hide-large w3-hide-medium w3-top" id="navDemo" style="margin-top:51px">
    <a class="w3-padding-large" href="#">Link 1</a> <a class="w3-padding-large" href="#">Link 2</a> <a class="w3-padding-large" href="#">Link 3</a> <a class="w3-padding-large" href="#">My Profile</a>
  </div><!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;min-height:860px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <br>
      </div><!-- Middle Column -->
      <div class="w3-col m6">
        <div class="w3-row-padding">
          <div class="w3-col m12">
            <div class="w3-card-2 w3-round w3-white">
              <div class="w3-container">
                <h4 class="w3-center">Guest Account</h4>
                <p class="w3-center"><img alt="Avatar" class="w3-circle" src="https://www.w3schools.com/w3images/avatar<?php echo $_SESSION['avatarChosen']; ?>.png" style="height:106px;width:106px"></p>
                <hr>
                <p style="text-align: center;"><?php echo $_SESSION['Faculty']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-col m3">
        <!-- Profile -->
        <br>
      </div>
        <!-- Generate Content -->
        <?php
            $articleQuery  = "SELECT * FROM Article ORDER BY DateSubmitted DESC;";
            $result = mysqli_query($con, $articleQuery);

            while($row = mysqli_fetch_array($result)){

              $dateAgo = date_create($row['DateSubmitted']);
              $dateNow = date_create(gmdate("Y-m-d H:i:s"));
              $dateAgoUnix = date_format($dateAgo, "U");
              $dateNowUnix = date_format($dateNow, "U");

              $seconds = $dateNowUnix - $dateAgoUnix;

              if ($seconds < 60) {
                $stringAgo = ($seconds == 1) ? " second ago" : " seconds ago";
                $timeAgo = ltrim(gmdate("s", $seconds), '0') . $stringAgo;
              } else if ($seconds < 3600 && $seconds >= 60) {
                $stringAgo = ($seconds >= 60 && $seconds < 120) ? " minute ago" : " minutes ago";
                $timeAgo = ltrim(gmdate("i", $seconds), '0') . $stringAgo;
              } else if ($seconds < 86400 && $seconds >= 3600) {
                $stringAgo = ($seconds >= 3600 && $seconds < 7200) ? " hour ago" : " hours ago";
                $timeAgo = ltrim(gmdate("H", $seconds), '0') . $stringAgo;
              } else if ($seconds >= 86400) {
                $days = floor($seconds / 86400);
                $stringAgo = ($days == 1) ? " day ago" : " days ago";
                $timeAgo = $days . " " . $stringAgo;
              }

              echo "<div class='w3-container w3-card-2 w3-white w3-round w3-margin statusAll status" . $row2['Status'] . "'><br>";
              echo "<img alt='Avatar' class='w3-left w3-circle w3-margin-right' src='https://www.w3schools.com/w3images/avatar" . $_SESSION['avatarChosen'] . ".png' style='width:60px'>";
              echo "<span class='w3-right w3-opacity'>" . $timeAgo . "</span>";
              echo "<h4 style='margin-bottom:0 !important;'>" . $row['ArticleName'] . "</h4><br>";
              echo "<p>" . $row['ArticleDescription'] . "</p>";
              echo "<div class='w3-row-padding' style='margin:0 -16px'>";
              $db_images = $row['ImagePath'];
              $imagesArray = explode(";", $db_images);
              $noOfImages = sizeof($imagesArray);

              if ($noOfImages == 3) {
                $imageClass = 'w3-third';
              } else if ($noOfImages == 2) {
                $imageClass = 'w3-half';
              } else {
                $imageClass = 'w3-full';
              }

              for ($i = 0; $i < $noOfImages; $i++) {
                echo "<div class='" . $imageClass . "'><img class='w3-margin-bottom' src='../article_images/" . $imagesArray[$i] . "' style='width:100%'></div>";
              }

              echo "</div>";
              echo "<button class='w3-btn w3-theme w3-margin-bottom' style='margin-right:10px;' type='button'><i class='fa fa-download'></i> &nbsp;Download Doc</button>";
                echo "</div>";
            }
            mysqli_close($con);
        ?>

        <!-- End Middle Column -->
      </div><!-- Right Column -->
      </div><!-- End Grid -->
    </div><!-- End Page Container -->
  </div><br>
  <footer class="w3-container w3-theme-d4" style="text-align:center;padding-left: 30px !important;padding-bottom:5px !important;">
    <p>Copyright © 2017 Greenmag. All rights reserved. Developed by Kung Fu Pandas</p>
  </footer>
  <script>
  // Accordion
  function myFunction(id) {
     var x = document.getElementById(id);
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
         x.previousElementSibling.className += " w3-theme-d1";
     } else { 
         x.className = x.className.replace("w3-show", "");
         x.previousElementSibling.className = 
         x.previousElementSibling.className.replace(" w3-theme-d1", "");
     }
  }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
     var x = document.getElementById("navDemo");
     if (x.className.indexOf("w3-show") == -1) {
         x.className += " w3-show";
     } else { 
         x.className = x.className.replace(" w3-show", "");
     }
  }

  </script>
</body>
</html>