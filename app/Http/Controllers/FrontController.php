<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function post(){
        $posts = Post::orderBy('id', 'DESC')->paginate(4);
        return view('front.index', compact('posts'));
    }

    public function detail($id){
        return view('front.detail');
    }
}
