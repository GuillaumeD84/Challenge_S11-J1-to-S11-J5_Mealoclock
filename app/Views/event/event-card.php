<section class="community">
  <div class="row">

    <!-- Titre + Description -->
    <div class="col-12 col-md-9">
      <h2>
        <a href="<?= $router->generate('event_show', ['id' => $event->getId()]); ?>">
          <?= $event->getTitle(); ?>
        </a>
      </h2>
      <p><?= $event->getDescription(); ?></p>
    </div>

    <!-- Carte -->
    <div class="col-12 col-md-3 area">
      <h3><?= $event->getDateEvent(); ?></h3>
      <small class="event-organizer">Organisé par
      <a href="<?= $router->generate('member_show', [
          'id' => $event->getOrganizerId()
        ]); ?>">
        <?= $event->getOrganizer()->getFirstName(); ?>
      </a>
    </small>
      <p><?= $event->getNbGuests(); ?> guests</p>
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
