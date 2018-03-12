<?php
include_once 'connection.php';
include_once 'models/Product.php';

$_SESSION['cart'] = array();

$cart = $_SESSION['cart'];
unset($cart[0]);
$tshirt = $_POST['id'];
$product = new Product($dbh);
$getProduct = $product->getSingleProduct($tshirt);

$_SESSION['cart'][] = $getProduct;
echo "<pre>";
var_dump($_SESSION['cart']);
echo "</pre>";
?>