<h1>Demandes en attente</h1>

<table>
    <tr>
        <th>Utilisateur</th>
        <th>Type</th>
        <th>Détails</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($requests as $req): ?>
    <tr>
        <td><?= h($req->user->email) ?></td>
        <td><?= ucfirst(h($req->type)) ?></td>
        <td><?= nl2br(h($req->data)) ?></td>
        <td><?= h($req->status) ?></td>
        <td>
            <?= $this->Form->postLink('Valider', ['action' => 'approve', $req->id]) ?>
            <?= $this->Form->postLink('Refuser', ['action' => 'reject', $req->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
