<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
?>
<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend><?= __('Add Section') ?></legend>
        <?php
            echo $this->Form->control('section');
            echo $this->Form->control('section_type_id', ['options' => $sectionTypes]);
            echo $this->Form->control('scout_group_id', ['options' => $scoutGroups]);
            echo $this->Form->control('contacts._ids', ['options' => $contacts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
