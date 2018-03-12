<?php 
require_once('connection.php');
require_once('models/Product.php');
$product = new Product($dbh);
require('header.php');
?>
<style>
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}
</style>
<body id="content-white">
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
                            <li><a href="index.php"><img style="opacity:0.5;" height="20px;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                        <li><div class="inline"></div><a href="cart.php"><img style="width: 45px; height: 20px; opacity:0.5;" class="img-responsive" src="assets/images/crna%20kolica.png"></a></li>
                      </ul>
                        <ul class="nav navbar-nav pull-right">
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
    <div class="gallery height-fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2"> 
                    <div class="col-lg-8">
                        <div class="col-lg-offset-2 col-lg-8">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" style="background-color:black; opacity: 0.5; border: 0;" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" style="background-color:black; opacity: 0.5; border: 0;" data-slide-to="1"></li>
                          <li data-target="#myCarousel" style="background-color:black; opacity: 0.5; border: 0;" data-slide-to="2"></li>
                          <li data-target="#myCarousel" style="background-color:black; opacity: 0.5; border: 0;" data-slide-to="3"></li>
                        </ol>
<?php
$proizvod = $_GET['a'];
                                                  
                  $all_photos = $product->getAllPhotos($proizvod);
                  $get_single = $product->getSingleProduct($proizvod);
                        $i = 1;  
                                ?>
                                    
                        <div class="carousel-inner">
                                <?php
                  foreach($all_photos as $proizvodi){
                  
                  
                                
?>
                        <!-- Wrapper for slides -->
                          <div class="item <?php if($i == 1) {echo 'active';} else {echo '';} ?>">
                            <img src="assets/images/<?=$proizvod?>/<?=$proizvodi['image_url'] ?>.png" >
                          </div>
                        
<?php
                       $i++;
                  }
                                
                                ?>
                            </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" style="background:none !important;" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" style="color:black;"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control"  href="#myCarousel" style="background:none !important" href="#myCarousel;" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" style="color:black;"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                    </div>
                    <div class="col-lg-4" id="buying-options">

                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-xs hidden-sm hidden-md"><p id="article-name">"<?=$get_single['model']?>"</p></div>
                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-lg text-center"><p id="article-name"><?=$get_single['model']?></p></div>
                        <br>
                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-xs hidden-sm hidden-md"><p id="price"><?=$get_single['price']?> RSD</p></div>
                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-lg text-center"><p id="price"><?=$get_single['price']?> RSD</p></div>
                        <br><br><br><br>
                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-xs hidden-sm hidden-md"><p style="opacity: 0.5;">Količina:</p><input type="text" style="width: 70px; height: 40px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></div>
                        <div class="col-lg-offset-1 col-xs-offset-3 col-xs-6 hidden-lg text-center"><p style="opacity: 0.5;">Količina:</p><input type="text" style="width: 70px; height: 40px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></div>
                        <br><br><br><br>

                        <div class="col-lg-offset-1 col-lg-10 col-xs-offset-3 col-xs-6">
                            <div class="hidden-sm hidden-md hidden-xs">
                            <form action="/action_page.php" style="width: 70px; height: 40px;">
                              <select name="sizes">
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extra-large">XL</option>
                                  <option value="extraextra-large">XXL</option>
                              </select>
                            </form>
                                </div>
                            <div class="text-center hidden-lg">
                            <form action="/action_page.php" style="width: 70px; height: 40px; display: inline-block; text-align: center;">
                              <select name="sizes">
                                <option value="small">S</option>
                                <option value="medium">M</option>
                                <option value="large">L</option>
                                <option value="extra-large">XL</option>
                                  <option value="extraextra-large">XXL</option>
                              </select>
                            </form>
                                </div>
                            <br><br>
                            <div>
                                <form method="post" action="add-to-cart.php">
                                    <input type="hidden" name="id" value="<?=$proizvod?>"/>
                                    <button type="submit" id="korpa-dugme" class="text-center hidden-xs hidden-sm hidden-md" style="background-color: black; opacity: 0.5; color: white; height: 50px; width: 200px" type="submit">Dodaj u korpu</button>
                                </form>
                            </div>
                            <div class="text-center"><button id="korpa-dugmeMalo" class="hidden-lg" style="background-color: black; opacity: 0.5; color: white; max-width: 300px;" type="submit">Dodaj</button></div>
                            <br>
                            <div class="hidden-xs hidden-md hidden-sm" style="padding-left:5px;">
<?=$get_single['description']?>
                        </div>
                        <div class="col-lg-offset-1 text-center hidden-lg">
                            <?=$get_single['description']?>
                        </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>
<footer style="text-align: center; margin-top: 100px; opacity: 0.5;">
    <ul style="color: black;">
        <li><a href="vracanje_uslovi.php">Vracanje majica</a></li>
        <li><a href="terms-of-service.php">Uslovi koriscenja</a></li>
    </ul>
</footer>
<?php 
require('footer.php');
?>