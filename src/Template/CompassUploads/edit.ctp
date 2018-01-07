<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompassUpload $compassUpload
 */
?>
<div class="compassUploads form large-9 medium-8 columns content">
    <?= $this->Form->create($compassUpload) ?>
    <fieldset>
        <legend><?= __('Edit Compass Upload') ?></legend>
        <?php
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
