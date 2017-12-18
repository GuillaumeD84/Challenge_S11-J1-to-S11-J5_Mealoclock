<section class="community">
  <div class="row">

    <!-- Image de la communauté -->
    <div class="col-12 col-md-3">
      <img src="<?= $BASE_PATH; ?>/public/images/communities/<?= $community->getImage(); ?>" alt="<?= $community->getCommunityName(); ?>">
    </div>

    <!-- Titre + Description -->
    <div class="col-12 col-md-6">
      <h2>
        <a href="<?= $router->generate('community_show', ['id' => $community->getId()]); ?>">
          <?= $community->getCommunityName(); ?>
        </a>
      </h2>
      <p><?= $community->getDescription(); ?></p>
    </div>

    <!-- Carte -->
    <div class="area col-12 col-md-3">
      <h3>Une recette Fraîche</h3>
      <ul>
        <li>Lorem</li>
        <li>Ipsum</li>
        <li>Dolor</li>
      </ul>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      <a href="#" class="btn btn-primary">Voir la recette</a>
    </div>

  </div>
</section>
