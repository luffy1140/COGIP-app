<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<body>
    <header>
        <div id="logo">
            <p>COGIP<br>logo</p>
        </div>
        <div>
            <ul>
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="factures.php">Factures</a></li>
                <li><a href="inscription_soc.html">Sociétés</a></li>
                <li><a href="inscription_cont.php">Contact</a></li>
                <li><a href="connexion_soc.html">Connexion</a></li>
            </ul>
        </div>
    </header>
</body>
</html>
<?php //contatc


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


<h2>Contact</h2>


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
      <td><a href="detailcontact.php"><?php echo $row["id"]; ?></a></td>
      <td><?php echo $row["nom"]; ?></td>
      <td><?php echo $row["prenom"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["societes_id"]; ?></td>

     
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php //societe


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


<h2>Societes</h2>


<table>
  <thead>
    <tr>
      <th>#</th>
      <th>nom societe</th>
      <th>pays</th>
      <th>tva</th>
      <th>type</th>
      
    

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><a href="detailcontact.php"><?php echo $row["id"]; ?></a></td>
      <td><?php echo $row["nom_societe"]; ?></td>
      <td><?php echo $row["pays"]; ?></td>
      <td><?php echo $row["tva"]; ?></td>
      <td><?php echo $row["type"]; ?></td>
      
     
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>


<?php
//facture

if (isset($_GET["id"])) {
  try {
    $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');

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
  $connection = new PDO('mysql:host=localhost;dbname=compta;charset=utf8', 'root', '');

  $sql = "SELECT * FROM Factures";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>


<h2>Factures</h2>


<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nom factures</th>
      <th>Date factures</th>
      <th>Personnes id</th>
      <th>societe_id</th>
    

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><a href="detailcontact.php"><?php echo $row["id"]; ?></a></td>
      <td><?php echo $row["nom_factures"]; ?></td>
      <td><?php echo $row["date_factures"]; ?></td>
      <td><?php echo $row["personnes_id"]; ?></td>
      <td><?php echo $row["societes_id"]; ?></td>
      

     
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

