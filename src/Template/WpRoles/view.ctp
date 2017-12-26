<?php
$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Wordpress Roles',
	['controller' => 'WpRoles', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

$this->Breadcrumbs->add(
	'View Wordpress Role #' . $wpRole->id,
	['controller' => 'WpRoles', 'action' => 'view', $wpRole->id],
	['class' => 'active']
);
?>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
