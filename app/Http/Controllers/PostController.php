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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'file' => 'nullable|mimes:pdf,doc,docx,txt',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('files', 'public');
        }


        $validated['user_id'] = Auth::id();
        Post::create($validated);

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

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'file' => 'nullable|mimes:pdf,doc,docx,txt',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('files', 'public');
        }

        $post->update($validated);

        return redirect()->route('posts.index', $post)->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');

    }
}
