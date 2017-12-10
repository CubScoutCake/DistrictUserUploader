<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpRole $wpRole
 */
?>
<div class="wpRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($wpRole) ?>
    <fieldset>
        <legend><?= __('Add Wp Role') ?></legend>
        <?php
            echo $this->Form->control('wp_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
