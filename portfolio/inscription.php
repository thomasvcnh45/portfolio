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
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <title>Inscription</title>
        </head>
        <body>
        <div id="header">
        <div class="container">
            <nav>
                <img src="images/logo1.png" class="logo">
                <ul id="sidemenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">À propos</a></li>
                    <li><a href="index.php">Services</a></li>
                    <li><a href="index.php">Portfolio</a></li>
                    <li><a href="index.php">Contact</a></li>
                    <li><a href="reservation.php">Prendre rendez-vous</a></li>
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
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
        <!--contact-->
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-title">Contactez-moi</h1>
                <p><i class="fas fa-paper-plane"></i> pascal@spawn-developer.com</p>
                <p><i class="fas fa-phone"></i> 0650663605</p>
                <p><i class="fas fa-building"></i> 14 Rue Bausset, 75015 Paris</p>
                <div class="social-icons">
                    <a href="https://facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://twitter.com/?lang=fr"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.instagram.com/?hl=fr"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/pascal-huynh-032a7a44/?originalSubdomain=fr"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <a href="images/my-cv.pdf" download class="btn btn2">Download CV</a>
            </div>
            <div class="contact-right">
                <form name="contact" method="post" action="">
                    <input type="text" id="Nom" name="Nom" placeholder="Votre nom" required>
                    <input type="email" id=Email name="Email" placeholder="Votre email" required>
                    <textarea name="Message" id="Message" rows="6" placeholder="Votre message"></textarea>
                    <button type="submit" value="submit" name="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
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

    <script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbyUEAcB_h8YtHCYBaWu-o9q3KsvU_50LKBpV6Zcu3I-d2bVoSbkWvsXG2QdaLco-99dOA/exec'
  const form = document.forms['contact']
  const msg = document.getElementById("msg")

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
        msg.innerHTML = "Message sent succesfully"
        setTimeout(function () {
            msg.innerHTML = ""
        },5000)
        form.reset()
      })
      .catch(error => console.error('Error!', error.message))
  })
</script>
<style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #282828;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
                
            }
            form .btn{
                padding: 14px 60px;
                font-size: 18px;
                margin-top: 20px;
                cursor: pointer;
            }
        </style>
        </body>
</html>