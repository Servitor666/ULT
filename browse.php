<?php 
require_once('data/connection.php');
require_once('models/product.php');
require('header.php');

$product = new Product($dbh);
?>
<body id="content-white">
    <div class="container-fluid">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar2">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                    </div>
                    <div class="navbar-collapse collapse hidden-xs hidden-sm" style="display: block;">
                        <ul class="nav navbar-nav pull-left">
                            <li><a href="index.php"><img height="20px;" style="opacity: 0.5;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><div class="inline"></div><a href="cart.php"><img style="width: 45px; height: 20px; opacity: 0.5;" class="img-responsive" src="assets/images/crna%20kolica.png"></a></li>
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <?php
                                if (isset($_SESSION['user']))
                                {
                                    ?>
                                    <li>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?=$_SESSION['user']['email']?><span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/edit.php">Izmeni podatke</a></li>
                                                <li><a href="/data/submit_logout.php">Odjavi se</a></li>
                                            </ul>
                                        </div>     
                                    </li>
                            <?php 
                                }
                                else 
                                {
                                 ?>
                                <li><a href="login.php">prijavi se</a></li>
                            <?php
                                }
                             ?>
                      </ul>
                    </div>
                     <div id="myNavbar2" class="text-center navbar-collapse collapse">
                         <ul class="nav navbar-nav hidden-lg hidden-md">
                            <li style="margin-left: -2px;"><a href="index.php"><img height="20px;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
                            <li><div class="inline"></div><a href="cart.php"><img style="width: 60px; height: 25px;" class="img-responsive" src="assets/images/crna%20kolica.png"></a></li>
                            <?php
                             if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){
                             ?>
                            <li>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$_SESSION['user_email'];?><span class="caret"></span>
                                        </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Izmeni podatke</a></li>
                                    <li><a href="#">Odjavi se</a></li>
                                  </ul>
                                </div>
                                        
                            </li>
                             <div class="carousel-inner">
                          <div class="item active">
                            <img src="assets/images/1/slika-1.png" >
                          </div>
                          <div class="item">
                            <img src="assets/images/1/slika-1.png">
                          </div>
                        </div>
                            <?php 
                            }
                            else {
                                 ?>
                            <li><a href="login.php">prijavi se</a></li>
                            <?php
                             }
                             ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid gallery">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                  <?php
                  $products = $product->getAllProducts();
                  foreach($products as $proizvodi){
                      $singleImage = $product->getSinglePhoto($proizvodi['ID']);
                  ?>
                <div class="col-lg-3 text-center">
                  <a href="#"><a href="artikl_preview.php?a=<?php echo $proizvodi['ID']; ?>">
                    <img class="img-responsive" style="width: 220px; height: 250px; padding: 20px;" src='assets/images/<?=$proizvodi['ID'];?>/<?=$singleImage;?>.png' alt="">
                      </a>
                  </a>
                    <p><?=$proizvodi['model']?></p>
                    <p><?=$proizvodi['price']?> RSD</p>
                </div>
                <?php
                  }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<footer style="text-align: center; margin-top: 100px; opacity: 0.5;">
    <ul style="color: black;">
        <li><a href="terms_of_condition.php">Vracanje majica</a></li>
        <li><a href="terms_of_service.php">Uslovi koriscenja</a></li>
    </ul>
</footer>
<?php 
require('footer.php');
?>