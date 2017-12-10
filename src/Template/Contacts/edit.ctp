<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */

$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Edit Contact',
	['controller' => 'Contacts', 'action' => 'edit', $contact->id],
	['class' => 'breadcrumb-item active']
);

?>
<div class="row">
    <div class="col" >
        <h2><i class="fas fa-address-card fa-fw"></i><?= __(' Edit Contact') ?></h2>
        <?= $this->Form->create($contact) ?>
        <fieldset>
            <?php
                echo $this->Form->control('membership_number');
                echo $this->Form->control('first_name');
                echo $this->Form->control('last_name');
                echo $this->Form->control('email');
                echo $this->Form->control('address_line_1');
                echo $this->Form->control('address_line_2');
                echo $this->Form->control('city');
                echo $this->Form->control('county');
                echo $this->Form->control('postcode');
                echo $this->Form->control('group_admin', ['options' => $groups, 'empty' => true]);
                echo $this->Form->control('wp_role_id', ['options' => $wpRoles]);
                echo $this->Form->control('wp_id', ['type' => 'number', 'empty' => true, 'label' => 'WordPress ID']);
                echo $this->Form->control('mc_id', ['type' => 'number', 'empty' => true, 'label' => 'MailChimp ID']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
