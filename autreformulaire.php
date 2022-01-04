<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon formulaire en post</title>
</head>
<body>

<!-- Ici nous utilisons notre formulaire le méthode post. Comme on a pu le voir cela fonctionne de la même manière que la méthode get à 2 grosses différences :
1) c'est la super-global $_POST qui stocké nos données
2) les données de mes utilisateurs ne transitent pas en clair comme paramètres de l'url, c'est donc la méthode à utiliser pour toutes les données personnelles et sensibles.
-->

<?php 

var_dump($_POST);

if(!empty($_POST['sexe']) && !empty($_POST['email'])){
    echo '<strong> Mon sexe est'.$_POST['sexe'].' et mon email est le suivant '.$_POST['email'] .'</strong>';
 }

?>

<form action="" method="post" class="form-example">
  <div class="form-example">
    <label for="sexe">Renseigner votre sexe: </label>
    <input type="radio" name="sexe" id="femme" value="femme" checked>
    <label for="femme">Je suis une femme</label>

    <input type="radio" name="sexe" id="homme" value="homme" required>
    <label for="homme">Je suis un homme</label>

  </div>
  <div class="form-example">
      <label for="lieu">Vous habitez : </label>
      <label for="ville"> En Ville </label>
      <input type="checkbox" name="lieudevie" id="ville" value="ville">
      <label for="campagne"> A la campagne </label>
      <input type="checkbox" name="lieudevie" id="campagne" value="campagne">
      <label for="parent"> Chez mes parents </label>
      <input type="checkbox" name="lieudevie" id="parent" value="chezmesparents" checked>
      <label for="colocation"> En colocation </label>
      <input type="checkbox" name="lieudevie" id="colocation" value="colocation">
  </div>

  
  <div class="form-example">
    <label for="email">Enter your email: </label>
    <input type="email" name="email" id="email" required>
  </div>

  <div class="form-example">
      <label for="chien">Quel est votre chien préféré ?</label>
      <select name="chiens" id="chien" multiple>
        <option value="">--Choisissez parmi les suivants--</option>
        <option value="beagle">Beagle</option>
        <option value="labrador">Labrador</option>
        <option value="chihuahua">Chihuahua</option>
      </select>
  </div>

  <div class="form-example">
    <input type="submit" value="Enregistrer">
  </div>
</form> 
</body>
</html>
</body>
</html>