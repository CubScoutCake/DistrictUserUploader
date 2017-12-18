<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompassUpload $compassUpload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $compassUpload->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $compassUpload->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Compass Uploads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List File Uploads'), ['controller' => 'FileUploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File Upload'), ['controller' => 'FileUploads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compassUploads form large-9 medium-8 columns content">
    <?= $this->Form->create($compassUpload) ?>
    <fieldset>
        <legend><?= __('Edit Compass Upload') ?></legend>
        <?php
            echo $this->Form->control('file_upload_id', ['options' => $fileUploads]);
            echo $this->Form->control('membership_number');
            echo $this->Form->control('title');
            echo $this->Form->control('forenames');
            echo $this->Form->control('surname');
            echo $this->Form->control('address');
            echo $this->Form->control('address_line1');
            echo $this->Form->control('address_line2');
            echo $this->Form->control('address_line3');
            echo $this->Form->control('address_town');
            echo $this->Form->control('address_county');
            echo $this->Form->control('postcode');
            echo $this->Form->control('address_country');
            echo $this->Form->control('role');
            echo $this->Form->control('location');
            echo $this->Form->control('Phone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
