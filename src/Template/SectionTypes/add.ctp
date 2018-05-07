<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SectionType $sectionType
 */

$this->Breadcrumbs->add(
	'Scout Groups',
	['controller' => 'ScoutGroups', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Sections',
	['controller' => 'Sections', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

$this->Breadcrumbs->add(
	'Section Types',
	['controller' => 'SectionTypes', 'action' => 'index'],
	['class' => 'active']
);

?>
<div class="sectionTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($sectionType) ?>
    <fieldset>
        <legend><?= __('Add Section Type') ?></legend>
        <?php
            echo $this->Form->control('section_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
