<?php require 'dbconfig.php'; ?>


<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $query = "INSERT INTO formulaire (name,email,message) VALUES('$name','$email','$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Votre message a bien été envoyer');</script>";
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
    <!----about--->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/user.jpg">
                </div>
                    <div class="about-col-2">
                        <h1 class="sub-title">À propos</h1>
                        <p>Web Developper expérimenté depuis un peu plus de 5 ans avec des stacks techniques Front/Back et toujours en méthodologie Agile.</p>

                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Competences</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Parcours</p>
                    </div>
                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            <h2>HTML/CSS</h2>
                            <div class="progress-bar">
                                <div class="htmlcss"><span>94%</span></div>
                            </div>
                            <h2>PHP</h2>
                            <div class="progress-bar">
                                <div class="php"><span>88%</span></div>
                            </div>
                            <h2>Javascript</h2>
                            <div class="progress-bar">
                                <div class="javascript"><span>85%</span></div>
                            </div>
                            <h2>MySQL</h2>
                            <div class="progress-bar">
                                <div class="mysql"><span>84%</span></div>
                            </div>
                            <h2>Symfony</h2>
                            <div class="progress-bar">
                                <div class="symfony"><span>82%</span></div>
                            </div>
                        </ul>
                    </div>
                    <div class="tab-contents" id="experience">
                        <ul>
                            <li><span>août 2019 - aujourd'hui</span><br>Freelance Software Engineer chez GreenFlex</li>
                            <li><span>janv. 2017 - août 2019</span><br>Mentor sur OpenClassrooms pour les étudiants aux parcours métiers du web</li>
                            <li><span>févr. 2018 - juin 2019</span><br>Ingenieur Logiciel chez SatisFactory, expert en feedback management - vous accompagne dans la mise en place de vos baromètres de satisfaction et enquêtes de satisfaction</li>
                            <li><span>janv. 2015 - oct. 2017</span><br>Ingénieur logiciel chez Groupe Conseil Maltem. MALTEM Consulting est une société spécialisée dans la gestion des organisations et des systèmes d'information dans les domaines de la finance, de la banque, de l'assurance et plus récemment dans les domaines de l'énergie, des télécoms et des médias également. Avec des bureaux à Paris, Lille, Bruxelles, Luxembourg, Singapour, Shanghai et Hong Kong, MALTEM Consulting apporte à ses clients des solutions clés en main, de l'approche stratégique à la mise en œuvre opérationnelle des organisations et des systèmes d'information, en recherche constante de création de valeur.
                            </li>
                            <li><span>janv. 2015 - oct. 2017</span><br>Ingénieur logiciel chez GRDF.Réalisation de solutions au sein de la DSI GRDF, développement et maintenance d'applications avec la méthode Scrum.</li>
                            <li><span>févr. 2012 - oct. 2014</span><br>Développeur FullStack chez SatisFactory, expert en feedback management - vous accompagne dans la mise en place de vos baromètres de satisfaction et enquêtes de satisfaction</li>
                            <li><span>oct. 2010 - déc. 2010</span><br>Développeur Web chez Neteonly</li>
                        </ul>
                    </div>
                    <div class="tab-contents" id="education">
                        <ul>
                            <li><span>2009 - 2011</span><br>EPITECH - European Institute of Technology</li>
                            <li><span>2011 - 2014</span><br>ETNA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--services-->
    <div id="services">
        <div class="container">
            <h1 class="sub-title">Mes services</h1>
            <div class="services-list">
                <div>
                    <i class="fas fa-child-reaching"></i>
                   <h2>Accompagnement et coaching</h2> 
                   <p>Un développeur dédié ayant une expertise dans votre domaine et technologie pour vous accompagner au mieux pour votre projet. L’expertise technique vous permet de challenger votre solution dans l’optique de la rendre compétitive et pérenne.</p>
                </div>
                <div>
                    <i class="fa-solid fa-plane"></i>
                    <h2>Pilotage de projet</h2> 
                    <p>Spawn s’engage à vous accompagner dans le pilotage de votre projet, soyez maitre de votre projet et développez de manière itérative.</p>
                 </div>
                 <div>
                    <i class="fas fa-lightbulb"></i>
                    <h2>App Design</h2> 
                    <p>L’innovation est l’essence même de Spawn afin de vous aider à construire les solutions de demain.</p>
                 </div>
                 <div>
                    <i class="fa-solid fa-headset"></i>
                    <h2>Secteur du gaming</h2> 
                    <p>Notre équipe a une forte appétence pour l’univers du gaming et en fait son cœur de métier. Une passion qui se reflète au quotidien sur les projets développés.</p>
                 </div>
            </div>
        </div>
    </div>
<!--portfolio-->
<div id="portfolio">
    <div class="container">
        <h1 class="sub-title">Mes projets</h1>
        <div class="work-list">
            <div class="work">
                <img src="images/fanyglass.png">
                <div class="layer">
                    <h3>Fany Glass</h3>
                    <p>Entreprise spécialistes dans la fabrication de vitraux, vitraux d'art et des décors verriers en double vitrage.</p>
                    <a href="https://fany-glass.fr/fr/"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="images/grdf.png">
                <div class="layer">
                    <h3>Avenir Athena GRDF (projet interne)</h3>
                    <p>Avenir ATHENA est une refonte complète d'un ancien outil critique de gestion d'urgence en sécurité gaz.</p>
                    <a href="https://www.grdf.fr/"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="images/grdf.png">
                <div class="layer">
                    <h3>ProtecaView GRDF (projet interne)</h3>
                    <p>Outil de préparation et d'archivage des rapports d'analyse des mesures de l'efficacité de la protection cathodique. Il intègre une interface géographique pour laquelle les données sont exportées. La capitalisation des informations recueillies dans le cadre de l'état des lieux, restitue des tableaux de bord permettant de piloter l'activité à titre préventif et correctif.</p>
                    <a href="https://www.grdf.fr/"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>
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
                    <input type="text" id="Nom" name="name" placeholder="Votre nom" required>
                    <input type="email" id="Email" name="email" placeholder="Votre email" required>
                    <textarea name="message" id="Message" rows="6" placeholder="Votre message"></textarea>
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
    

    
</body>
</html>