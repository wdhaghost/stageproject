<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////get all the articles
        $content = [
            'articles' => Article::all()
        ];
        //load the view with the pages content
        return view('articles.index', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = [
            'articles' => Article::all()
        ];
        //
        return view('articles.create',$content);
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
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->order = $request->input('order');
        $article->page()->associate($request->page);
        $path= $request->file('link')->store('pictures');
        $article->link = $path;
        $article->save();
        return Redirect::route('articles.create');
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
        $article=Article::find($id);
        $content = [
            'articles'=>Article::all(),
            'article' => $article
        ];
        return view('articles.edit', $content);
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
        $article=Article::find($id);
        $article->title=$request->title;
        $article->page()->associate($request->page);
        $article->description=$request->description;
        $article->order=$request->order;
        $article->update();
        return Redirect::route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article=Article::find($id);
        Storage::delete($article->link);
        $article->delete();
        return Redirect::route('articles.index');
    }
}
