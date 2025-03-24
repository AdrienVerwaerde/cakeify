<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>cake</span>ify</a>
        </div>
        <div class="top-nav-links">
        <ul style="list-style: none; display: flex; gap: 1rem; align-items: center; margin: 0; padding: 0;">
        <li><?= $this->Html->link('Accueil', '/') ?></li>
        <li><?= $this->Html->link('Utilisateurs', ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Artistes', ['controller' => 'Artists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Albums', ['controller' => 'Albums', 'action' => 'index']) ?></li>

        <?php if ($this->Identity->isLoggedIn()): ?>
            <li>
                <?= $this->Form->postLink('Déconnexion', ['controller' => 'Users', 'action' => 'logout'], ['confirm' => 'Se déconnecter ?']) ?>
        
            </li>
        <?php else: ?>
            <li style="margin-left: auto;">
                <?= $this->Html->link('Connexion', ['controller' => 'Users', 'action' => 'login']) ?>
            </li>
        <?php endif; ?>
    </ul>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
