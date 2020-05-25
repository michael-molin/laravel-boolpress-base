@extends('layouts.layout')
@section('title')
    Main
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Link Immagine</th>
                        <th>Autore</th>
                        <th colspan="3">Azioni</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->img}}</td>
                            <td>{{$post->author}}</td>
                            <td><a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">Visualizza</a></td>
                            <td><a class="btn btn-secondary"  href="{{route('posts.edit', $post->id)}}">Modifica</a></td>
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
