<?php
$cakeDescription = 'LBD User Uploader';
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
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-5">
                        <?= $this->Flash->render() ?>
                        <?= $this->Flash->render('auth') ?>
                    </div>
                </div>
	            <?= $this->fetch('content') ?>
            </main>
            <footer>
            </footer>
        </div>
    </div>
</body>
</html>
