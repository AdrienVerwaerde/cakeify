<h1>Modifier l’artiste : <?= h($artist->name) ?></h1>

<?= $this->Form->create($artist) ?>
<?= $this->Form->control('name', ['label' => 'Nom']) ?>
<?= $this->Form->control('description') ?>
<?= $this->Form->control('spotify_link', ['label' => 'Lien Spotify (iframe src)']) ?>
<?= $this->Form->button('Mettre à jour') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Retour', ['action' => 'index']) ?>
