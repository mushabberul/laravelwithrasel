<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Flasher\Prime\FlasherInterface;
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

        flash('Post add successfully!👌', 'success');
        return redirect()->route('posts');
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post = $post->update([
            'title' => $request->title,
            'desc' => $request->desc
        ]);
        flash()->addInfo('Post successfully Updated');
        return redirect()->route('posts');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        flash()->addWarning('Post successfully deleted');
        return back();
    }
}
