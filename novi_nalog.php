<?php 
require_once('connection.php');




require('header.php');

?>
<body id="content-white">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" id="myNavbar2">
            <ul class="nav navbar-nav pull-right full-width">
                <li style="opacity:0.5;"><a href="index.php"><img height="20px;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
            </ul>
            <!--<ul class="navbar-nav ml-auto">
                <li class="navbar-nav ml-auto"><a href="#">početna</a></li>
            </ul>-->
        </nav>
    <div class="row">
        <?php
        echo '<div id="notification" class="bg-success"><p id="noti_text" class="text-center">'.@$_SESSION['poruke'].'</p></div>';
        unset ($_SESSION['poruke']);
        ?>
        
        </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
            <form action="create_account.php" method="POST">

              <div class="form-group">
                <label for="emails">Email</label>
                <input type="text" class="form-control" id="emails" name="emails">
               
              </div>
              <div class="form-group">
                <label for="password">Lozinka</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password_confimation">Potvrdi Lozinku</label>
                <input type="password" class="form-control" id="password_confimation" name="password_confimation">
              </div>
              <div class="form-group">
                <label for="grad">Grad</label>
                <input type="text" class="form-control" id="grad" name="city">
                
              </div>
                <div class="form-group">
                    <label for="state">Država</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
                
              <div class="form-group">
                <label for="address">Adresa</label>
                <input type="text" style="margin-bottom: 0px;" class="form-control" id="email" name="address" placeholder="Kneza Miloša 24">
                <small id="address" class="form-text text-muted">Ukucajte tačnu adresu radi ispravne dostave.</small>
              </div>
                  <div class="form-group">
                <label for="zipcode">Poštanski Broj</label>
                <input id="zipcode" type="number" min="0" maxlength="5" class="form-control" id="zipcode" name="zipcode" onkeydown="javascript: return event.keyCode == 69 ? false : true" />
                <small id="zipcode" class="form-text text-muted">Ukucajte tačan poštanski broj radi ispravne dostave.</small>
              </div>
                  <div class="form-group">
                <label for="phone_number">Telefonski Broj</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number">
              </div>
                <div class="form-group" style="padding-bottom: 80px;">
              <button type="submit" style="background-color: black;" class="btn btn-primary">Dalje</button>
                </div>
            </form>
            
        </div>
    </div>
        </div> 
</body>
<?php 

require('footer.php');
?>
<script>

    
</script>