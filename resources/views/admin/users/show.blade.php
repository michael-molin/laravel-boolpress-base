@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th colspan="2">Azioni</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a class="btn btn-secondary"  href="{{route('admin.users.edit', $user->id)}}">Modifica</a></td>
                            <td>
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
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
