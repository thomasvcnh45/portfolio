<?php require 'dbconfig.php'; ?>



<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $date= $_POST['date'];
    $heure= $_POST['heure'];
    
    $errors = array();

    $errorstel = "SELECT telephone FROM reservation WHERE telephone='$telephone' ";
    $teltel = mysqli_query($conn,$errorstel);
    
    $errorsemail = "SELECT email FROM reservation WHERE email='$email' ";
    $emailemail = mysqli_query($conn,$errorsemail);

    $errorsheure = "SELECT heure,date FROM reservation WHERE date='$date' AND heure='$heure' ";
    $heureheure = mysqli_query($conn,$errorsheure);

    $sql = "SELECT * FROM reservation LEFT JOIN users ON reservation.email = users.email";

    if(empty($nom)) {
        $errors['errorsnom'] = "Nom requis";
    }

    if(empty($prenom)) {
        $errors['errorsprenom'] = "Prenom requis";
    }

    if(empty($telephone)) {
        $errors['errorstel'] = "Telephone requis";
    }else if(mysqli_num_rows($teltel)>0){
        $errors['errorstel'] = "Numéro de téléphone existant";
    }  

    if(empty($email)) {
        $errors['errorsemail'] = "Email requis";
    }else if(mysqli_num_rows($emailemail)>0){
        $errors['errorsemail'] = "L'émail existe déjà";
    }    

    if(empty($date)) {
        $errors['errorsdate'] = "Date requis";
    }else if(mysqli_num_rows($heureheure)>0){
        $errors['errorsdate'] = "Date déjà réserver";
    }    

    if(empty($heure)) {
        $errors['errorsheure'] = "Heure requis";
    }else if(mysqli_num_rows($heureheure)>0){
        echo "<script>alert('Heure déja réserver')</script>";
    }


    if(count($errors)==0) {

    $query = "INSERT INTO reservation (nom, prenom, telephone, email, date, heure) VALUES('$nom','$prenom','$telephone','$email','$date', '$heure')";
    $sql = "SELECT * FROM reservation LEFT JOIN users ON reservation.email = users.email";
    $result = mysqli_query($conn,$query);
    if ($result){
        echo "<script>alert('Votre réservation a bien été pris en compte')</script>";
    }else{
        echo "<script>alert('Une erreure est survenue')</script>";
    }
	}
        
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huynh Consulting</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/e4435363c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" class="logo">
                <ul id="sidemenu">
                <li><a href="#header">Home</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="reservationuser.php">Prendre rendez-vous</a></li>
                    <li><a href="pageuser.php"><?php echo $_SESSION['username'] ?></a></li>
                    <li><a href="logout.php">Deconnexion</a></li>
                    <img src="images/sun.png" id="icon">
                    <i class="fas fa-times" onclick="closemenu()"></i>
                </ul>
                <i class="fas fa-bars" onclick="openmenu()"></i>
            </nav>
            <div class="header-text">
                <p>Freelance Software Engineer</p>
                <h1>Hello je m'appelle <span>Pascal</span><br>et je suis <span class="auto-type"></span></h1>
            </div>
        </div>
    </div>

    <div id="reservation">
    <div class="container">
        <div class="row">
            <div class="contact-center">
                <h1 class="sub-title">Prendre un rendez-vous</h1>
            </div>
            <br>
            <br>
            <br>
            <div class="contact-center">
                <form name="contact" method="post" action="">
                    <input type="text" id="Nom" name="nom" placeholder="Votre nom" class="form-control" autocomplete="off">
                    <p class="text-danger"><?php if(isset($errors['errorsnom'])) echo $errors['errorsnom']; ?></p>
                    <input type="text" id="Prenom" name="prenom" placeholder="Votre prénom" class="form-control" autocomplete="off">
                    <p class="text-danger"><?php if(isset($errors['errorsprenom'])) echo $errors['errorsprenom']; ?></p>
                    <input name="telephone" id="telephone" placeholder="Votre numéro de téléphone" class="form-control" autocomplete="off">
                    <p class="text-danger"><?php if(isset($errors['errorstel'])) echo $errors['errorstel']; ?></p>
                    <input type="email" id="email" name="email" placeholder="Votre email" class="form-control" autocomplete="off">
                    <p class="text-danger"><?php if(isset($errors['errorsemail'])) echo $errors['errorsemail']; ?></p>
                    <?php

                    $mindate = date("Y-m-d");
                    ?>
                    <label>Choisir le jour</label>
                    
                    <input type="date" id="date" name="date" value="<?=date("Y-m-d")?>" class="form-control" autocomplete="off">
                    <label for="select">Choisir une heure</label>
                    <div class="custom-select">
                    <select name="heure" id="heure" value="<?php echo $heure; ?>" class="form-control" autocomplete="off" >>
                    <p class="text-danger"><?php if(isset($errors['errorsheure'])) echo $errors['errorsheure']; ?></p>
                    <option>8h30</option>
                    <option>9h00</option>
                    <option>9h30</option>
                    <option>10h00</option>
                    <option>10h30</option>
                    <option>11h00</option>
                    <option>11h30</option>
                    <option>14h00</option>
                    <option>14h30</option>
                    <option>15h00</option>
                    <option>15h30</option>
                    <option>16h00</option>
                    <option>16h30</option>
                    <option>17h00</option>
                    <option>17h30</option>
                    </select>
                    </div>
                    
                    <button type="submit" value="submit" name="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
</div>

    <!--contact-->
<div id="contact">
    <div class="container">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.9744742223324!2d2.2967347156737032!3d48.839625579285645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6703e3275b871%3A0x1c2317f662ec0a19!2s14%20Rue%20Bausset%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1663601884390!5m2!1sfr!2sfr" width="1400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright @ 2022 Pascal Huynh</p>
    </div>
</div>

<script>
    var icon = document.getElementById("icon");

    icon.onclick = function(){
        document.body.classList.toggle("white-theme");
        if(document.body.classList.contains("white-theme")){
            icon.src="images/moon.png";
        }else{
            icon.src= "images/sun.png";
        }
    }
</script>

<script>
    var typed = new Typed(".auto-type", {
        strings: ["Developpeur web", "Freelancer", "Mentor", "Ingénieur"],
        typeSpeed: 70,
        backSpeed: 70,
        loop: true
    })
</script>

    <script>

        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");
        
        function opentab(tabname){
            for(tablink of tablinks){
                tablink.classList.remove("active-link");
            }
            for(tabcontent of tabcontents){
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }
    </script>

    <script>
        var sidemeu = document.getElementById("sidemenu");

        function openmenu() {
            sidemeu.style.right="0";
        }
        function closemenu() {
            sidemeu.style.right="-200px";
        }
    </script>
   
</body>
</html>