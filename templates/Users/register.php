<h1>Créer un compte</h1>

<?= $this->Form->create($user, ['type' => 'post']) ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password', ['type' => 'password']) ?>
<?= $this->Form->button('Créer mon compte') ?>
<?= $this->Form->end() ?>
