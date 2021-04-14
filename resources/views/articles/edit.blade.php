@extends('layout')

@section('bulmaLink')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
   
	<div id="wrapper">
		<div id="page" class="container">
		<h2 class="heading has-text-weight-bold is-size-4">EDIT Article</h2>
		
		<form method="post" action="/articles/{{$article->id}}">
			@csrf
			@method('put')
			<div class="field">
				<label class="label" for="title">Title</label>
				<div class="comtrol">
					<input class="input" type="text" name="title" id="title" value="{{$article->title}}">	
				</div>
			</div>
			<div class="field">
				<label class="label" for="excerpt">excerpt</label>
				<div class="comtrol">
					<input class="input" type="text" name="excerpt" id="excerpt" value="{{$article->excerpt}}">	
				</div>
			</div>
			<div class="field">
				<label class="label" for="body">body</label>
				<div class="comtrol">
					<textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>	
				</div>
			</div>
			<div class="field is-grouped">
				<div class="comtrol">
					<button class="button is-link" type="submit">Update</button>	
				</div>
			</div>
		</form>
	</div>

@endsection