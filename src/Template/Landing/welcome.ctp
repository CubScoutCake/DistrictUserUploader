<?php
/**
 * @var \App\View\AppView $this
 * @var boolean $loggedIn
 * @var \App\Model\Entity\AuthUser $authUser
 */
$cakeDescription = 'User Uploader Functional Hub';
?>

<?php if($loggedIn) : ?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Add or Update Contacts</div>
            <div class="card-body">
                <?= $this->Html->link(__('Upload Compass Spreadsheet'), ['controller' => 'FileUploads', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Add Contact'), ['controller' => 'Contacts', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-header">View Contacts & Audit Changes</div>
            <div class="card-body">
			    <?= $this->Html->link(__('View Contacts'), ['controller' => 'Contacts', 'action' => 'index'], ['class' => 'btn btn-info']) ?>
			    <?= $this->Html->link(__('View Audit Logs'), ['controller' => 'Audits', 'action' => 'index'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-header">View & Authorise Contacts</div>
            <div class="card-body">
			    <?= $this->Html->link(__('Authorise Contacts for Sync'), ['controller' => 'Contacts', 'action' => 'authorise'], ['class' => 'btn btn-warning']) ?>
			    <?= $this->Html->link(__('View Contacts Pending Sync'), ['controller' => 'Contacts', 'action' => 'index', 1], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(!$loggedIn) : ?>

<div class="row justify-content-md-center">
    <div class="col col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3>Login to System</h3>
            </div>
	        <?= $this->Form->create() ?>
            <div class="card-body">
	            <?= $this->Form->control('username') ?>
	            <?= $this->Form->control('password') ?>
            </div>
            <div class="card-footer">
	            <?= $this->Form->button('Login') ?>
            </div>
	        <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php endif; ?>