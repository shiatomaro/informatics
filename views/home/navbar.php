<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Informatics" width="200" height="80">
        </a>

        <!-- Toggle Icon -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/system">System</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="actions/logout_action.php" role="button">Log out</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>