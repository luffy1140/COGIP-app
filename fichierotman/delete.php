<?php


if (isset($_GET["id"])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');

    $id = $_GET["id"];

    $sql = "DELETE FROM personnes WHERE id = :id";

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

  $sql = "SELECT * FROM personnes";

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

      <td><a href="deleteContact.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
      <td><a href="updateContact.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>