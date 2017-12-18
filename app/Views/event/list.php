<?php $this->layout('layouts/default', [
  'title' => 'Liste des événements'
]); ?>

<div class="row">
  <div class="col-12">
    <h1>Liste des évènements</h1>
  </div>
</div>

<?php foreach($events as $event): ?>
  <?= $this->insert('event/event-card', [
    'event' => $event
  ]); ?>
<?php endforeach; ?>
