<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            'pages' => Page::all()->sortBy('order')
            // 'pages' => DB::table('pages')->orderBy('order','asc')->get()
        ];
        //load the view with the pages content
        return view('dashboard', $content);
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
        $request->validate([
            'title' => 'required|min:3|max:20',
            'description' => 'required|min:10',
            'order' => 'required|numeric',
            
        ]);
        
        $page = new Page;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->order = $request->input('order');
        $page->link = "link";
        if($page->save()){
            
            self::createOrder($page->order,$page->id);
        }

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
        $actualPage = Page::find($id);
        $order = $actualPage->order;

        $prevPage = Page::where('order', $order - 1)->first();
        $nextPage = Page::where('order', $order + 1)->first();
        $content = [
            'actualpage' => $actualPage,
            'nextpage' => $nextPage,
            'prevpage' => $prevPage,
            'articles' => Page::find($id)->articles
        ];

        return view('pages.show', $content);
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

        $content = [
            'actualpage' => Page::find($id)
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
        $page = Page::find($id);

        if (!self::moveOrder($page->order, $id,$request->order)) {
            //ajouter un message
            return Redirect::route('pages.edit', ['id' => $id]);
        }

        $page->title = $request->title;
        $page->description = $request->description;
        $page->order = $request->order;
        $page->update();
        return Redirect::route('dashboard');
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
        $page = Page::find($id);
        if(!self::deleteOrder($page->order,$id)){
            return Redirect::route('dashboard');
        };
        $page->delete();
        return Redirect::route('dashboard');
    }

    /**
     * Undocumented function
     *
     * @param integer $order
     * @param integer $newOrder
     * @param integer $id
     * @return boolean
     */
    private static function createOrder(int $order,int $id): bool
    {
        
            return DB::table('pages')
            ->where('order','>=',$order)
            ->whereNotIn('id', [$id])
            ->increment('order');

    }
    private static function deleteOrder(int $order,int $id): bool
    {
        
            return DB::table('pages')
            ->where('order','>=',$order)
            ->whereNotIn('id', [$id])
            ->decrement('order');

    }

    private static function moveOrder(int $order,int $id,int $newOrder):bool{
        if ($newOrder == $order) {
            return false;
        }
        if ($newOrder > $order) {
            return DB::table('pages')
                ->whereBetween('order', [$order, $newOrder])
                ->whereNotIn('id', [$id])
                ->decrement('order');
        }

        return DB::table('pages')
            ->whereBetween('order', [$newOrder, $order])
            ->whereNotIn('id', [$id])
            ->increment('order');
    }
}
