<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
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

$this->Breadcrumbs->add(
	'Edit Role #' . $role->id,
	['controller' => 'Roles', 'action' => 'edit', $role->id],
	['class' => 'active']
);
?>
<div class="roles form large-9 medium-8 columns content">
	<?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Edit Role') ?></legend>
		<?php
		echo $this->Form->control('role_type_id', ['options' => $roleTypes]);
		echo $this->Form->control('section_id', ['options' => $sections]);
		echo $this->Form->control('contact_id', ['options' => $contacts]);
		?>
    </fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
