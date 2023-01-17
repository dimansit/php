<div style="display: flex; justify-content: center;">
    <form method="post" class="sign-in-form mt-5 mt-md-5 col-lg-4 col-md-5 col-sm-8">
        <h3>Авторизация</h3>
        <div class="alert alert-danger <?= $error === null ? 'd-none' : '' ?>">
            <?= $error ?>
        </div>
        <label for="name" class="visually-hidden">Имя пользователя</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Имя пользователя" required autofocus="">
        <label for="username" class="visually-hidden">Login для входа</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Имя пользователя" required>
        <label for="password" class="visually-hidden">Пароль</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
        <label for="password" class="visually-hidden">Подтвержедние пароля</label>
        <input type="password" id="password" name="password2" class="form-control" placeholder="Пароль" required>
        <button class="w-75 btn btn-lg btn-primary mt-1" type="submit">Зарегистрироваться</button>
        <div class="mt-3">
            <a href="/">Назад</a>
        </div>
    </form>
</div>