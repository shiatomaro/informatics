<nav class="navbar bg-body-tertiary shadow" id="navbar">
    <div class="container-fluid justify-content-start">
        <a class="navbar-brand" href="/">
            <img src="images/icon.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
        </a>
        <b>Admission System</b>
        <div class="ms-auto container-flex">
            <b><?= $_SESSION['username']; ?></b><br>
            <i><?= $_SESSION['user_type']; ?></i>
        </div>
        <img src="images/rocket.svg" alt="UserIcon" width="30" height="30" class="d-block ms-2">
    </div>
</nav>