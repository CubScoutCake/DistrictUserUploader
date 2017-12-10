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
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->element('style'); ?>
	<?= $this->element('script'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->cell('NavBar') ?>
    <div class="container-fluid">
        <div class="row">
            <?= $this->cell('SideBar') ?>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

<!--                <div class="row">-->
<!--                    <div class="col">-->
                        <nav aria-label="breadcrumb" role="navigation">
                            <?php
                            $this->Breadcrumbs->prepend(
                                'Home',
                                ['controller' => 'Landing', 'action' => 'welcome'],
                                ['class' => 'breadcrumb-item']
                            );

                            echo $this->Breadcrumbs->render(
                                ['class' => 'breadcrumb'],
                                ['class' => 'breadcrumb-item']
                            );
                            ?>
                        </nav>
<!--                    </div>-->
<!--                </div>-->

	            <?= $this->Flash->render() ?>
	            <?= $this->Flash->render('auth') ?>

	            <?= $this->fetch('content') ?>

            </main>
            <footer>
            </footer>
        </div>
    </div>
</body>
</html>
