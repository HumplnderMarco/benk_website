<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$submit_email = $_POST['submit_email'];
$telephone = $_POST['telephone'];
$to = "email";
$additional_headers = "Von: " . $last_name . " " . $first_name . "\nE-Mail: " . $email;
$message = $additional_headers . "\n\n " . $_POST['message'];
$messageUser = "Ihre E-Mail wurde erfolgreich versendet!\n\nNachricht: " . $_POST['message'];
$webmaster ="marco.humpl@gmx.de";
$subject = "Neue Nachricht ";
$subjectUser = "Firmenname: Nachricht";
$mistake = "Nothing";

if (empty($telephone) == False) {
	$additional_headers = "Von: " . $last_name . " " . $first_name . "\nE-Mail: " . $email . "\nTelefon: " . $telephone;
	$message = $additional_headers . "\n\n" . $_POST['message'];
}

if ($submit_email != $email) {
    $mistake = "Ihre angegebenen E-Mails stimmen nicht &uuml;berein. ";
    echo "Tut uns leid, es scheint, als sei ein Fehler aufgetreten. ";
    echo $mistake;
    echo "Bitte versuchen sie es erneut. ";
        echo "<a href=../index.html>Oder: Zur&uuml;ck zur Startseite</a>";
} elseif (empty($first_name) || empty($last_name) || empty($email) || empty($submit_email) || empty($message)) {
    $mistake = "Sie haben leider nicht alle der ben&ouml;tigten Informationen angegeben. ";
    echo "Es scheint, als sei ein Fehler aufgetreten. ";
    echo $mistake;
    echo "Bitte versuchen sie es erneut. ";
	echo "<a href=../index.html>Oder: Zur&uuml;ck zur Startseite</a>";
} elseif ($submit_email == $email) {
    mail ($to, $subject, $message);
    mail ($email, $subjectUser, $messageUser);
    echo "Vielen Dank f&uuml;r Ihre Nachricht, sie erhalten in k&uuml;rze eine Antwort. Eine Kopie der von Ihnen hinterlassenen Nachricht wird an die von Ihnen angegebene E-Mail Adresse geschickt.";
	echo "\n\n";
	echo "<a href=../index.html>Zur&uuml;ck zur Startseite</a>";
}

?>
