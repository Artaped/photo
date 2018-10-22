@extends('pages.layout')
@section('content')

        <section class="hero is-medium is-primary is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Самые минималистичные и элегантные обои для вашего рабочего стола!
                    </h1>
                    <h2 class="subtitle">
                        Настроение и вдохновение в одном кадре.
                    </h2>
                </div>
            </div>
        </section>
    <section class="section main-content">
        <div class="container">
            <div class="columns  is-multiline">
                @foreach ($photos as $photo)
                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <a href="/{{$photo->title}}/{{$photo->id}}">
                                    <img src="{{$photo->getImage()}}" alt="Placeholder image">
                                </a>
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <p class="title is-5">
                                            @if($photo->category_id === null)
                                                без категории
                                            @else
                                                @foreach ($categorys as $category)
                                                    @if($category->id == $photo->category_id)
                                                    <a href="{{$category->title}}">
                                                        {!! $category['title'] !!}
                                                    </a>
                                                    @endif
                                                @endforeach
                                            @endif
                                    </p>
                                    <p>Автор {!! $photo->author->name !!}</p>
                                </div>
                                <div class="media-right">
                                    <p  class="is-size-7">Размер: 1280x760</p>
                                    <time datetime="2016-1-1" class="is-size-7">Добавлено: {!! $photo->date !!}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection