@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.users.update' , $user->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Inserisci nome</label>
                        <input type="text" name="name" placeholder="Inserisci il nome utente" value="{{$user->name}}">
                        @error ('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="email" name="email" placeholder="Inserisci l'email" value="{{$user->email}}">
                        @error ('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Invia Dati">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
