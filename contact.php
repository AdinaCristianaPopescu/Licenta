<?php 
     session_start();
  $count = 0;
  include 'php/conexiune.php';
  include 'php/ultimelecarti.php';

  $query = "SELECT * FROM carti WHERE Limba='romana'";
  $result = mysqli_query($link, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($link);
    exit;
  }
    

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
  <script>
function myFunction() {
  alert("Se proceseaza informatiile. Va multumim pentru incredere!");
}
</script>
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
.books {
  margin: auto;
  width: 60%;
  padding: 10px;
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
.dropbtn {

  width:90px;
  height:38px;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #DCDCDC;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #DCDCDC;}

.show {display: block;}
.center {
  margin: auto;
  width: 60%;
  padding: 10px;
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
<div class = "center">
<form action="mailto:biblioteca.DIGIbooks@gmail.com" method="post">
<h2>Contacteză-ne!</h2>
Nume utilizator:<br>
<input type="text" name="username"  required >
<br>
<br>
Scrieti un mesaj:<br>
<textarea name="Mesaj" rows="6" cols="30"></textarea>
<br>

<br>

<button onclick="myFunction()">Trimite</button>  
<input type="reset" value="Reset" 
                style="background-color: red; 
                        color: white" />
<br>


<script type="text/javascript">
document.write("Va multumim!")
</script>
</form>
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
<script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</body>
</html>