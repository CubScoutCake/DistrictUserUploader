<?php
$this->Breadcrumbs->add(
	'File Uploads',
	['controller' => 'FileUploads', 'action' => 'index']
);

$this->Breadcrumbs->add(
	'Compass Uploads',
	['controller' => 'CompassUploads', 'action' => 'index'],
	['class' => 'breadcrumb-item']
);

$this->Breadcrumbs->add(
	'View #' . $compassUpload->id,
	['controller' => 'CompassUploads', 'action' => 'view', $compassUpload->id],
	['class' => 'active']
);
?>
<div class="row">
    <div class="col">
        <h2><i class="fas fa-upload fa-fw"></i> <?= h($compassUpload->first_name . ' ' . $compassUpload->last_name) ?></h2>
    </div>
    <div class="col">
        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
            <?= $this->Html->link('Merge',
	            ['controller' => 'CompassUploads', 'action' => 'merge', $compassUpload->id],
	            ['class' => 'button btn btn-secondary']
            ) ?>
	        <?= $this->Form->postLink(__('Delete'), ['controller' => 'CompassUploads', 'action' => 'delete', $compassUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compassUpload->id), 'class' => 'button btn btn-secondary']) ?>

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
                                <th scope="row"><?= __('File Upload') ?></th>
                                <td><?= $compassUpload->has('file_upload') ? $this->Html->link($compassUpload->file_upload->file_name, ['controller' => 'FileUploads', 'action' => 'view', $compassUpload->file_upload->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Title') ?></th>
                                <td><?= h($compassUpload->title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Forenames') ?></th>
                                <td><?= h($compassUpload->forenames) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Surname') ?></th>
                                <td><?= h($compassUpload->surname) ?></td>
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
                                <th scope="row"><?= __('Membership Number') ?></th>
                                <td><?= $this->Number->format($compassUpload->membership_number, ['pattern' => '######']) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Phone') ?></th>
                                <td><?= h($compassUpload->phone) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Email') ?></th>
                                <td><?= h($compassUpload->email) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address') ?></th>
                                <td><?= h($compassUpload->address) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th scope="row"><?= __('Role') ?></th>
                                <td><?= h($compassUpload->role) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Provisional') ?></th>
                                <td><?= $compassUpload->provisional ? 'Yes' : 'No' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Clean Role') ?></th>
                                <td><?= h($compassUpload->clean_role) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Location') ?></th>
                                <td><?= h($compassUpload->location) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Clean Section') ?></th>
                                <td><?= !empty($compassUpload->clean_section) ? $compassUpload->clean_section : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Clean Group') ?></th>
                                <td><?= h($compassUpload->clean_group) ?></td>
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
                                <th scope="row"><?= __('Address Line1') ?></th>
                                <td><?= h($compassUpload->address_line1) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address Line2') ?></th>
                                <td><?= h($compassUpload->address_line2) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address Line3') ?></th>
                                <td><?= h($compassUpload->address_line3) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address Town') ?></th>
                                <td><?= h($compassUpload->address_town) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address County') ?></th>
                                <td><?= h($compassUpload->address_county) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Postcode') ?></th>
                                <td><?= h($compassUpload->postcode) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Address Country') ?></th>
                                <td><?= h($compassUpload->address_country) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
