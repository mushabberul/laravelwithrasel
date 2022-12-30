<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);
        // $post = Post::create([
        //     'title' => $request->title,
        //     'date' => now(),
        //     'desc' => $request->desc
        // ]);
        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->desc = $request->desc;
        $post->save();

        return redirect()->route('posts');
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }
}
