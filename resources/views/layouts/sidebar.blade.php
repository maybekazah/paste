<div class="col">
    <h5>10 последних паст паблик:</h5>
    <hr>
    @foreach($pastes as $paste)
        ID пасты:  {{$paste->id}}<br>
        Заголовок пасты:  {{$paste->title}}<br>
        Текст пасты:  {{$paste->text}}<br>
        <hr>
    @endforeach
</div>
<div class="col">
    @auth()
        <h5>10 паст авторизованного пользователя:</h5>
        <hr>
        @foreach($authShowPastes as $authShowPaste)
            ID пасты:  {{$authShowPaste->id}}<br>
            Заголовок пасты:  {{$authShowPaste->title}}<br>
            Текст пасты:  {{$authShowPaste->text}}<br>
            <hr>
        @endforeach
    @endauth
</div>
