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