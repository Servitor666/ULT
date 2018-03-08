<?php

require_once('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$select_user = $dbh->prepare('SELECT * FROM users WHERE email = :email');

$select_user->bindParam(':email', $email);

$select_user->execute();

$user = $select_user->fetchAll(\PDO::FETCH_ASSOC);


$_SESSION['user_email']= $user[0]['email'];

header("Location: http://localhost/ult-site/odeca.php");
?>