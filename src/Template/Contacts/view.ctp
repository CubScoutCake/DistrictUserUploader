<?php
$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $contact->id,
	['controller' => 'Contacts', 'action' => 'view', $contact->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-address-card fa-fw"></i> <?= h($contact->full_name) ?></h2>
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('First Name') ?></th>
                                <td><?= h($contact->first_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Last Name') ?></th>
                                <td><?= h($contact->last_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Email') ?></th>
                                <td><?= h($contact->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address') ?></th>
                                <td>
			                        <?= h($contact->address_line_1) ?>,
			                        <?= empty($contact) ? h($contact->address_line_2) . ',' : '' ?>
			                        <?= h($contact->city) ?>,
			                        <?= h($contact->county) ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Postcode') ?></th>
                                <td><?= h($contact->postcode) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('WordPress Role') ?></th>
                                <td><?= $contact->has('wp_role') ? $this->Html->link($contact->wp_role->wp_role, ['controller' => 'WpRoles', 'action' => 'view', $contact->wp_role->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Membership Number') ?></th>
                                <td><?= $this->Number->format($contact->membership_number, ['pattern' => '######']) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= $this->Time->i18nformat($contact->created,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= $this->Time->i18nformat($contact->modified,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>