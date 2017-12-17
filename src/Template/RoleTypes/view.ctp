<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleType $roleType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role Type'), ['action' => 'edit', $roleType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role Type'), ['action' => 'delete', $roleType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Role Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Section Types'), ['controller' => 'SectionTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section Type'), ['controller' => 'SectionTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roleTypes view large-9 medium-8 columns content">
    <h3><?= h($roleType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role Type') ?></th>
            <td><?= h($roleType->role_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role Abbreviation') ?></th>
            <td><?= h($roleType->role_abbreviation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Type') ?></th>
            <td><?= $roleType->has('section_type') ? $this->Html->link($roleType->section_type->id, ['controller' => 'SectionTypes', 'action' => 'view', $roleType->section_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($roleType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($roleType->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Type Id') ?></th>
                <th scope="col"><?= __('Section Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($roleType->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->role_type_id) ?></td>
                <td><?= h($roles->section_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
