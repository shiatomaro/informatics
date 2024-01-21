<nav id="sidebar" class="h-100">
    <div class="sidebar-header">
        <img src="images/icon.png" alt="icon" width="60px" height="60px">
        <h3>Informatics Northgate College</h3>
    </div>

    <span class="ms-2">User:</span><em><?= $_SESSION['username'] ?></em>
    <hr>

    <ul class="list-unstyled components">
        <li class="<?= $path == "/tracker" ? "active" : "" ?>">
            <a href="/dashboard/tracker">
                Tracker
            </a>
        </li>
        <li>
            <a href="#homeSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" class="dropdown-toggle">
                Apply
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li href="application-form.php" class="<?= $path == "/application" ? "active" : "" ?>">
                    <a href="/dashboard/application">Step 1: Fill Up Form and Payment</a>
                </li>
                <li class="<?= $path == "/examination" ? "active" : "" ?>">
                    <a href="/dashboard/examination">Step 2: Examination</a>
                </li>
                <li class="<?= $path == "/verification" ? "active" : "" ?>">
                    <a href="/dashboard/verification">Step 3: Identity Verification</a>
                </li>
            </ul>
        </li>
        <li class="<?= $path == "/terms" ? "active" : "" ?>">
            <a href="/dashboard/terms">
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