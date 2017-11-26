<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WpRole $wpRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wp Role'), ['action' => 'edit', $wpRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wp Role'), ['action' => 'delete', $wpRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wpRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wp Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wp Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contact'), ['controller' => 'Contact', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contact', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wpRoles view large-9 medium-8 columns content">
    <h3><?= h($wpRole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Wp Role') ?></th>
            <td><?= h($wpRole->wp_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wpRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($wpRole->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($wpRole->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contact') ?></h4>
        <?php if (!empty($wpRole->contact)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Wp Id') ?></th>
                <th scope="col"><?= __('Mc Id') ?></th>
                <th scope="col"><?= __('Membership Number') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Wp Role Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($wpRole->contact as $contact): ?>
            <tr>
                <td><?= h($contact->id) ?></td>
                <td><?= h($contact->wp_id) ?></td>
                <td><?= h($contact->mc_id) ?></td>
                <td><?= h($contact->membership_number) ?></td>
                <td><?= h($contact->first_name) ?></td>
                <td><?= h($contact->last_name) ?></td>
                <td><?= h($contact->email) ?></td>
                <td><?= h($contact->wp_role_id) ?></td>
                <td><?= h($contact->created) ?></td>
                <td><?= h($contact->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contact', 'action' => 'view', $contact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contact', 'action' => 'edit', $contact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contact', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
