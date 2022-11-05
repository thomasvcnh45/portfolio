<?php
include 'dbconfig.php';
$id = $_GET['id'];
$sql = "DELETE FROM `reservation` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result) {
	echo "<script>alert('La réservation a été supprimer')</script>";
	header("Location:pageuser.php");
}else{
	echo "<script>alert('Une erreure est survenue')</script>";
}
 ?>