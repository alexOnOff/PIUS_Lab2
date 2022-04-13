<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = DB::table('articles')->simplePaginate(30);

        $query = Article::query();
        $query->when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'like', $request->name);
        });
        $query->when($request->filled('symbolcode'), function ($q) use ($request) {
            $q->where('symbolcode', 'like', $request->symbolcode);
        });
        $query->when($request->filled('content'), function ($q) use ($request) {
            $q->where('email', 'like', $request->email);
        });
        $query->when($request->filled('create_time'), function ($q) use ($request) {
            $q->where('phone', 'like', $request->phone);
        });
        $query->when($request->filled('author'), function ($q) use ($request) {
            $q->where('blocked', $request->blocked);
        });

        return view('articles', ['articles' => $articles]);
    }
       
    public function curArticle($id){

        $articles = DB::table('articles')->where('id', '=', $id)->get();
        $tags_id = DB::table('article_tags')->where('article_id', '=', $id);
        foreach($tags_id as $tag){
     #       $curTag = [$curTag, DB::table('tags')->where('id', '=', $tag->$id)];
        }
        
       # ->orderByRaw('add_time DESC')->get();
        return view('curArticle', ['articles' => $articles, 'adresses' => $adresses]);
    }

}
