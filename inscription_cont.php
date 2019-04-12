<!DOCTYPE html>
<html>
    <head>
        <meta http-esqiv="content-Type" content="text/html">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/style.css">
        <title>Ajout nouveau contact</title>
    </head>
    <body>
        <div id="container">
            <h1>Ajout nouveau contact</h1>
            <form  name="formcontact" method="POST" action="inscriptioncontact.php">

            Nom: <input type="text" name="nom" placeholder="Nom"><br>
            Prénom: <input type="text" name="prenom" placeholder="Prénom"><br>
            Phone: <input type="number" name="phone" placeholder="Phone"><br>
            Email: <input type="text" name="email" placeholder="Email"><br>
            Société :    
            <select name="societe">
            <?php  
            $bdd = new PDO('mysql:host=localhost;dbname=id9274516_compta;charset=utf8', 'root', 'pigoc-ppa');     
            $resultat = $bdd->query('SELECT * FROM societes');
            $options = "";
            while ($donnees = $resultat->fetch())
            {
                $options = $options."<option value=\"$donnees[0]\">$donnees[1]</option>";

            }
            ?>


            
            <?php echo $options;?>
            <? $resultat->closeCursor(); ?>
            </select><br>


            <button type="submit" values="submit">submit</button>
</form>

        </div>
    </body>
</html>