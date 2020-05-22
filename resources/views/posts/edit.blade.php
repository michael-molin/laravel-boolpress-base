<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
            {{-- <form action="{{route('posts.update', $post->id)}}" method="POST"> --}}
            <form action="{{route('posts.update', $post->id)}}" method="POST">
            @method('PUT')
            @csrf


                <div class="in-form">
                    <label for="title">Titolo Articolo</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>

                <div class="in-form">
                    <label for="title">Testo</label>
                    <textarea name="body" cols="30" rows="10" value="{{$post->body}}" ></textarea>
                </div>

                <div class="in-form">
                    <label for="title">Immagine</label>
                    <textarea name="img" cols="30" rows="10" value="{{$post->img}}"></textarea>
                </div>

                <div class="in-form">
                    <label for="title">Autore</label>
                    <input type="text" name="author"  value="{{$post->author}}">
                </div>

                <div class="in-form">
                    <label for="not-published">Non Pubblicato</label>
                    <input type="radio"  name="published" value="0" {{($post->published == 0) ? 'checked' : ''}}>
                    <label for="published">Pubblicato</label>
                    <input type="radio"  name="published" value="1" {{($post->published == 1) ? 'checked' : ''}}>
                </div>

                <div class="in-form">
                    <input type="submit" value="Invia Dati">
                </div>
            </form>
        </div>
    </body>
</html>
