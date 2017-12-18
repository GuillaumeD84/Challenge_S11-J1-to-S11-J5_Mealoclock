<?php $this->layout('layouts/default', [
  'title' => 'Communauté - '.$community->getCommunityName()
]); ?>


<div id="community-content" class="row container-fluid">

  <div class="col-12">
    <!-- Image de la communauté -->
    <img class="img-container" src="<?= $BASE_PATH; ?>/public/images/communities/<?= $community->getImage(); ?>" alt="<?= $community->getCommunityName(); ?>">
    <!-- Titre de la communauté -->
    <h1><?= $community->getCommunityName(); ?></h1>
  </div>

  <div class="row">
    <!-- Description -->
    <p class="col-12"><?= $community->getDescription(); ?></p>
  </div>

</div>
