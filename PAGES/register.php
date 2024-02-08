<?php
require_once "../bdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $birthdate = $_POST["birthdate"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format d'email invalide.";
        exit;
    }
    if (strlen($password) < 8) {
        echo "Le mot de passe doit contenir au moins 8 caractères.";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        try {
            // Vérification si l'e-mail existe déjà
            $stmt_check_email = $bdd->prepare("SELECT COUNT(*) FROM Utilisateur WHERE email = :email");
            $stmt_check_email->bindParam(':email', $email);
            $stmt_check_email->execute();
            $email_exists = $stmt_check_email->fetchColumn();

            if ($email_exists) {
                echo "Cette adresse e-mail est déjà utilisée.";
            } else {
                $stmt = $bdd->prepare("INSERT INTO Utilisateur (nom, prenom, email, password, date_de_naissance) VALUES (:nom, :prenom, :email, :password, :date_de_naissance)");
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt->bindParam(':nom', $surname);
                $stmt->bindParam(':prenom', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password); 
                $stmt->bindParam(':date_de_naissance', $birthdate);

                $stmt->execute();

                echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
                header('Location: connection.php');
            }

        } catch(PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
            header('Location: error_page.php');
            exit;
        }
    }
}

?>