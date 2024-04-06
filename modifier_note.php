<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion note</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
<style>
  .icone-1{
    position: relative;
    width: 40px;
    height: 40px;
    background-color: white;
    border-radius: 50%;
    margin-right: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color:#1a1613;
  }
</style>
<nav class="navbar navbar-expand-lg container-fluid navbar-light" style="position: relative; background-color: #E3DCD6;">
        <div class="container" >
          <a class="navbar-brand" href="index.html" style="color: #8C5627;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
          </svg></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav" style=" position: relative;">
            <ul class="navbar-nav" style="position: absolute;right: 0!important;  ">
           
                
              <li class="nav-item">
                <a class="nav-link" href="gestion_note.php" style="color: #8C5627;">Gestion note</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Apropos.html" style="color: #8C5627;">A propos</a>
              </li>
           
             
            </ul>
          </div>
        </div>
      </nav>
<div class="titre_notre" style="display: block; height: 300px; background-color: #8C5627;">
        <div class="container">
            <h2 class="text-light" style="padding-block-start:50px ;">Formulaire de modification  de note</h2>
        </div>

      </div>
      <div class="container" style="padding-block-start:100px ;"> 


    <div class="col-7">
        
        

    
    <form method="post" action="MoficationFunction.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Note de l'etudiant</label>
          <?php
          $note_id=$_POST['note_id'];
          require_once "connexion.php";
          if ($conn->connect_error) {
              die("Erreur de connexion à la base de données : " . $conn->connect_error);
          }
              $sql1 ="SELECT * from note where id=".$note_id;
          $resultetudiant = $conn->query($sql1);
         
            if ($resultetudiant->num_rows > 0) {
                      while ($row = $resultetudiant->fetch_assoc()) {
                        echo (" <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' name='note' value='".$row['note']."'> <input type='hidden'  value='".$row['id']."'  name='id' ");
          
                      }
                    }

          ?>
        
          
        </div>
        <div class="space" style="display: block;height:40px"></div>
        
        <button type="submit" class="btn btn-primary" style="background-color: #8C5627;border: none;">Modifier la note</button>
      
      
            
      </form>
      </div>
    

    
</body>
</html>