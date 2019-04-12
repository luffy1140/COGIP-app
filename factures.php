<html>
<head>

<?php 

try
{
	// On se connecte à MySQL
$bd = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'id9274516_root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// triggers when submit button is pressed
if(!empty($_POST['submit'])){

//if all fields are filled, prepare then execute SQL request
  if(!empty($_POST['fact_num']) && !empty($_POST['fact_date']) && !empty($_POST['fact_soc']) && !empty('fact_cont')){
  $req = $bd->prepare('INSERT INTO Factures (nom_factures, date_factures, personnes_id , societes_id) VALUES(:fact_num, :fact_date,:fact_cont, :fact_soc)');
  $req->execute(array(
  'fact_num' => $_POST['fact_num'],
  'fact_date' => $_POST['fact_date'],
  'fact_soc' => $_POST['fact_soc'],
  'fact_cont' => $_POST['fact_cont'],
  ));
  // echo $_POST['fact_num'],
  header('location:factures.php');
  // if empty field, display error msg
  } elseif(empty($_POST['fact_num']) || empty($_POST['fact_date']) || empty($_POST['fact_soc']) || empty($_POST['fact_cont'])){
      echo 'Request not sent: please complete every form field';
    }
}
?>

</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
  <div>
    <label for="num">Numéro de facture</label>
    <input type="text" id="fact_num" name="fact_num" />
  <div>
  <div>
    <label for="date">Date de la facture</label>
    <input type="date" id="fact_date" name="fact_date" />
  </div>
<?

// get personnes ID + names
$resultat = $bd->query('SELECT * FROM personnes');
$options = "";
while ($donnees = $resultat->fetch())
{
$options = $options."<option value=\"$donnees[0]\">$donnees[2] $donnees[1]</option>";
}
?>

<select name="fact_cont">
<?php echo $options;?>
<? $resultat->closeCursor(); ?>
</select>

<?
// get societes ID + names
$resultat = $bd->query('SELECT * FROM societes');
$options2 = "";
while ($donnees = $resultat->fetch())
{
$options2 = $options2."<option value=\"$donnees[0]\">$donnees[1]</option>";
}
?>

<select name="fact_soc">
<?php echo $options2;?>
<? $resultat->closeCursor(); ?>
</select>

<input type="submit" name="submit" value="submit"/>

</form>
</body></html>