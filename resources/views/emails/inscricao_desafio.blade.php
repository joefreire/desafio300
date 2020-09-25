<html>
<body>
    <p>Olá {{ $user->name }}!</p>
    <p></p>
    <p>Você se inscreveu no desafio {{$desafio->nome}}.</p>
    <p>para ver seu progresso entre em <a href="{{ config('app.url') }}/desafio/{{$desafio->slug}}">{{$desafio->nome}}</a></p>

    <p></p>
    <img src="{{$desafio->img_confirmacao}}" style="
    max-width: 450px;
    ">
    <p></p>

</body>
</html>