<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="connection.css">
    <link rel="icon" href="../ASSETS/Logo.png" type="image/png">
    <title>Snowstorm</title>
</head>

<body>
    <!-- Menu de navigation -->
    <header>
        <div class="header-inner">
            <div class="header-content">
                <div class="top-section">
                    <div class="logo">
                        <img src="../ASSETS/Logo.png" alt="Logo du site">
                        <img src="../ASSETS/Snowstorm.gg.png" alt="snowstorm.gg">
                    </div>
                    <nav class="icon-nav">
                        <ul>
                            <li><a href="#"><img src="../ASSETS/Languages.png" alt="Changer de langue"></a></li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    // Utilisateur connecté, afficher le bouton et le menu déroulant
                                    echo '<div>';
                                    echo '<li><a href="landing.php"><img src="../ASSETS/settings.png" alt="Mon compte"></a></li>';
                                } else {
                                    // Utilisateur non connecté, afficher le bouton de connexion
                                    echo '<li><a href="connection.php"><img src="../ASSETS/Account.png" alt="Mon compte"></a></li>';
                                }
                            ?>
                            <li><a href="basket.php"><img src="../ASSETS/Basket.png" alt="Mon panier"></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="bottom-section">
                    <nav class="main-nav">
                        <ul>
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="product_list.php">Nos Produits</a></li>
                            <li><a href="personalize.php">Personaliser</a></li>
                            <li><a href="gallery.php">Galerie</a></li>
                            <li><a href="SAV.php">Support/SAV</a></li>
                            <li><a href="FAQ.php">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="search">
                        <input type="text" placeholder="Recherche...">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Page de connexion, inscription -->
    <div id="connexion" class="content-section">
        <div class="row">
            <div class="column">
                <h2>Connexion</h2>
                <hr>
                <form action="sign_in.php" method="post">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"><br>
                    <label for="pwd">Mot de passe:</label><br>
                    <input type="password" id="pwd" name="password"><br>
                    <input type="submit" value="Se connecter">
                    <a href="#">Mot de passe oublié?</a>
                </form>
            </div>
            <div class="column">
                <h2>Inscription</h2>
                <hr>
                <form action="register.php" method="post">
                    <label>Nom</label>
                    <input type="text" name="surname" required>
                    <label>Prénom</label>
                    <input type="text" name="name" required>
                    <label>Email</label>
                    <input type="email" name="email" required>
                    <label>Mot de passe</label>
                    <input type="password" name="password" required>
                    <label>Confirmer votre mot de passe</label>
                    <input type="password" name="confirm_password" required>
                    <label>Date de naissance</label>
                    <input type="date" name="birthdate" required>
                    <input type="submit" name="register" value="S'inscrire">
                </form>
            </div>
            <div class="column">
                <h2>Connexion avec Google</h2>
                <hr>
                <div id="g_id_onload" data-client_id="YOUR_CLIENT_ID" data-callback="handleCredentialResponse"></div>
                <div class="g_id_signin"></div>
            </div>
        </div>
    </div>
    
    <!-- Bas de page -->
    <footer>
        <div class="colonne">
            <img src="../ASSETS/Logo.png" alt="Logo du site">
            <img src="../ASSETS/Snowstorm.gg.png" alt="Nom du site">
        </div>
    
        <div class="colonne">
            <h4>Catégories</h4>
            <ul>
                <li><a href="new_things.php">Nouveautés</a></li>
                <li><a href="bestsellers.php">Meilleures ventes</a></li>
                <li><a href="our_classics.php">Classiques</a></li>
                <li><a href="premade_kits.php">Kits préfaits</a></li>
                <li><a href="personalize.php">Personnaliser</a></li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Informations</h4>
            <ul>
                <li><a href="contact.php">Nous contacter</a></li>
                <li>Livraison</li>
                <li>Mentions légales</li>
                <li>Confidentialité</li>
                <li>Conditions d'utilisation</li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Mon compte</h4>
            <ul>
                <li>Mes commandes</li>
                <li>Mes customs</li>
                <li>Mes informations</li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Nos réseaux</h4>
            <div class="reseaux-sociaux">
                <img class="logo-reseau" src="../ASSETS/Youtube.png" alt="Logo YouTube">
                <img class="logo-reseau" src="../ASSETS/X.png" alt="Logo Twitter">
                <img class="logo-reseau" src="../ASSETS/Facebook.png" alt="Logo Facebook">
            </div>
            <div class="Newsletter">
                <h4>Newsletter</h4>
                <form id="newsletterForm" action="subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Entrez votre adresse mail" required>
                    <button type="submit" class="button-newsletter">S'abonner</button>
                </form>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
