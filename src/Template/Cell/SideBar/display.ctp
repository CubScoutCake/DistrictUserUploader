<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link btn-sm btn-outline-secondary" href="/">Uploader Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-sm btn-outline-secondary" href="https://lbdscouts.org.uk">Word Press Site</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-sm btn-outline-secondary" href="https://compass.scouts.org.uk/login/User/Login">Compass</a>
        </li>

        <li class="nav-item">
            <?= $this->Html->link(__('Upload Compass Spreadsheet'), ['controller' => 'FileUploads', 'action' => 'add'], ['class' => 'nav-link btn-sm btn-primary']) ?>
        </li>

        <li class="nav-item">
	        <?= $this->Html->link(__('Add Contact'), ['controller' => 'Contacts', 'action' => 'add'], ['class' => 'nav-link btn-sm btn-primary']) ?>
        </li>

        <li class="nav-item">
	        <?= $this->Html->link(__('View Contacts'), ['controller' => 'Contacts', 'action' => 'index'], ['class' => 'nav-link btn-sm btn-info']) ?>
        </li>

        <li class="nav-item">
	        <?= $this->Html->link(__('View Audit Logs'), ['controller' => 'Audits', 'action' => 'index'], ['class' => 'nav-link btn-sm btn-info']) ?>
        </li>

        <li class="nav-item">
	        <?= $this->Html->link(__('Authorise Contacts for Sync'), ['controller' => 'Contacts', 'action' => 'authorise'], ['class' => 'nav-link btn-sm btn-warning']) ?>
        </li>

        <li class="nav-item">
	        <?= $this->Html->link(__('View Contacts Pending Sync'), ['controller' => 'Contacts', 'action' => 'index', 1], ['class' => 'nav-link btn-sm btn-warning']) ?>
        </li>
    </ul>
</nav>