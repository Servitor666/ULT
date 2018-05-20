<?php
require_once('connection.php');
require_once('models/product.php');
require_once('header.php');
$product = new Product($dbh);
?>
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
                            <li><a href="index.php"><img height="20px;" style="opacity:0.5;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
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
<div class="row gallery">
        <div class="col-lg-8 col-lg-offset-2">
            <table class="table">
              <thead style="opacity:0.5;">
                <tr>
                  <th scope="col" style="width: 12%;" class="text-left">pregled</th>
                  <th scope="col" class="text-center">naziv</th>
                  <th scope="col" class="text-center">cena</th>
                  <th scope="col" class="text-center">veličina</th>
                  <th scope="col" class="text-center">količina</th>
                  <th scope="col" style="width: 12%;" class="text-right">ukloni</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $products = $product->getAllProducts();
                  foreach($products as $proizvodi){
                      $singleImage = $product->getSinglePhoto($proizvodi['id'],$proizvodi['image']);
                  ?>
                <tr>
                  <th scope="row" class="text-left" style="width: 12%;"><img style="width:90px;height:100px;" src="<?=$singleImage;?>"/></th>
                  <td class="text-center" style="vertical-align: middle; font-weight: 100;"><?=$proizvodi['model']?></td>
                  <td class="text-center" style="vertical-align: middle; font-weight: 100;"><?=$proizvodi['price']?></td>
                    <td class="text-center" style="vertical-align: middle; font-weight: 100;">XL</td>
                  <td class="text-center" style="vertical-align: middle; font-weight: 100;"><?=$proizvodi['S']?></td>
                  <td class="text-right" style="width: 12%; vertical-align: middle; font-weight: 100;"><form action="delete_single.php" method="post"><label id="x-mark"></label><button style="border:none; width:40px;" type="submit" class="btn btn-default dugme-brate">X</button>
                      <input type="hidden" value="<?php $proizvodi['id']?>"/>    </form></td>
                </tr>
                  <?php
                      }
                      ?>
              </tbody>
            </table> 
            <button style="color: white; max-width:120px;" class="pull-right">Kupi</button>
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
require_once('footer.php');
?>