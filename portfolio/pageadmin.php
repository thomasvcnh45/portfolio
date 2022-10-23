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
    
    $errors = array();

    $errorstel = "SELECT telephone FROM reservation WHERE telephone='$telephone' ";
    $teltel = mysqli_query($conn,$errorstel);
    
    $errorsemail = "SELECT email FROM reservation WHERE email='$email' ";
    $emailemail = mysqli_query($conn,$errorsemail);

    $errorsheure = "SELECT heure,date FROM reservation WHERE date='$date' AND heure='$heure' ";
    $heureheure = mysqli_query($conn,$errorsheure);
	
            
    if(count($errors)==0) {

        $query = "INSERT INTO reservation (nom, prenom, telephone, email, date, heure) VALUES('$nom','$prenom','$telephone','$email','$date', '$heure')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page Admin</title>
</head>
<body>
<div class="container">

<div class="content">
   <h1>Bonjour <span><?php echo $_SESSION['username'] ?></span></h1>
   <br>
   <p>Vous êtes administrateur</p>
   <a href="view.php" class="btn btn2">Gestion des utilisateurs</a>
   <a href="logout.php" class="btn btn2">Déconnexion</a>
   <a href="menuadmin.php" class="btn btn2">Retour à l'accueil</a>
</div>

</div>
</body>
</html>