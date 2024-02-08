<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez une gamme de claviers customisables pour exprimer votre style unique. Des claviers mécaniques de haute qualité, personnalisables avec une variété de switchs, designs et fonctionnalités. Transformez votre expérience de frappe avec nos claviers sur mesure.">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="product_list.css">
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

    <!-- Listing produits -->
    <form action="comparator.php" method="GET">
    <div class="filters">
        <label for="sort">Trier par :</label>
        <select id="sort" name="tri">
            <option value="nom_produit">Nom</option>
            <option value="date">Date de publication</option>
            <option value="nombre_ventes">Popularité</option>
            <option value="prix (croissant)">Du moins cher au plus cher</option>
            <option value="prix (decroissant)">Du plus cher au moins cher</option>
        </select>
    </div>

    <div class="grid-container">
        <?php
        // Connexion à la base de données
        $db = new PDO('mysql:host=mysql-chinchilla.alwaysdata.net;dbname=chinchilla_bdd;charset=utf8', '345543', 'chinchilla@8520');

        // Exécution de la requête SQL en fonction du critère de tri
        $critere_tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom_produit';
        switch ($critere_tri) {
            case 'date':
                $sql = "SELECT * FROM Produit ORDER BY date";
                break;
            case 'nombre_ventes':
                $sql = "SELECT * FROM Produit ORDER BY nombre_ventes DESC";
                break;
            case 'prix (croissant)':
                $sql = "SELECT * FROM Produit ORDER BY prix";
                break;
            case 'prix (decroissant)':
                $sql = "SELECT * FROM Produit ORDER BY prix DESC";
                break;
            case 'nom_produit':
            default:
                $sql = "SELECT * FROM Produit ORDER BY nom_produit";
                break;
        }

        // Exécution de la requête SQL
        $result = $db->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="product">';
                echo '<div class="product-info">';
                echo '<input type="checkbox" id="compare_' . $row['ref_produit'] . '" name="compare[]" value="' . $row['ref_produit'] . '">'; // Case à cocher
                echo '<label class="compare-label" for="compare_' . $row['ref_produit'] . '">Comparer</label>';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['nom_produit'] . '">';
                echo '<p>' . $row['nom_produit'] . '</p>';
                echo '<hr class="ligne-separatrice">';
                echo '<p class="price">' . $row['prix'] . ' €</p>';
                echo '<hr class="ligne-separatrice">';
                echo '<a href="product_details.php?ref_produit=' . $row['ref_produit'] . '">Voir plus</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 résultats";
        }
        ?>
    </div>
    <button class="comparer" type="submit">Comparer</button>
</form>

<script>
    // Script JavaScript pour trier les produits en fonction du filtre sélectionné
    document.getElementById('sort').addEventListener('change', function() {
        var sortValue = this.value;
        window.location.href = 'product_list.php?tri=' + sortValue;
    });
</script>

    
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
