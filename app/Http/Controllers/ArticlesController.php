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
        $query = Article::query();
        $query->when($request->filled('name'), function ($q) use ($request) {
            $q->where('name', 'like', $request->name);
        });
        $query->when($request->filled('symbolcode'), function ($q) use ($request) {
            $q->where('symbolcode', 'like', $request->symbolcode);
        });

        $filterParam = $request->filled('tags');

        if ($filterParam) {
                $filteredArticles = Article::whereHas('tags', function($q) use ($filterParam) {
                    $q->where('name', '=', $filterParam);
                });
            $query = $filteredArticles;
        }     

        $articles = $query->simplePaginate(25);
        $tags = DB::table('tags')->simplePaginate(5);

        return view('articles', ['articles' => $articles, 'tags' => $tags]);
    }
       
    public function curArticle($id){

        $articles = DB::table('articles')->where('id', '=', $id)->get();
        $tags = DB::table('tags')->join('article_tags',function($join){
            $join->on('tags.id', '=', 'article_tags.tag_id');
        })->where('article_tags.article_id','=', $id)->orderBy('name')->get();

        
        return view('curArticle', ['articles' => $articles, 'tags' => $tags]);
    }

}
