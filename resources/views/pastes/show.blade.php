@extends('layouts.main')
@section('title')
    Pasta
@endsection
@section('body')
    <div class="row">
        <div class="col">
            <h5>паста по ссылке:</h5>
            <hr>
            <b>ID пасты:</b>  {{$pastaShow->id}}<br>
            <b>Заголовок пасты:</b>  {{$pastaShow->title}}<br>
            <b>Текст пасты:</b>  {{$pastaShow->text}}<br>
            <b>Создано:</b> {{$pastaShow->created_at->diffForHumans()}}<br>
            <b>Статус:</b> {{$pastaShow->status}}<br>
            <b>Время истекания доступа к пасте:</b> {{$pastaShow->expired_at ?? "Бессрочно"}}<br>
            <b>Короткая ссылка:</b> <a
                href="{{route('pastes.show', $pastaShow->short_link)}}">{{"https://paste.loc/" . $pastaShow->short_link}}
            </a><br>
            <hr>
        </div>
        @include('layouts.sidebar')
        @include('layouts.authsidebar')
    </div>
@endsection
