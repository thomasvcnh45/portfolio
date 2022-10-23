<?php 
require 'dbconfig.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    $sql = "SELECT * FROM reservation LEFT JOIN users ON reservation.email = users.email";

  $id=$_SESSION['id'];
  $nom=$_SESSION['nom'];
  $prenom=$_SESSION['prenom'];
  $telephone=$_SESSION['telephone'];
  $email=$_SESSION['email'];
  $date=$_SESSION['date'];
  $heure=$_SESSION['heure'];
  }


  $sql = "SELECT * FROM reservation LEFT JOIN users ON reservation.email = users.email";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bienvenue</title>
</head>
<body>
<div class="container">
<div class="content">
<?php
$sql = "SELECT * FROM reservation LEFT JOIN users ON reservation.email = users.email";
?>
   <h1>Bonjour <span><?php echo $_SESSION['username'] ?></span></h1>
   <br>
   <p>Votre rendez-vous est 
   <br> 
   le <?php echo $_SESSION['date'] ?> à<?php echo $_SESSION['heure'] ?></p>
   <a href="logout.php" class="btn btn2">Supprimer la réservation</a>
   <a href="logout.php" class="btn btn2">Déconnexion</a>
   <a href="menuuser.php" class="btn btn2">Retour à l'accueil</a>
</div>

</div>
</body>
</html>