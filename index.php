<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="ASSETS/Logo.png" type="image/png">
    <title>Snowstorm</title>
</head>

<body>
    <!-- Menu de navigation -->
    <header>
        <div class="header-inner">
            <div class="header-content">
                <div class="top-section">
                    <div class="logo">
                        <img src="ASSETS/Logo.png" alt="Logo du site">
                        <img src="ASSETS/Snowstorm.gg.png" alt="snowstorm.gg">
                    </div>
                    <nav class="icon-nav">
                        <ul>
                            <li><a href="#"><img src="ASSETS/Languages.png" alt="Changer de langue"></a></li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    // Utilisateur connecté, afficher le bouton et le menu déroulant
                                    echo '<div>';
                                    echo '<li><a href="PAGES/landing.php"><img src="ASSETS/settings.png" alt="Mon compte"></a></li>';
                                } else {
                                    // Utilisateur non connecté, afficher le bouton de connexion
                                    echo '<li><a href="PAGES/connection.php"><img src="ASSETS/Account.png" alt="Mon compte"></a></li>';
                                }
                            ?>

                            <li><a href="PAGES/basket.php"><img src="ASSETS/Basket.png" alt="Mon panier"></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="bottom-section">
                    <nav class="main-nav">
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="PAGES/product_list.php">Nos Produits</a></li>
                            <li><a href="PAGES/personalize.php">Personaliser</a></li>
                            <li><a href="PAGES/gallery.php">Galerie</a></li>
                            <li><a href="PAGES/SAV.php">Support/SAV</a></li>
                            <li><a href="PAGES/FAQ.php">FAQ</a></li>
                            <li><a href="PAGES/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="search">
                        <input type="text" placeholder="Recherche...">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Accueil --> 
    <?php 
    $db = new PDO('mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd;charset=utf8', '345543', 'chinchilla@8520');
    
    // Requête pour récupérer les 4 produits les plus vendus
    $sql = "SELECT image FROM Produit ORDER BY nombre_ventes DESC LIMIT 4";
    $resultat = $db->query($sql);

    // Afficher le carrousel avec les produits récupérés
    if ($resultat->rowCount() > 0) {
        echo '<div class="carousel-container">
                <div class="carousel-inner">';

        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="carousel-item"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Image"></div>';
        }

        echo '</div></div>';
    } else {
        echo "Aucun produit trouvé dans la base de données.";
    }
    ?>

        <hr class="ligne-separatrice">

        <!-- Les meilleures ventes nouveautés etc...-->
        
        <div class="ligne-carrés">
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/bestsellers.php">Nos Meilleures Ventes</a></h3>
                <img src="ASSETS/Keyboard5.webp" alt="Image 1" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/new_things.php">Nos Nouveautés</a></h3>
                <img src="ASSETS/Keyboard10.webp" alt="Image 2" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/our_classics.php">Nos Classiques</a></h3>
                <img src="ASSETS/Keyboard3.webp" alt="Image 3" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        </div>

        <hr class="ligne-separatrice">

        <div class="ligne-carrés">
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/premade_kits.php">Nos Kits Préfaits</a></h3>
                <img src="ASSETS/Keyboard15.webp" alt="Image 4" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/premade_kits.php">Nos Kits Préfaits</a></h3>
                <img src="ASSETS/Keyboard7.webp" alt="Image 5" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        
            <div class="carré-avec-bordure">
                <h3><a href="PAGES/premade_kits.php">Nos Kits Préfaits</a></h3>
                <img src="ASSETS/Keyboard11.webp" alt="Image 6" class="image">
                <p class="texte">Référence modèle</p>
            </div>
        </div>
    </div>
    
    <!-- Bas de page -->
    <footer>
        <div class="colonne">
            <img src="ASSETS/Logo.png" alt="Logo du site">
            <img src="ASSETS/Snowstorm.gg.png" alt="Nom du site">
        </div>
    
        <div class="colonne">
            <h4>Catégories</h4>
            <ul>
                <li><a href="PAGES/new_things.php">Nouveautés</a></li>
                <li><a href="PAGES/bestsellers.php">Meilleures ventes</a></li>
                <li><a href="PAGES/our_classics.php">Classiques</a></li>
                <li><a href="PAGES/premade_kits.php">Kits préfaits</a></li>
                <li><a href="PAGES/personalize.php">Personnaliser</a></li>
            </ul>
        </div>
    
        <div class="colonne">
            <h4>Informations</h4>
            <ul>
                <li><a href="PAGES/contact.php">Nous contacter</a></li>
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
                <img class="logo-reseau" src="ASSETS/Youtube.png" alt="Logo YouTube">
                <img class="logo-reseau" src="ASSETS/X.png" alt="Logo Twitter">
                <img class="logo-reseau" src="ASSETS/Facebook.png" alt="Logo Facebook">
            </div>
            <div class="Newsletter">
                <h4>Newsletter</h4>
                <form id="newsletterForm" action="PAGES/subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Entrez votre adresse mail" required>
                    <button type="submit" class="button-newsletter">S'abonner</button>
                </form>
            </div>
        </div>
    </footer>


    <script src="script.js"></script>
</body>
</html>
