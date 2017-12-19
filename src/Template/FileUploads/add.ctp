<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FileUpload $fileUpload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List File Uploads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auth Users'), ['controller' => 'AuthUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auth User'), ['controller' => 'AuthUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Compass Uploads'), ['controller' => 'CompassUploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compass Upload'), ['controller' => 'CompassUploads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fileUploads form large-9 medium-8 columns content">
    <?= $this->Form->create($fileUpload, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add File Upload') ?></legend>
	    <?php echo $this->Form->input('file_name', ['type' => 'file']);  ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
