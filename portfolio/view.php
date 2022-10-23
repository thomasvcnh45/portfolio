<!DOCTYPE html>
<html>
<head>
	<title>Utilisateurs</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css" >
	<script src="https://kit.fontawesome.com/e4435363c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
</head>
<body>
	

<div class="container">
	<?php
	if(isset($_GET['msg'])) {
		$msg = $_GET['msg'];
		echo '<div class="alert alert-warning alert-dismissible fade show"
		role="alert">
		'.$msg.'
		<button type="button" class="btn-close" data-bs-dismiss="alert"
		aria-label="Close"></button>
		</div>';
	}
	?>
	<div class="contact-center">
                <h1 class="sub-title">Voir tous les rendez-vous</h1>
            </div>	
		<a href="create.php" class="btn btn-dark">Créer</a>
		
<table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Téléphone</th>
	  <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Heure</th>
    </tr>
  </thead>
  <tbody>
	<?php
	include "dbconfig.php";
	$sql = "SELECT* FROM `reservation`";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
	?>
	<tr>
      <th><?php echo $row['id'] ?></th>
	  <th><?php echo $row['nom'] ?></th>
	  <th><?php echo $row['prenom'] ?></th>
	  <th><?php echo $row['telephone'] ?></th>
	  <th><?php echo $row['email'] ?></th>
	  <th><?php echo $row['date'] ?></th>
	  <th><?php echo $row['heure'] ?></th>
	  <td>
		<a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
		<a href="delete.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
	  </td>
    </tr>
	<?php
	}
	?>
    
    
  </tbody>
</table>
    </div>
	<a href="logout.php" class="btn btn2">Déconnexion</a>
   	<a href="pageadmin.php" class="btn btn2">Retour au profil</a>
</body>
</html>