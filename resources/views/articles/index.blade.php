@extends('layout')

@section('content')
   
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
        	@forelse ($articles as $article)
            	<div class="title">
                <h2><a href="{{ route('articles.show', $article->id)}}">{{ $article->title }}</h2>
                <span class="byline">{{ $article->excerpt }}</span> </div>
            <p><img src="" alt="" class="image image-full" /> </p>
           
        </div>
        @empty
            <p>NO RELEVANT ARTICLES YET</p>
         @endforelse
    </div>
</div>

@endsection