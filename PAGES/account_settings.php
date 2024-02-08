<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="account_settings.css">
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

    <!-- Test -->
    <div class="tabs">
        <button class="tablinks" onclick="openTab(event, 'historique')">Historique des Commandes</button>
        <button class="tablinks" onclick="openTab(event, 'favoris')">Produits Favoris</button>
        <button class="tablinks" onclick="openTab(event, 'personnalisations')">Personnalisations Sauvegardées</button>
        <button class="tablinks" onclick="openTab(event, 'modifier')">Modifier ses Informations</button>
    </div>
    
    <div id="historique" class="tabcontent">
        <h3>Historique des Commandes</h3>
        <p>Contenu de l'historique des commandes...</p>
    </div>

    <div id="favoris" class="tabcontent">
        <h3>Produits Favoris</h3>
        <p>Contenu des produits favoris...</p>
    </div>

    <div id="personnalisations" class="tabcontent">
        <h3>Personnalisations Sauvegardées</h3>
        <p>Contenu des personnalisations sauvegardées...</p>
    </div>

    <div id="modifier" class="tabcontent">
        <h3>Modifier ses Informations</h3>
        <p>Contenu pour modifier les informations...</p>
        <?php
        require_once '../bdd.php';
        // Vérifiez si l'utilisateur est connecté et récupérez son email
        // Assurez-vous de remplacer cette ligne par votre propre méthode de récupération de l'utilisateur connecté
        $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

        // Si l'utilisateur est connecté, récupérez ses informations
        if ($user_email) {
            // Préparez la requête SQL
            $check = $bdd->prepare('SELECT email, password, nom, prenom, date_de_naissance, is_admin FROM Utilisateur WHERE email = ?');

            // Liez les valeurs et exécutez la requête
            $check->execute(array($user_email));

            // Récupérez les informations de l'utilisateur
            $user_info = $check->fetch(PDO::FETCH_ASSOC);

            // Affichez les informations de l'utilisateur
            echo "Nom: " . $user_info['nom'] . "<br>";
            echo "Prénom: " . $user_info['prenom'] . "<br>";
            echo "Date de naissance: " . $user_info['date_de_naissance'] . "<br>";
            // Ajoutez d'autres champs selon vos besoins
        } else {
            echo "Utilisateur non connecté.";
        }
        ?>

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


    <script>
    // Fonction pour ouvrir un onglet spécifique
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }
    </script>
</body>
</html>
