<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinStatus $joinStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Join Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Join Requests'), ['controller' => 'JoinRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Join Request'), ['controller' => 'JoinRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="joinStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($joinStatus) ?>
    <fieldset>
        <legend><?= __('Add Join Status') ?></legend>
        <?php
            echo $this->Form->control('join_status');
            echo $this->Form->control('status_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
