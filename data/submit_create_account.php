<?php
    require_once('connection.php');

    $email = $_POST['emails'];
    $password = $_POST['password'];
    $drzava = $_POST['state'];
    $grad = $_POST['city'];
    $adresa = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $phone_number = $_POST['phone_number'];
    $confirm_p = $_POST['password_confimation'];

    if ($password == $confirm_p)
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $statement = $dbh->prepare("SELECT * FROM users WHERE email = :email");
        $statement->execute(array(':email' => $email));
        $row = $statement->rowCount();
        echo $row;
        $_SESSION['poruke'] = $row;
        if ($row > 0)
        {
            $_SESSION['poruke'] = "This email already exists";
        }
        else
        {
            $statement = $dbh->prepare("INSERT INTO users(password, email, state, city, address, zip_code, phone_number, registered_date)
                VALUES(:fpassword, :femail, :fstate, :fcity, :faddress, :fzip_code, :fphone_number, NOW())");

            $statement->execute(array(
                "fpassword" => $password,
                "femail" => $email,
                "fstate" => $drzava,
                "fcity" => $grad,
                "faddress" => $adresa,
                "fzip_code" => $zipcode,
                "fphone_number" => $phone_number
            ));

            $message = "Registrovan si";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $_SESSION['poruke'] = $message;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
    }
    else
    {
        $message = "Lozinke se ne poklapaju";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $_SESSION['poruke'] = $message;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>