@extends('layouts.layout')
    @section('title')
        Crea
    @endsection

    @section('main')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('posts.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Titolo Articolo</label>
                        <input type="text" name="title" placeholder="Inserisci il titolo">
                        @error ('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Testo</label>
                        <textarea name="body" cols="30" rows="10">Inserisci il corpo del post</textarea>
                        @error ('body')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Immagine</label>
                        <textarea name="img" cols="30" rows="10">Inserisci il link dell'immagine</textarea>
                        @error ('img')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Autore</label>
                        <input type="text" name="author" placeholder="Inserisci l'autore">
                        @error ('author')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="not-published">Non Pubblicato</label>
                        <input type="radio" id="not-published" name="published" value="0">
                        <label for="published">Pubblicato</label>
                        <input type="radio" id="published" name="published" value="1">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Invia Dati">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
