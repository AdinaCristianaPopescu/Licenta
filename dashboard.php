<?php 
     session_start();
  $count = 0;
  include 'php/conexiune.php';
  include 'php/ultimelecarti.php';

  $query = "SELECT ISBN, imgcarte FROM carti";
  $result = mysqli_query($link, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($link);
    exit;
  }
    $not= "";
    $res = mysqli_query($link,"select * from utilizatori where utilizator='$_SESSION[stud]'");
    $not= mysqli_num_rows($res);
	$row = selectultimelecarti($link);
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
 <link rel="stylesheet" href="css/carousel.css"> 
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
<marquee width="100%" direction="left" height="100px">
"A construi o bibliotecă înseamnă a crea o viață. Biblioteca nu va fi niciodată o colecție
întâmplătoare de cărți. ~Carlos María Domínguez"
</marquee>
<br>
<br>
<br>
<div class="container">
    <input type="radio" name="slider" id="item-1" checked style="display : none;">
    <input type="radio" name="slider" id="item-2" style="display : none;">
    <input type="radio" name="slider" id="item-3" style="display : none;">
  <div class="cards">
    <label class="card" for="item-1" id="song-1">
	   <img src="https://raw.githubusercontent.com/PopescuAdina/css/main/carousel3.jpg" alt="song">
    </label>
    <label class="card" for="item-2" id="song-2">
       <img src="https://raw.githubusercontent.com/PopescuAdina/css/main/carousel2.jpg" alt="song">
    </label>
    <label class="card" for="item-3" id="song-3">
      <img src="https://raw.githubusercontent.com/PopescuAdina/css/main/3.jpg" alt="song">
    </label>
  </div>
<br>					
<div class="lead text-center text-muted">
<p align="center";> - Despre - </p>
<br>
<br>
<p align="center";>DIGIbooks este o platforma destinata tuturor varstelor.<p>
<p align="center";> Scopul acesteia este de a tine locul unei biblioteci clasice, dar in acelasi timp permite utilizatorului sa <br>
 descopere noi carti si autori chiar din confortul casei sau locurile sale favorite</p>
<p align="center";> Platforma noastra permite utilizatorilor sa isi publice propriile scrieri, si ii sprijina in drumul lor catre reusita </p>

</div>
</div>	
<div class="container">  
<p class="lead text-center text-muted">Ultimele carti adaugate</p>
<div class="row" style=" bottom: 0;">
        <?php foreach($row as $carte) { ?>
      	<div class="col-md-3">
      		<a href="book.php?ISBN=<?php echo $carte['ISBN']; ?>">
           <img class="img-responsive img-thumbnail" src="<?php echo $carte['imgcarte']; ?>">
          </a>
      	</div>
        <?php } ?>
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
