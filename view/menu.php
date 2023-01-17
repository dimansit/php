<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
        <?php if ($username ?? false && $username !== null) : ?>
            Привет, <?= $username ?>! &nbsp; <a class="btn btn-sm btn-danger" href="/?controller=security&action=logout">Выйти</a>
        <?php else : ?>
            <a class="btn btn-sm btn-success" href="/?controller=security">Войти</a>
        <?php endif; ?>
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Главная</a>
                <a class="nav-item nav-link" href="/?controller=tasks">Задачи</a>
                <?php if (!$username) : ?>
                    <a class="nav-item nav-link" href="/?controller=security">Авторизироваться</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>