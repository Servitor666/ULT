<?php 
require_once('data/connection.php');
require('header.php');
?>

<body id="content-white">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" id="myNavbar2">
            <ul class="nav navbar-nav pull-right full-width">
                <li style="opacity:0.5;"><a href="index.php"><img height="20px;" class="backarrow" src="assets/images/crna%20strelica.png">početna</a></li>
            </ul>
        </nav>
        <div class="row">
            <?php
                echo '<div id="notification" class="bg-success"><p id="noti_text" class="text-center">'.@$_SESSION['poruke'].'</p></div>';
                unset ($_SESSION['poruke']);
            ?>
        </div>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <form action="data/submit_edit_account.php" name="Info" onsubmit="return validateForm()" method="POST">
                    
                    <div class="form-group">
                        <label for="grad">Grad</label>
                        <input type="text" class="form-control" id="grad" name="city" value="<?php echo $_SESSION['user']['city'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="state">Država</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $_SESSION['user']['state'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Adresa</label>
                        <input type="text" class="form-control" id="email" name="address" value="<?php echo $_SESSION['user']['address'] ?>">
                    </div>

                    <div class="form-group" >
                        <label for="zipcode">Poštanski Broj</label>
                        <input id="zipcode" type="number" min="0" maxlength="5" class="form-control" id="zipcode" name="zipcode" onkeydown="javascript: return event.keyCode == 69 ? false : true" value="<?php echo $_SESSION['user']['zip_code'] ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Telefonski Broj</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?php echo $_SESSION['user']['phone_number'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" style="background-color: black;" class="btn btn-primary">Sačuvati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function validateForm() 
    {
        var form = document.forms["Info"];
        if (form["city"].value == "")
        {
            alert("City must be filled out");
            return false;
        }
        else if (form["state"].value == "")
        {
            alert("State must be filled out");
            return false;
        }
        else if (form["address"].value == "")
        {
            alert("Address must be filled out");
            return false;
        }
        else if (form["zipcode"].value == "")
        {
            alert("Zipcode must be filled out");
            return false;
        }
        else if (form["phone_number"].value == "")
        {
            alert("Phone number must be filled out");
            return false;
        }
    }
</script>

<?php 
require('footer.php');
?>