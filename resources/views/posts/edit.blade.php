@extends('layouts.layout')
    @section('title')
        Modifica
    @endsection

    @section('main')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('posts.update', $post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titolo Articolo</label>
                        <input type="text" name="title" value="{{$post->title}}">
                        @error ('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Testo</label>
                        <textarea name="body" cols="30" rows="10">{{$post->body}}</textarea>
                        @error ('body')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Immagine</label>
                        <textarea name="img" cols="30" rows="10">{{$post->img}}</textarea>
                        @error ('img')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Autore</label>
                        <input type="text" name="author" value="{{$post->author}}">
                        @error ('author')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="not-published">Non Pubblicato</label>
                        <input type="radio"  name="published" value="0" {{($post->published == 0) ? 'checked' : ''}}>
                        <label for="published">Pubblicato</label>
                        <input type="radio"  name="published" value="1" {{($post->published == 1) ? 'checked' : ''}}>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Invia Dati">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
