<?php include("header.php"); ?>
<?php
$actions = [
    "Flore" => "resources/Zero-pesticides.jpg",
    "Faune" => "resources/Biodiversite-2.jpg",
    "Eau" => "resources/Eau-2.jpg",

];

/*$assos = [
    'Loiret-Nature-Environnement' => ['lien' => '?asso=LNE', 'image' => 'resources/loiret nature environnement.jpg', 'titre'=> 'Loiret Nature Environnement'],
    'Conservatoires Espaces Naturelles' => ['lien' => '?asso=CEN', 'image' => 'resources/Logo_CEN.jpg', 'titre' => 'Conservatoires d\'Espaces Naturels'],
    'Bio Centre' => ['lien' => '?asso=BC', 'image' => 'resources/logo-biocentre.png', 'titre' => 'Bio Centre']
];*/

include("contact_traitement.php");

?>
<main>
    <section class="img-presentation-header">
        <div class="box-txt-presentation-header">
            <h1>My Green City</h1>
        </div>
    </section>
    <div class="action">
        <section id="Actions">
            <h2 class="TitreActions">Actions</h2>
        </section>
        <section class="figures">
            <?php

            foreach ($actions as $title => $link) {
            ?>
                <figure>

               <img src='<?php echo $link;?>' alt=' ' class='img-patrick'/>
                <h4><?php echo $title; ?></h4>
               </figure>
            <?php
            }
            ?>


        </section>
    </div>
    <h2 class="titreAsso" id="Associations">Associations</h2>
    <section class="section_Association">
        <?php
            $query = "SELECT id, image,titre  FROM Associations";
            $statement = $pdo->query($query);
        $Associations = $statement->fetchAll();
        foreach ($Associations as $association) {

        ?>
        <article class="article">
            <a href="asso.php?asso=<?php echo $association['id']; ?> ">
                <img src="<?php echo $association['image']; ?>" alt="link to asso" class="img-olivier"/></a>
                <h2 class="title-asso"><?php echo $association['titre']; ?></h2>
        </article>
        <?php
        }
        ?>


    </section>
    <section class="sectiongestion" id="Dechets">
        <h2 class="titreDechets">Gestion des déchets</h2>
        <article class="conseils">
            <h3 class="litlleDechets">Conseils</h3>
            <div class="projet1">
                <img src="https://image.freepik.com/free-photo/circle-trash-with-recycle-symbol_23-2147852545.jpg" alt="imageConseil">
                <div class="test1">
                    <p>Tri sélectif : 3 conseils pour ne plus jamais se tromper de poubelle ...</p>
                    <p>La poubelle des déchets recyclables :</p>
                    <p>Dans le bac jaune, ou bac des déchets recyclables, on met le carton, le papier, le métal et les emballages en plastique dur.Il y a bien les canettes mais aussi les conserves et les bouteilles d'eau ou de lait par exemple. En clair, tous les emballages plastiques propres. </p>
                    <p>La poubelle de verre :</p>
                    <p>Dans le bac blanc, celui du verre, la règle est simple : on y met presque exclusivement des bocaux et des bouteilles. Attention à un point toutefois : la vaisselle brisée, comme les verres cassés par exemple, ne vont pas dans ce bac-là. </p>
                    <p>La poubelle des déchets non recyclables :</p>
                    <p>Dans le bac vert, on met tout le reste des déchets. Mais il y a des pièges à éviter, et sur lesquels tout le monde se trompe: par exemple, si votre boîte de pizza en carton est pleine de gras, il faut la jeter dans le bac vert et non pas dans le bac jaune, car le gras altère les propriétés des papiers.</p>
                </div>
            </div>
        </article>
        <h3 class="litlleDechets">Points de collecte</h3>
        <article class="ptcollecte">
            <div class="pageCollecte">
                <details open>
                    <summary>Vos jours de collectes</summary>
                    <ul>
                        <li>Déchets ménagers résiduels : Lundi Après-Midi, Jeudi Matin</li>
                        <li>Déchets multimatériaux : Mercredi Matin</li>
                        <li>Collecte des encombrants : Lundi 4 Novembre 2019</li>
                    </ul>
                </details>
                <details open>
                    <summary>Les différents points d'apports</summary>
                    <ul>
                        <li>Avenue Champs de Mars</li>
                        <li>Avenue de Trévise</li>
                        <li>Rue des lavandières</li>
                    </ul>
                </details>
                <details >
                    <summary>Divers</summary>
                    <ul>
                        <li>Livraison de bacs pour les nouveaux arrivants</li>
                        <li>Demande de carte de déchetterie</li>
                        <li>Collecte des encombrants à la demande</li>
                    </ul>
                </details>
            </div>
            <img src="https://image.freepik.com/photos-gratuite/trashcans-rue-ville_1398-1296.jpg" alt="ImagePointdecollecte">
        </article>
    </section>
    <section class="formulaire" id="Contact">
        <h2 class="contact">Contact</h2>
        <form method="post">
            <div class="align-input">
                <label for="username">NOM</label>
                <input type="text" id="username" name="user_lastname" value="<?php if(!empty($returnInputLastname)) {echo $returnInputLastname;} ?>" required />
                <?php
                    if (!empty($lastNameError)) {
                ?>
                <div class="div-error"><p class="error-form"><?php echo $lastNameError; ?></p></div>
                <?php 
                    }
                ?>
            </div>
            <div class="align-input">
                <?php
                    if (!empty($firstNameError)) {
                ?>
                <div class="div-error"><p class="error-form"><?php echo $firstNameError; ?></p></div>
                <?php 
                    }
                ?>
                <label for="username">PRENOM</label>
                <input type="text" id="username" name="user_firstname" value="<?php if(isset($returnInputFirstname)){echo $returnInputFirstname;} ?>" required />
           </div>
            <div class="align-input">
                <?php
                    if (!empty($mailError)) {
                ?>
                <div class="div-error"><p class="error-form"><?php echo $mailError; ?></p></div>
                <?php 
                    }
                ?>
                <label for="email">EMAIL</label>
                <input type="email" value="<?php if(isset($returnMail)){echo $returnMail;} ?>" id="email" name="user_mail" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required />
            </div>
            <?php
                    if (!empty($mailErrorFormat)) {
                ?>
                <div class="div-error"><p class="error-form"><?php echo $mailErrorFormat; ?></p></div>
                <?php 
                    }
                ?>
            
                <?php
                    if (!empty($messageError)) {
                ?>
               <div class="div-error"> <p class="error-form"><?php echo $messageError; ?></p></div>
                <?php 
                    }
                ?>
            <div class="align-input">
                <label for="msg">MESSAGE</label>
                <textarea id="msg" name="user_message" required><?php if(isset($returnMessage)){echo $returnMessage; }?></textarea>

            </div>
           <div class="align-input">
            <div class="box-button">
                <input type="submit" value="Envoyer" class="button-submit-2" />
            </div>
            <?php
                    if (!empty($formError)) {
                ?>
                <div class="div-error"><p class="error-form"><?php echo $formError ?></p></div>
                <?php 
                    }
                ?>
            </div>
        </form>
    </section>
</main>
<?php include("footer.php"); ?>