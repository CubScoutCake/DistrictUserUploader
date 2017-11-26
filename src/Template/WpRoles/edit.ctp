<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpRole $wpRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wpRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wpRole->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wp Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contact'), ['controller' => 'Contact', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contact', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wpRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($wpRole) ?>
    <fieldset>
        <legend><?= __('Edit Wp Role') ?></legend>
        <?php
            echo $this->Form->control('wp_role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
