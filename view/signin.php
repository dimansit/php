<div style="display: flex; justify-content: center;">
    <form method="post" class="sign-in-form mt-5 mt-md-5 col-lg-4 col-md-5 col-sm-8">
        <h3>Авторизация</h3>
        <div class="alert alert-danger <?= $error === null ? 'd-none' : '' ?>">
            <?= $error ?>
        </div>
        <label for="username" class="visually-hidden">Имя пользователя</label>
        <input type="text" id="username" name="username" class="form-control mt-3" placeholder="Имя пользователя" required="" autofocus="">
        <label for="password" class="visually-hidden">Пароль</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required="">
        <hr>
        <button class="btn btn-lg btn-primary" type="submit">Войти</button>
        <a class="btn btn-lg btn-primary" href="/?controller=registrations">Зарегистрироваться</a>
        <div class="mt-3">
            <a href="/">Назад</a>
        </div>
    </form>
</div>