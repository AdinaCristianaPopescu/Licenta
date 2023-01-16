<?php
       $nume = $_GET['nume'];

  include 'php/conexiune.php';

$query = "DELETE FROM utilizatori WHERE nume = '$nume'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
	}
	header("Location: utilizatori.php");
?>
