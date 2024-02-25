@extends('layouts.main')
@section('title')
    Pastes
@endsection
@section('body')
        <div class="row">
            <div class="col">
                {{session('success') ?? NULL}}
                {{session('error') ?? NULL}}
                <form action="{{route('pastes.store')}}" method="POST">
                    @csrf
                    @error('title')
                    {{$message}}
                    @enderror
                    <label for="title">Заголовок:</label>
                    <textarea class="form-control mb-3"name="title" id="title">{{old('title') ?? ''}}</textarea>

                    @error('text')
                    {{$message}}
                    @enderror
                    <label for="text">Текст пасты:</label>
                    <textarea class="form-control mb-3"  name="text" id="text">{{old('text') ?? ''}}</textarea>

                    @error('expired_at')
                    {{$message}}
                    @enderror
                    <select class="form-select mt-3" id="expired_at" name="expired_at">
                        <option selected value="{{NULL}}">{{old('text') ?? 'Срок доступа (по умолчанию без ограничения'}})</option>
                        <option value="{{now()->addMinutes(10)}}">10 мин</option>
                        <option value="{{now()->addHour()}}">1 час</option>
                        <option value="{{now()->addHours(3)}}">3 часа</option>
                        <option value="{{now()->addDays()}}">1 день</option>
                        <option value="{{now()->addWeeks()}}">1 неделя</option>
                        <option value="{{now()->addMonths()}}">1 месяц</option>
                    </select>

                    @error('status')
                    {{$message}}
                    @enderror
                    <select class="form-select mt-3" id="status" name="status">
                        <option selected value="{{\App\Enums\PastaStatusEnum::PUBLIC->value}}">Выбрать параметры доступа (по умолчанию public, видна всем)
                        </option>
                        <option value="{{\App\Enums\PastaStatusEnum::UNLISTED->value}}">unlisted (доступ по ссылке)</option>
                        <option value="{{\App\Enums\PastaStatusEnum::PRIVATE->value}}">private (доступна только автору)</option>
                    </select>

                    <input type="hidden" name="user_id" value="{{auth()->id() ?? NULL}}">

                    <button type="submit" class="btn btn-success mt-3">Опубликовать</button>
                </form>
            </div>
                @include('layouts.sidebar')
        </div>
@endsection
