<h1>Ajouter un album</h1>

<?= $this->Form->create($album) ?>
<?= $this->Form->control('title', ['label' => 'Titre']) ?>
<?= $this->Form->control('artist_id', ['label' => 'Artiste', 'options' => $artists]) ?>
<?= $this->Form->control('release_date', ['label' => 'Date de sortie']) ?>
<?= $this->Form->control('spotify_link', ['label' => 'Lien Spotify (iframe src)']) ?>
<?= $this->Form->button('Enregistrer') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Retour', ['action' => 'index']) ?>
