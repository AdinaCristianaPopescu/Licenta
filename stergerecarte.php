<?php
       $ISBN = $_GET['ISBN'];

  include 'php/conexiune.php';

$query = "DELETE FROM carti WHERE ISBN = '$ISBN'";
	$result = mysqli_query($link, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($link);
		exit;
	}
	header("Location: carti.php");
?>



