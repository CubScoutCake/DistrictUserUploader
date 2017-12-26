<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScoutGroup $scoutGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scoutGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scoutGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Scout Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
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
