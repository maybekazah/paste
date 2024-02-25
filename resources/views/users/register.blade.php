@extends('layouts.main')
@section('title')
    register page
@endsection
@section('body')
    <div class="container">
        {{session('abort') ?? NULL}}
        <form action="{{route('register_process')}}" method="POST">
            @csrf
            <div class="container mb-3">
                @error('name')
                {{$message}}
                @enderror
                <label for="name" class="form-label">Введите имя</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name' ?? NULL)}}">
            </div>
            <div class="container mb-3">
                @error('email')
                {{$message}}
                @enderror
                <label for="email" class="form-label">Введите почту</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email' ?? NULL)}}">
            </div>
            <div class="container mb-3">
                @error('password')
                {{$message}}
                @enderror
                <label for="password" class="form-label">Введите пароль</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="container mb-3">
                @error('password_confirmation')
                {{$message}}
                @enderror
                <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="container mb-3">
                <button type="submit" class="btn btn-success">Войти</button>
            </div>
        </form>
    </div>
@endsection
