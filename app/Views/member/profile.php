<?php $this->layout('layouts/default', [
  'title' => 'Mon profil'
]); ?>

<div class="row justify-content-center">

  <div class="col-12">
    <h1>
      Bonjour <?= $user->first_name; ?> <?= $user->last_name; ?>
    </h1>
  </div>

  <div class="col-12">
    <h3>
      <a href="<?= $router->generate('user_community'); ?>" class="btn btn-primary">
      Mes communautés
      </a>
    </h3>
  </div>

  <br><br>

  <div class="col-12">
    <p>Prénom : <?= $user->first_name; ?></p>
    <p>Nom : <?= $user->last_name; ?></p>
    <p>Email : <?= $user->email; ?></p>
    <p>Adresse : <?= $user->address; ?></p>
  </div>

</div>
