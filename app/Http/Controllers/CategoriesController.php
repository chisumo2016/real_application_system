<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$categories = Category::all();
        //return view ('admin.categories.index', compact('categories'));
        return view ('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation the input
        $this->validate($request, [
            'name' =>'required'
        ]);

        // Storing the category name in the database after validate
        $category = new Category;
        $category->name= $request->name;
        $category->save();

        // Flash Message
        Session::flash('success', 'You successfully created category');
        return redirect()->route('categories');
        //dd($request->all());
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

        $category = Category::find($id);

        return view('admin.categories.edit',compact('category'));

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
        // Updating the category
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You successfully updated the  category');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete name of categories from database
        $category = Category::find($id);

        //Delete the post of that category
        foreach($category->posts as $post){
            //$post->delete();
            $post->forceDelete();
        }

        $category->delete();
        Session::flash('success', 'You successfully deleted the  category');
        return redirect()->route('categories');

    }
}
