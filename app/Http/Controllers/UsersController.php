<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UsersController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('admin');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation of the user
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        //Create a new user

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id'  => $user->id,
            'avatar'  =>'uploads/avatars/1.jpg'
        ]);
        Session::flash('success', 'User  added succesfully.');

        return redirect()->route('users');

        // Create the Profile after creating a new user


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
        // Delete the user permanently .

        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        Session::flash('success', 'User Deleted');

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin =    1;
        $user->save();

        Session::flash('success', 'Successfully shanged user permission');

        return redirect()->back();
    }


    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin =   0;
        $user->save();

        Session::flash('success', 'Successfully shanged user permission');

        return redirect()->back();
    }
}
