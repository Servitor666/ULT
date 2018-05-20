<?php
    require_once('connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute(array(
        "email" => $email
    ));

    $user = $statement->fetch(\PDO::FETCH_ASSOC);

    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (password_verify($password, $user['password'])) 
    {
        $_SESSION['user'] = $user;
        header("Location: http://localhost/browse.php");
    }
    else
    {
        header("Location: http://localhost/login.php");
    }
?>