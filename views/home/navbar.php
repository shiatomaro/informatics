<nav class="navbar bg-secondary text-primary bg-gradient shadow fixed-top">
    <div class="container-fluid">
        <!-- NAVBAR -->
        <a class="navbar-brand" href="/">
            <img src="images/logo.png" alt="Informatics" width="240" height="80">
        </a>

        <ul class="navbar-nav justify-content-end flex-grow-1 flex-row pe-3 text-end d-none d-md-flex">
            <?php if (!isset($_SESSION['username'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-2" href="/signup">Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-2" href="/contact">Contact us</a>
                </li>
            <?php else : ?>
                <?php if ($_SESSION['user_type'] == 'student') : ?>
                    <li class="nav-item">
                        <a class="nav-link ms-2" href="/dashboard">Dashboard</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link ms-2" href="/system">System</a>
                    </li>
                <?php endif ?>
                <li class="nav-item ms-2">
                    <a class="btn btn-secondary" href="actions/logout_action.php" role="button">Log out</a>
                </li>
            <?php endif ?>
        </ul>


        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- OFFCANVAS -->
        <div class="offcanvas offcanvas-end bg-secondary text-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

            <!-- HEADER -->
            <div class="offcanvas-header">
                <img src="images/icon.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Informatics Admission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- BODY -->
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-end">
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signup">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact us</a>
                        </li>
                    <?php else : ?>
                        <?php if ($_SESSION['user_type'] == 'student') : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/system">System</a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item ms-3">
                            <a class="btn btn-secondary" href="actions/logout_action.php" role="button">Log out</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>