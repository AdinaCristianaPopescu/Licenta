<?php 
     session_start();
  include 'php/conexiune.php';
include 'php/inreg.php';

    $not= "";
    $res = mysqli_query($link,"select * from utilizatori where utilizator='$_SESSION[stud]'");
    $not= mysqli_num_rows($res);
 ?>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="css/dashboard.css"> 
  <link rel="stylesheet" href="css/profil.css"> 
 <style>
 *{
    margin: 0;
    padding: 0;
}
body{
    font-family: 'Montserrat', sans-serif;
    background-color: #e3ecf8;
    background-position: top center; 
    background-size: 980px 559px;
	overflow:scroll;
}
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #c2c9d3;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #c2c9d3;
  color: #000000;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}
.p1 {
  font-family: 'Brush Script MT', cursive;
  align: center;
}
.float-container {

    padding-left: 50px;
	padding-top: 100px;
}

.float-child {
    width: 30%;
    float: left;
    padding: 20px;

}  

 </style>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-sm navbar-light bg-muted" style="background-color: #c2c9d3;">
        <div class="container-fluid">
            <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="dashboard.php">Acasa</a>
            <a href="profilutilizator.php">Profil</a>
            <a href="books.php">Carti</a>
            <a href="contact.php">Contact</a>
           </div>
           <div id="main">
           <button class="openbtn" onclick="openNav()">☰</button>  
		   </div>
          <i class="fa-solid fa-books">DIGIbooks</i>
		  
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $_SESSION["stud"]; ?></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="profilutilizator.php" class="dropdown-item">Profil</a>
								<a href="adaugarecarteutilizatori.php" class="dropdown-item">Adăugă propia carte</a>
                            <div class="dropdown-divider"></div>
                            <a href="deconectare.php" class="dropdown-item">Deconectare</a>
                        </div>
                    </li>
                </ul>
        
        </div>
    </nav>    
</div>
<div class="float-container">
 <div class="float-child">

					<div class="row">
						<div class="col-md-3">
							<div class="photo">
								<?php
                                    $res = mysqli_query($link, "select * from utilizatori where utilizator='".$_SESSION['stud']."'");
                                    while ($row = mysqli_fetch_array($res)){
                                        ?><img src="<?php echo $row["fotografie"]; ?> " height="200" width="200" alt="something wrong"></a> <?php
                                    }                                                            

                                ?>
							</div>
							<div class="uploadPhoto">
								<div class="gap-30"></div>
								<form action="" method="post" enctype="multipart/form-data">
									<input type="file" name="image" class="modal-mt" id="image">
									<div class="gap-30"></div>
									<input type="submit" class="modal-mt btn btn-info" value="Incarca imaginea" name="submit">
								</form>
							</div>
                            <?php 
                                if (isset($_POST["submit"])) {
                                    $image_name=$_FILES['image']['name'];
                                    $temp = explode(".", $image_name);
                                    $newfilename = round(microtime(true)) . '.' . end($temp);
                                    $imagepath="/licenta/Utilizatori/".$newfilename;
									$imagelocation="C:/xampp/htdocs/licenta/Utilizatori/".$newfilename;
                                    move_uploaded_file($_FILES["image"]["tmp_name"],$imagelocation);
                                    mysqli_query($link, "update utilizatori set fotografie='".$imagepath."' where utilizator='".$_SESSION['stud']."'");
                                    ?>
                                        <script type="text/javascript">
                                            window.location="profilutilizator.php";
                                        </script>
                                    <?php
                                }
                            ?>
						</div>
 </div>		
</div> 
  <div class="float-child">
						<div class="col-md-9">
							<div class="details">
                                <?php
                                       $res5 = mysqli_query($link, "select * from utilizatori where utilizator='$_SESSION[stud]' ");
                                       while($row5 = mysqli_fetch_array($res5)){       
										   $nume  = $row5['nume'];
                                           $utilizator     = $row5['utilizator'];
                                           $email      = $row5['email'];
                                           $telefon      = $row5['telefon'];
                                       }
                                    ?>
                                <form method="post">
                                    <div class="form-group details-control">
                                    <label for="nume" class="text-right">Nume <span>*</span></label>
                        <input type="text" class="form-control custom" value="<?php echo $nume; ?>" pattern="[A-Z]{1}[a-z]*[[-]*[A-Z]{1}[a-z]*]*" required title="Prenume invalid.Prenumele trebuie sa inceapa cu litera mare si sa contina doar litere"placeholder="" name="nume"/>
                    </div>
                    <div class="form-group">
                    <label for="utilizator" class="text-right">Nume utilizator <span>*</span></label>
						<br><input type="text" class="form-control custom" placeholder="" name="utilizator" value="<?php echo $utilizator; ?>" />
                    </div>
                     <?php if(isset($error_ua)):?> 
                     <span class="error"> <?php echo $error_ua; ?></span>
                      <?php endif ?>
                      <?php if(isset($error_unume)):?> 
                     <span class="error"> <?php echo $error_unume; ?></span>
                      <?php endif ?>        
                    <div class="form-group">
                   <label for="email" class="text-right">Email <span>*</span></label>
				   <br><input type="text" class="form-control custom" placeholder="" name="email" value="<?php echo $email; ?>"/>
                    </div>
                    <?php if(isset($e_msg)):?> 
                    <span class="error"><?php echo $e_msg; ?> </span>
                    <?php endif ?>
                    <?php if(isset($error_email)):?> 
                    <span class="error"><?php echo $error_email; ?> </span>
                    <?php endif ?>
                    <div class="form-group">
                    <label for="telefon" class="text-right">Numar telefon <span>*</span></label>
					<br><input type="text" class="form-control custom" placeholder="" name="telefon" value="<?php echo $telefon; ?>"/>
                    </div>
                    <?php if(isset($error_telefon)):?> 
                    <span class="error"><?php echo $error_telefon; ?></span>
                      <?php endif ?>		                    
                                    <div class="text-right mt-20">
                                        <input type="submit" value="Salveaza" class="btn btn-info" name="update">
                                    </div>
                                <?php
                                ?>
                                </form>
			                </div> 
                            <?php
                               if (isset($_POST["update"])){
                                   mysqli_query($link, "update utilizatori set nume='$_POST[nume]',
								   utilizator='$_POST[utilizator]',
								   email='$_POST[email]',
                                   telefon='$_POST[telefon]'
                                   where utilizator='$_SESSION[stud]'");
                                    ?>
                                        <script type="text/javascript">
                                            window.location="profilutilizator.php";
                                        </script>
                                    <?php
                               }
                            ?>
		                </div>    
					
				</div>
	</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>