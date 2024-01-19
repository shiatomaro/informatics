<nav class="navbar bg-light shadow p-0 m-0 w-0">
    <h1>TET</h1>
    <a class="" href="/">
        <img src="images/icon.png" alt="Logo" width="64" height="64" class="d-inline-block align-text-top">
    </a>
    <b>Admission System</b>
    <div class="ms-auto container-flex">
        <b><?= $_SESSION['username']; ?></b><br>
        <i><?= $_SESSION['user_type']; ?></i>
    </div>
    <img src="images/rocket.svg" alt="UserIcon" width="30" height="30" class="d-block ms-2">
</nav>

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#" aria-current="page">Admission System <span class="visually-hidden">(current)</span></a>
        <a class="nav-item nav-link" href="#">Home</a>
    </div>
</nav>