<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the pages
        $content = [
            'pages' => Page::all()
        ];
        //load the view with the pages content
        return view('pages.index', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
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
        $page = new Page;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->order = $request->input('order');
        $page->link = "link";
        $page->save();
        return Redirect::route('pages.create');
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
        $page=Page::find($id);
        $articles=Article::all();
        $content=[
            'page'=>$page,
            'articles'=>$articles
        ];
    
        return view('pages.show',$content);
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
        $page = Page::find($id);
        $content = [
            'page' => $page
        ];
        return view('pages.edit', $content);
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
        $page=Page::find($id);
        $page->title=$request->title;
        $page->description=$request->description;
        $page->order=$request->order;
        $page->update();
        return Redirect::route('pages.index');
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
        $page=Page::find($id);
        $page->delete();
        return Redirect::route('pages.index');
    }
}
