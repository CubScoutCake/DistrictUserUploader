<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */

$this->Breadcrumbs->add(
	__('Auth Users'),
	['class' => 'breadcrumb-item active']
);


?>
<div class="row">
    <div class="col" >
        <h2><i class="fas fa-cog fa-fw"></i> <?= __('Role Types') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role_type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role_abbreviation') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('section_type_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roleTypes as $roleType): ?>
                    <tr>
                        <td><?= $this->Number->format($roleType->id) ?></td>
                        <td><?= h($roleType->role_type) ?></td>
                        <td><?= h($roleType->role_abbreviation) ?></td>
                        <td><?= $roleType->has('section_type') ? $this->Html->link($roleType->section_type->section_type, ['controller' => 'SectionTypes', 'action' => 'view', $roleType->section_type->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $roleType->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roleType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roleType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleType->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
</div>