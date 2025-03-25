<div class="requests form content"><h1>Request a New Album</h1>

<?= $this->Form->create($request) ?>
<?= $this->Form->control('title', ['label' => 'Title']) ?>
<?= $this->Form->control('artist', ['label' => 'Artist']) ?>
<?= $this->Form->button('Send request') ?>
<?= $this->Form->end() ?>
</div>