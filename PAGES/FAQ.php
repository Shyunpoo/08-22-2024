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
    <link rel="stylesheet" href="FAQ_CSS.css">
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

    <!-- FAQ -->
    <div class="container">
    <img src="../ASSETS/FAQ.png" alt="FAQ" class="FAQ">
        <details>
            <summary>
                Les retours et les échanges
            </summary>
            <!-- https://support.wasdkeyboards.com/hc/en-us/categories/115001271608-Customer-Help -->
            <br/>
            <hr class="ligne-separatrice">
            <li>Tous les retours doivent se faire sous 30 jours après la livraison de la commande.</li>
            <br>
            <li>Tous les produits retournés doivent être dans un état neuf avec leurs boîtes d'origine.</li>
            <br>
            <li>Les frais de port ne sont pas remboursés.</li>
            <br>
            <li>Le client est responsable des frais d'expédition de retour.</li>
            <hr class="ligne-separatrice">
            </details>
            <details>
                <summary>
                    Colis refusé ou non réclamé
                </summary>
                <hr class="ligne-separatrice">
                <br/> Lorsque nous recevons un colis dont la livraison n'a pu aboutir, un courriel est envoyé à l'adresse email du compte afin de connaître la suite à donner à la commande. Cet email vous permet de nous préciser votre choix :<br>
                <br>
                <hr class="ligne-separatrice">
                <li>La réexpédition de la commande à la même adresse ;</li>
                <br>
                <li>Expédition à une adresse différente ;</li>
                <br>
                <li>Mise en place d'un avoir ou d'un remboursement.</li>
                <hr class="ligne-separatrice">
            </details>
            <details>
                <summary>
                    Le processus de commande
                </summary>
                <br/>
                <strong>Comment commander ?</strong>
                <hr class="ligne-separatrice">
                <li>Toutes les commandes doivent être passées en ligne via notre site Web.</li>
                <li>Nous acceptons toutes les principales cartes de crédit et Google Pay pour le paiement.</li>
                <li>Les commandes sont facturées au moment de la commande.</li>
                <br>
                <strong>Combien de temps faut-il pour traiter ?</strong>
                <hr class="ligne-separatrice">
                <li>Tout produit nécessitant une impression personnalisée prendra généralement 1 à 5 jours ouvrables pour être expédié. Le temps de traitement dépend du nombre d'autres personnes que nous avons en attente à l'heure actuelle.</li>
                <li>Les articles en stock (par exemple, claviers CODE, etc.) sont généralement expédiés sous 1 jour ouvrable.</li>
                <br>
                <strong>Combien de temps prend la livraison ?</strong>
                <hr class="ligne-separatrice">
                <li>Les délais d'expédition varient en fonction de votre situation géographique. Nous sommes situés à Lyon, en France, donc la règle générale est que plus vous êtes loin, plus cela prendra de temps.</li>
                <li>UPS Ground est de 1 à 5 jours ouvrables</li>
                <li>Le courrier prioritaire est de 1 à 3 jours ouvrables.</li>
                <li>Le courrier de première classe prend 1 à 5 jours ouvrables.</li>
                <hr class="ligne-separatrice">
            </details>
            <details>
                <summary>
                    Transport maritime international
                </summary>
                <hr class="ligne-separatrice">
                L'expédition internationale est disponible dans la plupart des pays du monde. Les frais d'expédition sont basés sur le poids total de votre commande, votre emplacement et le service d'expédition sélectionné. Pour connaître les frais
                de port, ajoutez les articles que vous souhaitez commander au panier et utilisez le calculateur de frais de port.
                <br/>
                <br/><strong>Droits et taxes</strong><br>
                <hr class="ligne-separatrice">
                <strong>Veuillez noter que les droits de douane, taxes et frais d'importation, le cas échéant, ne sont pas inclus.</strong>
                <br/>Si vous n'êtes pas familier avec les frais et réglementations d'importation de votre pays, vous devrez contacter votre bureau de poste ou bureau de douane local pour plus d'informations. Les frais varient de 0 % à 50 % de la valeur de
                votre commande.
                <hr class="ligne-separatrice">
            </details>
            <details>
                <summary>
                    Quand ce produit sera-t-il de nouveau en stock ?
                </summary>
                <hr class="ligne-separatrice">
                <p>Tous les mois, nous procédons à un réapprovisionnement des stocks. Dans le cas où un produit est en rupture de stock, il faudrait prévoir un délai maximum de 1 mois pour qu'il soit à nouveau disponible, sauf en cas de rupture des matières
                premières ou de crise du marché. </p>
                <hr class="ligne-separatrice">
            </details>
            <details>
                <summary>
                    Modifications ou annulations de commande
                </summary>
                <hr class="ligne-separatrice">
                <p> Les commandes ne peuvent être annulées ou modifiées que dans les conditions suivantes :</p>
                <li>La commande n'a pas été expédiée.</li>
                <li>Les commandes de travaux personnalisés, tels que l'impression ou la mise sous gaine, ne peuvent être annulées ou modifiées si le travail est déjà terminé.</li>
                <hr class="ligne-separatrice">
                <p>Quels changements puis-je apporter ?</p>
                <br>
                <li>Modifications des paramètres de conception telles que les couleurs ou le texte.</li>
                <li>Passer à différents produits de valeur identique ou inférieure.</li>
                <li>Suppression de tous les produits.</li>
                <hr class="ligne-separatrice">
            </details>
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
