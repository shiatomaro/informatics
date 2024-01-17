<nav class="navbar bg-body-tertiary shadow" id="navbar">
    <div class="container-fluid">
        <div>
            <a class="navbar-brand" href="/informatics/main.php">
                <img src="../images/icon.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
            </a>
        </div>
        <div>
            <b>Admission System</b>
        </div>
        <div class="pr-5">
            <a class="navbar-brand" href="#">
                <?php
                $username = $_SESSION['username'];
                echo "<b>$username</b>";
                ?>
                <img src="./img/undraw_rocket.svg" alt="UserIcon" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <a href='../database/logout_action.php'>Logout</a>
        </div>
    </div>
</nav>