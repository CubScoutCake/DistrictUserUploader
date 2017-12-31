<?php
/**
 * @var \App\View\AppView $this
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
            <div class="card-header">View & Authorise Contacts</div>
            <div class="card-body">
			    <?= $this->Html->link(__('Authorise Contacts for Sync'), ['controller' => 'Contacts', 'action' => 'authorise'], ['class' => 'btn btn-primary']) ?>
			    <?= $this->Html->link(__('View Audit Logs'), ['controller' => 'Audits', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <div class="col">
        <h3>Getting Started</h3>
        <ul>
            <li class="bullet book"><a target="_blank" href="https://book.cakephp.org/3.0/en/">CakePHP 3.0 Docs</a></li>
            <li class="bullet book"><a target="_blank" href="https://book.cakephp.org/3.0/en/tutorials-and-examples/bookmarks/intro.html">The 15 min Bookmarker Tutorial</a></li>
            <li class="bullet book"><a target="_blank" href="https://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html">The 15 min Blog Tutorial</a></li>
        </ul>
        <p>
    </div>
</div>

<div class="row">
    <div class="col text-center">
        <h3 class="more">More about Cake</h3>
        <p>
            CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Front Controller and MVC.<br />
            Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
        </p>
    </div>
    <hr/>
</div>

<?php endif; ?>

<?php if(!$loggedIn) : ?>

<div class="row">
    <div class="col">
        <i class="fa fa-pen"></i>
        <h3>Login to System</h3>
	    <?= $this->Form->create() ?>
	    <?= $this->Form->control('username') ?>
	    <?= $this->Form->control('password') ?>
	    <?= $this->Form->button('Login') ?>
	    <?= $this->Form->end() ?>
    </div>
    <div class="col">
        <i class="icon docs">r</i>
        <h3>Docs and Downloads</h3>
        <ul>
            <li class="bullet cutlery">
                <a href="https://api.cakephp.org/3.0/">CakePHP API</a>
                <ul><li>Quick Reference</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://book.cakephp.org/3.0/en/">CakePHP Documentation</a>
                <ul><li>Your Rapid Development Cookbook</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://bakery.cakephp.org">The Bakery</a>
                <ul><li>Everything CakePHP</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://plugins.cakephp.org">CakePHP plugins repo</a>
                <ul><li>A comprehensive list of all CakePHP plugins created by the community</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://github.com/cakephp/">CakePHP Code</a>
                <ul><li>For the Development of CakePHP Git repository, Downloads</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://github.com/FriendsOfCake/awesome-cakephp">CakePHP Awesome List</a>
                <ul><li>A curated list of amazingly awesome CakePHP plugins, resources and shiny things.</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://www.cakephp.org">CakePHP</a>
                <ul><li>The Rapid Development Framework</li></ul>
            </li>
        </ul>
    </div>
    <div class="col">
        <i class="icon training">s</i>
        <h3>Training and Certification</h3>
        <ul>
            <li class="bullet cutlery">
                <a href="https://cakefoundation.org/">Cake Software Foundation</a>
                <ul><li>Promoting development related to CakePHP</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://training.cakephp.org/">CakePHP Training</a>
                <ul><li>Learn to use the CakePHP framework</li></ul>
            </li>
            <li class="bullet cutlery">
                <a href="https://certification.cakephp.org/">CakePHP Certification</a>
                <ul><li>Become a certified CakePHP developer</li></ul>
            </li>
        </ul>
    </div>
</div>

<?php endif; ?>