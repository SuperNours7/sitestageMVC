

<link rel="stylesheet" href="../Assets/css/style.css" />
<section class="work" data-aos="fade-up" id="work">
      <div class="container">
        <div class="entete">
          <div class="entete__slogan"></div>
          <div class="entete__titre">
            <h2>Offre Starlink</h2>
            <div class="barre"></div>
            <p>
              Découvrez nos offres Starlink adaptées à vos besoins pour une
              connexion Internet rapide et fiable.
            </p>
          </div>
        </div>
  <div class="offres-list">
    <?php if (isset($offers) && is_array($offers)): ?>
      <?php foreach ($offers as $offer): ?>
        <div class="offre">
          <img src="<?= htmlspecialchars($offer['image']) ?>" alt="<?= htmlspecialchars($offer['titre']) ?>">
          <h2><?= htmlspecialchars($offer['titre']) ?></h2>
          <p><?= htmlspecialchars($offer['description']) ?></p>
          <a href="<?= htmlspecialchars($offer['url']) ?>" target="_blank">Voir l'offre</a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Aucune offre disponible pour le moment.</p>
    <?php endif; ?>
  </div>
</section>