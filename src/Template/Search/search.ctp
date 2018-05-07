<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 * @var \App\Model\Entity\RoleType[]|\Cake\Collection\CollectionInterface $roleTypes
 */

$this->Breadcrumbs->add(
	__('Search'),
	['class' => 'breadcrumb-item active']
);


?>
<?php if (!empty($contacts)): ?>
<div class="row">
    <div class="col" >
        <div class="card card-primary">
            <div class="card-header">
                <h2><i class="fas fa-address-card fa-fw"></i> <?= __('Contacts') ?></h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?= h('First Name') ?></th>
                            <th scope="col"><?= h('Last Name') ?></th>
                            <th scope="col"><?= h('Email') ?></th>
                            <th scope="col"><?= h('Created') ?></th>
                            <th scope="col"><?= h('Modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?= h($contact->first_name) ?></td>
                                <td><?= h($contact->last_name) ?></td>
                                <td><?= h($contact->email) ?></td>
                                <td><?= $this->Time->format($contact->created, 'dd-MMM-yy HH:ss') ?></td>
                                <td><?= $this->Time->format($contact->modified, 'dd-MMM-yy HH:ss') ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if (!empty($authUsers)): ?>
    <br/>
    <div class="row">
        <div class="col" >
            <div class="card card-primary">
                <div class="card-header">
                    <h2><i class="fas fa-user fa-fw"></i> <?= __('Auth Users') ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?= h('First Name') ?></th>
                                <th scope="col"><?= h('Last Name') ?></th>
                                <th scope="col"><?= h('Email') ?></th>
                                <th scope="col"><?= h('Created') ?></th>
                                <th scope="col"><?= h('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($authUsers as $auth_user): ?>
                                <tr>
                                    <td><?= h($auth_user->first_name) ?></td>
                                    <td><?= h($auth_user->last_name) ?></td>
                                    <td><?= h($auth_user->email) ?></td>
                                    <td><?= $this->Time->format($auth_user->created, 'dd-MMM-yy HH:ss') ?></td>
                                    <td><?= $this->Time->format($auth_user->modified, 'dd-MMM-yy HH:ss') ?></td>
                                    <td class="actions">
										<?= $this->Html->link(__('View'), ['controller' => 'AuthUsers', 'action' => 'view', $auth_user->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
										<?= $this->Html->link(__('Edit'), ['controller' => 'AuthUsers', 'action' => 'edit', $auth_user->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
										<?= $this->Form->postLink(__('Delete'), ['controller' => 'AuthUsers', 'action' => 'delete', $auth_user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                    </td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($roleTypes)): ?>
    <br/>
    <div class="row">
        <div class="col" >
            <div class="card card-primary">
                <div class="card-header">
                    <h2><i class="fas fa-cog fa-fw"></i> <?= __('Role Types') ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?= h('Role Type') ?></th>
                                <th scope="col"><?= h('Abbreviation') ?></th>
                                <th scope="col"><?= h('Section Type') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($roleTypes as $role_type): ?>
                                <tr>
                                    <td><?= h($role_type->role_type) ?></td>
                                    <td><?= h($role_type->role_abbreviation) ?></td>
                                    <td><?= $role_type->has('section_type') ? ($role_type->section_type->section_type) : '' ?></td>
                                    <td class="actions">
										<?= $this->Html->link(__('View'), ['controller' => 'RoleTypes', 'action' => 'view', $role_type->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
										<?= $this->Html->link(__('Edit'), ['controller' => 'RoleTypes', 'action' => 'edit', $role_type->id], ['class' => 'button btn btn-sm btn-outline-secondary']) ?>
                                    </td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
