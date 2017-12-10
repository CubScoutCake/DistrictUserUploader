<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Wp Roles'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Contact'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
	</ul>
</nav>