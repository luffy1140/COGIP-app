<?php


if (isset($_GET["id"])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'root', 'pigoc-ppa');

    $id = $_GET["id"];

    $sql = "DELETE FROM Factures WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'root', 'pigoc-ppa');

  $sql = "SELECT * FROM Factures ";

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
      <th>Nom</th>
      <th>prenom</th>
      <th>phone</th>
      <th>email</th>
      <th>societe_id</th>
    

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["nom"]; ?></td>
      <td><?php echo $row["prenom"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["societes_id"]; ?></td>

      <td><a href="deletefact.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
      <td><a href="updatefact.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>