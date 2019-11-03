<?php
    include_once('header.php');
?>

<?php
if (isset($_GET['create'])) {
?>
    <div class="alert alert-success" role="alert">
        L'association a bien été créé.
    </div>
<?php
}
?>
<?php
if (isset($_GET['modify'])) {
    ?>
    <div class="alert alert-primary" role="alert">
        L'association a bien été modifiée.
    </div>
<?php
}
?>
<?php
if (isset($_GET['delete'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        L'association a bien été supprimée.
    </div>
<?php
}
?>

<h1>Mes associations</h1>

<div class="main-box">
    <div class="button-add-box">
        <a href="create.php" class="btn btn-success">Add a new Association</a>
    </div>

    <?php

    $query = "SELECT id,titre  FROM Associations";
    $statement = $pdo->query($query);
    $Associations = $statement->fetchAll();
    foreach ($Associations as $Association) {

    ?>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?php echo $Association['titre']; ?></h3>
                <ul>
                <li><a href="modify.php?id=<?php echo $Association['id']; ?>" class="btn btn-primary">Modify</a></li>
                <li><form method="post" action="delete.php" class="form-delete">

                    <input type="hidden" name="asso_id" value="<?php echo $Association['id']; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                </form></li>
            </ul>
        </div>
    </div>
    <?php } ?>
</div>
<?php
    include_once('footer.php');
?>
