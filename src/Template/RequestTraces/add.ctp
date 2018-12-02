<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RequestTrace $requestTrace
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Request Traces'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="requestTraces form large-9 medium-8 columns content">
    <?= $this->Form->create($requestTrace) ?>
    <fieldset>
        <legend><?= __('Add Request Trace') ?></legend>
        <?php
            echo $this->Form->control('created_date');
            echo $this->Form->control('resolved_date');
            echo $this->Form->control('contact_hash');
            echo $this->Form->control('resolver');
            echo $this->Form->control('trace_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
