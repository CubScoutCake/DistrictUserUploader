<?php

use \Cake\Utility\Inflector;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit[]|\Cake\Collection\CollectionInterface $audits
 */

$this->Breadcrumbs->add(
	'Contacts',
	['controller' => 'Contacts', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Change Audits',
	['controller' => 'Audits', 'action' => 'index'],
	['class' => 'breadcrumb-item active']
);

?>
<div class="row">
    <div class="col" >
        <h2><i class="fas fa-exchange-alt fa-fw"></i> <?= __('Change Audits') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('audit_field') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('original_value') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified_value') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('auth_user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('change_date') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($audits as $audit): ?>
                    <tr>
                        <td><?= $this->Number->format($audit->id) ?></td>
                        <td><?= Inflector::humanize(Inflector::underscore($audit->audit_field)) ?></td>
                        <td><?= $audit->has('contact') ? $this->Html->link($audit->contact->full_name, ['controller' => 'Contacts', 'action' => 'view', $audit->contact->id]) : '' ?></td>
                        <td><?= h($audit->original_value) ?></td>
                        <td><?= h($audit->modified_value) ?></td>
                        <td><?= $audit->has('auth_user') ? $this->Html->link($audit->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $audit->auth_user->id]) : '' ?></td>
                        <td><?= h($audit->change_date) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <div class="paginator">
                        <ul class="pagination justify-content-center">
					        <?= $this->Paginator->first('<<') ?>
					        <?= $this->Paginator->prev('<') ?>
					        <?= $this->Paginator->numbers() ?>
					        <?= $this->Paginator->next('>') ?>
					        <?= $this->Paginator->last('>>') ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-muted text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>