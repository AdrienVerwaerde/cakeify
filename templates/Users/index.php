<h1>Liste des utilisateurs</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Créé le</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->id) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->role) ?></td>
            <td><?= h($user->created) ?></td>
            <td>
                <?= $this->Html->link('Voir', ['action' => 'view', $user->id]) ?> |
                <?= $this->Html->link('Modifier', ['action' => 'edit', $user->id]) ?> |
                <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $user->id], [
                    'confirm' => 'Êtes-vous sûr ?'
                ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< Début') ?>
        <?= $this->Paginator->prev('< Précédent') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('Suivant >') ?>
        <?= $this->Paginator->last('Fin >>') ?>
    </ul>
    <p><?= $this->Paginator->counter('Page {{page}} sur {{pages}}, {{current}} utilisateur(s) affiché(s) sur {{count}}') ?></p>
</div>
