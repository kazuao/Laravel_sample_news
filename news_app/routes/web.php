<?php

use Illuminate\Support\Facades\Route;

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

// 管理側
Route::group(['middleware' => ['auth.admin']], function() {

    // 管理側トップ
    Route::get('/admin', 'admin\AdminTopController@show');

    // ログアウト実行
    Route::post('/admin/logout', 'admin\AdminLogoutController@logout');

    // ユーザ一覧
    Route::get('/admin/user_list', 'admin\ManageUserController@showUserList');

    // ユーザ登録
    Route::get('/admin/user/create', 'admin\ManageUserController@showUserCreateForm');
    Route::post('/admin/user/create', 'admin\ManageUserController@create');

    // ユーザ詳細
    Route::get('/admin/user/{id}', 'admin\ManageUserController@showUserDetail');
    Route::post('/admin/user/{id}', 'admin\ManageUserController@update');
});

// 記事作成
Route::group(['middleware' => ['auth']], function () {
	//記事の作成
	Route::get('/news/create', 'user\ManageEntryController@showCreateForm');
	Route::post('/news/create', 'user\ManageEntryController@create');
	//記事の編集
	Route::get('/news/edit/{id}', 'user\ManageEntryController@showEditForm');
	Route::post('news/edit/{id}', 'user\ManageEntryController@update');
	//記事の削除
	Route::post('/news/delete/{id}', 'user\ManageEntryController@delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/u/{name}', 'UserPageController@show');

//管理側ログイン
Route::get('/admin/login', 'admin\AdminLoginController@showLoginform');
Route::post('/admin/login', 'admin\AdminLoginController@login');
