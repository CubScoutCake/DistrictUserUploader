<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">User Uploader</a>

        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="nav nav-pills">

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
	                'prefix' => false]); ?>"><i class="fas fa-address-card fa-fw"></i> Contacts</a>
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
			        'controller' => 'FileUploads',
			        'action' => 'index',
			        'prefix' => false]); ?>">
                    <i class="fas fa-upload fa-fw"></i> File uploads
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Add Object</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'Contacts',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Contact</a>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'Roles',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Role</a>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'RoleTypes',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Role Type</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'ScoutGroups',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Scout Group</a>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'Sections',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Section</a>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'SectionTypes',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Section Type</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'AuthUsers',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Auth User</a>

                    <a class="dropdown-item" href="<?php echo $this->Url->build([
	                    'controller' => 'WpRoles',
	                    'action' => 'add',
	                    'prefix' => false]); ?>">Wordpress Role</a>

                </div>
            </li>
        </ul>











            <ul class="navbar-nav mr-auto">

            </ul>

            <a class="nav-link btn btn-outline" href="<?php echo $this->Url->build([
		        'controller' => 'AuthUsers',
		        'action' => 'logout',
		        'prefix' => false],
                [
                    'class' => 'btn btn-outline btn-outline-error',
                    'type' => 'submit'
                ]); ?>">
                Log Out
            </a>
        </div>

        <?php echo $this->cell('SearchBox'); ?>
    </nav>
</header>