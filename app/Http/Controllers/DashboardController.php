<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\User;


class DashboardController extends Controller
{
    public function index()
    {
        $photos = Photo::where('status', 0)->paginate(8);
        $categorys = Category::all();
        return view('pages.index', compact('photos', 'categorys'));
    }
    public function show($title,$id)
    {
        $photo= Photo::where('id', $id)->firstOrFail();
        $user = User:: where('id', $photo->author->id)->firstOrFail();
        $categorys = Category::all();
        $userImages = Photo::where('user_id', $user['id'])->paginate(4);

        // $categories = Category::where('title',$title)->firstOrFail();


        return view('pages.show', compact('photo','categorys', 'user', 'userImages'));
    }
    public function tag($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        //$categories = Category::all();
        $photos = $tag->posts()->paginate(2);
        return view('pages.list', compact('photos'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $photos = $category->photo()->paginate(8);
        $categorys = Category::all();
        return view('pages.list', compact('photos', 'categorys'));
    }

}
