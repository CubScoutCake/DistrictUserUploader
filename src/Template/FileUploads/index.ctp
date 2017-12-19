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
        <h2><i class="fas fa-user fa-fw"></i> <?= __('Auth Users') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('file_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('auth_user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fileUploads as $fileUpload): ?>
                    <tr>
                        <td><?= $this->Number->format($fileUpload->id) ?></td>
                        <td><?= h($fileUpload->file_name) ?></td>
                        <td><?= $fileUpload->has('auth_user') ? $this->Html->link($fileUpload->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $fileUpload->auth_user->id]) : '' ?></td>
                        <td><?= h($fileUpload->created_at) ?></td>
                        <td><?= h($fileUpload->updated_at) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $fileUpload->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fileUpload->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fileUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fileUpload->id)]) ?>
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
