<?php
    require_once('connection.php');

    $drzava = $_POST['state'];
    $grad = $_POST['city'];
    $adresa = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $phone_number = $_POST['phone_number'];

    $statement = $dbh->prepare("UPDATE users SET state = :state, city = :city, address = :address, zip_code = :zipcode, phone_number = :phonenumber");

    $status = $statement->execute(array(
        "state" => $drzava,
        "city" => $grad,
        "address" => $adresa,
        "zipcode" => $zipcode,
        "phonenumber" => $phone_number
    ));

    if ($status)
    {
        $_SESSION['user']['state'] = $drzava;
        $_SESSION['user']['city'] = $grad;
        $_SESSION['user']['address'] = $adresa;
        $_SESSION['user']['zipcode'] = $zipcode;
        $_SESSION['user']['phone_number'] = $phone_number;

        $message = "Registrovan si";
        $_SESSION['poruke'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }
    else
    {
        $message = "Lozinke se ne poklapaju";
        $_SESSION['poruke'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }
    
?>