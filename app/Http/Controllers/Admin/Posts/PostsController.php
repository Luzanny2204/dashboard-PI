<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\PostsCreateRequest;
use App\Models\Post\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsCreateRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index')->with('success', 'El cargo se a creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.index', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.index', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsCreateRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('admin.posts.index')->with('edit', 'El cargo se a editado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); 
        return redirect()->route('admin.posts.index')->with('delete', 'El cargo se a eliminado correctamente.');

    }
}
