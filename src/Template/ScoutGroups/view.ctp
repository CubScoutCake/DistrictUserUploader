<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScoutGroup $scoutGroup
 */
?>
<?php

use \Cake\Utility\Inflector;

$this->Breadcrumbs->add(
	'ScoutGroups',
	['controller' => 'ScoutGroups', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $scoutGroup->id,
	['controller' => 'ScoutGroups', 'action' => 'view', $scoutGroup->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-address-card fa-fw"></i> <?= h($scoutGroup->group_alias) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Add Section',
				['controller' => 'Sections', 'action' => 'add', $scoutGroup->id],
				['class' => 'button btn btn-secondary']
			) ?>
			<?= $this->Html->link('Edit',
				['controller' => 'ScoutGroups', 'action' => 'edit', $scoutGroup->id],
				['class' => 'button btn btn-secondary']
			) ?>
			<?= $this->Form->postLink(__('Delete'), ['controller' => 'ScoutGroups', 'action' => 'delete', $scoutGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoutGroup->id), 'class' => 'button btn btn-secondary']) ?>

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
                                <th scope="row"><?= __('Scout Group') ?></th>
                                <td><?= h($scoutGroup->scout_group) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Group Alias (Preferred Name)') ?></th>
                                <td><?= h($scoutGroup->group_alias) ?></td>
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
                                <td><?= $this->Time->format($scoutGroup->created,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= $this->Time->format($scoutGroup->modified,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php if (!empty($scoutGroup->sections)): ?>
    <?php foreach ($scoutGroup->sections as $sections): ?>
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title"><i class="fas fa-cog fa-fw"></i> <?= $this->Html->link($sections->section, ['controller' => 'Sections', 'action' => 'view', $sections->id]) ?></h4>
                            </div>
                            <div class="col">
                                <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
		                            <?= $this->Html->link('View',
			                            ['controller' => 'Sections', 'action' => 'view', $sections->id],
			                            ['class' => 'button btn btn-sm btn-secondary']
		                            ) ?>
		                            <?= $this->Html->link('Edit',
			                            ['controller' => 'Sections', 'action' => 'edit', $sections->id],
			                            ['class' => 'button btn btn-sm btn-secondary']
		                            ) ?>
		                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id), 'class' => 'button btn btn-sm btn-secondary']) ?>

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
                                <h5 class="card-title"><?= $this->Html->link($sections->section_type->section_type, ['controller' => 'SectionTypes', 'action' => 'view', $sections->section_type->id]) ?></h5>
                            </div>
                        </div>
                    </div>
	                <?php if (!empty($sections->roles)) : ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th scope="col"><?= __('Contact') ?></th>
                                        <th scope="col"><?= __('Email') ?></th>
                                        <th scope="col"><?= __('Role Type') ?></th>
                                        <th scope="col" class="actions text-right"><?= __('Actions') ?></th>
                                    </tr>
                                    <?php foreach ($sections->roles as $roles) : ?>
                                        <tr>
                                            <td><?= $this->Html->link($roles->contact->full_name, ['controller' => 'Contacts', 'action' => 'view', $roles->contact->id]) ?></td>
                                            <td><?= h($roles->contact->email) ?></td>
                                            <td><?= $this->Html->link($roles->role_type->role_type, ['controller' => 'RoleTypes', 'action' => 'view', $roles->role_type->id]) ?></td>
                                            <td class="actions float-right">
	                                            <?= $this->Html->link(__('View Contact'), ['controller' => 'Contacts', 'action' => 'view', $roles->contact->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
	                                            <?= $this->Html->link(__('Edit Contact'), ['controller' => 'Contacts', 'action' => 'edit', $roles->contact->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
	                                            <?= $this->Html->link(__('Edit Role'), ['controller' => 'Roles', 'action' => 'edit', $roles->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
	                                            <?= $this->Form->postLink(__('Delete Role'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id), 'class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
	                <?php endif; ?>
                </div>
            </div>
        </div>
        <br>
	<?php endforeach; ?>
<?php endif; ?>
