<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JoinRequest $joinRequest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Join Requests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Join Statuses'), ['controller' => 'JoinStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Join Status'), ['controller' => 'JoinStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="joinRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($joinRequest) ?>
    <fieldset>
        <legend><?= __('Add Join Request') ?></legend>
        <?php
            echo $this->Form->control('join_status_id', ['options' => $joinStatuses]);
            echo $this->Form->control('contact_email');
            echo $this->Form->control('contact_phone');
            echo $this->Form->control('young_person');
            echo $this->Form->control('parent_first_name');
            echo $this->Form->control('parent_last_name');
            echo $this->Form->control('young_person_first_name');
            echo $this->Form->control('young_person_last_name');
            echo $this->Form->control('date_of_birth');
            echo $this->Form->control('sections._ids', ['options' => $sections]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
