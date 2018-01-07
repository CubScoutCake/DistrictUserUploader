<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoleType $roleType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Role Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Section Types'), ['controller' => 'SectionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section Type'), ['controller' => 'SectionTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roleTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($roleType) ?>
    <fieldset>
        <legend><?= __('Add Role Type') ?></legend>
        <?php
            echo $this->Form->control('role_type');
            echo $this->Form->control('role_abbreviation');
            echo $this->Form->control('section_type_id', ['options' => $sectionTypes, 'empty' => true]);
            echo $this->Form->control('contacts._ids', ['options' => $contacts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
