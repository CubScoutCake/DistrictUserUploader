<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleType $roleType
 * @var array $sectionTypes
 * @var array $contacts
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
	'Role Types',
	['controller' => 'RoleTypes', 'action' => 'index'],
	['class' => 'active']
);

?>

<div class="roleTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($roleType) ?>
    <fieldset>
        <legend><?= __('Add Role Type') ?></legend>
        <?php
            echo $this->Form->control('role_type');
            echo $this->Form->control('role_abbreviation');
            echo $this->Form->control('section_type_id', ['options' => $sectionTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
