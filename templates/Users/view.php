<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __('Delete User'),
                ['action' => 'delete', $user->id],
                [
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                    'class' => 'side-nav-item'
                ]
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>

            <?php if (!empty($user->favorites)) : ?>
                <div class="related">
                    <h4><?= __('Favoris') ?></h4>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Type') ?></th>
                                <th><?= __('Nom / Titre') ?></th>
                                <th><?= __('Ajouté le') ?></th>
                            </tr>
                            <?php foreach ($user->favorites as $favorite) : ?>
                                <tr>
                                    <td><?= ucfirst(h($favorite->favoritable_type)) ?></td>
                                    <td>
                                        <?php if ($favorite->favoritable_type === 'artist') : ?>
                                            <?= $this->Html->link(
                                                h($favorite->artist->name ?? '[Artiste supprimé]'),
                                                ['controller' => 'Artists', 'action' => 'view', $favorite->favoritable_id]
                                            ) ?>
                                        <?php elseif ($favorite->favoritable_type === 'album') : ?>
                                            <?= $this->Html->link(
                                                h($favorite->album->title ?? '[Album supprimé]'),
                                                ['controller' => 'Albums', 'action' => 'view', $favorite->favoritable_id]
                                            ) ?>
                                        <?php else: ?>
                                            <?= '[Objet inconnu]' ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= h($favorite->created) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endif; ?>


            <?php if (!empty($user->follows)) : ?>
                <div class="related">
                    <h4><?= __('Artistes suivis') ?></h4>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Artiste') ?></th>
                                <th><?= __('Depuis le') ?></th>
                            </tr>
                            <?php foreach ($user->follows as $follow) : ?>
                                <tr>
                                    <td>
                                        <?= $this->Html->link(
                                            h($follow->artist->name ?? '[Artiste supprimé]'),
                                            ['controller' => 'Artists', 'action' => 'view', $follow->artist_id]
                                        ) ?>
                                    </td>
                                    <td><?= h($follow->created) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endif; ?>


            <?php if (!empty($user->requests)): ?>
                <div class="related">
                    <h4><?= __('Related Requests') ?></h4>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('ID') ?></th>
                                <th><?= __('Type') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Created') ?></th>
                            </tr>
                            <?php foreach ($user->requests as $request): ?>
                                <tr>
                                    <td><?= h($request->id) ?></td>
                                    <td><?= h($request->type) ?></td>
                                    <td><?= h($request->status) ?></td>
                                    <td><?= h($request->created) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>