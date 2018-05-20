<?php 
require('header.php');
?>
<body id="content-white">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" id="myNavbar2">
            <ul class="nav navbar-nav pull-right full-width">
                <li style="opacity:0.5;"><a href="index.php"><img height="20px;" class="backarrow pr-3" src="assets/images/crna%20strelica.png">početna</a></li>
            </ul>
            <!--<ul class="navbar-nav ml-auto">
                <li class="navbar-nav ml-auto"><a href="#">početna</a></li>
            </ul>-->
        </nav>
    <div class="row gallery">
        <div class="col-lg-2 col-lg-offset-5">
            <form action="data/submit_login.php" method="POST">
          <div class="form-group">
            <label for="email">Email adresa</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Unesi Email">
          </div>
          <div class="form-group">
            <label for="password">Lozinka</label>
            <input name="password"  type="password" class="form-control" id="password" placeholder="Unesi Lozinku">
          </div>
          <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Nemate profil? <a href="register.php">Registrujte se.</a></small>
          </div>
          <button style="background-color: black;" type="submit" class="btn btn-primary">Dalje</button>
            </form>
        </div> 
    </div>
    </div>
</body>
<?php 
require('footer.php');
?>