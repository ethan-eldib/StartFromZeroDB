<?php

require_once('dbConnect.php');

function redBorderIfRequiredFlied(string $inputValue): string
{
    return isset($_POST["$inputValue"]) && empty($_POST["$inputValue"]) ? "border border-danger" : "";
}

$inputNom = "";
$inputRace = "";
$inputAge = "";
$inputTechnique = "";
$inputTransformation = "";
$inputPlanetOrigin = "";
$inputStatut = "";
$inputStory = "";
$inputApparition = "";
$inputDoubling = "";


if (
    isset($_REQUEST['nom']) &&
    isset($_REQUEST['race']) &&
    isset($_REQUEST['age']) &&
    isset($_REQUEST['technique']) &&
    isset($_REQUEST['transformation']) &&
    isset($_REQUEST['planet_origin']) &&
    isset($_REQUEST['statut']) &&
    isset($_REQUEST['story']) &&
    isset($_REQUEST['apparition']) &&
    isset($_REQUEST['doubling'])
) {
    $inputNom = $_REQUEST['nom'];
    $inputRace = $_REQUEST['race'];
    $inputAge = $_REQUEST['age'];
    $inputTechnique = $_REQUEST['technique'];
    $inputTransformation = $_REQUEST['transformation'];
    $inputPlanetOrigin = $_REQUEST['planet_origin'];
    $inputStatut = $_REQUEST['statut'];
    $inputStory = $_REQUEST['story'];
    $inputApparition = $_REQUEST['apparition'];
    $inputDoubling = $_REQUEST['doubling'];
}

if (
    !empty($inputNom) &&
    !empty($inputRace) &&
    !empty($inputAge) &&
    !empty($inputTechnique) &&
    !empty($inputTransformation) &&
    isset($inputPlanetOrigin) &&
    isset($inputStatut) &&
    isset($inputStory) &&
    isset($inputApparition) &&
    isset($inputDoubling)
) {
    // Requête préparée
    /** @var PDO $pdo */
    $prepare = $pdo->prepare("INSERT INTO personnage (nom, race, age, technique, transformation, planet_origin, statut, story, apparition, doubling) VALUES (:nom, :race, :age, :technique, :transformation, :planet_origin, :statut, :story, :apparition, :doubling)");
    $prepare->bindParam(':nom', $inputNom);
    $prepare->bindParam(':race', $inputRace);
    $prepare->bindParam(':age', $inputAge);
    $prepare->bindParam(':technique', $inputTechnique);
    $prepare->bindParam(':transformation', $inputTransformation);
    $prepare->bindParam(':planet_origin', $inputPlanetOrigin);
    $prepare->bindParam(':statut', $inputStatut);
    $prepare->bindParam(':story', $inputStory);
    $prepare->bindParam(':apparition', $inputApparition);
    $prepare->bindParam(':doubling', $inputDoubling);
    $prepare->execute();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dragon ball WIKI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <img src="https://img.icons8.com/nolan/256/dragon-ball.png" alt="logo dragon ball"/>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <div class="form-group mb-5 row">
            <label class="control-label col-6">
                Nom*
                <input class="form-control <?= redBorderIfRequiredFlied("race") ?>"
                       type="text"
                       name="nom"
                       placeholder="Vegeta"
                       value="<?= $inputNom ?>"
                >
            </label>
            <label class="control-label col-6">
                Race*
                <input class="form-control <?= redBorderIfRequiredFlied("race") ?>"
                       type="text"
                       name="race"
                       placeholder="Saiyan"
                       value="<?= $inputRace ?>"
                >
            </label>
            <label class="control-label col-6">
                Âge*
                <input class="form-control <?= redBorderIfRequiredFlied("age") ?>"
                       type="text"
                       name="age"
                       placeholder="30"
                       value="<?= $inputAge ?>"
                >
            </label>
            <label class="control-label col-6">
                Technique*
                <input class="form-control <?= redBorderIfRequiredFlied("technique") ?>"
                       type="text"
                       name="technique"
                       placeholder="Final Flash, Big Bang Attack"
                       value="<?= $inputTechnique ?>"
                >
            </label>
            <label class="control-label col-6">
                Transformation*
                <input class="form-control <?= redBorderIfRequiredFlied("transformation") ?>"
                       type="text"
                       name="transformation"
                       placeholder="Super Saiyan, Super Saiyan Blue"
                       value="<?= $inputTransformation ?>"
                >
            </label>
            <label class="control-label col-6">
                Planète d'origine
                <input class="form-control"
                       type="text"
                       name="planet_origin"
                       placeholder="Planète Vegeta"
                       value="<?= $inputPlanetOrigin ?>"
                >
            </label>
            <label class="control-label col-6">
                Statut
                <input class="form-control"
                       type="text"
                       name="statut"
                       placeholder="Saiyan de rang élite"
                       value="<?= $inputStatut ?>"
                >
            </label>
            <label class="control-label col-6">
                Histoire
                <input class="form-control"
                       type="text"
                       name="story"
                       placeholder="Il est né vers 732. Dans sa jeunesse, il a vu son père..."
                       value="<?= $inputStory ?>"
                >
            </label>
            <label class="control-label col-6">
                Apparition
                <input class="form-control"
                       type="text"
                       name="apparition"
                       placeholder="DBZ: épisode 3"
                       value="<?= $inputApparition ?>"
                >
            </label>
            <label class="control-label col-6">
                Doublage
                <input class="form-control"
                       type="text"
                       name="doubling"
                       placeholder="VF: Eric Legrand"
                       value="<?= $inputDoubling ?>"
                >
            </label>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <input type="reset" class="btn btn-secondary">
            </div>
        </div>
    </form>

    <!--J'affiche les résultats dans un tableau-->
    <?php
    $sql = "SELECT * FROM personnage";
    /** @var PDO $pdo */
    $results = $pdo->query($sql)->fetchAll();

    if (!empty($results)) {
        echo "<table class='table table-sm m-5'>";
        echo "<tr><th>Nom</th><th>Race</th><th>Âge</th><th>Technique</th><th>Transformation</th><th>Planète d'origine</th><th>Statut</th><th>Histoire</th><th>Apparition</th><th>Doublage</th><tr>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['race'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['technique'] . "</td>";
            echo "<td>" . $row['transformation'] . "</td>";
            echo "<td>" . $row['planet_origin'] . "</td>";
            echo "<td>" . $row['statut'] . "</td>";
            echo "<td>" . $row['story'] . "</td>";
            echo "<td>" . $row['apparition'] . "</td>";
            echo "<td>" . $row['doubling'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-info'>Aucun enregistrement en base de données</div>";
    }
    ?>
</div>
</body>
</html>
