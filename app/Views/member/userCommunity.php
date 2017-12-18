<?php $this->layout('layouts/default', [
  'title' => 'Mes communautés'
]); ?>

<div class="col-12">
  <h1><?= $user->first_name; ?> <?= $user->last_name; ?></h1>
  <h4>Communautés auxquelles j'appartiens</h4>
</div>

<?php $communityId = \Mealoclock\Model\MemberModel::getUserCommunityListById($user->id); ?>

<?php foreach($communityId as $id): ?>
  <?= $this->insert('main/community-card', [
    'community' => \Mealoclock\Model\CommunityModel::find($id)
  ]); ?>
<?php endforeach; ?>
