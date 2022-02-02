<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
    use Response;

class PostController extends Controller
{
    public function index()
       {
       
             return view('posts.index', [

              'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6),
              'categories' => Category::all()
           ]);

        }

    public function show(Post $post)
    {
        
         return view('posts.show' , [
       'post' => $post
         ]);
    }


  
}
