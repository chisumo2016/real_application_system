<?php

namespace App\Http\Controllers;
use App\Setting;
use  Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //constructor for our middleware

    public function __construct()

    {
        $this->middleware('admin');
    }


    public function index()
    {
        return view('admin.settings.setting')->with('settings', Setting::first());
    }

    public function update()
    {
       // dd(request()->all());
        $this->validate(request(), [

          'site_name'      => 'required',
          'contact_number' => 'required',
          'contact_email'  => 'required',
          'address'        => 'required'


        ]);

        $settings = Setting::first();

        $settings->site_name      = request() -> site_name;
        $settings->contact_number = request() -> contact_number;
        $settings->contact_email  = request() -> contact_email;
        $settings->address        = request() -> address;

//        //Save setting into databse
            $settings->save();
            
//        //Set a Message from Session

        Session::flash('success', 'Settings Updated');

        return redirect()->back();
    }
}
