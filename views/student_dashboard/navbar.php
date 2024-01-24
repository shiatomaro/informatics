<nav class="navbar navbar-expand-lg bg-light bg-gradient shadow d-md-none">
    <div class="d-flex">
        <button class="btn btn-primary d-inline-block ml-auto ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-sidebar" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">

            <i class="fas fa-align-justify"></i>
        </button>
    </div>
</nav>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas-sidebar" aria-hidden="true">
    <div class="offcanvas-header">
        <img src="images/icon.png" alt="icon" width="60px" height="60px">
        <h5 class="offcanvas-title">Informatics Northgate College Admission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="<?= "nav-link" . ($path == "/tracker" ? " active" : "") ?>" href="/dashboard/tracker">Tracker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" role="button" data-bs-toggle="collapse" data-bs-target="#applinks-offcanvas">Apply</a>
                <div class="<?= "collapse" . ($path == "/application" || $path == "/examination" || $path == "verification" ? " show" : "") ?>" id="applinks-offcanvas">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/dashboard/application" class="<?= "nav-link" . ($path == "/application" ? " active" : "") ?>">Step 1: Fill up form and payment</a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/examination" class="<?= "nav-link" . ($path == "/examination" ? " active" : "") ?>">Step 2: Examination</a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/verification" class="<?= "nav-link" . ($path == "/verification" ? " active" : "") ?>">Step 3: Identity Verification</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="<?= "nav-link" . ($path == "/terms" ? " active" : "") ?>" href="/dashboard/terms">Terms & Conditions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="actions/logout_action.php">Log out</a>
            </li>
        </ul>
    </div>
</div>