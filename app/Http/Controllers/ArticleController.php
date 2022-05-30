<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( $request->hasFile('file')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('file')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "main_image/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $path = $request->file('file')->storeAs('public/articles', $fileNameToStore);
            $article = new Article([
                'user_id' => auth()->user()->getAuthIdentifier(),
                'image_url' => $fileNameToStore,
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'body' => $request->get('body'),
                'visibility' => 0,
            ]);
            $article->save();
        }
        return 'success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $article = Article::find($request->get('article_id'));
        if( $request->hasFile('file')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('file')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "main_image/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $path = $request->file('file')->storeAs('public/articles', $fileNameToStore);
        }
        $article->image_url = $fileNameToStore;
        $article->title = $request->get('title');
        $article->description = $request->get('description');
        $article->body = $request->get('body');
        $article->visibility = 0;
//            $article = new Article([
//                'user_id' => auth()->user()->getAuthIdentifier(),
//                'image_url' => $fileNameToStore,
//                'title' => $request->get('title'),
//                'description' => $request->get('description'),
//                'body' => $request->get('body'),
//                'visibility' => 0,
//            ]);
        $article->save();
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
