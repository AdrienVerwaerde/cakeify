<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artist $artist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Artist'), ['action' => 'edit', $artist->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Artist'), ['action' => 'delete', $artist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artist->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Artists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Artist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="artists view content">
            <div style="display: flex; gap: 1.5rem;">
                <h3><?= h($artist->name) ?></h3>
                <?php if ($this->Identity->isLoggedIn()) : ?>
                    <?= $this->Form->postLink(
                        $isFavorited ? '♥' : '♡',
                        ['controller' => 'Favorites', 'action' => 'toggle', 'artist', $artist->id],
                        [
                            'escape' => false,
                            'class' => 'favorite-toggle',
                            'style' => 'margin-top: -0.5rem; font-size: 3rem; color: ' . ($isFavorited ? 'crimson' : '#aaa') . '; text-decoration: none; border: none; background: transparent; cursor: pointer;'
                        ]
                    ) ?>
                    <?php if ($this->Identity->isLoggedIn()) : ?>
                        <div style="margin-left: auto;">
                            <?= $this->Form->postLink(
                                $isFollowing ? 'Unfollow' : 'Follow',
                                ['controller' => 'Follows', 'action' => 'toggle', $artist->id],
                                ['class' => 'button']
                            ) ?>
                        </div>
                    <?php endif; ?>


            </div>
        <?php endif; ?>
        <table>
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($artist->name) ?></td>
            </tr>
            <tr>
                <?php if (!empty($artist->spotify_link)) : ?>
                    <div style="margin: 2rem 0;">
                        <h4><?= __('Listen') ?></h4>
                        <iframe
                            src="<?= h($artist->spotify_link) ?>"
                            width="100%"
                            height="152"
                            frameborder="0"
                            allowtransparency="true"
                            allow="encrypted-media"
                            style="border-radius: 12px;"></iframe>
                    </div>
                <?php endif; ?>

            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($artist->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($artist->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($artist->modified) ?></td>
            </tr>
        </table>
        <div class="text">
            <strong><?= __('Description') ?></strong>
            <blockquote>
                <?= $this->Text->autoParagraph(h($artist->description)); ?>
            </blockquote>
        </div>
        <div class="related">
            <h4><?= __('Related Albums') ?></h4>
            <?php if (!empty($artist->albums)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Release Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($artist->albums as $album) : ?>
                            <tr>
                                <td><?= h($album->title) ?></td>
                                <td><?= h($album->release_date) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Albums', 'action' => 'view', $album->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Albums', 'action' => 'edit', $album->id]) ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['controller' => 'Albums', 'action' => 'delete', $album->id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $album->id),
                                            'method' => 'post',
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <div class="related">
            <h4><?= __('Followers') ?></h4>
            <?php if (!empty($artist->follows)) : ?>
                <ul>
                    <?php foreach ($artist->follows as $follow): ?>
                        <li>
                            <?= $this->Html->link(
                                h($follow->user->email ?? '[Utilisateur supprimé]'),
                                ['controller' => 'Users', 'action' => 'view', $follow->user_id]
                            ) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    <?php endif; ?>

        </div>
    </div>
</div>