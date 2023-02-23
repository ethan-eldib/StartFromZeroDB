<?php
require_once('dbConnect.php');

// Requête préparée
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

if (isset($_POST['reset'])) {
    reset($_POST);
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
                <span class="m-4 small text-danger">
                    <?php if ($_POST["nom"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="nom"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["nom"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Race*
                <span class="m-4 small text-danger">
                    <?php if ($_POST["race"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="race"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["race"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Âge*
                <span class="m-4 small text-danger">
                    <?php if ($_POST["age"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="age"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["age"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Technique*
                <span class="m-4 small text-danger">
                    <?php if ($_POST["technique"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="technique"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["technique"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Transformation*
                <span class="m-4 small text-danger">
                    <?php if ($_POST["transformation"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="transformation"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["transformation"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Planète d'origine
                <span class="m-4 small text-danger">
                    <?php if ($_POST["planet_origin"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="planet_origin"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["planet_origin"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Statut
                <span class="m-4 small text-danger">
                    <?php if ($_POST["statut"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="statut"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["statut"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Histoire
                <span class="m-4 small text-danger">
                    <?php if ($_POST["story"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="story"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["story"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Apparition
                <span class="m-4 small text-danger">
                    <?php if ($_POST["apparition"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="apparition"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["apparition"] ?>"
                >
            </label>
            <label class="control-label col-6">
                Doublage
                <span class="m-4 small text-danger">
                    <?php if ($_POST["doubling"] === "") {
                        echo 'Champ requis';
                    } ?>
                </span>
                <input class="form-control"
                       type="text"
                       name="doubling"
                       value="<?= isset($_POST['reset']) ? "" : $_POST["doubling"] ?>"
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
        echo "<table class='table'>";
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
