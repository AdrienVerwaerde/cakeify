<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="stats index content">
    <h1>Stats</h1>

    <h2>🎵 Most Followed Artists</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Follows Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topFollowedArtists as $artist): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(h($artist->name), ['controller' => 'Artists', 'action' => 'view', $artist->id]) ?>
                        </td>
                        <td style="text-align: left; width: 500px;"><?= h($artist->follow_count) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>🎵 Least Followed Artists</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Follows Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leastFollowedArtists as $artist): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(h($artist->name), ['controller' => 'Artists', 'action' => 'view', $artist->id]) ?>
                        </td>
                        <td style="text-align: left; width: 500px;"><?= h($artist->follow_count) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>💿 Most Liked Albums</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Favorites Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topFavoritedAlbums as $album): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(h($album->title), ['controller' => 'Albums', 'action' => 'view', $album->id]) ?>
                        </td>
                        <td style="text-align: left; width: 500px;"><?= h($album->fav_count) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>💿 Least Liked Albums</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Favorites Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leastFavoritedAlbums as $album): ?>
                    <tr>
                        <td>
                            <?= $this->Html->link(h($album->title), ['controller' => 'Albums', 'action' => 'view', $album->id]) ?>
                        </td>
                        <td style="text-align: left; width: 500px;"><?= h($album->fav_count) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>👤 Users With the Most Favorites</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Favorites</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topUsersFavorites as $user): ?>
                    <tr>
                        <td><?= h($user->email) ?></td>
                        <td style="text-align: left; width: 500px;"><?= h($user->fav_count) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
