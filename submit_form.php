<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['contact-name']);
    $email = htmlspecialchars($_POST['contact-email']);
    $subject = htmlspecialchars($_POST['contact-subject']);
    $message = htmlspecialchars($_POST['contact-message']);

    // Adresse email où tu veux envoyer le formulaire
    $to = "contact@813production.com";
    $subject = "Nouveau message : " . $subject;

    // Construire le corps du message
    $email_message = "Nom: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Sujet: " . $subject . "\n\n";
    $email_message .= "Message:\n" . $message;

    // En-têtes de l'email
    $headers = "From: " . $email . "\r\n";

    // Envoyer l'email
    if (mail($to, $subject, $email_message, $headers)) {
        header('Location:contact.php?s=success#form');
    } else {
        header('Location:contact.php?s=error#form');
    }
}
