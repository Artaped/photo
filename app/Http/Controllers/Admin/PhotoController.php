<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Photo;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        $photos = Photo::all();
        return view('admin.photos.index', ['photos' => $photos, 'categorys' => $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('title', 'id')->all();
        $categorys = Category::all();
        return view('admin.photos.create', ['categorys' => $categorys, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //валидация данных
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'image' => 'nullable|image'
        ]);

        $photo = Photo::add($request->all());
        //$photo->toggleStatus($request->get('status'));
        $photo->uploadImage($request->file('image'));
        $photo->setCategory($request->get('category_id'));
        $photo->setTags($request->get('tags'));
        return redirect('admin/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        $categorys = Category::all();
        $tags = Tag::all();
        //$selectedTags = $photo->tags->pluck('id')->all();
        return view('admin.photos.edit', ['categorys' => $categorys, 'tags' => $tags, 'photo' => $photo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'descriptions' => 'required',
            'image' => 'nullable|image'
        ]);

        $photo = Photo::find($id);
        $photo->edit($request->all());
        //$photo->toggleStatus($request->get('status'));
        $photo->uploadImage($request->file('image'));
        $photo->setCategory($request->get('category_id'));
        //$post->setTags($request->get('tags'));
        return redirect('admin/photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::find($id)->delete();
        return redirect('admin/photos');
    }
}
