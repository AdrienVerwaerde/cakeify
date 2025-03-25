<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Album'), ['action' => 'edit', $album->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __('Delete Album'),
                ['action' => 'delete', $album->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Albums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Album'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column column-80">
        <div class="albums view content">
            <div style="display: flex;">
                <h3><?= h($album->name) ?></h3>
                <?php if ($this->Identity->isLoggedIn()) : ?>
                    <?= $this->Form->postLink(
                        $isFavorited ? '♥' : '♡',
                        ['controller' => 'Favorites', 'action' => 'toggle', 'album', $album->id],
                        [
                            'escape' => false,
                            'class' => 'favorite-toggle',
                            'style' => 'margin-top: -0.5rem; font-size: 3rem; color: ' . ($isFavorited ? 'crimson' : '#aaa') . '; text-decoration: none; border: none; background: transparent; cursor: pointer;'
                        ]
                    ) ?>
                    
            </div>
        <?php endif; ?>

            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($album->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Artist') ?></th>
                    <td>
                        <?= $this->Html->link(
                            h($album->artist->name ?? 'Inconnu'),
                            ['controller' => 'Artists', 'action' => 'view', $album->artist_id]
                        ) ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Release Date') ?></th>
                    <td><?= h($album->release_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($album->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($album->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($album->modified) ?></td>
                </tr>
            </table>

            <?php if (!empty($album->spotify_link)) : ?>
                <div style="margin: 2rem 0;">
                    <h4><?= __('Listen') ?></h4>
                    <iframe
                        src="<?= h($album->spotify_link) ?>"
                        width="100%"
                        height="152"
                        frameborder="0"
                        allowtransparency="true"
                        allow="encrypted-media"
                        style="border-radius: 12px;"
                    ></iframe>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
