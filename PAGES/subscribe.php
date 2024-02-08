<?php
try {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd;charset=utf8', '345543', 'chinchilla@8520');
    // Configure PDO to throw exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération de l'email soumis
        $email = $_POST['email'];

        // Requête SQL pour insérer l'email dans la table NEWSLETTER
        $sql = "INSERT INTO NEWSLETTER (email) VALUES (:email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            // Redirection vers index.php avec un message de succès
            header("Location: ../index.php?success=true");
            exit();
        } else {
            header("Location: ../index.php?success=false");
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
