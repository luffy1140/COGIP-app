<?php


if (isset($_POST['submit'])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'id9274516_root', '');
    $user =[
      "id"        => $_POST['id'],
      "nom" => $_POST['nom'],
      "prenom"  => $_POST['prenom'],
      "phone"     => $_POST['phone'],
      "email"       => $_POST['email'],
      "societes_id" => $_POST['societes_id']
    ];

    $sql = "UPDATE personnes
            SET id = :id,
              nom = :nom,
              prenom = :prenom,
              phone = :phone,
              email = :email,
              societes_id = :societes_id
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
  $connection = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'id9274516_root', '');
    $id = $_GET['id'];
    $sql = "SELECT * FROM personnes WHERE id = :id";
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
  <?php echo $_POST['nom']; ?> a été modifié.
<?php endif; ?>

<h2>Modifier société</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="deleteContact.php">Retour</a>