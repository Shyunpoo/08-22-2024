<?php 
    session_start(); // Démarrage de la session
    require_once '../bdd.php'; // On inclut la connexion à la base de données

    if (!empty($_POST['email']) && !empty($_POST['password'])) // Si les champs email et password ne sont pas vides
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); 
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT email, password, nom , prenom, is_admin FROM Utilisateur WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // Si > à 0 alors l'utilisateur existe
        if ($row > 0)
        {
            // Si le mail est bon niveau format
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est correct
                if (password_verify($password, $data['password']))
                {
                    // On vérifie si l'utilisateur est un administrateur
                    if ($data['is_admin'] == 1)
                    {
                        // Utilisateur administrateur, redirection
                        $_SESSION['user'] = $data['nom'];
                        $_SESSION['is_admin'] = 1;
                        header('Location: Dashboard/index.php');
                        die();
                    } 
                    else
                    {
                        // Utilisateur normal, redierection 
                        $_SESSION['user'] = $data['nom'];
                        $_SESSION['is_admin'] = 0;
                        header('Location: ../index.php');
                        die();
                    }
                }
                else
                {
                    // Mot de passe incorrect
                    header('Location: ../index.php?login_err=password');
                    die();
                }
            }
            else
            {
                // Format d'email incorrect
                header('Location: ../index.php?login_err=email');
                die();
            }
        }
        else
        {
            // Utilisateur non trouvé dans la base de données
            header('Location: ../index.php?login_err=already');
            die();
        }
    }
    else
    {
        // Formulaire envoyé sans aucune donnée
        header('Location: ../index.php?login_err=empty');
        die();
    }
?>