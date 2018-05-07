<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScoutGroup $scoutGroup
 */

$this->Breadcrumbs->add(
	'Scout Groups',
	['controller' => 'Scout Groups', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Edit Scout Group #' . $scoutGroup->id,
	['controller' => 'ScoutGroups', 'action' => 'edit', $scoutGroup->id],
	['class' => 'breadcrumb-item']
);

?>
<div class="scoutGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($scoutGroup) ?>
    <fieldset>
        <legend><?= __('Edit Scout Group') ?></legend>
        <?php
            echo $this->Form->control('scout_group');
            echo $this->Form->control('group_alias');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
