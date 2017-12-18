<?php $this->layout('layouts/admin', [
  'title' => 'Accueil'
]); ?>

<a href="<?= $router->generate('admin_user_list'); ?>">
  Liste des utilisateurs
</a>
<br>
<a href="<?= $router->generate('admin_event_list'); ?>">
  Liste des événements
</a>
