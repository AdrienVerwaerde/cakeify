<h1><?= h($artist->name) ?></h1>

<p><strong>Description :</strong><br>
<?= nl2br(h($artist->description)) ?></p>

<?php if (!empty($artist->spotify_link)): ?>
    <p><strong>Écoute sur Spotify :</strong><br>
    <iframe src="<?= h($artist->spotify_link) ?>" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></p>
<?php endif; ?>

<p><strong>Créé le :</strong> <?= h($artist->created) ?></p>
<p><strong>Modifié le :</strong> <?= h($artist->modified) ?></p>

<?= $this->Html->link('Modifier', ['action' => 'edit', $artist->id], ['class' => 'button']) ?>
<?= $this->Form->postLink('Supprimer', ['action' => 'delete', $artist->id], [
    'confirm' => 'Supprimer cet artiste ?',
    'class' => 'button'
]) ?>
<?= $this->Html->link('Retour à la liste', ['action' => 'index'], ['class' => 'button']) ?>
