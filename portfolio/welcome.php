<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
<div class="container">

<div class="content">
   <h1>Bonjour <span><?php echo $_SESSION['username'] ?></span></h1>
   <br>
   <p>Votre rendez-vous est le</p><?php echo $_SESSION['heure'] ?>
   <a href="logout.php" class="btn btn2">Supprimer la réservation</a>
   <a href="logout.php" class="btn btn2">Déconnexion</a>
   <a href="menuuser.php" class="btn btn2">Retour à l'accueil</a>
</div>

</div>
</body>
</html>