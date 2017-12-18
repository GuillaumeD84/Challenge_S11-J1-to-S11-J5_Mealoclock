<header>

  <div class="main-bar d-flex flex-row align-items-center">

    <div class="menu bar-box-left">
      <span class="fa fa-bars"></span>
    </div>

    <div class="search bar-box-left d-flex align-items-center">
      <span class="fa fa-search"></span>
      <input type="text" id="ff_search">
    </div>

    <div class="logo">
      <a href="<?= $router->generate('home'); ?>">
        <?= $this->insert('partials/logo'); ?>
      </a>
    </div>

    <?php if (\Mealoclock\Utils\User::isAdmin()): ?>
      <div class="bar-box-right">
        <a href="<?= $router->generate('admin'); ?>">
        <span class="fa fa-user-secret"></span> Admin
        </a>
      </div>
    <?php endif; ?>

    <?php if (\Mealoclock\Utils\User::isConnected()): ?>
      <div class="bar-box-right">
        <a href="<?= $router->generate('profile'); ?>">
        <span class="fa fa-user"></span> <?= $user->first_name; ?>
        </a>
      </div>
      <div class="bar-box-right">
        <a href="<?= $router->generate('logout'); ?>">
        <span class="fa fa-sign-out"></span> Déconnexion
        </a>
      </div>
    <?php else:?>
      <div class="bar-box-right">
        <a href="<?= $router->generate('member_create'); ?>">
        <span class="fa fa-edit"></span> Inscription
        </a>
      </div>
      <div class="bar-box-right">
        <a href="<?= $router->generate('login'); ?>">
        <span class="fa fa-sign-in"></span> Connexion
        </a>
      </div>
    <?php endif; ?>

  </div>

  <?= $this->insert('partials/nav'); ?>

</header>
