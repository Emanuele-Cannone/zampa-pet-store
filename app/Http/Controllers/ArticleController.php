<?php

namespace App\Http\Controllers;

use App\DataTables\ArticleDataTable;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(ArticleDataTable $dataTable){
        return $dataTable->render('article.index');
    }

    public function create(){
        return view('article.create');
    }

    public function store(Request $request){
        $data = $request->all();
        Article::create($data);
        toastr()->success(__('article.created'));
        return redirect()->route('articles.index');
    }

    public function edit(Article $article){
        return view('article.edit',compact('article'));
    }

    public function update(Article $article, Request $request){
        $data = $request->all();
        $article->update($data);
        toastr()->success(__('article.created'));
        return redirect()->route('articles.index');
    }

    public function  destroy(Article $article){
        $article->delete();
        return response()->json('ok',200);
    }
}
