<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpRole[]|\Cake\Collection\CollectionInterface $wpRoles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wp Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contact'), ['controller' => 'Contact', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contact', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wpRoles index large-9 medium-8 columns content">
    <h3><?= __('Wp Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wp_role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wpRoles as $wpRole): ?>
            <tr>
                <td><?= $this->Number->format($wpRole->id) ?></td>
                <td><?= h($wpRole->wp_role) ?></td>
                <td><?= h($wpRole->created) ?></td>
                <td><?= h($wpRole->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wpRole->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wpRole->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wpRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wpRole->id)]) ?>
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
