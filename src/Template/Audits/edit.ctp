<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit $audit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $audit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $audit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Audits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Auth Users'), ['controller' => 'AuthUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auth User'), ['controller' => 'AuthUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audits form large-9 medium-8 columns content">
    <?= $this->Form->create($audit) ?>
    <fieldset>
        <legend><?= __('Edit Audit') ?></legend>
        <?php
            echo $this->Form->control('audit_field');
            echo $this->Form->control('audit_table');
            echo $this->Form->control('original_value');
            echo $this->Form->control('modified_value');
            echo $this->Form->control('auth_user_id', ['options' => $authUsers, 'empty' => true]);
            echo $this->Form->control('change_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
