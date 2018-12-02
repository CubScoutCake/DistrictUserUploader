<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequest $joinRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Join Request'), ['action' => 'edit', $joinRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Join Request'), ['action' => 'delete', $joinRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $joinRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Join Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Join Statuses'), ['controller' => 'JoinStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Join Status'), ['controller' => 'JoinStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="joinRequests view large-9 medium-8 columns content">
    <h3><?= h($joinRequest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Join Status') ?></th>
            <td><?= $joinRequest->has('join_status') ? $this->Html->link($joinRequest->join_status->id, ['controller' => 'JoinStatuses', 'action' => 'view', $joinRequest->join_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Email') ?></th>
            <td><?= h($joinRequest->contact_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Phone') ?></th>
            <td><?= h($joinRequest->contact_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent First Name') ?></th>
            <td><?= h($joinRequest->parent_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Last Name') ?></th>
            <td><?= h($joinRequest->parent_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Young Person First Name') ?></th>
            <td><?= h($joinRequest->young_person_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Young Person Last Name') ?></th>
            <td><?= h($joinRequest->young_person_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($joinRequest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($joinRequest->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($joinRequest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($joinRequest->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Young Person') ?></th>
            <td><?= $joinRequest->young_person ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sections') ?></h4>
        <?php if (!empty($joinRequest->sections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Section') ?></th>
                <th scope="col"><?= __('Section Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Scout Group Id') ?></th>
                <th scope="col"><?= __('Wp Section Id') ?></th>
                <th scope="col"><?= __('Join Order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($joinRequest->sections as $sections): ?>
            <tr>
                <td><?= h($sections->id) ?></td>
                <td><?= h($sections->section) ?></td>
                <td><?= h($sections->section_type_id) ?></td>
                <td><?= h($sections->created) ?></td>
                <td><?= h($sections->modified) ?></td>
                <td><?= h($sections->scout_group_id) ?></td>
                <td><?= h($sections->wp_section_id) ?></td>
                <td><?= h($sections->join_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
