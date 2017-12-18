<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */

$this->Breadcrumbs->add(
	'Scout Groups',
	['controller' => 'ScoutGroups', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Sections',
	['controller' => 'Sections', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

$this->Breadcrumbs->add(
	'Section Types',
	['controller' => 'SectionTypes', 'action' => 'index'],
	['class' => 'active']
);


?>
<div class="row">
    <div class="col" >
        <h2><i class="fas fa-user fa-fw"></i> <?= __('Auth Users') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('section_type') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sectionTypes as $sectionType): ?>
                    <tr>
                        <td><?= $this->Number->format($sectionType->id) ?></td>
                        <td><?= h($sectionType->section_type) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $sectionType->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sectionType->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sectionType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sectionType->id)]) ?>
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
