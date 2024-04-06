<?php 
require_once "connexion.php";

$id=$_POST['note_id'];

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : ".$conn->connect_error);
}

$sql2 = "Delete * from  note  Where id=".$id  ;
$result = $conn->query($sql2);
header("Location: gestion_note.php");
exit;