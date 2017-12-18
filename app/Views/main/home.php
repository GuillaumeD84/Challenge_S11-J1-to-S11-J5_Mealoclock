<?php $this->layout('layouts/default', [
  'title' => 'Les communautés'
]); ?>

<div class="row">
  <div class="col-12">
    <?php if ($user): ?>
      <h1>Bienvenue <?= $user->first_name; ?></h1>
    <?php else: ?>
      <h1>Bienvenue chez Meal O'clock</h1>
    <?php endif; ?>
    <h2>Nos Communautés</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>

<?php foreach($communities as $community): ?>
  <?= $this->insert('main/community-card', [
    'community' => $community
  ]); ?>
<?php endforeach; ?>
