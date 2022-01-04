<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier formulaire</title>
</head>
<body>

<?php 
 var_dump($_GET);

 $test = htmlspecialchars($_GET['age']);

 $test2 = filter_var($_GET['age'], FILTER_SANITIZE_STRING);

 $test3 = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);

 var_dump($test3);


 if(!empty($_GET['prenom']) && !empty($_GET['age'])){
    echo '<strong>'.$_GET['prenom'].' comment ça va ? Tu as '.$test2 .'ans</strong>';
 }
?>

<form action="traitement.php" method="get" class="form-example">
  <div class="form-example">
    <label for="name">Renseigner votre nom: </label>
    <input type="text" name="prenom" id="name" required>
  </div>
  <div class="form-example">
      <label for="age">Renseigner votre âge: </label>
      <input type="number" min="0" name="age" id="age">
  </div>

  
  <div class="form-example">
    <label for="email">Enter your email: </label>
    <input type="email" name="email" id="email" required>
  </div>

  <div class="form-example">
    <input type="submit" value="Enregistrer">
  </div>
</form> 
</body>
</html>

<!-- 

Pour qu'un formulaire fonctionne, je veux :
    1) que mon utilisateur puisse remplir des données
    2) que mon utilisateur puisse les envoyer
    3) que moi en tant qu'éditeur de site internet je puisse récupérer ses données

Un formulaire peut être consitué de différentes types de données, exemple :
    du text, une liste de choix, case à cocher, boutons radio, des chiffres, etc ...
    Pour retrouver l'ensemble des valeurs de l'attribut type d'un input, cf la documentation : https://developer.mozilla.org/fr/docs/Web/HTML/Element/Input

    Dans un 1 temps pour faire fonctionner un formulaire simple, voici les éléments essentiels dont j'ai besoin : 
        1) je crée un élément html <form>
        2) je crée au minimum 2 inputs, le premier qui correspond à une donnée que je veux récupérer et le deuxième qui correspond à l'envoi de mon formulaire
        3) je définis la méthode utilisée pour envoyer les données via l'attribut method de mon élément form et je précise vers quelle adresse je veux envoyer ces données via l'attribut action de mon élément form.
-->

<!-- 
Si je veux transmettre des données, mes inputs doivent contenir un attribut name qui va associer un nom (une clé) à la valeur (c'est à dire la donnée entrée par l'utilisateur)

Pour récupérer ma donnée, je peux utiliser les super-globales PHP 

EXEMPLE DE LA METHODE GET
Avec la méthode get, les données transmises par l'utilisateur via le formulaire transittent en clair vers le serveur via l'url selon le modèle suivant : 
    www.example.com/formulaire/?nomdelattributname=valeurremplieparlutilisateur&nomdelattributname=valeurremplieparlutilisateur

Les paramètres de l'URL sont reçus par le serveur web, qui, avec php installé dessus, via permettre de peupler la super-globale $_GET. Nous pourrons dès lors utiliser en front les données remplies par l'utilisateur en faisant par exemple echo $_GET['nomduchamp'].
La super-globale $_GET est un tableau associatif. 

ATTENTION avec la méthode get les données transittent en clair via l'URL DONC !! on ne fait pas transiter de données sensibles, exemple : données à caractères personnelles et données de connexion (type login/mot de passe). Pour ce type de données sensibles on utilisera la méthode post. 

ATTENTION A LA SECURISATION DE VOTRE SITE
1) Les dispositifs de sécurisation en FRONT ne sont JAMAIS JAMAIS JAMAIS suffisants
exemple : dans notre formulaire, sur l'input age, via le front et plus précisément via l'attribut type de notre input, nous pensons avoir empêché notre utilisateur de remplir autre chose qu'un chiffre dans cet espace. 
OR comme nous l'avons vu, il peut directement manipuler les paramètres de l'URL pour par exemple injection du code HTML ou javascript malveillant. 
exemple d'injection htlm via méthode get : http://bts/formulaire/?prenom=Victor&age=<h1>prout%3C/</h1> 

2) il faut TOUJOURS TOUJOURS contrôler et nettoyer les données qui nous sont transmises par l'utilisateur (pour mémo NEVER TRUST THE USER INPUT) et donc sécuriser notre site en BACK.
Une sécurisation seulement en front = site NON sécurisé. 

Pour cela, php met à disposition une série de filtres de nettoyage, cf doc :https://www.php.net/manual/fr/filter.filters.sanitize.php
nous avons aussi la fonction htmlspecialchars : https://www.php.net/manual/fr/function.htmlspecialchars.php

Donc dès lors que je reçois et ensuite j'utilise une données de l'utilisateurs, je nettoye cette donnée et met en place des contrôles pour m'assurer qu'elle correspond bien au format que j'attends. Si ce n'est pas le cas, je mets en place des contrôles pour supprimer tout risque pour mon système. 
-->