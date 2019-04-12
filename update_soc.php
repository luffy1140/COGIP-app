<?php
session_start();
if (empty($_SESSION['login']) || empty($_SESSION['password'])){
header('Location:connexion_soc.html');}
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');
    $user =[
      "id"        => $_POST['id'],
      "nom_societe" => $_POST['nom_societe'],
      "pays"  => $_POST['pays'],
      "tva"     => $_POST['tva'],
      "type"       => $_POST['type']

    ];

    $sql = "UPDATE societes
            SET id = :id,
              nom_societe = :nom_societe,
              pays = :pays,
              tva = :tva,
              type = :type
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
  $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');
    $id = $_GET['id'];
    $sql = "SELECT * FROM societes WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "erreur";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo $_POST['nom_societe']; ?> a été modifié.
<?php endif; ?>

<h2>Modifier société</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="delete_soc.php">Retour</a>
