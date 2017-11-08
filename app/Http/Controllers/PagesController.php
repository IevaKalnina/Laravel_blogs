<?php

namespace App\Http\Controllers;
use App\Article;

class PagesController extends Controller{
    
    //
    public function getIndex(){
        return view('pages.welcome');
    }

    public function getHome(){
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.home')->withArticles($articles);
    }

    public function getArticles(){
        return view('articles.index');
    }

    

    

}
