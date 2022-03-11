<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Tag;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::query()->paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTag $request)
    {
        Tag::query()->create($request->all());
        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    public function edit($id)
    {
        $tag = Tag::query()->find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(StoreTag $request, $id)
    {
        Tag::query()->find($id)->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $tag = Tag::query()->find($id);
        if ($tag->posts->count()) {
            return redirect()->route('tags.index')->with('error', 'Ошибка, у тега есть статьи');
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }
}
