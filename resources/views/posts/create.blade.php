<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title></title>
    </head>
    <body>
        @if ($errors->any())
            <ul>
                @foreach ($errors->any() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="container">
            <form class="" action="{{route('posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="in-form">
                <label for="title">Titolo Articolo</label>
                <input type="text" name="title" placeholder="Inserisci il titolo">
            </div>

            <div class="in-form">
                <label for="title">Testo</label>
                <textarea name="body" cols="30" rows="10">Inserisci il corpo del post</textarea>
            </div>

            <div class="in-form">
                <label for="title">Immagine</label>
                <textarea name="img" cols="30" rows="10">Inserisci il link dell'immagine</textarea>
            </div>

            <div class="in-form">
                <label for="title">Autore</label>
                <input type="text" name="author" placeholder="Inserisci l'autore">
            </div>

            <div class="in-form">
                <label for="not-published">Non Pubblicato</label>
                <input type="radio" id="not-published" name="published" value="0">
                <label for="published">Pubblicato</label>
                <input type="radio" id="published" name="published" value="1">
            </div>

            <div class="in-form">
                <input type="submit" value="Invia Dati">
            </div>
            </form>
        </div>
    </body>
</html>
