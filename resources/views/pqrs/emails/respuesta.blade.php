<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Respuesta PQRS</title>
</head>
<body>
    <header>
        <img src="{{ asset('img/hanka_logo.png') }}" width="50" height="50" class="card-img-top" alt="...">
        <label style="text-align:center"><b>HANKA</b></label>
    </header>
    <hr>
    <blockquote>
        <p>Hola {{$pqrs?->nombre}}.</p>
        <label>Se le ha dado respuesta a tu {{$pqrs?->infoTipo?->nombre}}, nos comentaste que:</label><br>
        <label>{!! html_entity_decode($pqrs?->descripcion , ENT_QUOTES, "UTF-8") !!}</label>
        <label>Como respuesta a tu {{$pqrs?->infoTipo?->nombre}}:</label><br>
        <label>{!! html_entity_decode($pqrs?->descripcion_respuesta , ENT_QUOTES, "UTF-8") !!}</label>
    </blockquote>

    <footer>
        <address>
            <span>Cual quier inquitud puedes escribirnos un correo a hanka@gmail.com .</span><br>
            Direccion: Calle 72p # 26-103 <br>
            Cel: 305-222-42-49 <br>
            E-mail: hanka@gmail.com <br>
        </address>
    </footer>
</body>
</html>