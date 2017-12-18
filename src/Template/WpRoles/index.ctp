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
	'WordPress Roles',
	['controller' => 'WpRoles', 'action' => 'index'],
	['class' => 'breadcrumb-item active']
);

?>
<div class="row">
    <div class="col" >
        <h2><i class="fab fa-wordpress-simple fa-fw"></i><?= __('WordPress Roles') ?></h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('wp_role') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($wpRoles as $wpRole): ?>
                    <tr>
                        <td><?= $this->Number->format($wpRole->id) ?></td>
                        <td><?= h($wpRole->wp_role) ?></td>
                        <td><?= h($wpRole->created) ?></td>
                        <td><?= h($wpRole->modified) ?></td>
                        <td class="actions">
			                <?= $this->Html->link(__('View'), ['action' => 'view', $wpRole->id]) ?>
			                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wpRole->id]) ?>
			                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wpRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wpRole->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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