<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function published()
     {
         $posts = Post::where('published', '1')->get();
         return view('posts.published' , compact('posts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $data['slug'] = Str::slug($data['title'] , '-');
        // $slug = Str::slug('Laravel 5 Framework', '-');

        $validator = Validator::make($data , [
            'title' => 'required|unique:posts|string|max:100',
            'body' => 'required',
            'author' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')
                ->withErrors($validator)
                ->withInput()->with('status', 'Errore');
        }

        $post = new Post;
        $post->fill($data);
        $post->save();
        return redirect()-> route('posts.show', $post->id)->with('status','Post title: '. $post->title . ' salvato con successo' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(empty($post)) {
            abort('404');
        }

        $title = $post->title . ' modificato con successo';

        return view('posts.edit', compact('post', 'title'));
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
        $post = Post::find($id);
        if(empty($post)) {
            abort('404');
        }

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'] , '-');
        $validator = Validator::make($data , [
            'title' => 'required|unique:posts|string|max:100',
            'body' => 'required',
            'author' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')
                ->withErrors($validator)
                ->withInput()->with('status', 'Errore');
        }

        $post->fill($data);
        $updated = $post->update();
        if (!$updated) {
            dd('errore aggiornamento');
        }

        return redirect()-> route('posts.show', $post->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(empty($post)) {
            abort('404');
        }

        $post->delete();
        return redirect()-> route('posts.index');
    }
}
