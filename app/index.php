<?php

session_start();

$servername = "mysql.hostinger.co.uk";
$dbusername = "u495998595_admin";
$dbpassword = "dmftw38QkZNB";
$dbname = "u495998595_admin";

$LoginUsername = trim(strip_tags(addslashes($_REQUEST['LoginUsername'])));
$LoginPassword = $_REQUEST['LoginPassword'];

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

$loginquery  = "SELECT * FROM User WHERE Username = '" . $LoginUsername . "';";

$result = mysqli_query($con, $loginquery);

if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $facultyquery  = "SELECT * FROM Faculty WHERE FacultyID = '" . $row['FacultyID'] . "';";
  $rolequery  = "SELECT * FROM Role WHERE RoleID = '" . $row['RoleID'] . "';";
  $result2 = mysqli_query($con, $facultyquery);
  $result3 = mysqli_query($con, $rolequery);
  $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
  $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

  //Logged In Variables
    $_SESSION["user_logged_in"] = true;
    $_SESSION["Username"] = $row['Username'];
    $_SESSION["Faculty"] = $row2['FacultyName'];;
    $_SESSION["Role"] = $row3['RoleName'];

} else {
    
    //Error Variables

}

mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<title>Greenmag</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles/styles.css">
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
      <a class="w3-hover-black" id="toggle-menu" title="Toggle Navigation Menu">
        <i class="fa fa-bars"></i>
      </a>
    </li>
    <li class="w3-left-align w3-hide-small"><a href="#home">HOME</a></li>
    <li class="w3-hide-small"><a href="#about">ABOUT</a></li>
    <li class="w3-hide-small"><a href="#articles">ARTICLES</a></li>
    <li class="w3-hide-small"><a href="#statistics">STATISTICS</a></li>
    <li class="w3-hide-small w3-right">
      <a onclick="document.getElementById('modal-logged-out').style.display='block'" id="loginButton" class="w3-hover-red">
        <i class="fa fa-user"></i><span id="loginButtonID" class="loginClass"> Sign In</span>
      </a>
    </li>
  </ul>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-white">
      <li><a href="#home" onclick="toggleFunction()">HOME</a></li>
      <li><a href="#about" onclick="toggleFunction()">ABOUT</a></li>
      <li><a href="#articles" onclick="toggleFunction()">ARTICLES</a></li>
      <li><a href="#statistics" onclick="toggleFunction()">STATISTICS</a></li>
      <li><a onclick="document.getElementById('id01').style.display='block'">SIGN IN
      </a></li>
    </ul>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle w3-display-middle2" style="white-space:nowrap;">
    <span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity homepage-text">GREENMAG</span>
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-32" id="about">
  <h3 class="w3-center">ABOUT</h3>
  <p class="w3-center"><em>Lorem Ipsum</em></p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
    qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </p>
  <div class="w3-center">
    <img src="../images/logo_light.png" width=150px>
  </div>
</div>

<div class="w3-row w3-center w3-dark-grey w3-padding-16">
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">40,000+</span><br>
    Submissions
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">21,000+</span><br>
    Students
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">5</span><br>
    Faculties
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">1</span><br>
    Greenwich
  </div>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-light-grey w3-wide w3-text-shadow-parallax">ARTICLES</span>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64" id="articles">
  <h3 class="w3-center">SUBMITTED WORK</h3>
  <p class="w3-center"><em>Here are some examples of work submitted by our students.</em></p><br>

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <div class="w3-row-padding w3-center">
    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Coffee beans">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Bear closeup">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Quiet ocean">
    </div>
  </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="My beloved typewriter">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Empty ghost train">
    </div>

    <div class="w3-col m3">
      <img src="../images/logo_dark.png" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Sailing">
    </div>
    <button class="w3-btn w3-light-grey w3-padding-xlarge" style="margin-top:64px">LOAD MORE</button>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-closebtn w3-text-white w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
     <span class="w3-xxlarge w3-text-light-grey w3-wide w3-text-shadow-parallax">STATISTICS</span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="statistics">
  <h3 class="w3-center">STATS:</h3>
  <p class="w3-large w3-center w3-padding-16">Some statistics about our submissions:</p>
  <p class="w3-wide"><i class="fa fa-camera"></i>Photography submissions</p>
  <div class="w3-progress-container">
    <div class="w3-progressbar" style="width:58%"></div>
  </div>
  <p class="w3-wide"><i class="fa fa-laptop"></i>Articles</p>
  <div class="w3-progress-container">
    <div class="w3-progressbar" style="width:22%"></div>
  </div>
  <p class="w3-wide"><i class="fa fa-photo"></i>Designs</p>
  <div class="w3-progress-container">
    <div class="w3-progressbar" style="width:20%"></div>
  </div>
</div>

<div id="modal-logged-out" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-8">
    <header class="w3-container w3-blackgrey"> 
      <h2 class="lefty">User Area</h2><h2><span onclick="document.getElementById('modal-logged-out').style.display='none'" 
      class="w3-closebtn2 righty"><i class="fa fa-close"></i></span></h2>
    </header>
    <div class="w3-container">
      <div class="w3-half w3-padding-right-small">
        <form action="form.asp" target="_blank">
          <div class="w3-row-padding-top">
              <input class="w3-input w3-border w3-register-input" type="text" placeholder="Username" required name="Username">
              <input class="w3-input w3-border w3-register-input" type="Password" placeholder="Password" required name="Password">
              <input class="w3-input w3-border w3-register-input" type="Password" placeholder="Confirm Password" required name="ConfirmPassword">
              <select class="styled-select w3-select w3-border w3-register-input" name="option">
                <option value="" disabled selected>Choose your faculty</option>
                <option value="1">Faculty of Architecture, Computing & Humanities</option>
                <option value="2">Business School</option>
                <option value="3">Faculty of Education & Health</option>
                <option value="4">Faculty of Engineering & Science</option>
              </select>
          </div>
          <!-- <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"> -->
          <button class="w3-btn w3-padding w3-section" id="register" type="submit">
            <i class="fa fa-check"></i> Register
          </button>
        </form>
      </div>
      <div class="w3-half w3-padding-left-small">
        <form action="" method="post">
          <div class="w3-row-padding-top">
              <input class="w3-input w3-border w3-register-input" type="text" placeholder="Username" required name="LoginUsername">
              <input class="w3-input w3-border w3-register-input" type="Password" placeholder="Password" required name="LoginPassword">
          </div>
          <!-- <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"> -->
          <button class="w3-btn w3-padding w3-section" id="register" type="submit">
            <i class="fa fa-check"></i> Login
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal-logged-in" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-8">
    <header class="w3-container w3-blackgrey"> 
      <h2 class="lefty">User Area</h2><h2><span onclick="document.getElementById('modal-logged-in').style.display='none'" 
      class="w3-closebtn2 righty"><i class="fa fa-close"></i></span></h2>
    </header>
    <div class="w3-container">
      <form action="" method="post">
        <button id="logOut" onclick="<?php session_destroy(); ?>">Log Out</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-btn w3-padding w3-light-grey w3-hover-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-text-indigo"></i>
    <i class="fa fa-instagram w3-hover-text-purple"></i>
    <i class="fa fa-snapchat w3-hover-text-yellow"></i>
    <i class="fa fa-pinterest-p w3-hover-text-red"></i>
    <i class="fa fa-twitter w3-hover-text-light-blue"></i>
    <i class="fa fa-linkedin w3-hover-text-indigo"></i>
  </div>
  <p>Created by Kung Fu Pandas <i class="fa fa-file-code-o"></i> .</p>
</footer>
 
<script src="main.js"></script>
<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
<script type="text/javascript">
  var Username;
  var FacultyName;
  var RoleName;
  var user_logged_in;

  function jsLoginFunction(Username, FacultyName, RoleName, user_logged_in){
    if (user_logged_in == 1) {
      var span = document.getElementById("loginButtonID");
      span.textContent = " " + Username;

      $("#loginButton").bind("click", function() {
        document.getElementById('modal-logged-out').style.display='none';
        document.getElementById('modal-logged-in').style.display='block';
      });
    }
  }

</script>
<?php
echo "<script type='text/javascript'>jsLoginFunction('" . $_SESSION['Username'] . "','" . $_SESSION['Faculty'] . "', '" . $_SESSION['Role'] . "', '" . $_SESSION['user_logged_in'] . "')</script>";
?>

</body>
</html>