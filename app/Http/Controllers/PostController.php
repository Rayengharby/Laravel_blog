<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

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
        $request->validate($this->validationRules());

        // Récupérer le nom de l'image uploadée
        // puis la transférer dans le dossier 'storage/app/posts'
        $image = Storage::disk('public')->put('Posts', $request->file('image'));

        //$image = Storage::put('posts',$request->file('image'));

        // Créer un Post vide
        $newPost = new Post();

        // Le remplir avec le contenu du formulaire
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->image = $image;
        $newPost->user_id = $request->user_id;
        $newPost->category_id = $request->category_id;

        // Sauvegarde dans la BD
        $newPost->save();
        return redirect()->route('posts.show', $newPost->id)->with('success', 'Post created successfully');
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
       $post= Post::findOrFail($id);
       $authors = User::all();
       $categories = Category::all();
       return view('posts.edit', compact('post','authors','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->validationRules());

        // Récupérer le Post à modifier
        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
           
            $oldImage = $post->image;
            if (Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            // Add new image to storage
            $newImage = Storage::disk('public')->put('posts', $request->file('image'));
            
            $post->image = $newImage;
        }

        // Mettre à jour le post avec le contenu du formulaire
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;

       
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
{
    $post = Post::findOrFail($id);

    $image = $post->image;

    if ($image !== null && Storage::disk('public')->exists($image)) {
        Storage::disk('public')->delete($image);
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
}

    
    private function validationRules()
    {
        return [
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
