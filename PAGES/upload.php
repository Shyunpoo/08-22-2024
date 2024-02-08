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
    $image = $_FILES["image"];

    // Vérifier si le fichier est une image
    $allowed_types = array("image/jpeg", "image/png", "image/gif");
    if (in_array($image["type"], $allowed_types)) {
        // L'image est valide, procéder à l'envoi

        // Chemin où l'image sera stockée sur le serveur
        $upload_path = "uploads/";
        // Générer un nom de fichier unique
        $file_name = uniqid() . "_" . $image["name"];
        // Chemin complet du fichier
        $file_path = $upload_path . $file_name;

        // Déplacer l'image téléchargée vers le dossier d'upload
        if (move_uploaded_file($image["tmp_name"], $file_path)) {
            // Insérer le chemin de l'image dans la base de données
            $query = "INSERT INTO Galerie (image, utilisateur_nom) VALUES (?, ?)";
            $statement = $bdd->prepare($query);
            $statement->execute([$file_path, $_SESSION['user']]);
            
            // Rediriger vers la page de la galerie avec un message de succès
            header("Location: gallery.php?success=1");
            exit;
        } else {
            // En cas d'échec de téléchargement, rediriger avec un message d'erreur
            header("Location: gallery.php?error=upload_failed");
            exit;
        }
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
