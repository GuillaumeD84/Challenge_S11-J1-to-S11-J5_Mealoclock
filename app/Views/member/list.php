<?php $this->layout('layouts/default', [
  'title' => 'Liste des membres'
]); ?>

<h1>Liste des membres</h1>

<section class="container">
  <div class="d-flex justify-content-between flex-wrap">

    <?php foreach($members as $member): ?>
      <div class="member-card">
        <img src="https://dummyimage.com/220x220/ccc/fff&text=avatar" alt="photo <?= $member->getFirstName(); ?> <?= $member->getLastName(); ?>">
        <h3><?= $member->getFirstName(); ?> <?= $member->getLastName(); ?></h3>
        <address><?= $member->getEmail(); ?></address>
        <hr>
        <a href="<?= $router->generate('member_show', [ 'id' => $member->getId() ]); ?>" class="btn btn-primary">Voir le profil</a>
        <?php if(\Mealoclock\Utils\User::isAdmin()): ?>
          <a href="<?= $router->generate('admin_user_delete', [ 'id' => $member->getId() ]); ?>" class="btn btn-danger">
          <i class="fa fa-trash"></i>
          </a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>

  </div>
</section>
