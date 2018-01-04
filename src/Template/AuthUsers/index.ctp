<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser[]|\Cake\Collection\CollectionInterface $authUsers
 */

$this->Breadcrumbs->add(
	__('Auth Users'),
    ['class' => 'breadcrumb-item active']
);


?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-user fa-fw"></i> <?= __('Auth Users') ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Add Auth User',
				['controller' => 'AuthUsers', 'action' => 'add'],
				['class' => 'button btn btn-secondary']
			) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col" >
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($authUsers as $authUser): ?>
                        <tr>
                            <td><?= h($authUser->username) ?></td>
                            <td><?= h($authUser->first_name) ?></td>
                            <td><?= h($authUser->last_name) ?></td>
                            <td><?= h($authUser->email) ?></td>
                            <td><?= h($authUser->created) ?></td>
                            <td><?= h($authUser->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $authUser->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $authUser->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $authUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authUser->id)]) ?>
                            </td>
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
