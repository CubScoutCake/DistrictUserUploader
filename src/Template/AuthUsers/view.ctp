<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser $authUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Auth User'), ['action' => 'edit', $authUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Auth User'), ['action' => 'delete', $authUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Auth Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="authUsers view large-9 medium-8 columns content">
    <h3><?= h($authUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($authUser->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($authUser->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($authUser->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($authUser->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($authUser->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($authUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($authUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($authUser->modified) ?></td>
        </tr>
    </table>
</div>
