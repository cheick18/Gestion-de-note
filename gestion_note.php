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
            <h2 class="text-light" style="padding-block-start:50px ;">Gestion de vos notes</h2>
        </div>

      </div>
      <div class="table_button container" style="position: relative; padding-block-start: 80px;">

   
      <table class="table " >
        <thead>
          <tr>
           
            <th scope="col">Nom </th>
            <th scope="col">Prenom</th>
            <th scope="col">Module</th>
            <th scope="col">Note</th>
            <th scope="col">Gestion de note</th>
          </tr>
        </thead>
        <tbody>
     
        <?php 
require_once "connexion.php";

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : ".$conn->connect_error);
}

$sql2 = "SELECT * FROM note";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql_nom_etudiant= "SELECT * from etudiant where id=".$row['id_etudiant'];
        $result_nom_etudiant = $conn->query($sql_nom_etudiant);
        $row_nom_etudiant = $result_nom_etudiant->fetch_assoc(); // Récupérer les données de l'étudiant

        $sql_nom_module= "SELECT * from module where id=".$row['module_id'];
        $result_nom_module = $conn->query($sql_nom_module);
        $row_nom_module = $result_nom_module->fetch_assoc(); // Récupérer les données du module
        

        echo "<tr><td>".$row_nom_etudiant['nom']."</td><td>".$row_nom_etudiant['prenom']."</td><td>".$row_nom_module['nom_module']."</td><td>".$row['note']."</td> <td> <div class='row'>  <div class='col-4'>  <form method='POST' action='modifier_note.php'> <input type='hidden'  name='note_id' value='".$row_nom_etudiant['id']." '  /> <input type='hidden'  name='note_id' value='".$row['id']." '  /> <button style='display:flex; justify-content: center; align-items: center;background-color: #E3DCD6;border:none;color: #8C5627;'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
      </svg></button></form> </div> <div class='col-6'> <form method='POST' action='Suppression.php'><input type='hidden'  name='note_id' value='".$row['id']." ' />  <button style='display:flex; justify-content: center; align-items: center;background-color: #E3DCD6;border:none; color: #8C5627;'>  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
      <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
    </svg></button></form> </div> </div></td></tr>";

   

  
    }

   
}
?>

        
        </tbody>
      </table>



    </div>
<div class="space" style="display: block;height: 80px;"></div>
<form action="ajouter_note.php" method="get">



<button class="btn  btn-lg " style="background-color: #8C5627; width: 500px; text-align: center; color: white; position: relative; left: 50%; transform: translate(-50%);">Ajouter une note</button>
</a> 
</form> 
<div class="sapce_" style="display: block; height: 100px;">

</div>

<div class="titre_notre" style="display: block; height: 200px; background-color: #8C5627;  position: relative;">
  <div class="" style="position: relative; top: 50%; left: 50%; width: 300px; transform: translate(-50%,-50%);">
     <div class="icone_text" style="display: flex; ">
      <a href=" https://github.com/">   <div class="icone-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
      </svg></div> </a>

      <a href="https://www.linkedin.com/">
      <div class="icone-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
      </svg></div>
    </a>
    <a href="https://www.facebook.com/">
      <div class="icone-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
      </svg></div>
    </a>
    <a href=" https://www.youtube.com/">
      <div class="icone-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
      </svg></div>
    </a>

     </div>
  </div>

</div>
<div class="opcity-texte" style="display: block; height: 80px; background-color:#8c5627b3;">
  <h5 class="text-center pt-4" style="  color:#1a1613;">  © 2024 Copyright:
    <a class="text-white" href="#">WAGAcheick.com</a></h5>
</div>

</body>
</html>