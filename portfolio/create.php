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
<html>
<head>
	<title>Rendez-vous</title>
	<link rel="stylesheet" href="style.css" >

</head>
<body>
	
<div id="reservation">
    <div class="container">
        <div class="row">
            <div class="contact-center">
                <h1 class="sub-title">Rajouter un rendez-vous</h1>
            </div>
            <br>
            <br>
            <br>
            <div class="contact-center">
                <form name="contact" method="post" action="">
                    <input type="text" id="Nom" name="nom" placeholder="Nom" class="form-control" autocomplete="off">
                    <input type="text" id="Prenom" name="prenom" placeholder="Prénom" class="form-control" autocomplete="off">
                    <input name="telephone" id="telephone" placeholder="Numéro de téléphone" class="form-control" autocomplete="off">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" autocomplete="off">
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
                    
                    <button type="submit" value="submit" name="submit" class="btn btn2">Réserver</button>
                    <a href="view.php">
						<button class="btn btn2" type="button">
							Voir la liste
						</button>
					</a>
				</div>
			</form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>

