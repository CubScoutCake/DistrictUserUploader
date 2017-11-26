<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpRole $wpRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wp Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contact'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
