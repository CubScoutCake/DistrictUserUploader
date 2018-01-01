<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">User Uploader</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Uploader Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://lbdscouts.org.uk">Word Press Site</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://compass.scouts.org.uk/login/User/Login">Compass</a>
                </li>
            </ul>
            <a class="nav-link" href="<?php echo $this->Url->build([
		        'controller' => 'AuthUsers',
		        'action' => 'logout',
		        'prefix' => false],
                [
                    'class' => 'btn btn-outline-error',
                    'type' => 'submit'
                ]); ?>">
                Log Out
            </a>
        </div>
    </nav>
</header>