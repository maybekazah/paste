@extends('layouts.main')
@section('title')
    Pasta
@endsection
@section('body')
    паста по ссылке:
    <hr>
    id:  {{$pastaShow->id}}<br>
    text:  {{$pastaShow->text}}<br>
    status: {{$pastaShow->status}}<br>
@endsection

