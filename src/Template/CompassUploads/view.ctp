<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompassUpload $compassUpload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Compass Upload'), ['action' => 'edit', $compassUpload->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Compass Upload'), ['action' => 'delete', $compassUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compassUpload->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Compass Uploads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compass Upload'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List File Uploads'), ['controller' => 'FileUploads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File Upload'), ['controller' => 'FileUploads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="compassUploads view large-9 medium-8 columns content">
    <h3><?= h($compassUpload->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('File Upload') ?></th>
            <td><?= $compassUpload->has('file_upload') ? $this->Html->link($compassUpload->file_upload->id, ['controller' => 'FileUploads', 'action' => 'view', $compassUpload->file_upload->id]) : '' ?></td>
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
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($compassUpload->address) ?></td>
        </tr>
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
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($compassUpload->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($compassUpload->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($compassUpload->Phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($compassUpload->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($compassUpload->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membership Number') ?></th>
            <td><?= $this->Number->format($compassUpload->membership_number) ?></td>
        </tr>
    </table>
</div>
