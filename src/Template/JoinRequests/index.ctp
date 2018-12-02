<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequest[]|\Cake\Collection\CollectionInterface $joinRequests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Join Request'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Join Statuses'), ['controller' => 'JoinStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Join Status'), ['controller' => 'JoinStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="joinRequests index large-9 medium-8 columns content">
    <h3><?= __('Join Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('join_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('young_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('young_person_first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('young_person_last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($joinRequests as $joinRequest): ?>
            <tr>
                <td><?= $this->Number->format($joinRequest->id) ?></td>
                <td><?= $joinRequest->has('join_status') ? $this->Html->link($joinRequest->join_status->id, ['controller' => 'JoinStatuses', 'action' => 'view', $joinRequest->join_status->id]) : '' ?></td>
                <td><?= h($joinRequest->contact_email) ?></td>
                <td><?= h($joinRequest->contact_phone) ?></td>
                <td><?= h($joinRequest->young_person) ?></td>
                <td><?= h($joinRequest->parent_first_name) ?></td>
                <td><?= h($joinRequest->parent_last_name) ?></td>
                <td><?= h($joinRequest->young_person_first_name) ?></td>
                <td><?= h($joinRequest->young_person_last_name) ?></td>
                <td><?= h($joinRequest->date_of_birth) ?></td>
                <td><?= h($joinRequest->created) ?></td>
                <td><?= h($joinRequest->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $joinRequest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $joinRequest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $joinRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequest->id)]) ?>
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
