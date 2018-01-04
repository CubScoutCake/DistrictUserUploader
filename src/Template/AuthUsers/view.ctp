<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuthUser $authUser
 */

$this->Breadcrumbs->add(
	'AuthUsers',
	['controller' => 'AuthUsers', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'View #' . $authUser->id,
	['controller' => 'AuthUsers', 'action' => 'view', $authUser->id],
	['class' => 'breadcrumb-item active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-user fa-fw"></i> <?= h($authUser->full_name) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
			<?= $this->Html->link('Edit',
				['controller' => 'AuthUsers', 'action' => 'edit', $authUser->id],
				['class' => 'button btn btn-secondary']
			) ?>
	        <?= $this->Form->postLink(__('Regenerate API'), ['controller' => 'AuthUsers', 'action' => 'regenerateApi', $authUser->id], ['confirm' => __('Are you sure you want to regenerate the API Key for # {0}?', $authUser->id), 'class' => 'button btn btn-secondary']) ?>
            <?= $this->Form->postLink(__('Delete'), ['controller' => 'AuthUsers', 'action' => 'delete', $authUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authUser->id), 'class' => 'button btn btn-secondary']) ?>

            <!--<div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Dropdown link</a>
                    <a class="dropdown-item" href="#">Dropdown link</a>
                </div>
            </div>-->
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Username') ?></th>
                                <td><?= h($authUser->username) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('First Name') ?></th>
                                <td><?= h($authUser->first_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Last Name') ?></th>
                                <td><?= h($authUser->last_name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Email') ?></th>
                                <td><?= h($authUser->email) ?></td>
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
                                <th scope="row"><?= __('API Key') ?></th>
                                <td><?= h($authUser->api_key_plain) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Created') ?></th>
                                <td><?= $this->Time->i18nformat($authUser->created,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modified') ?></th>
                                <td><?= $this->Time->i18nformat($authUser->modified,'dd-MMM-yy HH:mm') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
