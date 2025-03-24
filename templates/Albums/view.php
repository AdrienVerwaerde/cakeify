<h1><?= h($album->title) ?></h1>

<p><strong>Artiste :</strong>
<?= $this->Html->link($album->artist->name, ['controller' => 'Artists', 'action' => 'view', $album->artist->id]) ?></p>

<p><strong>Date de sortie :</strong> <?= h($album->release_date) ?></p>

<?php if (!empty($album->spotify_link)): ?>
    <p><strong>Écoute sur Spotify :</strong><br>
    <iframe src="<?= h($album->spotify_link) ?>" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></p>
<?php endif; ?>

<p><strong>Créé le :</strong> <?= h($album->created) ?></p>
<p><strong>Modifié le :</strong> <?= h($album->modified) ?></p>

<div style="margin-top: 1rem;">
    <?= $this->Html->link('Modifier', ['action' => 'edit', $album->id], ['class' => 'button']) ?>
    <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $album->id], [
        'confirm' => 'Supprimer cet album ?',
        'class' => 'button'
    ]) ?>
    <?= $this->Html->link('Retour à la liste', ['action' => 'index'], ['class' => 'button']) ?>
</div>
