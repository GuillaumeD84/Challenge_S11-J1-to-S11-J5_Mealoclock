<?php $this->layout('layouts/default', [
  'title' => $member->getFirstName()
]); ?>

<h1>Membre : <span><?= $member->getFirstName(); ?> <?= $member->getLastName(); ?></span></h1>

<script type="text/javascript">
  function laFonctionQuiAttendLeChargementDeLaPage() {
    app.initMap(<?= $member->getLat(); ?>, <?= $member->getLng(); ?>);
  }

  window.addEventListener('DOMContentLoaded', laFonctionQuiAttendLeChargementDeLaPage);
</script>

<div id="map">

</div>
