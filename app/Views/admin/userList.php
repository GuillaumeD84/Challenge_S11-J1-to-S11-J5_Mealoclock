<?php $this->layout('layouts/admin', [
  'title' => 'Liste des utilisateurs'
]); ?>

<h2>Liste des membres</h2>

<table id="adminMemberList">

  <thead>
    <th>Nom d'utilisateur</th>
    <th>Rôle</th>
    <th>Actions</th>
  </thead>

  <tbody>
    <?php foreach($members as $member): ?>
      <tr>
        <td><?= $member->getFirstName(); ?> <?= $member->getLastName(); ?></td>
        <td><?= $member->getRole(); ?></td>
        <td>
        <a href="<?= $router->generate('admin_user_delete', [ 'id' => $member->getId() ]); ?>" class="fa fa-trash"></a>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>

</table>
