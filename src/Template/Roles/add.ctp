<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 * @var int $contactId
 * @var array $contacts
 * @var array $sections
 * @var array $roleTypes
 */

$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Roles',
	['controller' => 'Roles', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

$roleLink = 'Add Role';
if(!empty($contactId)) {
    $roleLink = 'Add Role to Contact #' . $contactId;
}

$this->Breadcrumbs->add(
	$roleLink,
	['controller' => 'Roles', 'action' => 'add'],
	['class' => 'active']
);
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->control('role_type_id', ['options' => $roleTypes]);
            echo $this->Form->control('section_id', ['options' => $sections]);
            echo $this->Form->control('contact_id', ['options' => $contacts, 'default' => $contactId]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
