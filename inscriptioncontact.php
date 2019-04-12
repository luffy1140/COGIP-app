<?php
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$societe=$_POST['societe'];
$phone=$_POST['phone'];
$mail =$_POST['email'];

echo $societe; 
echo $prenom;
echo $societe;


$bdd = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'id9274516_root', '');

$req = $bdd->prepare('INSERT INTO personnes (nom,prenom,phone,email,societes_id) VALUES(:nom, :prenom,:phone,:email,:societes_id)');
$req->execute(array(
    'prenom' => $prenom,
    'nom' => $nom,
    'phone' => $phone,
    'email' => $mail,
    'societes_id' => $societe


  ));

 ?>
 <?php
$req->closeCursor();
header('location:deleteContact.php')
  ?>

 
