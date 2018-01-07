<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleType $roleType
 */
?>
<?php

use \Cake\Utility\Inflector;

$this->Breadcrumbs->add(
	'Role Types',
	['controller' => 'RoleTypes', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $roleType->id,
	['controller' => 'RoleTypes', 'action' => 'view', $roleType->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-address-card fa-fw"></i> <?= h($roleType->role_type) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Edit',
				['controller' => 'RoleTypes', 'action' => 'edit', $roleType->id],
				['class' => 'button btn btn-secondary']
			) ?>
			<?= $this->Form->postLink(__('Delete'), ['controller' => 'RoleTypes', 'action' => 'delete', $roleType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roleType->id), 'class' => 'button btn btn-secondary']) ?>
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
                                <th scope="row"><?= __('Role Type') ?></th>
                                <td><?= h($roleType->role_type) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Role Abbreviation') ?></th>
                                <td><?= h($roleType->role_abbreviation) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Section Type') ?></th>
                                <td><?= $roleType->has('section_type') ? $this->Html->link($roleType->section_type->section_type, ['controller' => 'SectionTypes', 'action' => 'view', $roleType->section_type->id]) : '' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php if (!empty($roleType->contacts)): ?>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title"><i class="fas fa-lock-open fa-fw"></i> <?= __('Contact Roles') ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col"><?= __('Membership Number') ?></th>
                                <th scope="col"><?= __('First Name') ?></th>
                                <th scope="col"><?= __('Last Name') ?></th>
                                <th scope="col"><?= __('Email') ?></th>
                                <th scope="col"><?= __('Validated') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
	                        <?php foreach ($roleType->contacts as $contacts): ?>
                                <tr>
                                    <td><?= h($contacts->membership_number) ?></td>
                                    <td><?= h($contacts->first_name) ?></td>
                                    <td><?= h($contacts->last_name) ?></td>
                                    <td><?= h($contacts->email) ?></td>
                                    <td><?= $contacts->validated ? 'Yes' : 'No' ?></td>
                                    <td class="actions">
				                        <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
				                        <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
				                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
                                    </td>
                                </tr>
							<?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php endif; ?>
