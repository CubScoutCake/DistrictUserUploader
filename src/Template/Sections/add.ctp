<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 * @var array $scoutGroups
 * @var array $sectionTypes
 */

$this->Breadcrumbs->add(
	'Scout Groups',
	['controller' => 'Scout Groups', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Sections',
	['controller' => 'Sections', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

?>
<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend><?= __('Add Section') ?></legend>
        <?php
            echo $this->Form->control('section');
            echo $this->Form->control('section_type_id', ['options' => $sectionTypes]);
            echo $this->Form->control('scout_group_id', ['options' => $scoutGroups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
