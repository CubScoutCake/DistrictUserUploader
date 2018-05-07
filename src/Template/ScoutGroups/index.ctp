<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */

$this->Breadcrumbs->add(
	__('Scout Groups'),
	['class' => 'breadcrumb-item active']
);


?>
<div class="row">
    <div class="col" >
        <h2><i class="fas fa-paw fa-fw"></i><?= __(' Scout Groups') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('scout_group') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('group_alias') ?></th>
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
                        <td><?= h($scoutGroup->group_alias) ?></td>
                        <td><?= $this->Number->format($scoutGroup->number_stripped) ?></td>
                        <td><?= $this->Time->format($scoutGroup->created, 'dd-MMM-yy HH:ss') ?></td>
                        <td><?= $this->Time->format($scoutGroup->modified, 'dd-MMM-yy HH:ss') ?></td>
                        <td class="actions">
			                <?= $this->Html->link(__('View'), ['action' => 'view', $scoutGroup->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
			                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scoutGroup->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
			                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scoutGroup->id], ['class' => 'button btn btn-sm btn-outline-secondary', 'confirm' => __('Are you sure you want to delete # {0}?', $scoutGroup->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <div class="paginator">
                    <ul class="pagination justify-content-center">
                        <?= $this->Paginator->first('<<') ?>
                        <?= $this->Paginator->prev('<') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('>') ?>
                        <?= $this->Paginator->last('>>') ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-muted text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>