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
    <link rel="stylesheet" href="SAV.css">
    <link rel="icon" href="../ASSETS/Logo.png" type="image/png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lcic2kpAAAAAL4Q7MKdc2AoxfvYhNDjbvZlkcWT"></script>
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

    <!-- Page SAV -->
    <div class="pagemain">
    <form onsubmit="sendEmail(); reset(); return false;">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
          <div class="gauche">
            <div class="groupe">
              <label>Votre Prénom</label>
              <input type="text" id="name" autocomplete="off" required/>
              <i class="fas fa-user"></i>
            </div>
            <div class="groupe">
              <label>Votre adresse e-mail</label>
              <input type="email" id="email" autocomplete="off" required placeholder="mail@domain.com"/>
              <i class="fas fa-envelope"></i>
            </div>
            <div class="groupe">
              <label>Votre téléphone</label>
              <input type="text" id="phone" autocomplete="off" required placeholder="+33"/>
              <i class="fas fa-mobile"></i>
            </div>
            <div class="groupe">
                <label>Votre pays</label>
                <input type="text" id="country" autocomplete="off" required/>
                <i class="fa-solid fa-earth-americas"></i>
            </div>
          </div>
  
          <div class="droite">
            <div class="groupe">
              <label>Message</label>
              <textarea placeholder="Saisissez ici..." id="message" required></textarea>
            </div>
          </div>
        </div>
  
        <div class="pied-formulaire" align="center">
          <button type="submit">Envoyer le message</button>
          <div class="g-recaptcha" data-sitekey="6Lcic2kpAAAAAL4Q7MKdc2AoxfvYhNDjbvZlkcWT"></div>
        </div>
      </form>
      <script>
        emailjs.init("cVh0dNVTM-BBsLj6n");

    function sendEmail() {
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            // Le CAPTCHA n'a pas été validé
            alert("Veuillez valider le CAPTCHA.");
            return;
        }
        // Le CAPTCHA a été validé, poursuivre avec l'envoi de l'e-mail
        const templateParams = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            country: document.getElementById("country").value,
            message: document.getElementById("message").value,
        };

        emailjs.send("service_287m9vg", "template_15fsafi", templateParams)
            .then((response) => {
                console.log("E-mail envoyé avec succès : ", response);
                alert("Le message a été envoyé avec succès !");
            }, (error) => {
                console.error("Erreur lors de l'envoi de l'e-mail : ", error);
                alert("Veuillez réessayer");
            });
    }

      </script>
    </div>  

    <script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6Lcic2kpAAAAAL4Q7MKdc2AoxfvYhNDjbvZlkcWT', {action: 'LOGIN'});
        });
    }
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
