<h1>Connexion</h1>

<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Se connecter') ?>
<?= $this->Form->end() ?>

<p style="margin-top: 1rem;">
    Pas encore de compte ?
    <?= $this->Html->link('Créer un compte', ['action' => 'register']) ?>
</p>
