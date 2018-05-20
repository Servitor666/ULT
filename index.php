<?php 
require('header.php');
?>
<body id="content">
      <div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" style="color:#000">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
        <div class="collapse navbar-collapse fade-in two" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="music.php">Muzika</a></li>
            <li><a href="browse.php">Odeća</a></li>
            <li><a href="gallery.php">Galerija</a></li>
          </ul>
        </div>
    </nav>
  <div class="container-fluid">
            <div class="row fade-in one">
               <div id="logo" class="col-lg-6 col-lg-offset-3 col-xs-12" style=" padding-top: 16vh;">
                   <img style="height:300px; width:320px" class="img-responsive" src="assets/images/logo%20za%20sajt.png"/>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-8 col-lg-offset-2"> 
                    <p id="typewrite" class="text-center" style="padding: 20px"></p>
                </div>
            </div>
      <br><br><br>
            <div class="row">
                <div class="col-lg-2 col-lg-offset-5 ig-img-holder fade-in four">
                    <a href="https://www.instagram.com/ulovetears/"><img style="height: 30px; width: 30px;" class="ig-img img-responsive" src="assets/images/insta%20logo.png"></a>
                </div>
            </div>
      </div>
    </div>
</body>
<?php 
require('footer.php');
?>