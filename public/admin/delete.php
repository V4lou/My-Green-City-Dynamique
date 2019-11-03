<?php require_once("header.php") ; ?>
<?php

if (isset($_POST['asso_id'])) {
    $id = $_POST['asso_id'];

    $query = "DELETE FROM Associations WHERE id = :id";
    $statement = $pdo->prepare($query);

    $statement->bindValue(':id', $id, \PDO::PARAM_STR);


    $statement->execute();

    header('location: index.php?delete=success');
}
else {
    header("location: index.php");
}
