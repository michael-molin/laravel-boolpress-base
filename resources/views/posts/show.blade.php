@extends('layouts.layout')
@section('title')
    Visualizza
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
                        <th colspan="2">Azioni</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->img}}</td>
                            <td>{{$post->author}}</td>
                            <td><a class="btn btn-secondary"  href="{{route('posts.edit', $post->id)}}">Modifica</a></td>
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
