<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build([
		        'controller' => 'AuthUsers',
		        'action' => 'index',
		        'prefix' => false]); ?>">
                <i class="fas fa-user fa-fw"></i> Auth Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build([
		        'controller' => 'Contacts',
		        'action' => 'index',
		        'prefix' => false]); ?>">
                <i class="fas fa-address-card fa-fw"></i> Contacts
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build([
			    'controller' => 'FileUploads',
			    'action' => 'index',
			    'prefix' => false]); ?>">
                <i class="fas fa-upload fa-fw"></i> File uploads
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build([
		        'controller' => 'ScoutGroups',
		        'action' => 'index',
		        'prefix' => false]); ?>">
                <i class="fas fa-paw fa-fw"></i> Scout Groups
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build([
		        'controller' => 'Sections',
		        'action' => 'index',
		        'prefix' => false]); ?>">
                <i class="fas fa-puzzle-piece fa-fw"></i> Sections
            </a>
        </li>
    </ul>
</nav>