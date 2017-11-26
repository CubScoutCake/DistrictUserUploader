<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScoutGroup[]|\Cake\Collection\CollectionInterface $scoutGroups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scout Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scoutGroups index large-9 medium-8 columns content">
    <h3><?= __('Scout Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scout_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_stripped') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scoutGroups as $scoutGroup): ?>
            <tr>
                <td><?= $this->Number->format($scoutGroup->id) ?></td>
                <td><?= h($scoutGroup->scout_group) ?></td>
                <td><?= $this->Number->format($scoutGroup->number_stripped) ?></td>
                <td><?= h($scoutGroup->created) ?></td>
                <td><?= h($scoutGroup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scoutGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scoutGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scoutGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoutGroup->id)]) ?>
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
