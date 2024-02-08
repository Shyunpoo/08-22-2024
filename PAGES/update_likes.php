<?php
session_start();
require_once '../bdd.php'; // Inclure la connexion à la base de données

// Vérifier si l'ID de l'image est reçu en POST
if(isset($_POST['image_id'])) {
    // Récupérer l'ID de l'image depuis la requête POST
    $image_id = $_POST['image_id'];

    // Mettre à jour le nombre de likes dans la base de données
    $query = "UPDATE Galerie SET likes = likes + 1 WHERE id = :image_id";
    $statement = $bdd->prepare($query);
    $statement->bindParam(':image_id', $image_id, PDO::PARAM_INT);
    
    // Exécuter la requête
    if($statement->execute()) {
        // Récupérer le nouveau nombre de likes pour cette image
        $query = "SELECT likes FROM Galerie WHERE id = :image_id";
        $statement = $bdd->prepare($query);
        $statement->bindParam(':image_id', $image_id, PDO::PARAM_INT);
        $statement->execute();
        $new_likes = $statement->fetchColumn();

        // Retourner le nouveau nombre de likes
        echo $new_likes;
    } else {
        // En cas d'échec de la mise à jour, renvoyer un message d'erreur
        echo "Erreur lors de la mise à jour des likes.";
    }
} else {
    // Si l'ID de l'image n'est pas reçu, renvoyer un message d'erreur
    echo "ID de l'image manquant.";
}
?>
