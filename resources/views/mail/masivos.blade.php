<body>
    <div style="text-align: center;">
    <img src="{{ $message->embed(public_path().'/img/logos/emprender.png') }}">
    </div>
    <br><br>
    {{ $cuerpo }}
    <br><br>
    <img src="{{ $message->embed(public_path().'/img/campanias/'.$imagen) }}">
</body>