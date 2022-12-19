<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // return view('main.blog', ['title' => 'Blog']);
    }

    public function posts()
    {
        return view('dashboard.blog.posts', [
            'title' => 'Artikel',
            'account' => User::where('id', auth()->user()->id)->get(),
            'posts' => Post::with('user')->latest()->paginate(6)
        ]);
    }

    public function newPost()
    {
        return view('dashboard.blog.newpost', [
            'title' => 'Buat Artikel Baru',
            'account' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function showPost(Post $post)
    {
        return view('dashboard.blog.showpost', [
            'title' => 'Artikel - ' . $post->title,
            'account' => User::where('id', auth()->user()->id)->get(),
            'post' => $post
        ]);
    }

    public function editPost(Post $post)
    {
        return view('dashboard.blog.editpost', [
            'title' => 'Edit Artikel - ' . $post->title,
            'account' => User::where('id', auth()->user()->id)->get(),
            'post' => $post
        ]);
    }

    public function savePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 45, '...');

        Post::create($validatedData);
        return redirect('/manage/posts')->with('success', 'Artikel telah dibuat!');
    }

    public function updatePost(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'image' => 'image|file|max:2048',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 45, '...');

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/manage/posts')->with('success', 'Artikel telah diperbarui!');
    }

    public function deletePost(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/manage/posts')->with('success', 'Artikel telah dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
