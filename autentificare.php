<?php
     session_start();
    include 'php/conexiune.php';



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">

</head>
<body>
    <div class="m-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="inregistrare.php" class="nav-link">Inregistrare</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
	<div class="login registration">
		<div class="wrapper">
			<div class="login-content">
				<div class="login-body">

					<form action="" method="post">
						<div >
						 <label for="nume" class="text-right">Nume</label>
						 <input type="text" name="utilizator" class="form-control" placeholder="" required=""/>
						</div> <br>
						<div>
						 <label for="parola" class="text-right">Parola</label>
						 <input type="password" name="parola" class="form-control" placeholder="" required=""/>
						</div> <br>
						<div>
							<input type="submit" name="login" value="Autentificare">

						</div>
						<br>
                        <span>Utilizator nou?</span>
                        <a href="inregistrare.php" ><span style ="color:#000000;""><u>Înregistrare</u></span></a>
					</form>



				</div>
				<?php
                    if (isset($_POST["login"])) {
                        $count=0;
                        $res= mysqli_query($link, "select * from utilizatori where utilizator='$_POST[utilizator]' && parola= '$_POST[parola]' ");
                        $count = mysqli_num_rows($res);
                        if ($count==0) {
                            ?>
                                <div class="alert alert-warning">
                                <strong style="color:#333">Eroare!</strong> <span style="color: red;font-weight: bold; ">Nume utilizator sau parola gresite.</span>
                                </div>
                            <?php
                        }
                        else{
                            $_SESSION["stud"] = $_POST["utilizator"];
                            ?>
                            <script type="text/javascript">
                                window.location="dashboard.php";
                            </script>
                            <?php
                        }
                    }
                 ?>
			</div>
		</div>
	</div>


	<script src="inc/js/jquery-2.2.4.min.js"></script>
	<script src="inc/js/bootstrap.min.js"></script>
	<script src="inc/js/custom.js"></script>
</body>
</html>