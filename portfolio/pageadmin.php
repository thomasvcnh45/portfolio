<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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