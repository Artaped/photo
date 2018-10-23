@extends('pages.layout')
@section('content')
    <div class="container main-content">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-half auth-form">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{$photo->getImage()}}" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="{{$user->getImage()}}" alt="Placeholder image">
                                </figure>
                            </div>
                            <p class="title is-4">
                                Добавил: {!! $photo->author->name !!}
                            </p>
                        </div>

                        <div class="content">
                            {!! $photo->description !!}
                            <br>
                            <time datetime="2016-1-1" class="is-size-6 is-pulled-left">Добавлено: {!! $photo->date !!}</time>
                            <a href="/photos/download/{{$photo['id']}}" class="button is-info is-pulled-right">Скачать</a>
                            <div class="is-clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column"></div>
        </div>

        <hr>

        <div class="columns">
            <div class="column">
                <h1 class="title">Другие фотографии от {!! $photo->author->name !!}</h1>
            </div>
        </div>

        <div class="columns section">
            @foreach($userImages as $photos)
            <div class="column is-one-quarter">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <a href="/{{$photos->category->title}}/{!! $photos->id !!}">
                                <img src="{{$photos->getImage()}}">
                            </a>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <p class="title is-5"><a href="/category/{!! $photos->category_id !!}">
                                        @if($photos['category_id'] === null)
                                            без категории
                                        @else
                                            @foreach ($categorys as $category)
                                                @if($category['id'] == $photo['category_id'])
                                                    {!! $category->title !!}
                                                @endif
                                            @endforeach

                                        @endif</a></p>
                            </div>
                            <div class="media-right">
                                <p  class="is-size-7">Размер:  xxl </p>
                                <time datetime="2016-1-1" class="is-size-7">Добавлено: {!! $photos->date !!}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>



@endsection