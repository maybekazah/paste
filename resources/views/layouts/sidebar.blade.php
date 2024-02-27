<div class="col">
    <h5>10 последних паст паблик:</h5>
    @foreach($pastes as $paste)
        <b>ID пасты:</b>  {{$paste->id}}<br>
        <b>ID пользователя:</b> {{$paste->user_id ?? "Аноним"}}<br>
        <b>Заголовок пасты:</b>  {{$paste->title}}<br>
        <b>Текст пасты:</b>  {{$paste->text}}<br>
        <b>Создано:</b> {{$paste->created_at->diffForHumans()}}<br>
        <b>Статус:</b> {{$paste->status}}<br>
        <b>Время истекания доступа к пасте:</b> {{$paste->expired_at ?? "Бессрочно"}}<br>
        <b>Короткая ссылка:</b> <a
                href="{{route('pastes.show', $paste->short_link)}}">{{"https://paste.loc/" . $paste->short_link}}
        </a><br>
        <hr>
    @endforeach
</div>

