<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="/css/bulma.css">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    Главная
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="category.html">
                        Категории
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <?php foreach ($categorys as $category):?>
                        <a class="navbar-item" href="#">
                            <?=$category['title']?>
                        </a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">
                        <?php if (Auth::check())  :?>
                        <div class="dropdown is-hoverable">
                            <div class="dropdown-trigger">
                                <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu4">
                                    <span>Управление</span>
                                    <span class="icon is-small">
                                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                                          </span>
                                </button>
                            </div>
                            <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-item manager-links">
                                        <p class="control">
                                            <a class="button" href="/pages/create">
                                                      <span class="icon">
                                                        <i class="fas fa-upload"></i>
                                                      </span>
                                                <span>Загрузить картинку</span>
                                            </a>
                                        </p>

                                        <p class="control">
                                            <a class="button" href="/photos">
                                                      <span class="icon">
                                                        <i class="fas fa-image"></i>
                                                      </span>
                                                <span>Моя галерея</span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="account control">
                            <p>
                                Здравствуйте, {{ Auth::user()->name }}<b></b>
                            </p>
                        </div>
                        <p class="control">
                            <a class="button is-info" href="/profile/info">
                                  <span class="icon">
                                    <i class="fas fa-user"></i>
                                  </span>
                                <span>Профиль</span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="button is-dark" href="/logout">
                                  <span class="icon">
                                    <i class="fas fa-window-close"></i>
                                  </span>
                                <span>Выйти</span>
                            </a>
                        </p>
                        <?php else: ?>
                        <p class="control">
                            <a class="button is-link" href="/login">
                                      <span class="icon">
                                        <i class="fas fa-user"></i>
                                      </span>
                                <span>Войти</span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="button is-primary" href="/registration">
                              <span class="icon">
                                <i class="fas fa-address-book"></i>
                              </span>
                                <span>Зарегистрироваться</span>
                            </a>
                        </p>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
    @yield('content')
<footer class="section hero is-light">
    <div class="container">
        <div class="content has-text-centered">
            <div class="tabs">
                <ul>
                    <li class="is-active"><a>Главная</a></li>
                    <?php foreach ($categorys as $category):?>
                    <li><a><?=$category['title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <p>
                <strong>Dima</strong>
            </p>
            <p class="is-size-7">
                All rights reserved. 2018
            </p>
        </div>
    </div>
</footer>
</div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
</html>