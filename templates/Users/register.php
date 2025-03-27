<div class="content">
    <h1>Sign up</h1>

    <?= $this->Form->create($user) ?>
    <?= $this->Form->control('email', ['label' => 'Email']) ?>
    <?= $this->Form->control('password', [
        'label' => 'Password',
        'type' => 'password'
    ]) ?>
    <?= $this->Form->button('Create account') ?>
    <?= $this->Form->end() ?>

    <p><?= $this->Html->link('Already have an account? Login', ['action' => 'login']) ?></p>
</div>