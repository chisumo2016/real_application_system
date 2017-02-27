<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [
    'uses'  => 'FrontEndController@index',
    'as'    => 'index'

]);

Route::get('/{slug}', [
    'uses'  => 'FrontEndController@singlePost',
    'as'    => 'post.single'
]);

Route::get('/post/{slug}', [
    'uses' =>'FrontEndController@singlePost',
    'as'   => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' =>'FrontEndController@category',
    'as'   => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' =>'FrontEndController@tag',
    'as'   => 'tag.single'
]);



Auth::routes();



Route::group(['prefix'=> 'admin','middleware' => 'auth'], function(){
    Route::get('/home',  [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);


    Route::get('/post/create',[
        'uses'  => 'PostsController@create',
        'as'   => 'post.create'
    ]);

    Route::post('/post/store',[
        'uses'  => 'PostsController@store',
        'as'    => 'post.store'
    ]);

   Route::get('/posts', [
     'uses'    =>  'PostsController@index',
       'as'    => 'posts'
   ]);


    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'post.edit'
    ]);

    Route::post('post/update/{id}',[
        'uses'  => 'PostsController@update',
        'as'    => 'post.update'
    ]);

    Route::get('/posts/trashed', [
        'uses'    =>  'PostsController@trashed',
        'as'    => 'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}', [
        'uses'    =>  'PostsController@kill',
        'as'    => 'posts.kill'
    ]);

    Route::get('/posts/restore/{id}', [
        'uses'    =>  'PostsController@restore',
        'as'      =>   'posts.restore'
    ]);


    Route::get('/post/delete/{id}', [
        'uses'    =>  'PostsController@destroy',
        'as'    => 'post.delete'
    ]);


    Route::get('/category/create',[
        'uses'  => 'CategoriesController@create',
        'as'   => 'category.create'
    ]);

    Route::post('/category/store',[
        'uses'  => 'CategoriesController@store',
        'as'   => 'categories.store'
    ]);

    Route::get('/categories',[
        'uses'  => 'CategoriesController@index',
        'as'   => 'categories'
    ]);


    Route::get('category/edit/{id}',[
        'uses'  => 'CategoriesController@edit',
        'as'    => 'category.edit'
    ]);


    Route::post('category/update/{id}',[
        'uses'  => 'CategoriesController@update',
        'as'    => 'category.update'
    ]);


    Route::get('category/delete/{id}',[
        'uses'  => 'CategoriesController@destroy',
        'as'    => 'category.delete'
    ]);


 Route::get('/tags', [
     'uses'    => 'TagsController@index',
     'as'      => 'tags'
 ]);

    Route::get('/tags/create', [
        'uses'    => 'TagsController@create',
        'as'      => 'tag.create'
    ]);

    Route::post('/tags/store', [
        'uses'    => 'TagsController@store',
        'as'      => 'tag.store'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses'    => 'TagsController@edit',
        'as'      => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses'    => 'TagsController@update',
        'as'      => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses'    => 'TagsController@destroy',
        'as'      => 'tag.delete'
    ]);

  Route::get('/users', [
      'uses'       => 'UsersController@index',
       'as'        => 'users'
  ]);

  Route::get('/user/create', [
      'uses'       => 'UsersController@create',
      'as'          =>'user.create'
  ]);

  Route::post('/user/store', [
      'uses'       => 'UsersController@store',
      'as'          =>'user.store'
  ]);


  Route::get('/user/admin/{id}', [
      'uses'    => 'UsersController@admin',
      'as'      => 'user.admin'
  ])->middleware('admin');


    Route::get('/user/not-admin/{id}', [
        'uses'    => 'UsersController@not_admin',
        'as'      => 'user.not.admin'
    ]);

     Route::get('user/profile', [
         'uses' => 'ProfilesController@index',
         'as'   =>  'user.profile'
     ]);

    Route::post('user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as'   =>  'user.profile.update'
    ]);


    Route::get('user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'   =>  'user.delete'
    ]);


   Route::get('/settings',[
      'uses'  => 'SettingsController@index',
      'as'    => 'settings'
  ]);


   Route::post('settings/update',[
      'uses' => 'SettingsController@update',
      'as'   =>'settings.update'
  ]);

});
//
//Route::get('/test', function(){
//   //dd(App\Category::find(1)->posts() );
//   //return App\Post::find(1)->category;
//  // return App\Tag::find(4)->posts;
//   //return App\Post::find(1)->tags;
//   //return App\User::find(1)->profile;
//   return App\Profile::find(1)->user;
//});


//Route::get('/', function () {
//    return view('welcome');
//});