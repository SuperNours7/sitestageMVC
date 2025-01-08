<?php
// Configuration des métadonnées et autres constantes
$title = "Starlink SAV 971-972";
$description = "Assistance Starlink en Martinique et Guadeloupe. Pose, installation et conseils personnalisés.";
$imageUrl = "https://starlinkmartiniquesav.netlify.app/img/icon.jpg";
$siteUrl = "https://starlinkmartiniquesav.netlify.app";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="icon" href="img/icon.png" type="image/png" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:image" content="<?= $imageUrl ?>" />
    <meta property="og:url" content="<?= $siteUrl ?>" />
    <meta property="og:type" content="website" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Assets/css/style.css" />
    <link rel="icon" href="../Assets/img/icon.png" type="image/png" />
  </head>
  <body>
    <section class="accueil">
      <div class="overlay">
        <div class="logo">
          <img src="../Assets/img/logo.png" alt="logo" />
        </div>
        <ul class="menu">
          <li><a href="#home" class="menu__link">Accueil</a></li>
          <li><a href="../Views/v_services.php#about" class="menu__link">A propos</a></li>
          <li><a href="../Views/v_offres.php#work" class="menu__link">Services</a></li>
          <li><a href="../Views/v_contact.php#contact" class="menu__link">Contact</a></li>
        </ul>
        <div class="toggle">
          <i class="fas fa-bars ouvrir"></i>
          <i class="fas fa-times fermer"></i>
        </div>

        <div class="accueil__text">
          <div class="accueil__text__top">
            <div class="sep"></div>
            <p>Une micro entreprise avec divers services</p>
          </div>
          <div class="accueil__text__mid">
            <h1>Bienvenue sur <?= $title ?></h1>
          </div>
          <div class="accueil__text__bot">
            <p>vers le bas ! <i class="fas fa-long-arrow-alt-down"></i></p>
          </div>
        </div>
      </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"
      integrity="sha512-UxP+UhJaGRWuMG2YC6LPWYpFQnsSgnor0VUF3BHdD83PS/pOpN+FYbZmrYN+ISX8jnvgVUciqP/fILOXDjZSwg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="../Assets/js/app.js"></script>
  </body>
</html>