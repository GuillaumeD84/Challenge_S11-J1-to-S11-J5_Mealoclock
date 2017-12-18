<?php $this->layout('layouts/default', [
  'title' => 'Connexion'
]); ?>

<div class="row justify-content-center">

  <div class="col-12 text-center">
    <h1>Connexion</h1>
  </div>

  <div class="col-6">
    <form action="<?= $router->generate('login'); ?>" method="post">

      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" placeholder="jean@bon.com" >
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="****" >
      </div>

      <button id="loginBtn" type="submit" class="btn btn-primary">Se connecter</button>
    </form>
  </div>
</div>
