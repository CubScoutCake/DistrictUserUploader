<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser $authUser
 */

$this->Breadcrumbs->add(
	'AuthUsers',
	['controller' => 'AuthUsers', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Add',
	['controller' => 'AuthUsers', 'action' => 'add'],
	['class' => 'breadcrumb-item active']
);
?>
<div class="authUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($authUser) ?>
    <fieldset>
        <legend><?= __('Add Auth User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
