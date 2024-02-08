<?php
session_start();
require_once '../bdd.php'; // Inclure la connexion à la base de données

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: connection.php");
    exit;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $image = file_get_contents($_FILES["image"]["tmp_name"]); // Lire le contenu du fichier image

    // Vérifier si le fichier est une image
    $allowed_types = array("image/jpeg", "image/png", "image/webp");
    if (in_array($_FILES["image"]["type"], $allowed_types)) {
        // L'image est valide, procéder à l'envoi

        // Insérer l'image dans la base de données
        $query = "INSERT INTO Galerie (image, utilisateur_nom) VALUES (?, ?)";
        $statement = $bdd->prepare($query);
        $statement->execute([$image, $_SESSION['user']]);
        
        // Rediriger vers la page de la galerie avec un message de succès
        header("Location: gallery.php?success=1");
        exit;
    } else {
        // Rediriger avec un message d'erreur si le type de fichier n'est pas autorisé
        header("Location: gallery.php?error=invalid_image_type");
        exit;
    }
} else {
    // Rediriger si le formulaire n'a pas été soumis
    header("Location: gallery.php");
    exit;
}
?>
