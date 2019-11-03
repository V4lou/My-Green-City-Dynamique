<?php


//Inintialisation des variables d'erreurs

$firstNameError = "";
$lastNameError = "";
$mailError = "";
$mailErrorFormat = "";
$messageError = "";
$formError = "";
$returnInputLastname = "";
$returnInputFirstname = "";
$returnMessage = "";
$returnMail = "";
$lastName = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(isset($_POST['user_lastname']) AND isset($_POST['user_firstname']) AND isset($_POST['user_mail']) AND 
		isset($_POST['user_message'])) {


	    $returnInputLastname = $_POST['user_lastname'];
        $returnInputFirstname = $_POST['user_firstname'];
        $returnMail = $_POST['user_mail'];
        $returnMessage = $_POST['user_message'];

		if(!empty($_POST['user_lastname'])) {
			$lastName = $_POST['user_lastname'];
			$lastNameOk = trim($lastName);
			$lastNameSecurity = true;
		}
		else {

			$lastNameError = "Erreur. Veuillez remplir le champ nom.";
			$lastvalue = $_POST['user_lastname'];
            $returnInputLastname = $_POST['user_lastname'];
			$lastNameSecurity = false;

		}

		if(!empty($_POST['user_firstname'])) {
			$firstName = $_POST['user_firstname'];
			$firstNameOk = trim($firstName);
			$firstNameFinal = htmlentities($firstNameOk);
			$firstNameSecurity = true;
		}
		else {
			$firstNameError = "Erreur. Veuillez remplir le champ prénom.";
			$firstvalue = $_POST['user_firstname'];
			$returnInputFirstname = $_POST['user_firstname'];
			$firstNameSecurity = false;
		}

		if(!empty($_POST['user_mail'])) {

			//On vérifie que l'adresse mail est correctement formatée

			$mailVerify = filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL);
			if($mailVerify) {
				$mail = $_POST['user_mail'];
				$mailOk = trim($mail);
				$mailFinal = htmlentities($mailOk);
				$mailSecurity = true;
			}
			else {
				$mailError = "Erreur. Le format de votre adresse mail est incorrect.";
				$mailValue = $_POST['user_mail'];
				$returnMail = $_POST['user_mail'];
				$mailSecurity = false;
			}
		}
		else {
			$mailErrorFormat = "Erreur. Veuillez remplir le champ E-mail.";
            $returnMail = $_POST['user_mail'];
            $mailSecurity = false;
		}
		if(!empty($_POST['user_message'])) {
			$message = $_POST['user_message'];
			$mailOk = trim($message);
			$messageFinal = htmlentities($message);
			$messageSecurity = true;
		}
		else {
			$messageSecurity = false;
			$messageValue = $_POST['user_message'];
			$returnMessage = $_POST['user_message'];
			$messageError = "Erreur. Veuillez remplir le champ message.";
		}

		if($lastNameSecurity AND $firstNameSecurity AND $mailSecurity AND $mailSecurity AND $messageSecurity) {
			  header('Location: contact_ok.php');
  			  exit();
		}

	}
	else {
		$formError = "Une erreur s'est produite. Veuillez remplir l'intégralité du formulaire de contact.";
	}

}