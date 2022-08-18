<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
   
    public function index()
    {
        $posts = BlogPost::all();
        return view('blog.index', [
                'posts' => $posts,
        ]);
    }

   
    public function create()
    {
        return view('blog.create');
    }

   
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
    }

    
    public function show(BlogPost $id)
    {
        return view('blog.show', [
            'post' => $id,
        ]);
    }

   
    public function edit(BlogPost $id)
    {
        return view('blog.edit', [
            'post'=> $id,
        ]);
    }

    
    public function update(Request $request, BlogPost $id)
    {
        $id->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $id->id);
    }

   
    public function destroy(BlogPost $id)
    {
        $id->delete();

        return redirect('/blog');
    }
}
