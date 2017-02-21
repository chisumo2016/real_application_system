<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display Post in the View
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories and tags  before attempting to create a post');
            return redirect()->back();
        }
        ///return view ('admin.posts.create')->with('categories', Category::all());
        return view ('admin.posts.create')->with('categories',$categories)->with('tags', $tags);
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
            'category_id'   =>  'required',
            'tags'          =>  'required'
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
            'category_id'   =>  $request->category_id,
            'slug'          => str_slug($request->title)
        ]);

        //Many To Many Relationship

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                        ->with('tags', Tag::all());
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

        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')) {
            $featured = $request->featured;

            //Give a new name
            $featured_new_name = time() . $featured->getClientOriginalName(); //Symphony name
            //Moving the image into the folder and pass to the name of the file
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
         }


            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;

            $post->save();

             //Relationship btn tag and post
            $post->tags()->sync($request->tags); // sync is an array

            Session::flash('success', 'post updated Sucessfully');

            return redirect()->route('posts');
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

        $post = Post::find($id);
        $post ->delete();
        Session::flash('success', 'The post was just trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$post);
//        dd($post);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success','Post deleted permanently');
        return redirect()->back();
        //dd($post);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully');

        return redirect()->route('posts');
    }
}
