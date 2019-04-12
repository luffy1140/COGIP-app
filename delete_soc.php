<?php
session_start();


echo $_SESSION['login'];

if (empty($_SESSION['login']) || empty($_SESSION['password'])){
header('Location:connexion.html');}



if (isset($_GET["id"])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');

    $id = $_GET["id"];

    $sql = "DELETE FROM societes WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');

  $sql = "SELECT * FROM societes";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>


<h2>Modification</h2>


<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nom société</th>
      <th>pays</th>
      <th>tva</th>
      <th>type</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["nom_societe"]; ?></td>
      <td><?php echo $row["pays"]; ?></td>
      <td><?php echo $row["tva"]; ?></td>
      <td><?php echo $row["type"]; ?></td>

      <td><a href="delete_soc.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
      <td><a href="update_soc.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
    </tr>

  <?php endforeach; ?>
  </tbody>

<a href="logout.php" >Logout</a>
</table>
