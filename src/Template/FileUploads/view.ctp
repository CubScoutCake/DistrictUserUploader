<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FileUpload $fileUpload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File Upload'), ['action' => 'edit', $fileUpload->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File Upload'), ['action' => 'delete', $fileUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fileUpload->id)]) ?> </li>
        <li><?= $this->Html->link(__('List File Uploads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File Upload'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Auth Users'), ['controller' => 'AuthUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Auth User'), ['controller' => 'AuthUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Compass Uploads'), ['controller' => 'CompassUploads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compass Upload'), ['controller' => 'CompassUploads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fileUploads view large-9 medium-8 columns content">
    <h3><?= h($fileUpload->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('File Upload') ?></th>
            <td><?= h($fileUpload->file_upload) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth User') ?></th>
            <td><?= $fileUpload->has('auth_user') ? $this->Html->link($fileUpload->auth_user->full_name, ['controller' => 'AuthUsers', 'action' => 'view', $fileUpload->auth_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fileUpload->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($fileUpload->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($fileUpload->updated_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Compass Uploads') ?></h4>
        <?php if (!empty($fileUpload->compass_uploads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('File Upload Id') ?></th>
                <th scope="col"><?= __('Membership Number') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Forenames') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Address Line1') ?></th>
                <th scope="col"><?= __('Address Line2') ?></th>
                <th scope="col"><?= __('Address Line3') ?></th>
                <th scope="col"><?= __('Address Town') ?></th>
                <th scope="col"><?= __('Address County') ?></th>
                <th scope="col"><?= __('Postcode') ?></th>
                <th scope="col"><?= __('Address Country') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fileUpload->compass_uploads as $compassUploads): ?>
            <tr>
                <td><?= h($compassUploads->id) ?></td>
                <td><?= h($compassUploads->file_upload_id) ?></td>
                <td><?= h($compassUploads->membership_number) ?></td>
                <td><?= h($compassUploads->title) ?></td>
                <td><?= h($compassUploads->forenames) ?></td>
                <td><?= h($compassUploads->surname) ?></td>
                <td><?= h($compassUploads->address) ?></td>
                <td><?= h($compassUploads->address_line1) ?></td>
                <td><?= h($compassUploads->address_line2) ?></td>
                <td><?= h($compassUploads->address_line3) ?></td>
                <td><?= h($compassUploads->address_town) ?></td>
                <td><?= h($compassUploads->address_county) ?></td>
                <td><?= h($compassUploads->postcode) ?></td>
                <td><?= h($compassUploads->address_country) ?></td>
                <td><?= h($compassUploads->role) ?></td>
                <td><?= h($compassUploads->location) ?></td>
                <td><?= h($compassUploads->Phone) ?></td>
                <td><?= h($compassUploads->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CompassUploads', 'action' => 'view', $compassUploads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CompassUploads', 'action' => 'edit', $compassUploads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CompassUploads', 'action' => 'delete', $compassUploads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compassUploads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
