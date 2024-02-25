10  последних паст паблик:
@foreach($pastes as $paste)
    ID пасты:  {{$paste->id}}<br>
    Заголовок пасты:  {{$paste->title}}<br>
    Текст пасты:  {{$paste->text}}<br>
    <hr>
@endforeach
@auth()
    10 паст авторизованного пользователя:
    @foreach($authShowPastes as $authShowPaste)
        ID пасты:  {{$authShowPaste->id}}<br>
        Заголовок пасты:  {{$authShowPaste->title}}<br>
        Текст пасты:  {{$authShowPaste->text}}<br>
        <hr>
    @endforeach
@endauth
