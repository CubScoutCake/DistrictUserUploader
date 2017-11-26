<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Auth User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="authUsers index large-9 medium-8 columns content">
    <h3><?= __('Auth Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authUsers as $authUser): ?>
            <tr>
                <td><?= $this->Number->format($authUser->id) ?></td>
                <td><?= h($authUser->username) ?></td>
                <td><?= h($authUser->first_name) ?></td>
                <td><?= h($authUser->last_name) ?></td>
                <td><?= h($authUser->email) ?></td>
                <td><?= h($authUser->password) ?></td>
                <td><?= h($authUser->created) ?></td>
                <td><?= h($authUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $authUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $authUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $authUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authUser->id)]) ?>
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
