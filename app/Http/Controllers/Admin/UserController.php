<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data , [
            'name' => 'required|string',
            'password' =>'required|string|min: 8',
            'email' => 'required|email|unique:users'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErros($validator)
                ->withInput()->with('status', 'Errore Creazione');
        }

        $user = new User;
        $user->name =  $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect()-> route('admin.users.index')->with('status','Utente' .$user->name . ' creato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(empty($user)) {
            abort('404');
        }


        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data= $request->all();

        if ($user->email == $data['email']) {
            unset($data['email']);
        }

        $validator = Validator::make($data , [
            'name' => 'required|string',
            'email' => 'email|unique:users'
        ]);



        if ($validator->fails()) {
            return redirect()->back()
                ->withErros($validator)
                ->withInput()->with('status', 'Errore Modifica');
        }

        $user->fill($data);
        $updated = $user->update();

        if(!$updated) {
            dd('errore aggiornamento');
        }

        return redirect()-> route('admin.users.index')->with('status','Utente' .$user->name . ' modificato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()-> route('admin.users.index');
    }
}
