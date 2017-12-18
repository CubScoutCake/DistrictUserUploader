<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompassUpload[]|\Cake\Collection\CollectionInterface $compassUploads
 */

$this->Breadcrumbs->add(
	'File Uploads',
	['controller' => 'FileUploads', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Compass Records',
	['controller' => 'CompassUploads', 'action' => 'index'],
	['class' => 'breadcrumb-item active']
);

?>
<div class="row">
    <div class="col" >
        <h2><i class="far fa-compass fa-fw"></i><?= __(' Compass Records') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('file_upload_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('membership_number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('forenames') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compassUploads as $compassUpload): ?>
                    <tr>
                        <td><?= $compassUpload->has('file_upload') ? $this->Html->link($compassUpload->file_upload->file_name, ['controller' => 'FileUploads', 'action' => 'view', $compassUpload->file_upload->id]) : '' ?></td>
                        <td><?= $this->Number->format($compassUpload->membership_number, ['pattern' => '########']) ?></td>
                        <td><?= h($compassUpload->forenames) ?></td>
                        <td><?= h($compassUpload->surname) ?></td>
                        <td><?= h($compassUpload->email) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $compassUpload->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $compassUpload->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $compassUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compassUpload->id)]) ?>
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