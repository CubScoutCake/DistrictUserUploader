<?php
$this->Breadcrumbs->add(
	'File Uploads',
	['controller' => 'FileUploads', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Add',
	['controller' => 'FileUploads', 'action' => 'add'],
	['class' => 'breadcrumb-item active']
);
?>
<div class="fileUploads form large-9 medium-8 columns content">
    <?= $this->Form->create($fileUpload, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add File Upload') ?></legend>
	    <?php echo $this->Form->input('file_name', ['type' => 'file']);  ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
