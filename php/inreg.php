
<?php
function redirect($url)
{
    header('Location: '.$url);
    exit();
}
	if (isset($_POST["submit"])) {
		$nume = $_POST["nume"];
		$utilizator = $_POST["utilizator"];
		$parola = $_POST["parola"];
		$email = $_POST["email"];
		$telefon = $_POST["telefon"];
		if ($nume == "" | $utilizator =="" | $parola =="" | $email == "" | $telefon == "") {
			$error_m= "<b>Error !</b> <span>Toate campurile trebuie completate</span>";

		}
		$fotografie = "css/utilizator.jpg";



//          elseif(preg_match('/[^a-z0-9_-]+/i', $utilizator)){
//             $error_msg = "<div class='alert alert-danger'><strong>Error ! </strong>Numele de utilizator poate sa contina litere, cifre si caractere speciale.</div>";
//            }
       
		$sql_u= mysqli_query($link,"select * from utilizatori where utilizator= '$utilizator'");
		$sql_e= mysqli_query($link,"select * from utilizatori where email= '$email'");
		$sql_p= mysqli_query($link,"select * from utilizatori where telefon= '$telefon'");

        if(ctype_alpha(str_replace(' ', '', $nume)) === false){
			$error_n="<div class='alert alert-danger'><strong>Eraore ! </strong>Numele poate să conţină doar litere.</div>";
		}
		elseif (!preg_match('/^[0-9]*$/', $telefon)) {
			$error_t="<div class='alert alert-danger'><strong>Eraore ! </strong>Numărul de telefon poate să conţin doar cifre .</div>";
		}
		elseif(mysqli_num_rows($sql_u) > 0){
			$error_unume = "<div class='alert alert-danger'><strong>Eroare ! </strong>Numele de utilizator există deja.</div>";
		}
        elseif(mysqli_num_rows($sql_e) > 0){
            $error_email = "<div class='alert alert-danger'><strong>Eroare ! </strong>Emailul există deja..</div>";
        }elseif(mysqli_num_rows($sql_p) > 0){
            $error_telefon = "<div class='alert alert-danger'><strong>Eroare ! </strong>Numărul de telefon exită deja.</div>";
        }
		elseif(strlen($utilizator) < 6 ){
            $error_ua ="<div class='alert alert-danger'><strong>Eroare ! </strong><span>Nume utilizator prea scurt !</span><span>Numele de utilizator trebuie sa contina 6-16 caractere </span></div>";
        }
		elseif(strlen($utilizator) > 16 ){
            $error_ua ="div class='alert alert-danger'><strong>Eroare ! </strong><span>Nume utilizator prea lung !</span> <span>Numele de utilizator trebuie sa contina 6-16 caractere</span></div>";
        }
		 elseif(strlen($parola) < 6 ){
            $error_pw ="div class='alert alert-danger'><strong>Eroare ! </strong><span>Parola prea scurtă !</span> <span>Parola trebuie sa contina 6-16 caractere</span></div>";
        }
		elseif(strlen($parola) > 16 ){
            $error_pw ="div class='alert alert-danger'><strong>Eroare ! </strong><span>Parola prea lungă !</span> <span>Parola trebuie sa contina 6-16 caractere</span></div>";
			
		}
         else{
		    $insert = mysqli_query($link, "insert into utilizatori values('$nume','$utilizator','$parola','$email','$telefon','$fotografie')");
            if($insert){
                //echo "Intregistrare reusita!" ;
				redirect ('autentificare.php');
            }else
			{
                echo "Inregistrarea nu a reusit, va rugam introduceti date valide";
            }
		}
	}
?>

