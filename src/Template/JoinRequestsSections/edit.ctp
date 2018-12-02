<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequestsSection $joinRequestsSection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $joinRequestsSection->section_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequestsSection->section_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Join Requests Sections'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Join Requests'), ['controller' => 'JoinRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Join Request'), ['controller' => 'JoinRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="joinRequestsSections form large-9 medium-8 columns content">
    <?= $this->Form->create($joinRequestsSection) ?>
    <fieldset>
        <legend><?= __('Edit Join Requests Section') ?></legend>
        <?php
            echo $this->Form->control('join_status_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
