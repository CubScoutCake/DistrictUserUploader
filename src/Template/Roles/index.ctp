<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */

$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Roles',
	['controller' => 'Roles', 'action' => 'index'],
	['class' => 'breadcrumb-item active']
);


?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-cog fa-fw"></i> <?= __('Roles') ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Upload New Spreadsheet',
				['controller' => 'FileUploads', 'action' => 'add'],
				['class' => 'button btn btn-secondary']
			) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col" >
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('role_type_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('contact_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified_at') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $role->has('role_type') ? $this->Html->link($role->role_type->role_type, ['controller' => 'RoleTypes', 'action' => 'view', $role->role_type->id]) : '' ?></td>
                        <td><?= $role->has('section') ? $this->Html->link($role->section->section, ['controller' => 'Sections', 'action' => 'view', $role->section->id]) : '' ?></td>
                        <td><?= $role->has('contact') ? $this->Html->link($role->contact->full_name, ['controller' => 'Sections', 'action' => 'view', $role->contact->id]) : '' ?></td>
                        <td><?= $this->Time->i18nformat($role->created_at,'dd-MMM-yy HH:mm') ?></td>
                        <td><?= $this->Time->i18nformat($role->modified_at,'dd-MMM-yy HH:mm') ?></td>
                        <td class="actions">
		                    <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
		                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
		                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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
