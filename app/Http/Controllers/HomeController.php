<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
class HomeController extends Controller
{
    public function home()
    {
    	$logos = Setting::take(1)->get();
    	$categories = Category::all();
        $sliders = Slider::all();
    	$posts = Post::orderBy('created_at','DESC')->get();
    	return view('frontend.index',compact('logos','categories','posts','sliders'));
    }

    public function PostDetail($id)
    {
    	$post = Post::find($id);
    	$logos = Setting::take(1)->get();
    	$categories = Category::all();
    	return view('frontend.detail',compact('post','logos','categories'));
    }

    public function getPostByCategory($id)
    {
        $logos = Setting::take(1)->get();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where('cate_id',$id)->get();
        return view('frontend.category',compact('posts','logos','categories'));
    }


}
