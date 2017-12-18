<?php $this->layout('layouts/default', [
  'title' => 'Inscription'
]); ?>

<div class="row justify-content-center">

  <div class="col-12 text-center">
    <h1>Inscription</h1>
  </div>

  <?php if(!empty($errors)): ?>
    <div class="col-8">
      <ul class="alert alert-danger">
        <?php foreach($errors as $err): ?>
          <li><?= $err; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <div class="col-6">
    <form action="<?=$router->generate('member_create')?>" method="POST">

      <div class="form-group">
        <label for="firstname">Prénom</label>
        <input id="firstname" name="first_name" type="text" class="form-control" placeholder="Jean" >
      </div>

      <div class="form-group">
        <label for="lastname">Nom</label>
        <input id="lastname" name="last_name" type="text" class="form-control" placeholder="Dupont" >
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" placeholder="truc@machin.com" >
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="******" >
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirmation du mot de passe</label>
        <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="" >
      </div>

      <div class="form-group">
        <label for="address">Adresse</label>
        <input id="address" name="address" type="text" class="form-control" placeholder="1 rue de la paix" >
      </div>

      <button id="signupBtn" type="submit" class="btn btn-primary">Créer le compte</button>

    </form>
  </div>

</div>
