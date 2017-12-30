<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit[]|\Cake\Collection\CollectionInterface $audits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Audit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Auth Users'), ['controller' => 'AuthUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Auth User'), ['controller' => 'AuthUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audits index large-9 medium-8 columns content">
    <h3><?= __('Audits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audit_field') ?></th>
                <th scope="col"><?= $this->Paginator->sort('audit_table') ?></th>
                <th scope="col"><?= $this->Paginator->sort('original_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auth_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('change_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($audits as $audit): ?>
            <tr>
                <td><?= $this->Number->format($audit->id) ?></td>
                <td><?= h($audit->audit_field) ?></td>
                <td><?= h($audit->audit_table) ?></td>
                <td><?= h($audit->original_value) ?></td>
                <td><?= h($audit->modified_value) ?></td>
                <td><?= $audit->has('auth_user') ? $this->Html->link($audit->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $audit->auth_user->id]) : '' ?></td>
                <td><?= h($audit->change_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $audit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $audit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $audit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audit->id)]) ?>
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
