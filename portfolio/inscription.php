<?php
include 'dbconfig.php';
error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $secret = '6LfSIW0iAAAAANgeRkF-QOR08wGSXqLYZd8CmWW8';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
            

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Votre inscription a été enregistrée')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Oups ! Quelque chose s'est mal passé.')</script>";
			}
		} else {
			echo "<script>alert('Oula! L'émail existe déjà')</script>";
		}
		
	} else {
		echo "<script>alert('Le mot de passe ne correspond pas !')</script>";
	}
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://kit.fontawesome.com/e4435363c2.js" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Inscription</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Inscription</p>
			<div class="input-group">
				<input type="text" placeholder="Pseudo" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mot de passe" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmer le mot de passe" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="g-recaptcha" data-sitekey="6LfSIW0iAAAAADnlRYdXe-8pek_w2uYtN5pui9wd"></div>
			<div class="input-group">
				<button name="submit" class="btn">Inscription</button>
			</div>
			<p class="login-register-text">Vous avez un compte ? <a href="connexion.php">Connectez vous</a>.</p>
		</form>
	</div>
</body>
</html>