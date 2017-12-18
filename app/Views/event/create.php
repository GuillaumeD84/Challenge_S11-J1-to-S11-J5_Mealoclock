<?php $this->layout('layouts/default', [
  'title' => 'Nouvel événement'
]); ?>

<h1>Nouvel événement</h1>

<ul>
  <?php foreach($errors as $error): ?>
    <li><?= $error ?></li>
  <?php endforeach; ?>
</ul>

<form method="POST">
  <p>
    <label for="title">title</label>
    <input id="title" name="title" value="<?= (isset($_POST["title"]) ? $_POST["title"] : "") ?>">
  </p>
  <p>
    <label for="description">description</label>
    <input id="description" name="description" value="<?= (isset($_POST["description"]) ? $_POST["description"] : "") ?>">
  </p>
  <p>
    <label for="price">price</label>
    <input id="price" name="price" value="<?= (isset($_POST["price"]) ? $_POST["price"] : "") ?>">
  </p>
  <p>
    <label for="date_event">date_event</label>
    <input id="date_event" name="date_event" type="date" value="<?= (isset($_POST["date_event"]) ? $_POST["date_event"] : "") ?>">
  </p>
  <p>
    <label for="nb_guests">nb_guests</label>
    <input id="nb_guests" name="nb_guests" value="<?= (isset($_POST["nb_guests"]) ? $_POST["nb_guests"] : "") ?>">
  </p>
  <p>
    <label for="is_address">
      <input id="is_address" name="is_virtual" type="radio" value="0"
        <?= (isset($_POST["is_virtual"]) && $_POST["is_virtual"] ? "" : " checked") ?>
      >
      is_address
    </label>
    <label for="is_virtual">
      <input id="is_virtual" name="is_virtual" type="radio" value="1"
        <?= (isset($_POST["is_virtual"]) && $_POST["is_virtual"] ? " checked" : "") ?>
      >
      is_virtual
    </label>
  </p>
  <p>
    <label for="address">address</label>
    <input id="address" name="address" value="<?= (isset($_POST["address"]) ? $_POST["address"] : "") ?>">
  </p>
  <p>
    <label for="organizer_id">organizer_id (PROVISOIRE)</label>
    <input id="organizer_id" name="organizer_id" value="<?= (isset($_POST["organizer_id"]) ? $_POST["organizer_id"] : "") ?>">
  </p>
  <input type="submit" value="Enregistrer">
</form>
