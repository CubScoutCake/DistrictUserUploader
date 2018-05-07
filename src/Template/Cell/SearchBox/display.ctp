<div class="form-inline my-2 my-lg-0">
	<?= $this->Form->create(
	        null,
            [
                'url' => [
                        'controller' => 'Search',
                        'action' => 'Search'
                ],
                'class' => 'form-inline my-2 my-lg-0',
                'method' => 'post'
            ]
        ); ?>
	<fieldset>
        <div class="form-inline my-2 my-lg-0">
            <?php echo $this->Form->input('q_text', [
                'label' => false,
                'class' => 'form-control mr-sm-2',
                'type' => 'search',
                'placeholder' => 'Search',
                'aria-label' => 'Search'
            ]); ?>
            <?= $this->Form->button(__('<i class="fa fa-search"></i>'),['class' => 'btn btn-outline-success my-2 my-sm-0', 'type' => 'submit', 'escape' => false ]) ?>
        </div>
	</fieldset>
	<?= $this->Form->end() ?>
</div>