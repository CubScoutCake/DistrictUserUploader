<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequestsSection $joinRequestsSection
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Join Requests Section'), ['action' => 'edit', $joinRequestsSection->section_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Join Requests Section'), ['action' => 'delete', $joinRequestsSection->section_id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequestsSection->section_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Join Requests Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Requests Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Join Requests'), ['controller' => 'JoinRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Request'), ['controller' => 'JoinRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="joinRequestsSections view large-9 medium-8 columns content">
    <h3><?= h($joinRequestsSection->section_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?= $joinRequestsSection->has('section') ? $this->Html->link($joinRequestsSection->section->section, ['controller' => 'Sections', 'action' => 'view', $joinRequestsSection->section->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Join Request') ?></th>
            <td><?= $joinRequestsSection->has('join_request') ? $this->Html->link($joinRequestsSection->join_request->id, ['controller' => 'JoinRequests', 'action' => 'view', $joinRequestsSection->join_request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Join Status Id') ?></th>
            <td><?= $this->Number->format($joinRequestsSection->join_status_id) ?></td>
        </tr>
    </table>
</div>
