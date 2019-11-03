<?php require_once("header.php"); ?>
<?php
if(isset($_GET['id'])) {
    $key = $_GET['id'];
}
else {
    header('location: index.php');
}
?>

<?php
$assoTitreError = "";
$assoImageError = "";
$assoTexteError = "";
$assoLienError = "";
$formError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['asso_titre']) AND isset($_POST['asso_image']) AND isset($_POST['asso_texte']) AND isset($_POST['asso_lien'])) {
$link = mysqli_connect("localhost", "Valentin", "Praline41", "My-Green-City");

if(!empty($_POST['asso_titre'])) {
$titre = trim($_POST['asso_titre']);
$titreSecurity = true;
}
else {

$assoTitreError = "Error. Please please fill out the title field.";
$titreSecurity = false;

}

if(!empty($_POST['asso_image'])) {
$image = trim($_POST['asso_image']);
$imageSecurity = true;
}
else {
$assoImage = "Error. Please please fill out the image asso link field.";
$imageSecurity = false;
}
if(!empty($_POST['asso_texte'])) {
$description = trim($_POST['asso_texte']);
$descriptionSecurity = true;
}
else {
$assoTexteError = "Error. Please please fill out the description field.";
$descriptionSecurity = false;
}
if(!empty($_POST['asso_lien'])) {
$lien = trim($_POST['asso_lien']);
$lienSecurity = true;
}
else {
$assoLienError = "Error. Please please fill out the link field.";
$lienSecurity = false;
}

if($titreSecurity AND $imageSecurity AND $descriptionSecurity AND $imageSecurity AND $lienSecurity) {

    $query = "UPDATE Associations SET titre = :titre, image = :image, description = :description, lien_asso = :lien_asso WHERE id = :id";
$statement = $pdo->prepare($query);

$statement->bindValue(':titre', $titre, \PDO::PARAM_STR);
$statement->bindValue(':image', $image, \PDO::PARAM_STR);
$statement->bindValue(':description', $description, \PDO::PARAM_STR);
$statement->bindValue(':lien_asso', $lien, \PDO::PARAM_STR);
$statement->bindValue(':id', $key, \PDO::PARAM_INT);

$statement->execute();
header('location: index.php?modify=success');

}
else {
$formError = "Error. Please please fill out the form completely..";
}
}
else {
$formError = "Error. Please please fill out the form completely..";
}
}
?>

<h1>Modify a Association:</h1>

<form method="post">
    <?php


    $query = "SELECT titre, image, description, lien_asso  FROM Associations WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $key, \PDO::PARAM_INT);
    $statement->execute();
    $Associations = $statement->fetchAll();
    foreach ($Associations as $Association) {


        ?>
        <p class="align-input"><label for="titre">Nom de l'association:</label></p>
        <p class="align-input"><input type="text" id="titre" name="asso_titre" value="<?php echo $Association['titre']; ?>"required></p>
        <?php
        if (!empty($assoTitreError)) {

            ?>
            <h2><?php echo $assoTitreError; ?></h2>
            <?php
        }
        ?>
        <p class="align-input"><label for="image">Chemin de l'image de l'association</label></p>
        <p class="align-input"><input type="text" id="image" name="asso_image" required value="<?php echo $Association['image']; ?>"></p>
        <?php
        if (!empty($assoImageError)) {

            ?>
            <h2><?php echo $assoImageError; ?></h2>
            <?php
        }
        ?>

        <p class="align-input"><label for="description">Description de l'association</label></p>
        <p class="align-input"><textarea id="description" name="asso_texte" required><?php echo $Association['description']; ?></textarea></p>
        <?php
        if (!empty($assoTexteError)) {

            ?>
            <h2><?php echo $assoTexteError; ?></h2>
            <?php
        }
        ?>

        <p class="align-input"><label for="lien">Lien de l'association</label></p>
        <p class="align-input"><input type="url" id="lien" name="asso_lien" value="<?php echo $Association['lien_asso']; ?>" required></p>
        <?php
        if (!empty($assoLienError)) {

            ?>
            <h2><?php echo $assoLienError; ?></h2>
            <?php
        }
        ?>

        <p class="align-input"><input type="submit" value="modify"></p>

        <?php
        if (!empty($formError)) {

            ?>
            <h2><?php echo $formError; ?></h2>
            <?php
        }
        ?>
<?php
    }
    ?>
</form>

<div class="box-return">
    <a href="index.php" class="btn btn-primary">retour</a>
</div>

<?php require_once("footer.php"); ?>
