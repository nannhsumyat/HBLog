<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function post(){
        $categories = Category::orderBy('id', 'DESC')->get();
        
        // ပထမဆုံး Featured Post ကို ယူခြင်း
        $feature_posts = Post::orderBy('id', 'DESC')->limit(1)->get();
        $feature_post_id = $feature_posts->pluck('id')->toArray();
        
        // Featured Post ပါမပါ စစ်ဆေးပြီး ကျန် Post များကို ယူကာ pagination လုပ်ခြင်း
        if (!empty($feature_post_id)) {
            $posts = Post::whereNotIn('id', $feature_post_id)->orderBy('id', 'DESC')->paginate(4);
        } else {
            $posts = Post::orderBy('id', 'DESC')->paginate(4);
        }

        return view('front.index', compact('posts', 'categories', 'feature_posts'));
    }

    public function detail($id){
        return view('front.detail');
    }
}
