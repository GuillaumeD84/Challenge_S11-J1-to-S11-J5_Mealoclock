<?php $this->layout('layouts/default', [
  'title' => $event->getTitle()
]); ?>

<section class="community">
  <div class="row">

    <div class="col-9">
      <h1><?= $event->getTitle() ?></h1>
      <small>
      Organisé par
      <a href="<?= $router->generate('member_show', [ 'id' => $event->getOrganizerId() ]) ?>">
      <?= $event->getOrganizer()->getFirstName() ?> <?= $event->getOrganizer()->getLastName() ?>
      </a>
      </small>
      <p><?= $event->getDescription() ?></p>
    </div>

    <div class="col-3 area">
      <h3><?= $event->getDateEvent() ?></h3>
      <p><?= $event->getNbGuests() ?> guests</p>
      <address>
      <?php if ($event->getIsVirtual() == 0): ?>
        <?=$event->getAddress()?>
      <?php else: ?>
        <a href="<?=$event->getAddress()?>">
          <?=$event->getAddress()?>
        </a>
      <?php endif; ?>
      </address>
    </div>

  </div>
</section>
