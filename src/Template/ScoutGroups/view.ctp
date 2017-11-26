<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScoutGroup $scoutGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scout Group'), ['action' => 'edit', $scoutGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scout Group'), ['action' => 'delete', $scoutGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoutGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scout Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scout Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scoutGroups view large-9 medium-8 columns content">
    <h3><?= h($scoutGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Scout Group') ?></th>
            <td><?= h($scoutGroup->scout_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scoutGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Stripped') ?></th>
            <td><?= $this->Number->format($scoutGroup->number_stripped) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scoutGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scoutGroup->modified) ?></td>
        </tr>
    </table>
</div>
