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
            <h3><?= h($artist->name) ?></h3>
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
                <th><?= __('Extract') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($artist->albums as $album) : ?>
            <tr>
                <td><?= h($album->title) ?></td>
                <td><?= h($album->release_date) ?></td>
                <td>
                    <?php if (!empty($album->spotify_link)) : ?>
                        <iframe
                            src="<?= h($album->spotify_link) ?>"
                            width="250"
                            height="80"
                            frameborder="0"
                            allowtransparency="true"
                            allow="encrypted-media"
                            style="border-radius: 8px;"
                        ></iframe>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>
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
                <h4><?= __('Related Follows') ?></h4>
                <?php if (!empty($artist->follows)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Artist Id') ?></th>
                                <th><?= __('Created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($artist->follows as $follow) : ?>
                                <tr>
                                    <td><?= h($follow->id) ?></td>
                                    <td><?= h($follow->user_id) ?></td>
                                    <td><?= h($follow->artist_id) ?></td>
                                    <td><?= h($follow->created) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Follows', 'action' => 'view', $follow->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Follows', 'action' => 'edit', $follow->id]) ?>
                                        <?= $this->Form->postLink(
                                            __('Delete'),
                                            ['controller' => 'Follows', 'action' => 'delete', $follow->id],
                                            [
                                                'method' => 'delete',
                                                'confirm' => __('Are you sure you want to delete # {0}?', $follow->id),
                                            ]
                                        ) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>