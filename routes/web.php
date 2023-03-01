<?php

use Illuminate\Support\Facades\Route;
use app\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Rakuhai; //データベース
use App\Models\Delivery; //データベース
use Illuminate\Support\Facades\Auth;




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

// Route::get('/', function () {
//     return view('welcome');
// });

// ホーム画面
Route::get('/', 'App\Http\Controllers\RakuhaiController@index');
Route::get('/index', 'App\Http\Controllers\RakuhaiController@index')->name('index');

// 検索画面トップ
Route::get('/search/searchTop', 'App\Http\Controllers\RakuhaiController@searchTop')->name('searchTop');
// 検索画面２
Route::get('/search2', 'App\Http\Controllers\RakuhaiController@search2')->name('search2');
Route::post('/search2', 'App\Http\Controllers\RakuhaiController@search2')->name('search2');

// お問合せフォーム
Route::get('/contact', 'App\Http\Controllers\ContactController@show')->name('contact.show');
Route::post('/contact/confirm', 'App\Http\Controllers\ContactController@confirm')->name('contact.confirm');
Route::post('/contact/complete', 'App\Http\Controllers\ContactController@complete')->name('contact.complete');

// 管理者用ホーム画面
Route::get('/index_admin', 'App\Http\Controllers\RakuhaiController@index_admin')->name('index_admin');

// 管理者用検索画面トップ
Route::get('/search/searchTop_admin', 'App\Http\Controllers\RakuhaiController@searchTop_admin')->name('searchTop_admin');
// 管理者用検索画面２
Route::get('/search2_admin', 'App\Http\Controllers\RakuhaiController@search2_admin')->name('search2_admin');
Route::post('/search2_admin', 'App\Http\Controllers\RakuhaiController@search2_admin')->name('search2_admin');

// 管理者画面
Route::get('/management', 'App\Http\Controllers\RakuhaiController@management')->name('management');
Route::post('/management', 'App\Http\Controllers\RakuhaiController@management')->name('management');
// ユーザーの削除
Route::post('/user/{id}/delete', [App\Http\Controllers\RakuhaiController::class, 'delete'])->name('userDelete');

// 配送編集画面
Route::get('/managementEdit/{id}', 'App\Http\Controllers\RakuhaiController@managementEdit')->name('managementEdit');

// 確認画面
Route::post('/managementUpdate', 'App\Http\Controllers\RakuhaiController@managementUpdate')->name('managementUpdate');
// 完了画面
Route::post('/managementEnd', 'App\Http\Controllers\RakuhaiController@managementEnd')->name('managementEnd');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 管理者画面
Route::get('/admin', function () {
    // ログインしていない場合は、ログインページにリダイレクトする
    if (!Auth::check()) {
        return redirect('/login');
    }

    // ログインしている場合は、ダッシュボードを表示する
    // ユーザーテーブルの取得
    $management = new Rakuhai();
    $managements = $management->get();
    // $role = Auth::user()->role;

    // 配送方法テーブルの取得
    $deliveryManagements = Delivery::all();

    return view('admin', ['managements' => $managements, 'deliveryManagements' => $deliveryManagements]);
});

// 配送方法カスタム画面
Route::get('/custom', function () {
    // ログインしていない場合は、ログインページにリダイレクトする
    if (!Auth::check()) {
        return redirect('/login');
    }

    return view('custom');
});

// 配送方法追加画面
Route::get('/custom_delivery', 'App\Http\Controllers\RakuhaiController@custom_delivery')->name('custom_delivery');
Route::post('/custom_delivery_middle', 'App\Http\Controllers\RakuhaiController@custom_delivery_middle')->name('custom_delivery_middle');
Route::get('/custom_delivery_bottom', 'App\Http\Controllers\RakuhaiController@custom_delivery_bottom')->name('custom_delivery_bottom');
Route::post('/custom_delivery_bottom', 'App\Http\Controllers\RakuhaiController@custom_delivery_bottom')->name('custom_delivery_bottom');
Route::post('/custom_delivery_confirm', 'App\Http\Controllers\RakuhaiController@custom_delivery_confirm')->name('custom_delivery_confirm');
Route::get('/custom_end', 'App\Http\Controllers\RakuhaiController@custom_end')->name('custom_end');
Route::post('/custom_end', 'App\Http\Controllers\RakuhaiController@custom_end')->name('custom_end');

// フリマアプリ追加画面
Route::get('/custom_app', 'App\Http\Controllers\RakuhaiController@custom_app')->name('custom_app');
Route::get('/CustomApp', 'App\Http\Controllers\RakuhaiController@CustomApp')->name('CustomApp');
Route::post('/CustomApp', 'App\Http\Controllers\RakuhaiController@CustomApp')->name('CustomApp');

// 発送場所追加画面
Route::get('/custom_sendspot', 'App\Http\Controllers\RakuhaiController@custom_sendspot')->name('custom_sendspot');
Route::get('/CustomSendspot', 'App\Http\Controllers\RakuhaiController@CustomSendspot')->name('CustomSendspot');
Route::post('/CustomSendspot', 'App\Http\Controllers\RakuhaiController@CustomSendspot')->name('CustomSendspot');

// 受取場所追加画面
Route::get('/custom_getspot', 'App\Http\Controllers\RakuhaiController@custom_getspot')->name('custom_getspot');
Route::get('/CustomGetspot', 'App\Http\Controllers\RakuhaiController@CustomGetspot')->name('CustomGetspot');
Route::post('/CustomGetspot', 'App\Http\Controllers\RakuhaiController@CustomGetspot')->name('CustomGetspot');
