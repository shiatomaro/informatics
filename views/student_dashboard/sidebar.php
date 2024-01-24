<nav id="sidebar" class="h-100 d-none d-md-block">
    <div class="sidebar-header">
        <img src="images/icon.png" alt="icon" width="60px" height="60px">
        <h3>Informatics Northgate College</h3>
    </div>

    <span class="ms-2">User:</span><em><?= $_SESSION['username'] ?></em>
    <hr>

    <ul class="list-unstyled components">
        <li class="nav-item">
            <a href="/dashboard/tracker" class="nav-link<?= $path == "/tracker" ? " active" : "" ?>">
                Tracker
            </a>
        </li>
        <li class="nav-item">
            <a href="#homeSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" class="dropdown-toggle">
                Apply
            </a>
            <ul class="list-unstyled collapse<?= $path == "/application" || $path == "/examination" || $path == "/verification" ? " show" : "" ?>" id="homeSubmenu">
                <li href="application-form.php" class="nav-item">
                    <a href="/dashboard/application" class="nav-link<?= $path == "/application" ? " active" : "" ?>">Step 1: Fill Up Form and Payment</a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/examination" class="nav-link<?= $path == "/examination" ? " active" : "" ?>">Step 2: Examination</a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/verification" class="nav-link<?= $path == "/verification" ? " active" : "" ?>">Step 3: Identity Verification</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/dashboard/terms" class="nav-link<?= $path == "/terms" ? " active" : "" ?>">
                Terms & Conditions
            </a>
        </li>
        <li>
            <a href="actions/logout_action.php">
                Log out
            </a>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>