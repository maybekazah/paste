@extends('layouts.main')
@section('title')
    My pastes
@endsection
@section('body')
    10 паст авторизованного пользователя:
    {{--    {{dd($authShowPastes)}}--}}
    @foreach($authShowPastes as $authShowPaste)
        ID пасты:  {{$authShowPaste->id}}<br>
        Заголовок пасты:  {{$authShowPaste->title}}<br>
        Текст пасты:  {{$authShowPaste->text}}<br>
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
@endsection
