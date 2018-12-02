<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RequestTrace $requestTrace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Request Trace'), ['action' => 'edit', $requestTrace->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Request Trace'), ['action' => 'delete', $requestTrace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestTrace->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Request Traces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Trace'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requestTraces view large-9 medium-8 columns content">
    <h3><?= h($requestTrace->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contact Hash') ?></th>
            <td><?= h($requestTrace->contact_hash) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolver') ?></th>
            <td><?= h($requestTrace->resolver) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trace Type') ?></th>
            <td><?= h($requestTrace->trace_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requestTrace->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($requestTrace->created_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolved Date') ?></th>
            <td><?= h($requestTrace->resolved_date) ?></td>
        </tr>
    </table>
</div>
