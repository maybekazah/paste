@extends('layouts.main')
@section('title')
    My pastes
@endsection
@section('body')
    10 паст авторизованного пользователя:
    @foreach($authShowPastes as $authShowPaste)
        ID пасты:  {{$authShowPaste->id}}<br>
        Заголовок пасты:  {{$authShowPaste->title}}<br>
        Текст пасты:  {{$authShowPaste->text}}<br>
        <hr>
    @endforeach
@endsection
