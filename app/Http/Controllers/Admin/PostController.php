<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

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

    public function store(StoreCategory $request)
    {
        dd($request->all());
        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategory $request, $id)
    {

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {

        return redirect()->route('categories.index')->with('success', 'Статья удалена');
    }
}
