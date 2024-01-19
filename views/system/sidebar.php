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