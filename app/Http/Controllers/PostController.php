<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->where('status',1)->get();
        return view('admins.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admins.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!empty($request->image)) {
            $fileName = time() .'.'.$request->image->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'cate_id' => 'required',
            'user_id' => 'required'
           
        ]);

        $post = new Post();
        $post->title=$request->title;
        $post->content=$request->content;
        $post->cate_id=$request->cate_id;
        $user_id = Auth::User()->id;
        $post->user_id=$user_id;
       
         if (!empty($request->image)) {
            $post->image=$fileName;
            $request->image->move(public_path('/assets/uploads/post'),$fileName);
        }
        if($post->save()){
            
            return redirect(route('dashboard.post.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admins.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admins.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->image)) {
            $fileName = time() .'.'.$request->image->getClientOriginalName();
        }
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'cate_id' => 'required',
            'user_id' => 'required'
           
        ]);

        $post = Post::find($id);
        $post->title=$request->title;
        $post->content=$request->content;
        $post->cate_id=$request->cate_id;
        $user_id = Auth::User()->id;
        $post->user_id=$user_id;
       
         if (!empty($request->image)) {
            $post->image=$fileName;
            $request->image->move(public_path('/assets/uploads/post'),$fileName);
        }
        if($post->save()){
            
            return redirect(route('dashboard.post.index'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('dashboard.post.index'));

    }
}
