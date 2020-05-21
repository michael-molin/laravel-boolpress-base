<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            @foreach ($posts as $post)
                <div class="post">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->body}}</p>
                    <small>{{$post->author}}</small>
                    <div class="post-btn">
                        <a href="{{route('posts.edit', $post->id)}}"><button class="btn-edit" type="button" name="button">Modifica</button></a>
                        <form action="{{route('posts.destroy', $post->id)}}", method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn-erase" type="submit">Cancella</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
