<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Post;
use App\Tag;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::query()->pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePost $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $data['image'] = $request->file('image')->store("images/{$folder}");
        }

        $post = Post::query()->create($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StorePost $request, $id)
    {

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {

        return redirect()->route('categories.index')->with('success', 'Статья удалена');
    }
}
