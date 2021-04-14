<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    //
	public function index()
    {
    	//RETURNS A LISTS OF ARTICLES
    	if(request('tag')){
    		$articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
    	}else{
    		$articles= Article::all();
    	}
    	
    	return view('articles.index', ['articles' => $articles]);
    	//dd($id);
    }

    

      public function show(Article $article)
    {
    	//RETURNS A SINGLE ARTICLE
    	return view('articles.show', ['article' => $article]);
    	//dd($id);
    }

    public function create()
    {

    	return view('articles.create' , ['tags' => Tag::all()]);
    }

     public function store()
    {
        $article = new Article(request(['title','excerpt','body']));
        $article->user_id = 2;
        $article->save();

        $article->tags()->attach(request('tags'));
    	//dump(request()->all()); //SHOW ALL REQUEST
    	//auth()->user()->articles()->create($article); //TO SET AUTOMATICALLY

   		return redirect(route('articles.index'));

    }

    public function edit($id)
    {
    	$article = Article::find($id);
    	return view('articles.edit', compact('article'));
    }

     public function update(Article $article)
    {
    	$article->update($this->validateArticle());

   		return redirect($article->path());
    }

    protected function validateArticle()
    {
    	return request()->validate([
    		'title'=> 'required',
    		'excerpt'=> 'required',
    		'body'=> 'required'
            // 'tags'=> 'exits:tags.id'

    	]);
    }

}
    