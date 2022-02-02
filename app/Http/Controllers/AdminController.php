<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Response;
use DB;
class AdminController extends Controller
{
    public function index()
    {
         
         return view('admin.posts.index',[
            'posts' => Post::paginate(50)
         ]);
    }


    public function create()
    {
         
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
       

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'image' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();

        if($request->hasfile('image'))
       {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = uniqid() . '_' . time().'.'.$extension;
          $file->move('uploads', $filename);
         
          $attributes['image'] = $filename;
       }
        Post::create($attributes);
        return redirect('/');
    }

                public function edit($id)
            {
                $post = Post::findOrFail($id);
                return view ('admin.posts.edit', compact ('post'));
            }

            public function update(Request $request,$id)
            {
                  $attributes = Post::findOrFail($id);
                  $attributes = request()->validate([
                    'title' => 'required',
                    'slug' => 'required',
                    
                    'excerpt' => 'required',
                    'body' => 'required',
                    'category_id' => ['required', Rule::exists('categories','id')]
                ]);

                  $attributes['user_id'] = auth()->id();

                    if($request->hasfile('image'))
                   {
                      $file = $request->file('image');
                      $extension = $file->getClientOriginalExtension();
                      $filename = uniqid() . '_' . time().'.'.$extension;
                      $file->move('uploads', $filename);
                     
                      $attributes['image'] = $filename;
                   }
                  $post = DB::table('posts')->where('id',$id)->update($attributes);
                    return redirect('admin/posts')->with('success','Post Updated!');
            }

            public function delete($id)
            {
                $attributes = Post::findOrFail($id);
                $attributes->delete();
                return back()->with('success','Post Deleted');


            }
}
