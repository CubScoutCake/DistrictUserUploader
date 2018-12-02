<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequestsSection[]|\Cake\Collection\CollectionInterface $joinRequestsSections
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Join Requests Section'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Join Requests'), ['controller' => 'JoinRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Join Request'), ['controller' => 'JoinRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="joinRequestsSections index large-9 medium-8 columns content">
    <h3><?= __('Join Requests Sections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('join_request_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('join_status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($joinRequestsSections as $joinRequestsSection): ?>
            <tr>
                <td><?= $joinRequestsSection->has('section') ? $this->Html->link($joinRequestsSection->section->section, ['controller' => 'Sections', 'action' => 'view', $joinRequestsSection->section->id]) : '' ?></td>
                <td><?= $joinRequestsSection->has('join_request') ? $this->Html->link($joinRequestsSection->join_request->id, ['controller' => 'JoinRequests', 'action' => 'view', $joinRequestsSection->join_request->id]) : '' ?></td>
                <td><?= $this->Number->format($joinRequestsSection->join_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $joinRequestsSection->section_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $joinRequestsSection->section_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $joinRequestsSection->section_id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequestsSection->section_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
