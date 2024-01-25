<nav class="navbar text-bg-primary bg-gradient shadow fixed-top">
    <div class="container-fluid">
        <!-- NAVBAR -->
        <a class="navbar-brand" href="/">
            <img src="images/icon.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
        </a>
        <div class="d-none d-md-block">
            <div>User:<em><?= " " . $_SESSION['username'] ?></em></div>
            <div>Role:<em><?= " " . $_SESSION['user_type'] ?></em></div>
        </div>
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- OFFCANVAS -->
        <div class="offcanvas offcanvas-end bg-secondary text-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

            <!-- HEADER -->
            <div class="offcanvas-header">
                <img src="images/icon.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admission System</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- BODY -->
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-end">
                    <li class="nav-item">User:<em><?= " " . $_SESSION['username'] ?></em></li>
                    <li class="nav-item">Role:<em><?= " " . $_SESSION['user_type'] ?></em></li>
                    <hr class="hr-divider">
                    <li class="nav-item">
                        <a class="nav-link" href="/system/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/system/courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/system/students">Students</a>
                    </li>
                    <?php if (strtolower($_SESSION['user_type']) === 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/system/users">Users</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/logout_action.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>