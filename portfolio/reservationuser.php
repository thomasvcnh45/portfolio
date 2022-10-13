<?php
include 'dbconfig.php';

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
    

    $query = "INSERT INTO reservation (nom, prenom, telephone, email, date, heure) VALUES('$nom','$prenom','$telephone','$email','$date', '$heure')";

    $sql = "SELECT * FROM reservation WHERE heure='$heure'";
	
            
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Votre réservation a bien été pris en compte');</script>";
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
                    <li><a href="menuuser.php">Home</a></li>
                    <li><a href="menuuser.php">À propos</a></li>
                    <li><a href="menuuser.php">Services</a></li>
                    <li><a href="menuuser.php">Portfolio</a></li>
                    <li><a href="menuuser.php">Contact</a></li>
                    <li><a href="reservationuser.php">Prendre rendez-vous</a></li>
                    <li><a href="welcome.php"><?php echo $_SESSION['username'] ?></a></li>
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
            <div class="contact-center">
                <form name="contact" method="post" action="">
                    <input type="text" id="Nom" name="nom" placeholder="Votre nom" required>
                    <input type="text" id="Prenom" name="prenom" placeholder="Votre prénom" required>
                    <input name="telephone" id="telephone" placeholder="Votre numéro de téléphone" required>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                    <?php

                    $mindate = date("Y-m-d");
                    ?>
                    <label>Choisir le jour</label>
                    
                    <input type="date" required id="date" name="date" value="<?=date("Y-m-d")?>">
                    <label for="select">Choisir une heure</label>
                    <div class="custom-select">
                    <select name="heure" required id="heure" value="<?php echo $heure; ?>" required>>
                    <?php 
                    for($hours=8; $hours<12; $hours++)
                    {
                        for($mins=0; $mins<60; $mins+=30)
                        { 
                            $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                            echo '<option value= "'.$time.'">'.$time.'</option>';
                        }
                    }
                    for($hours=14; $hours<18; $hours++)
                    {
                        for($mins=0; $mins<60; $mins+=30)
                        { 
                            $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                            echo '<option value= "'.$time.'">'.$time.'</option>';
                        }
                    }
                    
                    ?>
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