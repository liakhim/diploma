<?php

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/places', function () {
    return view('places');
});
Route::get('/places/{id}', function () {
    return view('place');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/404', function () {
    return abort(404);
});
Route::group(['middleware' => 'role:web-developer', 'prefix' => 'admin'], function() {
    Route::get('/dashboard', function() {
        return view('admin.index');
    });
    Route::get('/users', function() {
        return view('admin.users', ['users' => User::all()]);
    });
    Route::group(['prefix' => 'articles'], function() {
        Route::get('/', function() {
            $user_id = auth()->user()->getAuthIdentifier();
            $user = User::find($user_id);
            foreach ($user->articles as &$article) {
                $article['author'] = User::find($article->user_id)->name;
            }
            return view('admin.articles', ['articles' => $user->articles]);
        });
        Route::get('/create', function() {
            return view('admin.articles.create');
        });
    });
    Route::get('/places', function() {
        return view('admin.places', ['users' => 'name test']);
    });
    Route::get('/filters', function() {
        return view('admin.filters');
    });
});
