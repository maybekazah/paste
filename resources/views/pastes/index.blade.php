@extends('layouts.main')
@section('title')
    My pastes
@endsection
@section('body')
    <div class="row">
        <div class="col">
            <h5>10 паст авторизованного пользователя c пагинацией:</h5>
            @foreach($authShowPastes as $authShowPaste)
                <hr>
                <b>ID пасты:</b>  {{$authShowPaste->id}}<br>
                <b>ID пользователя:</b> {{$authShowPaste->user_id}}<br>
                <b>Заголовок пасты:</b>  {{$authShowPaste->title}}<br>
                <b>Текст пасты:</b>  {{$authShowPaste->text}}<br>
                <b>Создано:</b> {{$authShowPaste->created_at->diffForHumans()}}<br>
                <b>Статус:</b> {{$authShowPaste->status}}<br>
                <b>Время истекания доступа к пасте:</b> {{$authShowPaste->expired_at ?? "Бессрочно"}}<br>
                <b>Короткая ссылка:</b> <a
                    href="{{route('pastes.show', $authShowPaste->short_link)}}">{{"https://paste.loc/" . $authShowPaste->short_link}}
                </a><br>
                <hr>
            @endforeach
            <div class="container my-nav">
                {{$authShowPastes->links()}}
            </div>
            <style>
                .my-nav svg {
                    width: 10px;
                }
            </style>
        </div>
        @include('layouts.sidebar')
    </div>
@endsection
