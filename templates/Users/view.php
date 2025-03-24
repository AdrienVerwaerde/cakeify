<h1>Détails de l’utilisateur #<?= h($user->id) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <td><?= h($user->id) ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th>Rôle</th>
        <td><?= h($user->role) ?></td>
    </tr>
    <tr>
        <th>Créé le</th>
        <td><?= h($user->created) ?></td>
    </tr>
    <tr>
        <th>Modifié le</th>
        <td><?= h($user->modified) ?></td>
    </tr>
</table>

<div class="actions" style="margin-top: 20px;">
    <?= $this->Html->link('Modifier', ['action' => 'edit', $user->id], ['class' => 'button']) ?>
    <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $user->id], [
        'confirm' => 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?',
        'class' => 'button'
    ]) ?>
    <?= $this->Html->link('Retour à la liste', ['action' => 'index'], ['class' => 'button']) ?>
</div>

<?php if (!empty($user->favorites)): ?>
    <h2>Favoris</h2>
    <ul>
        <?php foreach ($user->favorites as $fav): ?>
            <li><?= h($fav->favoritable_type) ?> #<?= h($fav->favoritable_id) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($user->follows)): ?>
    <h2>Artistes suivis</h2>
    <ul>
        <?php foreach ($user->follows as $follow): ?>
            <li><?= h($follow->artist_id) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (!empty($user->requests)): ?>
    <h2>Demandes d’ajout</h2>
    <ul>
        <?php foreach ($user->requests as $request): ?>
            <li><?= h($request->type) ?> - <?= h($request->status) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
