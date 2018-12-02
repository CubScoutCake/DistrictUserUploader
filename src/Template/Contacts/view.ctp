<?php

use \Cake\Utility\Inflector;

$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $contact->id,
	['controller' => 'Contacts', 'action' => 'view', $contact->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-address-card fa-fw"></i> <?= h($contact->full_name) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Add Role',
				['controller' => 'Roles', 'action' => 'add', $contact->id],
				['class' => 'button btn btn-secondary']
			) ?>
	        <?= $this->Html->link('Edit',
		        ['controller' => 'Contacts', 'action' => 'edit', $contact->id],
		        ['class' => 'button btn btn-secondary']
	        ) ?>
			<?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'button btn btn-secondary']) ?>

            <?php if (!$contact->validated) : ?>
	            <?= $this->Form->postLink(__('Authorise'), ['controller' => 'Contacts', 'action' => 'authorise', $contact->id], ['class' => 'button btn btn-secondary']) ?>
            <?php endif; ?>

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
                                <th scope="row"><?= __('First Name') ?></th>
                                <td><?= h($contact->first_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Last Name') ?></th>
                                <td><?= h($contact->last_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Email') ?></th>
                                <td><?= h($contact->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address') ?></th>
                                <td>
			                        <?= h($contact->address_line_1) ?>,
			                        <?= !empty($contact->address_line_2) ? h($contact->address_line_2) . ',' : '' ?>
			                        <?= h($contact->city) ?>,
			                        <?= h($contact->county) ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Postcode') ?></th>
                                <td><?= h($contact->postcode) ?></td>
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
                                <th scope="row"><?= __('WordPress Role') ?></th>
                                <td><?= $contact->has('wp_role') ? $this->Html->link($contact->wp_role->wp_role, ['controller' => 'WpRoles', 'action' => 'view', $contact->wp_role->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Membership Number') ?></th>
                                <td><?= $this->Number->format($contact->membership_number, ['pattern' => '######']) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= $this->Time->i18nformat($contact->created,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= $this->Time->i18nformat($contact->modified,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php if (!empty($contact->roles)): ?>
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
                            <th scope="col"><?= __('Section') ?></th>
                            <th scope="col"><?= __('Scout Group') ?></th>
                            <th scope="col"><?= __('Section Type') ?></th>
                            <th scope="col"><?= __('Role Type') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($contact->roles as $roles): ?>
                            <tr>
                                <td><?= $this->Html->link($roles->section->section, ['controller' => 'Sections', 'action' => 'view', $roles->section->id]) ?></td>
                                <td><?= $this->Html->link($roles->section->scout_group->group_alias, ['controller' => 'ScoutGroups', 'action' => 'view', $roles->section->scout_group->id]) ?></td>
                                <td><?= $this->Html->link($roles->section->section_type->section_type, ['controller' => 'SectionTypes', 'action' => 'view', $roles->section->section_type->id]) ?></td>
                                <td><?= $this->Html->link($roles->role_type->role_type, ['controller' => 'RoleTypes', 'action' => 'view', $roles->role_type->id]) ?></td>
                                <td class="actions">
	                                <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['class' => 'button btn btn-sm btn-outline-secondary', 'confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
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
<?php if (!empty($contact->audits)): ?>
<div class="row">
    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-exchange-alt fa-fw"></i> <?= __('Change Audits') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col"><?= __('Audit Field') ?></th>
                            <th scope="col"><?= __('Original Value') ?></th>
                            <th scope="col"><?= __('Modified Value') ?></th>
                            <th scope="col"><?= __('Auth User') ?></th>
                            <th scope="col"><?= __('Change Date') ?></th>
                        </tr>
                        <?php foreach ($contact->audits as $audits): ?>
                            <tr>
                                <td><?= Inflector::humanize(Inflector::underscore($audits->audit_field)) ?></td>
                                <td><?= h($audits->original_value) ?></td>
                                <td><?= h($audits->modified_value) ?></td>
                                <td><?= $audits->has('auth_user') ? $this->Html->link($audits->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $audits->auth_user->id]) : '' ?></td>
                                <td><?= $this->Time->i18nformat($audits->change_date,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>