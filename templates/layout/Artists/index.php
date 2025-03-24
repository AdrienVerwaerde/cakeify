<h1>Liste des artistes</h1>

<?= $this->Html->link('Ajouter un artiste', ['action' => 'add'], ['class' => 'button']) ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Spotify</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artists as $artist): ?>
        <tr>
            <td><?= h($artist->id) ?></td>
            <td><?= h($artist->name) ?></td>
            <td><?= h($artist->description) ?></td>
            <td>
                <?php if (!empty($artist->spotify_link)): ?>
                    <a href="<?= h($artist->spotify_link) ?>" target="_blank">Écouter</a>
                <?php endif; ?>
            </td>
            <td>
                <?= $this->Html->link('Voir', ['action' => 'view', $artist->id]) ?> |
                <?= $this->Html->link('Modifier', ['action' => 'edit', $artist->id]) ?> |
                <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $artist->id], [
                    'confirm' => 'Supprimer cet artiste ?'
                ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <?= $this->Paginator->numbers() ?>
    <p><?= $this->Paginator->counter('Page {{page}} sur {{pages}}, {{count}} artiste(s) au total') ?></p>
</div>
