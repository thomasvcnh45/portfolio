<?php 

include 'dbconfig.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: pageuser.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		if($row["usertype"]=="user")
		{
			$_SESSION['username'] = $row['username'];
			header("Location:menuuser.php");
		}
		elseif($row["usertype"]=="admin")
		{
			$_SESSION['username'] = $row['username'];
			header("Location:menuadmin.php");
		}
		
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Connexion</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Connexion</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mot de passe" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Connexion</button>
			</div>
			<p class="login-register-text">Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez vous</a>.</p>
		</form>
	</div>
</body>
</html>