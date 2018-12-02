<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinStatus $joinStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Join Status'), ['action' => 'edit', $joinStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Join Status'), ['action' => 'delete', $joinStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Join Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Join Requests'), ['controller' => 'JoinRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Request'), ['controller' => 'JoinRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="joinStatuses view large-9 medium-8 columns content">
    <h3><?= h($joinStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Join Status') ?></th>
            <td><?= h($joinStatus->join_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($joinStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Type') ?></th>
            <td><?= $this->Number->format($joinStatus->status_type) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Join Requests') ?></h4>
        <?php if (!empty($joinStatus->join_requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Join Status Id') ?></th>
                <th scope="col"><?= __('Contact Email') ?></th>
                <th scope="col"><?= __('Contact Phone') ?></th>
                <th scope="col"><?= __('Young Person') ?></th>
                <th scope="col"><?= __('Parent First Name') ?></th>
                <th scope="col"><?= __('Parent Last Name') ?></th>
                <th scope="col"><?= __('Young Person First Name') ?></th>
                <th scope="col"><?= __('Young Person Last Name') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($joinStatus->join_requests as $joinRequests): ?>
            <tr>
                <td><?= h($joinRequests->id) ?></td>
                <td><?= h($joinRequests->join_status_id) ?></td>
                <td><?= h($joinRequests->contact_email) ?></td>
                <td><?= h($joinRequests->contact_phone) ?></td>
                <td><?= h($joinRequests->young_person) ?></td>
                <td><?= h($joinRequests->parent_first_name) ?></td>
                <td><?= h($joinRequests->parent_last_name) ?></td>
                <td><?= h($joinRequests->young_person_first_name) ?></td>
                <td><?= h($joinRequests->young_person_last_name) ?></td>
                <td><?= h($joinRequests->date_of_birth) ?></td>
                <td><?= h($joinRequests->created) ?></td>
                <td><?= h($joinRequests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JoinRequests', 'action' => 'view', $joinRequests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JoinRequests', 'action' => 'edit', $joinRequests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JoinRequests', 'action' => 'delete', $joinRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
