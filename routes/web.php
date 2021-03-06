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

// Route::get 表明这个路由将会响应 GET 请求
Route::get('/', function () { // 第一个参数指明URL，第二个参数指明了处理该 URL 的控制器动作。
    return view('welcome');
});
// 这个代码就是说，我们向 http://sample.test/ 发出了一个get请求，则该请求将会返回一个叫做welcome视图

Route::get('/','StaticPagesController@home')->name('home'); // name是为路由定义名称，这样可以在页面里的href里调用路由
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/about','StaticPagesController@about')->name('about');
Route::post('/test','StaticPagesController@test')->name('test');

// 注册的路由请求要交给一个别的Controller，因为注册时有表单与数据库进行交互，并不算静态页面
Route::get('signup', 'UsersController@create')->name('signup');

// resource 方法将遵从 RESTful 架构为用户资源生成路由。该方法接收两个参数，第一个参数为资源名称，第二个参数为控制器名称。
Route::resource('users', 'UsersController');

// 从.csv文件中导入信息到数据库
Route::get('/importdata','StaticPagesController@importdata')->name('importdata');

// 填写抽奖表单
Route::get('/draw', 'LottoryController@create')->name('draw');
Route::post('/draw', 'LottoryController@store')->name('draw.store');
