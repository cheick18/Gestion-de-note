<?php 
require_once "connexion.php";

$note=$_POST['note'];
$id=$_POST['id'];

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : ".$conn->connect_error);
}

$sql2 = "UPDATE note SET note='$note'  Where id=".$id  ;
$result = $conn->query($sql2);
header("Location: gestion_note.php");
exit;