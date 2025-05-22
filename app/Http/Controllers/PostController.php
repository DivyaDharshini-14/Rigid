<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('pages.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load('user', 'comments.replies');
        return view('pages.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $users = User::all();
//        $this->auth('update', $post);
        return view('pages.posts.edit', compact('post','users'));
    }


    public function update(Request $request, Post $post)
    {
//        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($request->only('title', 'body'));

        return redirect()->route('posts.show', $post)->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}
