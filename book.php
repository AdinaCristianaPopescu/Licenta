<?php
  session_start();
  $ISBN = $_GET['ISBN'];
  include 'php/conexiune.php';
  $query = "SELECT * FROM carti WHERE ISBN = '$ISBN'";
  $result = mysqli_query($link, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($link);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['titlu'];
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
</style>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-sm navbar-light bg-muted" style="background-color: #c2c9d3;">
        <div class="container-fluid">

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
<a href="books.php"> <button style="border: none;">
   <img src="css/arrow.png" width="50" height="35"><a href="books.php">
</button> </a>
     <br>
     <p align="center";>  <?php echo $row['titlu']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="<?php echo $row['imgcarte']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Descriere</h4>
          <p><?php echo $row['descriere']; ?></p>
          <h4>Detalii carte</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "descriere" || $key == "imgcarte" ||  $key == "titlu" ||  $key == "continut"){
                continue;
              }
              switch($key){
                case "titlu":
                  $key = "ISBN";
                  break;
                case "titlu":
                  $key = "Titlu";
                  break;
                case "autor":
                  $key = "Autor";
                  break;

              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($link)) {mysqli_close($link); }
            ?>
          </table>    
           <a href="../../<?php echo $row["continut"]; ?>" class="btn btn-primary">Deschide pdf</a>

       	</div>
      </div>

		
</body>
</html>