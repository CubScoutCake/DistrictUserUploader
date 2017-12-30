<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit $audit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Audit'), ['action' => 'edit', $audit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Audit'), ['action' => 'delete', $audit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Audits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Audit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auth Users'), ['controller' => 'AuthUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth User'), ['controller' => 'AuthUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="audits view large-9 medium-8 columns content">
    <h3><?= h($audit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Audit Field') ?></th>
            <td><?= h($audit->audit_field) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audit Table') ?></th>
            <td><?= h($audit->audit_table) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Original Value') ?></th>
            <td><?= h($audit->original_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified Value') ?></th>
            <td><?= h($audit->modified_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth User') ?></th>
            <td><?= $audit->has('auth_user') ? $this->Html->link($audit->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $audit->auth_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($audit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Change Date') ?></th>
            <td><?= h($audit->change_date) ?></td>
        </tr>
    </table>
</div>
