<link rel="stylesheet" href="../Assets/css/style.css" />
<section class="about" data-aos="fade-up" id="about">
  <div class="container">
    <div class="entete">
      <div class="entete__slogans"><h2>Que proposons Nous ?</h2></div>
      <div class="entete__titres">
        Notre micro entreprise vous propose une assistance internet à
        domicile, conseil d'achat avec remises, installation, pose et
        montage araignée, paramétrage, formation prise en main en Martinique
        et en Guadeloupe entre 50 à 100€.
      </div>
    </div>

    <div class="about__corps">
      <?php if (isset($services) && is_array($services)): ?>
        <?php foreach ($services as $service): ?>
          <div class="about__corps__block">
            <img src="<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['titre']) ?>">
            <h2><?= htmlspecialchars($service['titre']) ?></h2>
            <p><?= htmlspecialchars($service['description']) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Aucun service disponible pour le moment.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<script src="../Assets/js/app.js"></script>