@extends('pages.layout')
@section('content')

    <div class="container main-content">

        <div class="columns">
            <div class="column">
                <div class="tabs is-centered pt-100">
                    <ul>
                        <li class="is-active">
                            <a href="/profile/info">
                                <span class="icon is-small"><i class="fas fa-user"></i></span>
                                <span>Основная информация</span>
                            </a>
                        </li>
                        <li>
                            <a href="/profile/security">
                                <span class="icon is-small"><i class="fas fa-lock"></i></span>
                                <span>Безопасность</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="is-clearfix"></div>
                <div class="columns is-centered">
                    <div class="column is-half">

                        <form action="/profile/info" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="field">
                                <label class="label">Ваше имя</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" value="<?= $user['name']; ?>" name="name">
                                    <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" value="<?= $user['email']; ?>" name="email">
                                    <span class="icon is-small is-left">
                                      <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Аватар</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="file" name="avatar"> <br> <br>
                                    <img src="{{ $user->getImage() }}" alt="">
                                </div>
                            </div>

                            <div class="control">
                                <button class="button is-link" type="submit">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection