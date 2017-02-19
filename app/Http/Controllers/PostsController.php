<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $this->validate($request, [

            'title'         =>  'required',
            'featured'      =>  'required|image',
            'content'       =>  'required',
            'category_id'   =>  'required'
        ]);

        //Store  post and image into the database
        $featured = $request->featured;

        //Give a new name
        $featured_new_name = time().$featured->getClientOriginalName(); //Symphony name
        //Moving the image into the folder and pass to the name of the file
        $featured->move('uploads/posts',$featured_new_name );

        // Taking care for other fields
        $post = Post::Create([
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'featured'      =>  'uploads/posts/' . $featured_new_name,
            'category_id'   =>  $request->category_id
        ]);

        Session::flash('success', 'Post created successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
