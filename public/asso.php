<?php

	if(isset($_GET['asso'])) {
		$key = $_GET['asso'];
	}
	else {
		header('location: index.php');
		exit();
	}
?>
<?php include("header.php"); ?>

<main>

	<?php

    $query = "SELECT titre, image, description, lien_asso FROM Associations WHERE id =:id";
	$statement = $pdo->prepare($query);
	$statement->bindValue(':id', $key, \PDO::PARAM_INT);
    $statement->execute();

	$AssoInfos = $statement->fetchAll();

	foreach($AssoInfos as $AssoInfo) {
	?>
	<h1 class="Titre-Asso"><?php echo $AssoInfo['titre']; ?></h1>
	<div class="Img-Asso">
		<img src="<?php echo $AssoInfo['image']; ?>" alt=" "/>
	</div>
	<section class="section-contact-asso">
		<p class="describe-asso"><?php echo $AssoInfo['description']; ?></p>
		<div class="box-contact-asso">
			<a href="<?php echo $AssoInfo['lien_asso']; ?>" class="contact-asso"><?php echo $AssoInfo['lien_asso']; ?></a>
		</div>
	</section>
</main>
<?php
	}
?>
<?php include("footer.php"); ?>

