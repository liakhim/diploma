<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocationController;
use App\Models\Article;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    $articles = Article::all();
    return view('welcome', ['articles' => $articles]);
});
Route::get('/places',   [LocationController::class, 'index']);

Route::get('/filters', function () {
    $budgetFilters = [
        'budget_filters' =>[
            ['key' => '0_0', 'name' => '0', 'min' => 0, 'max' => 0],
            ['key' => '0_1000', 'name' => 'до 1000', 'min' => 0, 'max' => 1000],
            ['key' => '1000_3000', 'name' => '1000 - 3000', 'min' => 1000, 'max' => 3000],
            ['key' => '3000_5000', 'name' => '3000 - 5000', 'min' => 3000, 'max' => 5000],
            ['key' => '5000_many', 'name' => 'от 5000', 'min' => 5000, 'max' => null]
        ],
        // sad, happy, holiday, romantic, relax
        'mood_filters' =>[
            ['key' => 'sad','name' => 'Грустное'],
            ['key' => 'happy','name' => 'Радостное'],
            ['key' => 'holiday','name' => 'Праздничное'],
            ['key' => 'romantic','name' => 'Романтическое'],
            ['key' => 'relax','name' => 'Расслабленное'],
        ],
        'company_filters' =>[
            ['key' => '0_1', 'name' => '1', 'min' => 1, 'max' => 1],
            ['key' => '2_5', 'name' => '2 - 5', 'min' => 2, 'max' => 5],
            ['key' => '5_many', 'name' => 'больше 5', 'min' => 5, 'max' => null],
        ],
        'type_filters' =>[
            ['key' => 'active','name' => 'Активный отдых'],
            ['key' => 'culture','name' => 'Культурный отдых'],
            ['key' => 'entertaining','name' => 'Развлечение']
        ]
    ];
    $collect = collect($budgetFilters);
    return response()->json($collect);
});

Route::get('/filter', function (Request $request) {
    $filter_company = $request->get('filter_company');
    $filter_budget = $request->get('filter_budget');
    $filter_mood = $request->get('filter_mood');
    $filter_type = $request->get('filter_type');
    $places = $filter_company && $filter_budget && $filter_mood ? Location::getWithFilters($filter_company, $filter_budget, $filter_mood, $filter_type) : [];
    return view('filter', ['places' => $places]);
});

Route::get('/places/{id}', function () {
    return view('place');
});
Route::get('/articles/{id}', function ($id) {
    $article = Article::find($id);
    return view('article', ['article' => $article]);
});
Route::get('/profile', function () {
    $user_id = auth()->user()->getAuthIdentifier();
    $user = User::find($user_id);
    return view('profile', ['user' => $user]);
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
    Route::group(['prefix' => 'places'], function() {
        Route::get('/', function() {
            $locations = Location::all();
            return view('admin.places', ['locations' => $locations]);
        });
        Route::get('/create', function() {
            $locations = Location::all();
            return view('admin.places.create', ['locations' => $locations]);
        });
        Route::post('/create', [LocationController::class, 'create']);
    });
    Route::get('/filters', function() {
        return view('admin.filters');
    });
});
