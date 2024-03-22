<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // on fait ca car i lya des clé étranger
        // récuperer tous les utulisateurs
        $Users =User::all();
        // récuperer toutes la liste de category
        $categories=Category::all();
        return view('posts.create' ,compact('Users' ,'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation 
        $request->validate([
        'title' => 'required|min:5' ,
        'content' =>'required|max:140' , 
        'user_id' => 'required|exists:users,id' ,
        'category_id' => 'required|exists:categories,id',
        ]);
        // dd($request->all());
        // cree un Post vide 
        $newPost= new  Post();
        // remplir avec le contenu du formulaire 
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->user_id = $request->user_id;
        $newPost->category_id = $request->category_id;
        // sauvgarder dans le BD
        $newPost->save();
        return redirect()->route('posts.show',$newPost->id)-> with('success','Post created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::with('category','user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
