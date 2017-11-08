<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Session;
use Auth;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database
        $articles = Article::orderBy('id', 'desc')->paginate(5); //newest article will be first
        // return a view and pass in the above variable
        return view('articles.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'intro_text' => 'required',
            'main_text' => 'required',
        ));
        
        // store in the database
        $article = new Article;

        $article->title = $request->title;
        $article->intro_text = $request->intro_text;
        $article->main_text = $request->main_text;
        $article->user_id = Auth::id();
        $article->author= Auth::user()->username;

        $article->save();

        //session that exists for a single request (put - would be pernament)
        Session::flash('success','New Article was successfully saved!');

        //redirect to another page
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //finding item by id
       
        $article = Article::find($id);
        return view('articles.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the article in the database and save as a variable
        $article = Article::find($id);
        // return the view and pass in the variable we previously created
        return view('articles.edit')->withArticle($article);
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
        // vaidate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'intro_text' => 'required',
            'main_text' => 'required'
            //'user_id'=> Auth::id()
        ));

        // save the data to the db
        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->intro_text = $request->input('intro_text');
        $article->main_text = $request->input('main_text');

        $article->save();

        // set flash data with success message
        Session::flash('success','Article was successfully saved.');

        // redirect with flash data to articles.show
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        Session::flash('success','Article was successfully deleted.');

        return redirect()->route('articles.index');
    }
}
