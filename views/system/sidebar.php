<div class="col col-2 h-100 text-bg-secondary" id="sidebar">
    <nav>
        <div class="pt-3 ps-2 d-flex align-items-center">
            <a class="" href="/">
                <img src="images/icon.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
            </a>
            <b>Admission System</b>
        </div>
        <div class="container container-flex">
            <em>user: </em><b><?= $_SESSION['username']; ?></b><br>
            <em>role: </em><i><?= $_SESSION['user_type']; ?></i>
        </div>
        <hr class="horizontal-divider" />
        <ul class="nav flex-column p-2">
            <li class="nav-item">
                <a class="nav-link" href="/system/dashboard">Dashboard</a>
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
    </nav>

</div>