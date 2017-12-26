<?php
$this->Breadcrumbs->add(
	'File Uploads',
	['controller' => 'FileUploads', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $fileUpload->id,
	['controller' => 'FileUploads', 'action' => 'view', $fileUpload->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-upload fa-fw"></i> <?= h($fileUpload->file_name) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Auto Merge',
				['controller' => 'FileUploads', 'action' => 'auto', $fileUpload->id],
				['class' => 'button btn btn-secondary']
			) ?>
			<?= $this->Form->postLink(__('Delete'), ['controller' => 'FileUploads', 'action' => 'delete', $fileUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fileUpload->id), 'class' => 'button btn btn-secondary']) ?>

            <!--<div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>-->
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('File Upload') ?></th>
                                <td><?= h($fileUpload->file_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Auth User') ?></th>
                                <td><?= $fileUpload->has('auth_user') ? $this->Html->link($fileUpload->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $fileUpload->auth_user->id]) : '' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= $this->Time->i18nformat($fileUpload->created_at,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= $this->Time->i18nformat($fileUpload->updated_at,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-compass fa-fw"></i> <?= __('Related Compass Uploads') ?></h4>
            </div>
            <div class="card-body">
                <?php if (!empty($fileUpload->compass_uploads)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Membership Number') ?></th>
                                <th scope="col"><?= __('First Name') ?></th>
                                <th scope="col"><?= __('Last Name') ?></th>
                                <th scope="col"><?= __('Clean Group') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($fileUpload->compass_uploads as $compassUploads): ?>
                            <tr>
                                <td><?= h($compassUploads->id) ?></td>
                                <td><?= h($compassUploads->membership_number) ?></td>
                                <td><?= h($compassUploads->first_name) ?></td>
                                <td><?= h($compassUploads->last_name) ?></td>
                                <td><?= h($compassUploads->clean_group) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'CompassUploads', 'action' => 'view', $compassUploads->id]) ?>
                                    <?= $this->Html->link(__('Merge'), ['controller' => 'CompassUploads', 'action' => 'merge', $compassUploads->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CompassUploads', 'action' => 'delete', $compassUploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compassUploads->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
